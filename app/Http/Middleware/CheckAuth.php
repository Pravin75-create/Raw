<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuth
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
        if(Auth::check()&&Auth::user()->isban)
        {
        $checks=Auth::user()->isban==1;
        Auth::logout();
        if($checks)
        {
            $request->session()->flash('message','You account has been Blocked,Please Kindly Contact to the administrator');
            return redirect(route('login'));
        }
        return redirect()->route('home');
    }
        return $next($request);
    }
}
