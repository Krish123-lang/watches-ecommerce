<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WatchController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->limit(4)->get();
        return view('index', compact('products'));
    }

    public function single_product(Request $request, $id)
    {
        $product_array = DB::table('products')->where('id', $id)->get();
        return view('single_product', compact('product_array'));
    }

    public function products()
    {
        $products = DB::table('products')->paginate(4);
        return view('products', compact('products'));
    }
}
