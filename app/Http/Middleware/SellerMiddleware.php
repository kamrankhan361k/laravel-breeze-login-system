<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SellerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('seller')->check()) {
            return redirect('/seller/login');
        }

        return $next($request);
    }
}
