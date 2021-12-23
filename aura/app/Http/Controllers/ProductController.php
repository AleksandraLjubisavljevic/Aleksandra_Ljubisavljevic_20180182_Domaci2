<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return new ProductCollection($products);
    }

    public function show(Product $product)
    {
        //$product = Product::find($id);
        return new ProductResource($product);
    }
}

