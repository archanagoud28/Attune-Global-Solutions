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

        //    This is also working fine.........
        // if($request->user()){
        //         session(['user_type' => 'admin']);
        //         return redirect(route('home'));

        //    }
        // if (auth()->user() && auth()->check()) {
        //     // Set the navigation bar for admin users
        //     view()->share('navbar', 'navbar-admin');
        // } elseif (auth()->guard('staff')->check()) {
        //     // Set the navigation bar for staff users
        //     view()->share('navbar', 'navbar-staff');
        // } elseif (auth()->guard('student')->check()) {
        //     // Set the navigation bar for student users
        //     view()->share('navbar', 'navbar-student');
        // } else {
        //     // Set a default navigation bar for guests
        //     view()->share('navbar', 'navbar-guest');
        // }

        // return $next($request);
        if (auth()->guard('hr')->check()) {
            return redirect('/');
        } else {
            session(['user_type' => 'guest']);

            // return redirect('/emplogin');
            //  return redirect(route('emplogin'));
            return $next($request);
        }

        //
    }
}
