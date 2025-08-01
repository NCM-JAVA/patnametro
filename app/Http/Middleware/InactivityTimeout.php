<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class InactivityTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $timeout = 30;
        // \Log::info('Middleware Running: ' . now());
        // dd("Hello");
        if (Auth::check()) {
            $lastActivity = session('last_activity') ? Carbon::parse(session('last_activity')) : null;
            $currentTime = Carbon::now();
        
            // If the last activity was more than $timeout minutes ago, log out the user
            if ($lastActivity && $lastActivity->diffInMinutes($currentTime) > $timeout) {
                $user = Auth::user();
                $user->update(['flag_id' => 0]);
                Auth::logout();
                Session::flush(); // This will clear the session data
                return redirect('/login')->with('sessionTimeout', 'Session expired due to inactivity.');
            }
        
            // Update last activity time with each request (even on refresh)
            session(['last_activity' => $currentTime]);
        }

        return $next($request);
    }
}
