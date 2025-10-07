<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [
        // ... existing middleware
        'seller' => \App\Http\Middleware\SellerMiddleware::class,
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'audit' => \App\Http\Middleware\AuditMiddleware::class,
        'staff' => \App\Http\Middleware\StaffMiddleware::class,
    ];
}
