<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserSessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has('user_id')) {
            // User is logged in, proceed to the next phase
            return $next($request);
        } else {
            // User is not logged in, redirect to login page
            return redirect()->route('login.index'); // Adjust route name accordingly
        }
    }
}
