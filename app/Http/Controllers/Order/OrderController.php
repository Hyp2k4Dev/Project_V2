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

            $product = Product::find($productData['product_id']);

            if (!$product) {
                $order->delete();
                return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
            }

            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->order_id;
            $orderDetail->product_id = $product->id;
            $orderDetail->quantity = $productData['quantity'];
            $orderDetail->size = $productData['size'];
            $orderDetail->subtotal = $product->Price * $productData['quantity'];
            $orderDetail->save();

            $order->total_amount += $orderDetail->subtotal;
        }

        $order->save();

        return redirect('/')->with('success', 'Đã tạo đơn hàng thành công');
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

    public function addToCart() // Thêm tham số $id vào hàm
    {
        $orderDetails = OrderDetail::all(); // Example
        $totalPrice = 0;

        $product = Product::all();

        $otherController = new ProductController();
        $products = $otherController->getProducts();

        foreach ($orderDetails as $detail) {
            $totalPrice += $detail->subtotal;
        }

        // Return the view with the data
        return view('frontend.addToCart', compact('orderDetails', 'totalPrice', 'products', 'product'));
    }

    public function getProductById($id)
    {
        $product = Product::findOrFail($id);

        // Trả về view hiển thị thông tin của sản phẩm
        return view('frontend.addToCart', compact('product'));
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
