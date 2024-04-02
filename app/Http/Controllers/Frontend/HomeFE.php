<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Size;

class HomeFE extends Controller
{
    public function index()
    {
        $products = Product::take(6)->get();
        return view('frontend.home', compact('products'));
    }
    public function product()
    {
        $products = Product::with('sizes')->get();
        $products = Product::get();
        $products = Product::latest()->paginate(9);
        // return view('product', compact('products'));
        return view('frontend.product', compact('products'));
    }
    public function productdetails()
    {
        return view('frontend.productdetails');
    }
    public function show($id)
    {
        $otherController = new ProductController();
        $products = $otherController->getProductSizes();
        $productDetails = Product::with('sizes')->find($id);
        return view('frontend.productdetails', compact('products'));
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
