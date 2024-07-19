<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function allproduct()
    {
        return view('all-product');
    }
    public function index()
    {
        
        $products = Product::all();
        return response()->json(['status' => true, 'data' => $products], 200);
    }

    public function add()
    {
        return view('add-product');
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json(['status' => true, 'product' => $product], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'product_name' => 'required',
            'detailed_description' => 'required',
            'short_description' => 'required',
            'price' => 'required|numeric|min:0',
            'promotional_price' => 'nullable|numeric|min:0',
            'imgproduct' => 'nullable|string',
            'album' => 'nullable|json',
            'pdf_file' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validation error', 'data' => $validator->errors()], 422);
        }

        $product = Product::create([
            'category' => $request->input('category'),
            'product_name' => $request->input('product_name'),
            'detailed_description' => $request->input('detailed_description'),
            'short_description' => $request->input('short_description'),
            'price' => $request->input('price'),
            'promotional_price' => $request->input('promotional_price'),
            'imgproduct' => $request->input('imgproduct'),
            'album' => $request->input('album'),
            'pdf_file' => $request->input('pdf_file'),
            'quantity' => $request->input('quantity'),
        ]);

        return response()->json(['status' => true, 'message' => 'Sản phẩm đã được tạo thành công', 'data' => $product], 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'detailed_description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'price' => 'required|numeric',
            'promotional_price' => 'nullable|numeric',
            'imgproduct' => 'required|string',
            'album' => 'required|string',
            'pdf_file' => 'nullable|string',
            'quantity' => 'required|integer',
        ]);

        $product = Product::find($id);

        if ($product) {
            $product->update($validated);
            return response()->json(['message' => 'Product updated successfully', 'product' => $product], 200);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }




    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
