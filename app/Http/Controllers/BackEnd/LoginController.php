<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login-register');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);
        $user = User::where('name', $credentials['name'])->first();
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            // If the user does not exist or the password is incorrect
            return redirect()->route('login')->withErrors([
                'name' => 'User name/ password maybe incorrect, please check again.',
            ]);
        }
        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Get the authenticated user
            $user = Auth::user();

            // Check if the user is not activated
            if ($user->status === '0') {
                Auth::logout(); // Log out the user
                return redirect()->route('login')->withErrors([
                    'name' => 'Tài khoản của bạn chưa được kích hoạt.',
                ]);
            }

            // Redirect the user based on their role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'seller') {
                return redirect()->route('seller.dashboard');
            } else {
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

        return redirect('/login-register');
    }
}
