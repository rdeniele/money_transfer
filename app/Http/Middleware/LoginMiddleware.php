<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth; // Laravel's authentication library

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request)  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) { // Check if user is not logged in
            return redirect('/login'); // Redirect to login page if not logged in
        }

        return $next($request); // Allow request to proceed if logged in
    }
}
