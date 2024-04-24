<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Size;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function update($orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($order->status_order !== 'success') {
            $order->status_order = 'success';
            $order->status_updated_at = Carbon::now();
            $order->save();
            return redirect()->route('user.orderList')->with('success', 'Update successfully');
        }
        return redirect()->route('user.orderList')->with('success', 'Update Error');
    }
    public function deleteOrder($orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($order->status_order !== 'Cancel') {
            $order->status_order = 'Cancel';
            $order->save();

            // Update product quantity in size table
            $orderDetails = $order->orderDetails;
            foreach ($orderDetails as $detail) {
                $productId = $detail->product_id;
                $size = $detail->size;
                $quantity = $detail->quantity;

                // Check if ProductSize model exists (assuming existence)
                $productSize = Size::where('product_id', $productId)
                    ->where('size_name', $size)
                    ->first();

                if ($productSize) {
                    $productSize->quantity += $quantity;
                    $productSize->save();
                }
            }

            return redirect()->route('user.orderList')->with('success', 'Order canceled successfully');
        } else {
            return redirect()->route('user.orderList')->with('error', 'Order is already canceled');
        }
    }
    public function index()
    {
        return view('frontend.Order');
    }
    public function createOrder(Request $request)
    {
        $requestData = $request->all();
        $customer = Customer::where('phone', $requestData['phone'])->first();

        if (!$customer) {
            $customer = Customer::create([
                'Name_customer' => $requestData['name'],
                'phone' => $requestData['phone'],
                'address' => $requestData['address'],
                'gmail' => $requestData['email'],
                'status' => true,
            ]);
        } else {
            $customer->update(['address' => $requestData['address']]);
        }

        $order = new Order([
            'customer_id' => $customer->id,
            'order_date' => now(),
            'total_amount' => 0,
        ]);
        $order->save();

        $productData = json_decode($requestData['productData'], true);
        $totalAmount = 0;
        foreach ($productData as $item) {
            $product = Product::find($item['id']);
            $size = Size::where('product_id', $product->id)
                ->where('size_name', $item['size'])
                ->first();

            if ($size) {
                $size->update(['quantity' => $size->quantity - $item['quantity']]);
            }

            $totalAmount += $product->Price * $item['quantity'];

            $orderDetail = new OrderDetail([
                'order_id' => $order->order_id,
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'size' => $item['size'],
                'subtotal' => $product->Price * $item['quantity'],
            ]);
            $orderDetail->save();
        }

        $order->update(['total_amount' => $totalAmount]);

        return redirect('/invoice')->with('success', 'Đã tạo đơn hàng thành công');
    }



    public function saveOrderDetails(Request $request)
    {
        // Lấy dữ liệu được gửi từ trình duyệt
        $dataFromClient = $request->all();

        // Lưu dữ liệu vào cơ sở dữ liệu
        foreach ($dataFromClient['orderDetails'] as $orderDetail) {
            OrderDetail::create([
                'product_id' => $orderDetail['product_id'],
                'quantity' => $orderDetail['quantity'],
                'size' => $orderDetail['size'],
                'subtotal' => $orderDetail['subtotal'],
            ]);
        }

        // Trả về phản hồi cho trình duyệt
        return response()->json(['message' => 'Order details saved successfully'], 200);
    }


    public function show()
    {
        $user = Auth::user();
        $pendingOrders = Order::where('status_order', 'pending')
            ->with('customer', 'orderDetails.product')
            ->get();
        return view('user.orderList', compact('pendingOrders', 'user'));
    }
    public function showOrdAdmin()
    {
        $pendingOrders = Order::where('status_order', 'pending')
            ->with('customer', 'orderDetails.product')
            ->get();
        return view('admin.ordList', compact('pendingOrders'));
    }

    public function showInvoice()
    {
        // Lấy đơn hàng cuối cùng
        $latestOrder = Order::latest()->first();

        // Kiểm tra xem có đơn hàng nào không
        if ($latestOrder) {
            // Lấy order_id của đơn hàng cuối cùng
            $order_id = $latestOrder->order_id;

            // Lấy thông tin của khách hàng từ đơn hàng cuối cùng
            $customer_name = $latestOrder->customer->Name_customer;
            $customer_email = $latestOrder->customer->gmail;
            $customer_address = $latestOrder->customer->address;
            $customer_phone = $latestOrder->customer->phone;

            // Trả về view và truyền order_id và thông tin của khách hàng
            return view('frontend.invoice', [
                'order_id' => $order_id,

                'customer_name' => $customer_name,
                'customer_email' => $customer_email,
                'customer_address' => $customer_address,
                'customer_phone' => $customer_phone
            ]);
        } else {
            // Nếu không có đơn hàng, bạn có thể truyền một thông báo
            $message = "Không có đơn hàng nào.";
            return view('frontend.invoice', ['message' => $message]);
        }
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
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'Name_customer' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'products' => 'required|array',
            'products.*.product_id' => 'required|integer',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.size' => 'required|string',
        ]);

        // Create a new order record
        $order = new Order();
        $order->Name_customer = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->save();

        // Save order details
        foreach ($request->input('products') as $productData) {
            $order->orderDetails()->create([
                'product_id' => $productData['product_id'],
                'quantity' => $productData['quantity'],
                'size' => $productData['size'],
                // You may need to adjust the field names according to your database schema
            ]);
        }

        // Return a success response
        return redirect('/')->with('success', 'Đã tạo đơn hàng thành công');
    }
    public function storeProduct(Request $request)
    {
        // Lấy thông tin đơn hàng từ request
        $orderDetails = $request->input('orderDetails');

        // Lưu thông tin đơn hàng vào cơ sở dữ liệu
        foreach ($orderDetails as $detail) {
            Order::create([
                'name' => $detail['name'],
                'quantity' => $detail['quantity'],
                'size' => $detail['size'],
                'price' => $detail['price'],
            ]);
        }

        return response()->json(['message' => 'Order submitted successfully'], 200);
    }


    public function checkOut()
    {
        $orderDetails = OrderDetail::all();
        return view('frontend.checkOut', compact('orderDetails'));
    }
    public function orderSubmit(Request $request)
    {
        echo 'ádasd';
        die();
        $fullName = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');

        $customer = new Customer();
        $customer->Name_customer = $fullName;
        $customer->gmail = $email;
        $customer->phone = $phone;
        $customer->address = $address;
        $customer->status = true;
        $customer->save();

        $orderDetails = json_decode($request->input('orderDetails'));


        return response()->json(['message' => 'Order placed successfully']);
    }
}
