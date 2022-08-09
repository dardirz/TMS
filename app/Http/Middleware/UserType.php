<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserType
{

    public function handle(Request $request, Closure $next)
    {


       $user = Auth::user();

       if($user->type =='user'){
          // return response('you are not allowed');
           return redirect(route('login'));
        }
        return $next($request);
    }




}
