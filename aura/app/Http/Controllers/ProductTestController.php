<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Http\Resources\ProductCollection;

use Illuminate\Http\Request;

class ProductTestController extends Controller
{
  /* public function index()
    {
        roducts = Product::all();

        return $products;
    }*/

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
