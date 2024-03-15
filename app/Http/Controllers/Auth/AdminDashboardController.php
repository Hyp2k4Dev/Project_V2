<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Models\Order;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu từ hệ thống, ví dụ: trạng thái đơn hàng và thông báo từ khách hàng
        $orderStatus = [
            'pending' => 10,
            'processing' => 20,
            'completed' => 50,
        ];

        $notifications = [
            ['message' => 'New order received', 'type' => 'info'],
            ['message' => 'Payment processed', 'type' => 'success'],
            ['message' => 'Customer query received', 'type' => 'warning'],
        ];

        $customerMessages = []; // Thêm dữ liệu khách hàng vào đây

        $customerReviews = []; // Thêm đánh giá khách hàng vào đây


        // Lấy danh sách đơn hàng từ model Order
        $order = Order::all();
        return view('admin.dashboard', compact('orderStatus', 'notifications', 'customerMessages', 'customerReviews', 'order'));

        // Trả về view admin.dashboard với các dữ liệu cần thiết
    }
}
