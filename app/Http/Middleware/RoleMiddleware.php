<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        $akun = Session::get('akun');

        if ($akun['role']['role'] !== $role) {
            abort(403);
        }

        return $next($request);
    }
}
