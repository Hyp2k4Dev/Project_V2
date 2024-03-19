<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Import model Order

class SellerController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('seller.dashboard', ['orders' => $orders]);
    }
}
