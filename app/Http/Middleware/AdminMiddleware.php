<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->role_int == '1'){
                if(Auth::user()->is_active == '1'){
                    return $next($request);
                }else{
                    return redirect()->route('login')->with('logfaild', 'User block by admin, contact admin to release!');
                }
                
            }else {
                return redirect()->route('login')->with('logfaild', 'Please login first!');
            }
        }else{
            return redirect()->route('login')->with('logfaild', 'Please login first!');
        }

        
    }
}
