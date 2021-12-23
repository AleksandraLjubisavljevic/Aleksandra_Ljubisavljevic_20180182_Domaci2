<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UserProductController extends Controller
{
    public function index($user_id)
    {
        $products = Product::get()->where('user_id', $user_id);
        if (is_null($products))
            return response()->json('Data not found', 404);
        return response()->json($products);
    }
}
