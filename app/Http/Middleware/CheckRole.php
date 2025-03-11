<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!$request->user()) {
            return redirect('/dang-nhap');
        }

        // Kiểm tra vai trò của người dùng
        if (!in_array($request->user()->role_id, $roles)) {
            // return abort(403, 'Bạn không có quyền truy cập trang này.');
            return back();
        }

        return $next($request); // Cho phép request tiếp tục nếu có quyền truy cập
    }
}
