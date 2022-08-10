<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class LoginService {
    public function login($request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                        ->withSuccess('Signed in');
        }
    }
}