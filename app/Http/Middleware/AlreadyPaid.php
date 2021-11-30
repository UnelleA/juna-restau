<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlreadyPaid
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
        if(!session('payment_yes')){
            return redirect()->route('cart.index')->with('fail', 'Veillez proccéder au payement d\'abord');
        }
        return $next($request);
    }
}
