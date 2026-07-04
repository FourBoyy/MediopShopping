<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if (auth()->check() && in_array(auth()->user()->roleId, [1])) {
        return $next($request);
    }

    // Nếu không, trả về lỗi 403 hoặc đá về trang login/home
    abort(403, 'Bạn không có quyền truy cập.');
    }
}
