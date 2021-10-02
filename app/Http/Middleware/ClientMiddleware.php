<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;

class ClientMiddleware
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
        if (!Auth::check()) {
            return redirect()->route('login');
            }
            if (Auth::user()->role == 1) {
            return redirect()->route('admin');
            }
            if (Auth::user()->role == 4) {
            return redirect()->route('livreur');
            }
            if (Auth::user()->role == 3) {
                return $next($request);
            }
            if (Auth::user()->role == 2) {
                return redirect()->route('restaurateur');
             }
            }

    }

