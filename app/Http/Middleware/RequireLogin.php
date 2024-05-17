<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequireLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!auth()->check()) {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect('/admin_login');
        }

        // Nếu đã đăng nhập, cho phép tiếp tục điều hướng đến route yêu cầu xác thực
        return $next($request);
    }
}
