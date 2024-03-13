<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
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
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $product->id;
            $orderDetail->quantity = $productData['quantity'];
            $orderDetail->size = $productData['size'];
            $orderDetail->subtotal = $product->Price * $productData['quantity'];
            // var_dump($product->Price * $productData['quantity']);
            // return;
            $orderDetail->save();

            $order->total_amount += $orderDetail->subtotal;
        }

        $order->save();

        return redirect('/')->with('success', 'Đã tạo đơn hàng thành công');
    }
}
