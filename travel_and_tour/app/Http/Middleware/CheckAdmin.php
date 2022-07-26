<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       if(Auth::check() and auth::user()->type==0){
            return $next($request);
        }

        return redirect()->route('admin');
    }
}
