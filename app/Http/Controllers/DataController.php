<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getData()
    {
        // $priceData = Price::all();
        // $brandData = Brand::all();
        $sizeData = Size::all();

        return response()->json([
            // 'price' => $priceData,
            // 'brand' => $brandData,
            'sizeData' => $sizeData,
            'status' => 200
        ]);
    }

    public function getProductsBySize(Request $request)
    {
        $sizeName = $request->input('sizeId');

        // Truy vấn cơ sở dữ liệu để lấy danh sách sản phẩm dựa trên kích thước đã chọn
        $products = Product::where('sizes', function ($query) use ($sizeName) {
            $query->where('size_name', $sizeName);
        })->get();

        // Trả về dữ liệu sản phẩm dưới dạng JSON
        return response()->json([
            'products' => $products
        ]);
    }
    public function product()
    {
        $products = Product::all(); // Truy vấn dữ liệu sản phẩm
        $sizes = Size::all(); // Truy vấn dữ liệu kích thước
        return view('frontend.product', compact('products', 'sizes'));
    }




    public function getProductBySize(Request $request)
    {
        $resultArray = [];
        $tempArray = [];
        $data = $request->input('sizeSelect');
        if (!$data) {
            $resultArray = Size::all();
            return response()->json(['resultArray' => $resultArray, 'success' => true]);

        } else {

            foreach ($data as $size) {
                // Lấy tất cả các phần tử từ bảng có size_name tương ứng với giá trị trong sizeSelect
                $items = Size::where('size_name', $size)->get(); // Thay đổi YourModel thành tên model thực tế của bạn
    
                // Thêm các phần tử thu được vào mảng kết quả
                foreach ($items as $item) {
                    $productId = $item->product_id;
    
                    // Nếu product_id đã xuất hiện trong mảng tạm thời, bỏ qua
                    if (in_array($productId, $tempArray)) {
                        continue;
                    }
    
                    // Thêm phần tử vào mảng kết quả và product_id vào mảng tạm thời
                    $resultArray[] = $item->toArray();
                    $tempArray[] = $productId;
                }
            }
            return response()->json(['resultArray' => $resultArray, 'success' => true]);
        }


        // Duyệt qua mỗi phần tử trong mảng sizeSelect

    }
}
