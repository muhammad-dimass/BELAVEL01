<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Implementasi logika autentikasi khusus di sini
        // Contoh: Periksa apakah pengguna telah login atau memiliki token sesuai kebutuhan

        // if (! auth()->check()) {
        //     return redirect()->route('login'); 
        // }
        // Misalnya, redirect ke halaman login jika pengguna tidak terotentikasi

        return $next($request);
    }
}

