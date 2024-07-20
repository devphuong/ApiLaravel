<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MomoPayment;
use App\Models\Cart;

class MomoPaymentController extends Controller
{
    public function index()
    {
        try {
            $momos = MomoPayment::all();
            return response()->json(['status' => true, 'data' => $momos], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Failed to fetch cart items', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $momos = MomoPayment::find($id);

            if (!$momos) {
                return response()->json(['status' => false, 'message' => 'Item not found'], 404);
            }

            return response()->json(['status' => true, 'momos' => $momos], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Failed to fetch momos', 'error' => $e->getMessage()], 500);
        }
    }
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        ]);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        // Execute post
        $result = curl_exec($ch);
        // Check for cURL errors
        if (curl_errno($ch)) {
            $result = json_encode(['error' => curl_error($ch)]);
        }
        // Close connection
        curl_close($ch);
        return $result;
    }

    public function online_checkout()
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";  
        $orderId = time() . "";
        $redirectUrl = "http://192.168.11.239:8000/api/momo-ipn"; 
        $ipnUrl = "http://192.168.11.239:8000/api/momo-ipn"; 
        $extraData = "";

        $requestId = time() . "";
        $requestType = "payWithATM";

        // Before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data = [
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        ];

        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true); 

        if (isset($jsonResult['payUrl'])) {
            return redirect($jsonResult['payUrl']);
        } else {
            return response()->json(['error' => 'Error in payment process or invalid payUrl'], 500);
        }
    }

    public function handleIPN(Request $request)
    {
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';  

        $amount = $request->input('amount');
        $orderId = $request->input('orderId');
        $orderInfo = $request->input('orderInfo');
        $orderType = $request->input('orderType');
        $transId = $request->input('transId');
        $payType = $request->input('payType');
        $requestId = $request->input('requestId');
        $extraData = $request->input('extraData');
        $responseTime = $request->input('responseTime');
        $resultCode = $request->input('resultCode');
        $signature = $request->input('signature');

        $rawHash = "accessKey=" . $accessKey .
                "&amount=" . $amount .
                "&extraData=" . $extraData .
                "&orderId=" . $orderId .
                "&orderInfo=" . $orderInfo .
                "&orderType=" . $orderType .
                "&partnerCode=" . $partnerCode .
                "&payType=" . $payType .
                "&requestId=" . $requestId .
                "&responseTime=" . $responseTime .
                "&resultCode=" . $resultCode .
                "&transId=" . $transId;


        if ($resultCode == 0) {
            MomoPayment::create([
                'amount' => $amount,
                'orderType' => $orderType,
                'transId' => $transId,
                'resultCode' => $resultCode,
                'payType' => $payType,
                'signature' => $signature,
            ]);
            return redirect('http://192.168.11.239:8000/api/thank-you');
        } else {
            // return response()->json([
            //     'error' => 'Invalid signature or resultCode',
            //     'received_ipn_data' => $request->all(),
            //     'raw_hash' => $rawHash,
            //     'received_signature' => $signature
            // ], 400);
            MomoPayment::create([
                'amount' => $amount,
                'orderType' => $orderType,
                'transId' => $transId,
                'resultCode' => $resultCode,
                'payType' => $payType,
                'signature' => $signature,
            ]);
            return redirect('http://192.168.11.239:8000/api/erro-payment');
        }
    }
}
