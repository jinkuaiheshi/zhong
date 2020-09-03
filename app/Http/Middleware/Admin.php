<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        $islogin = session('islogin');
        if(!$islogin){
            return redirect('admin/sys/login');
        }

//        if(strpos(url()->full(),'sys')){
//            if($islogin->auth != 1){
//                return redirect(url()->previous())->with('message', '权限不足')->with('type','danger')->withInput();
//            }
//        };
        view()->share('info',$islogin);
        return $next($request);
    }
}
