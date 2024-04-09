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

        // Tạo khách hàng mới nếu không tìm thấy thông tin trong cơ sở dữ liệu
        $customer = Customer::firstOrCreate([
            'phone' => $dataFromClient['phone'],
            'Name_customer' => $dataFromClient['name'],
            'address' => $dataFromClient['address'],
            'gmail' => $dataFromClient['email'],
            'status' => true,
        ]);

        // Tạo đơn hàng mới
        $order = new Order();
        $order->customer_id = $customer->id;
        $order->order_date = now();
        $order->total_amount = 0;
        $order->status_order = 'pending'; // Đặt trạng thái của đơn hàng là chờ xử lý
        $order->save(); // Lưu đơn hàng vào cơ sở dữ liệu

        // Duyệt qua các sản phẩm trong đơn hàng từ dữ liệu được gửi từ client
        foreach ($dataFromClient['products'] as $productData) {
            $product = Product::find($productData['product_id']);

            if (!$product) {
                // Nếu sản phẩm không tồn tại, hủy đơn hàng và trả về thông báo lỗi
                $order->delete();
                return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
            }

            // Tạo chi tiết đơn hàng cho mỗi sản phẩm
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id; // Gán order_id từ đơn hàng mới được tạo
            $orderDetail->product_id = $product->id;
            $orderDetail->quantity = $productData['quantity'];
            $orderDetail->size = $productData['size'];
            $orderDetail->subtotal = $product->Price * $productData['quantity']; // Tính tổng tiền cho mỗi sản phẩm
            $orderDetail->save();

            // Cập nhật tổng số tiền của đơn hàng
            $order->total_amount += $orderDetail->subtotal;
        }

        // Lưu lại tổng số tiền của đơn hàng
        $order->save();

        // Điều hướng người dùng đến trang cảm ơn hoặc trang khác tuỳ theo yêu cầu của bạn
        return redirect('/thank-you')->with('success', 'Đã tạo đơn hàng thành công');
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
                // Thêm các trường dữ liệu khác cần thiết
            ]);
        }

        return response()->json(['message' => 'Order submitted successfully'], 200);
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
