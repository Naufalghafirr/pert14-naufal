<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Middleware\TrustProxies as Middleware; // Laravel 9+

class TrustProxies extends Middleware
{
    // Terima semua proxy (Railway)
    protected $proxies = '*';

     // Gunakan hanya HEADER_X_FORWARDED_PROTO
    protected $headers = Request::HEADER_X_FORWARDED_PROTO;
}
