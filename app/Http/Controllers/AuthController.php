<?php
namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Services\LoginService;
use App\Services\RegistrationService;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(LoginRequest $request,LoginService $login)
    {
        $login->login($request);
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {

        return view('auth.registration');

    }

    public function customRegistration(RegistrationRequest $request,RegistrationService $register)
    {
        $register->create($request);
        return redirect("/")->withSuccess('You have signed-in');
    }
    public function dashboard()
    {
            return view('dashboard');
    }

    public function home(){
        return view('home');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }





}
