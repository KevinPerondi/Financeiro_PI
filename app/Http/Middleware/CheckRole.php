<?php

namespace PI\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!Auth::check()){
            return redirect('/login');

        }

        if(Auth::user()->role <>  $role){
            return redirect('/user/usuario');
        }

        else if(Auth::user()->role <> $role ){
            return redirect('/admin/home');
        }
        return $next($request);
    }

}
