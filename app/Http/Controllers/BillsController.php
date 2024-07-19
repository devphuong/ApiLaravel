<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BillsController extends Controller
{
    public function index()
    {
        try {
            $bills = Bill::all();
            return response()->json(['status' => true, 'data' => $bills], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Failed to fetch bills', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $bill = Bill::find($id);

            if (!$bill) {
                return response()->json(['status' => false, 'message' => 'Bill not found'], 404);
            }

            return response()->json(['status' => true, 'bill' => $bill], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Failed to fetch bill', 'error' => $e->getMessage()], 500);
        }
    }

    public function addbill(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'category' => 'required',
                'product_name' => 'required',
                'short_description' => 'required',
                'price' => 'nullable|numeric|min:0',
                'promotional_price' => 'nullable|numeric|min:0',
                'totalAmount' => 'nullable|numeric|min:0',
                'pdf_file' => 'nullable|string',
                'quantity_bill' => 'required|integer|min:0',
                'full_name' => 'required|string',
                'email' => 'required|email',
                'phone_number' => 'required|string',
                'address' => 'required|string',
                'resultCode' => 'nullable|integer',
                'signature' => 'nullable|string'
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => 'Validation error', 'data' => $validator->errors()], 422);
            }

            $bill = Bill::create([
                'category' => $request->input('category'),
                'product_name' => $request->input('product_name'),
                'short_description' => $request->input('short_description'),
                'price' => $request->input('price'),
                'promotional_price' => $request->input('promotional_price'),
                'totalAmount' => $request->input('totalAmount'),
                'pdf_file' => $request->input('pdf_file'),
                'quantity_bill' => $request->input('quantity_bill'),
                'full_name' => $request->input('full_name'),
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone_number'),
                'address' => $request->input('address'),
                'resultCode' => $request->input('resultCode'),
                'signature' => $request->input('signature')
            ]);

            return response()->json(['status' => true, 'message' => 'Bill created successfully', 'data' => $bill], 201);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Failed to create bill', 'error' => $e->getMessage()], 500);
        }
    }

    public function updatebill(Request $request, $id)
    {
        try {
            $bill = Bill::find($id);
            if (!$bill) {
                return response()->json(['status' => false, 'message' => 'Bill not found'], 404);
            }

            $validator = Validator::make($request->all(), [
                'category' => 'required',
                'product_name' => 'required',
                'short_description' => 'required',
                'price' => 'nullable|numeric|min:0',
                'promotional_price' => 'nullable|numeric|min:0',
                'totalAmount' => 'nullable|numeric|min:0',
                'pdf_file' => 'nullable|string',
                'quantity_bill' => 'required|integer|min:0',
                'full_name' => 'required|string',
                'email' => 'required|email',
                'phone_number' => 'required|string',
                'address' => 'required|string',
                'resultCode' => 'nullable|integer',
                'signature' => 'nullable|string'
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => 'Validation error', 'data' => $validator->errors()], 422);
            }

            $bill->update([
                'category' => $request->input('category'),
                'product_name' => $request->input('product_name'),
                'short_description' => $request->input('short_description'),
                'price' => $request->input('price'),
                'promotional_price' => $request->input('promotional_price'),
                'totalAmount' => $request->input('totalAmount'),
                'pdf_file' => $request->input('pdf_file'),
                'quantity_bill' => $request->input('quantity_bill'),
                'full_name' => $request->input('full_name'),
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone_number'),
                'address' => $request->input('address'),
                'resultCode' => $request->input('resultCode'),
                'signature' => $request->input('signature')
            ]);

            return response()->json(['status' => true, 'message' => 'Bill updated successfully', 'bill' => $bill], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Failed to update bill', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $bill = Bill::find($id);
            if (!$bill) {
                return response()->json(['status' => false, 'message' => 'Bill not found'], 404);
            }

            $bill->delete();
            return response()->json(['status' => true, 'message' => 'Bill deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Failed to delete bill', 'error' => $e->getMessage()], 500);
        }
    }
}
