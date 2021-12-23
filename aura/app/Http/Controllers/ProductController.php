<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return new ProductCollection($products);
    }

    public function show(Product $product)
    {
       
        return new ProductResource($product);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'price' => 'required',
            'image' => 'required|string|max:255',
            'category_id' => 'required',
            'distributor_id'=>'required'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
            'category_id' => $request->category_id,
            'distributor_id' => $request->distributor_id,
            'user_id' => Auth::user()->id,
        ]);

        return response()->json(['Product is created successfully.', new ProductResource($product)]);
    }
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'price' => 'required',
            'image' => 'required|string|max:255',
            'category_id' => 'required',
            'distributor_id'=>'required'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->category_id = $request->category_id;
        $product->distributor_id = $request->distributor_id;

        $product->save();

        return response()->json(['Product is updated successfully.', new ProductResource($product)]);
    }
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json('Product is deleted successfully.');
    }
}

