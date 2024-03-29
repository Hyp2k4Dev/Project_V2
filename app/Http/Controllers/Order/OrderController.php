<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        return view('frontend.Order');
    }
    public function createOrder(Request $request)
    {
        $dataFromClient = $request->all();

        // Kiểm tra xem khóa 'phone' có tồn tại trong mảng $dataFromClient không
        if (array_key_exists('phone', $dataFromClient)) {
            $customer = Customer::where('phone', $dataFromClient['phone'])->first();

            if (!$customer) {
                $customer = Customer::create([
                    'phone' => $dataFromClient['phone'],
                    'Name_customer' => $dataFromClient['name'],
                    'address' => $dataFromClient['address'],
                    'gmail' => $dataFromClient['email'],
                    'status' => true,
                ]);
            }

            $order = new Order();
            $order->customer_id = $customer->id;
            $order->order_date = now();
            $order->total_amount = 0;
            $order->save();

            foreach ($dataFromClient['products'] as $productData) {
                // Thêm sản phẩm vào đơn hàng
            }

            $order->save();

            return redirect('/')->with('success', 'Đã tạo đơn hàng thành công');
        } else {
            // Xử lý trường hợp khi khóa 'phone' không tồn tại trong mảng $dataFromClient
            return redirect()->back()->with('error', 'Không tìm thấy thông tin số điện thoại');
        }
    }



    public function show()
    {
        $pendingOrders = Order::where('status_order', 'pending')
            ->with('customer', 'orderDetails.product')
            ->get();

        return view('user.orderList', compact('pendingOrders'));
    }
    public function showOrdAdmin()
    {
        $pendingOrders = Order::where('status_order', 'pending')
            ->with('customer', 'orderDetails.product')
            ->get();

        return view('admin.ordList', compact('pendingOrders'));
    }

    public function addToCart()
    {
        $orderDetails = OrderDetail::all(); // Ví dụ
        $totalPrice = 0;

        // Gọi hàm từ controller khác để lấy dữ liệu sản phẩm
        $otherController = new ProductController();
        $products = $otherController->getProducts();

        foreach ($orderDetails as $detail) {
            $totalPrice += $detail->subtotal;
        }

        return view('frontend.addToCart', compact('orderDetails', 'totalPrice', 'products'));
    }

    public function checkOut()
    {
        $orderDetails = OrderDetail::all(); // Ví dụ
        $totalPrice = 0;

        // Gọi hàm từ controller khác để lấy dữ liệu sản phẩm
        $otherController = new ProductController();
        $products = $otherController->getProducts();

        foreach ($orderDetails as $detail) {
            $totalPrice += $detail->subtotal;
        }
        return view('frontend.checkOut', compact('orderDetails', 'orderDetails', 'products'));
    }
}
    // foreach ($pendingOrders as $order) {
    //     foreach ($order->orderDetails as $detail) {
    //         $size = $detail->size;
    //         echo "Size của sản phẩm: $size<br>";
    //     }
    // }

    // foreach ($pendingOrders as $order) {
    //     foreach ($order->orderDetails as $detail) {
    //         $product = $detail->product;
    //         echo "Tên sản phẩm: $product->Name_sneaker, Số lượng: $detail->quantity, Kích thước: $detail->size<br>";
    //     }
    // }
