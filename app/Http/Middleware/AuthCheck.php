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
            // Check if the session has expired
            if (Session::has('lastActivityTime')) {
                $maxSessionLifetime = config('session.lifetime');
                $lastActivityTime = Session::get('lastActivityTime');
                $currentTime = now();
                if ($currentTime->diffInMinutes($lastActivityTime) > $maxSessionLifetime) {
                    Session::flash('sessionExpired', 'Your session has expired. Please log in again.');
                    Session::forget('lastActivityTime');
                    return redirect(route('hr-login'));
                }
            }

            // Update the last activity time
            Session::put('lastActivityTime', now());
            // Set user type and emp_id in the session
            $mailId = auth()->guard('hr')->user()->email;
            Session::put('email', $mailId);
            Session::put('user_type', 'hr');

            return redirect('/');
        } else {
            session(['user_type' => 'guest']);
        }

        // Handle other user types and session expiration logic if needed

        return $next($request);
    }
}
