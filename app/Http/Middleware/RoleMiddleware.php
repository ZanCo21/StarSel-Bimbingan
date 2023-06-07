<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            // Jika pengguna tidak terautentikasi, redirect ke halaman login
            return redirect('/login');
        }

        $user = Auth::user();
        $allowedRoles = ['admin', 'guru', 'murid', 'walas'];

  
        // Periksa apakah peran pengguna ada dalam daftar peran yang diizinkan
        foreach ($allowedRoles as $allowedRole) {
            if ($user->role === $allowedRole) {
                return $next($request);
            }
        }

        // Jika pengguna tidak memiliki peran yang diizinkan, kembalikan pesan kesalahan atau redirect ke halaman tertentu
        abort(403, 'Unauthorized');
    }
}
