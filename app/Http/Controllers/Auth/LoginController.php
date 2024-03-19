<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.loginadmin');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the form data
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Kiểm tra vai trò của người dùng sau khi đăng nhập thành công
            if (Auth::user()->role === 'admin') {
                // Nếu là admin, chuyển hướng đến trang dashboard của admin
                return redirect()->route('admin.dashboard');
            } else {
                // Nếu là user, chuyển hướng đến trang chính
                return redirect()->intended('/');
            }
        }

        // Authentication failed, redirect back with error message
        return redirect()->route('login')->withErrors([ 
            'name' => 'Tên người dùng hoặc mật khẩu không đúng.',
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
