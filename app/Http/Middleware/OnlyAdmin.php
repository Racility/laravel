<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlyAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // di sini kita kasih tau apa yang harus dilakukan kalo akun yang lagi login bukan admin
        if(Auth::user()->role_id != 1)
        {
            return redirect('/');
        }

        // apa yang middleware lakukan kalau akun yang login adalah admin?
        return $next($request);
    }
}
