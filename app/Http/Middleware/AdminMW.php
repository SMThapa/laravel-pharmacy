<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMW
{
    public function handle(Request $request, Closure $next){
        if(Auth::check()){
            if(Auth::user()->role == 1){
                return $next($request);
            }else{
                Auth::logout();
                return redirect(url('/'));
            } 
        }else{
            Auth::logout();
            return redirect(url('/'));
        }
    }
}

?>
