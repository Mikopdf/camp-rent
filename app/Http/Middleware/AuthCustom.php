<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AuthCustom
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('akun')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
