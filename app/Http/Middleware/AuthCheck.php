<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->guard('hr')->check()) {
            session(['user_type' => 'hr']);
            return redirect('/');
        } else if (auth()->guard('employee')->check()) {
            session(['user_type' => 'employee']);
            return redirect('/');
        } else if (auth()->guard('vendor')->check()) {
            session(['user_type' => 'vendor']);
            return redirect('/');
        } else if (auth()->guard('customer')->check()) {
            session(['user_type' => 'customer']);
            return redirect('/');
        } else if (auth()->guard('contractor')->check()) {
            session(['user_type' => 'contractor']);
            return redirect('/');
        } else {
            session(['user_type' => 'guest']);
            return $next($request);
        }

        //
    }
}
