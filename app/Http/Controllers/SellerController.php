<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Import model Order
use App\Models\User;

class SellerController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('seller.dashboard', ['orders' => $orders]);
    }

    public function editUser(Request $request, User $user)
    {
        // You can retrieve the user information and pass it to the view for editing
        return view('admin.editUser', ['user' => $user]);
    }


    public function destroyUser(Request $request, User $user)
    {
        // Delete the user
        $user->delete();

        // Redirect back with a success message
        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully');
    }
}
