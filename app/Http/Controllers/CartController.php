<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        try {
            $items = Cart::all();
            return response()->json(['status' => true, 'data' => $items], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Failed to fetch cart items', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $item = Cart::find($id);

            if (!$item) {
                return response()->json(['status' => false, 'message' => 'Item not found'], 404);
            }

            return response()->json(['status' => true, 'item' => $item], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Failed to fetch item', 'error' => $e->getMessage()], 500);
        }
    }

    public function addcart(Request $request)
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
                'success' => 'required|boolean',
                'unsuccessful' => 'required|boolean',
                'approving' => 'required|boolean',
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

            $item = Cart::create([
                'category' => $request->input('category'),
                'product_name' => $request->input('product_name'),
                'short_description' => $request->input('short_description'),
                'price' => $request->input('price'),
                'promotional_price' => $request->input('promotional_price'),
                'totalAmount' => $request->input('totalAmount'),
                'pdf_file' => $request->input('pdf_file'),
                'quantity_bill' => $request->input('quantity_bill'),
                'success' => $request->input('success'),
                'unsuccessful' => $request->input('unsuccessful'),
                'approving' => $request->input('approving'),
                'full_name' => $request->input('full_name'),
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone_number'),
                'address' => $request->input('address'),
                'resultCode' => $request->input('resultCode'),
                'signature' => $request->input('signature')
            ]);

            return response()->json(['status' => true, 'message' => 'Item added to cart successfully', 'data' => $item], 201);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Failed to add item to cart', 'error' => $e->getMessage()], 500);
        }
    }

    public function updatecart(Request $request, $id)
    {
        try {
            $item = Cart::find($id);
            if (!$item) {
                return response()->json(['status' => false, 'message' => 'Item not found'], 404);
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
                'success' => 'required|boolean',
                'unsuccessful' => 'required|boolean',
                'approving' => 'required|boolean',
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

            $item->update([
                'category' => $request->input('category'),
                'product_name' => $request->input('product_name'),
                'short_description' => $request->input('short_description'),
                'price' => $request->input('price'),
                'promotional_price' => $request->input('promotional_price'),
                'totalAmount' => $request->input('totalAmount'),
                'pdf_file' => $request->input('pdf_file'),
                'quantity_bill' => $request->input('quantity_bill'),
                'success' => $request->input('success'),
                'unsuccessful' => $request->input('unsuccessful'),
                'approving' => $request->input('approving'),
                'full_name' => $request->input('full_name'),
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone_number'),
                'address' => $request->input('address'),
                'resultCode' => $request->input('resultCode'),
                'signature' => $request->input('signature')
            ]);

            return response()->json(['status' => true, 'message' => 'Item updated successfully', 'data' => $item], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Failed to update item', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $item = Cart::find($id);
            if (!$item) {
                return response()->json(['status' => false, 'message' => 'Item not found'], 404);
            }

            $item->delete();
            return response()->json(['status' => true, 'message' => 'Item deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Failed to delete item', 'error' => $e->getMessage()], 500);
        }
    }
}

