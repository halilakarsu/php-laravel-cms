<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kullanıcı oturum açmamışsa
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'Lütfen önce giriş yapınız.');
        }

        // Kullanıcı oturum açmış ve admin ise isteği devam ettir
        if (Auth::user()->role == 'admin') {
            return $next($request);
        }

        // Kullanıcı oturum açmış ama admin değilse yetkisiz erişim mesajı ver
        return redirect()->route('admin.login')->with('error', 'Bu Sayfayı görmeye Yetkiniz Yoktur.');
    }
}
