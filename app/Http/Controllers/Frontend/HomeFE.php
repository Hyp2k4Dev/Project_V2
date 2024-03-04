<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeFE extends Controller
{
    public function index()
    {
        $products = Product::where('Quantity', '>', 0)->take(6)->get();
        return view('frontend.home', compact('products'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
