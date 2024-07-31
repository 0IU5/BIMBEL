<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna sudah login
        if (Auth::check()) {
            // Cek jika rute adalah login atau register
            if ($request->is('login') || $request->is('register')) {
                // Abort dengan status 401
                abort(401);
            }
        }

        return $next($request);
    }
}
