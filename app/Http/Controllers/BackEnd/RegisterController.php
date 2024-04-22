<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Hiển thị form đăng ký.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.login-register');
    }

    /**
     * Xử lý việc đăng ký.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Kiểm tra xem tên người dùng đã tồn tại trong cơ sở dữ liệu hay chưa
        $existingUser = User::where('name', $request->name)->first();
        if ($existingUser) {
            // Nếu tên người dùng đã tồn tại, chuyển hướng lại đến trang đăng ký với thông báo lỗi
            return redirect()->route('register')->with('error', 'Existed account. Please choose another username.');
        }

        // Nếu tên người dùng chưa tồn tại, tạo người dùng mới
        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => 'user', // Set default role to 'user'
        ]);

        return redirect()->route('login')->with('success', 'Your account has been created! Please login.');
    }
}
