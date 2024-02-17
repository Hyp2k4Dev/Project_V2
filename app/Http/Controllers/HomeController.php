<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (auth()->check()) {
            // Nếu đăng nhập rồi, chuyển hướng đến trang dashboard hoặc bất kỳ trang nào khác bạn muốn
            return redirect()->route('admin.dashboard');
        } else {
            // Nếu chưa đăng nhập, chuyển hướng đến trang chủ
            return view('main');
        }
    }
}
