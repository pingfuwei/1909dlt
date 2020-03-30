<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        $cookie=$request->cookie("admin_user");
        if(!$cookie){
            return redirect("login/login");
        }
//        dd($cookie);
        return $next($request);

    }
}
