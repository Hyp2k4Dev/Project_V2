<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeFE extends Controller
{
    public function index()
    {
        $products = Product::take(6)->get();
        return view('frontend.home', compact('products'));
    }
    public function product()
    {
        $products = Product::where('Quantity', '>', 0)->get();
        return view('frontend.product', compact('products'));
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function blog()
    {
        return view('frontend.blog');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
