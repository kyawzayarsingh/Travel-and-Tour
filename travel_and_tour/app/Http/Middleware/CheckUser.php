<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckUser
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
       if(Auth::check() and auth::user()->type==1){
           return $next($request);
        }
        if(Auth::check() and auth::user()->type==0){
            return redirect()->route('userHome.index');
        }
        if(!Auth::check()) {
             return $next($request);
         }
        return redirect()->route('signIn.index');
        }
    
}
