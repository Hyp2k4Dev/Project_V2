<?php

namespace App\Http\Controllers\Backend;
use App\Models\Order;
use App\Models\Product;

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
        $orders = Order::all();

        // Lấy danh sách sản phẩm từ model Product
        $products = Product::all();

        // Trả về view admin.dashboard với các dữ liệu cần thiết
        return view('admin.dashboard', compact('orderStatus', 'notifications', 'customerMessages', 'customerReviews', 'products'));
    }

    public function storeProduct(Request $request)
    {
        // Kiểm tra và lưu trữ hình ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
        }

        // Tạo sản phẩm mới và lưu vào cơ sở dữ liệu
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $imageName ?? null; // Lưu tên hình ảnh vào cơ sở dữ liệu
        $product->save();

        return redirect()->route('admin.dashboard')->with('success', 'Sản phẩm đã được thêm thành công.');
    }

    
}
