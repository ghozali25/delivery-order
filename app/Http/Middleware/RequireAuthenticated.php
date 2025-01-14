<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Masmerise\Toaster\Toaster;
use Symfony\Component\HttpFoundation\Response;

class RequireAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            Toaster::error('Otentikasi diperlukan.');
            return redirect()->route('authentication.login');
        } else {
            return $next($request);
        }
    }
}
