<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeFE extends Controller
{
    public function index()
    {
        return view('frontend.home');
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
