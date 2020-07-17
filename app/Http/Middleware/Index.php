<?php

namespace App\Http\Middleware;

use Closure;

class Index
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
        $indexlogin= session('indexlogin');
        if(!$indexlogin){
            return redirect('login');
        }

        view()->share('info',$indexlogin);
        return $next($request);
    }
}
