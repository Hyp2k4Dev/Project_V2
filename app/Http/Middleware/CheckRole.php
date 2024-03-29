<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            $unauthorizedScript = "
                <script>
                    alert('Bạn không có quyền truy cập vào trang này vui lòng đăng nhâp với tài khoản admin hoặc seller!.');
                    window.location.href = '/login-register';
                </script>
            ";
            return response($unauthorizedScript);
        }

        return $next($request);
    }
}
