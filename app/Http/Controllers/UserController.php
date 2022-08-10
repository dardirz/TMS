<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\RegistrationService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('admin.user.users',['user'=>$user]);
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.user.edit',['user'=>$user]);
    }

    public function update(UpdateUserRequest $request,RegistrationService $register,$id){
            $register->update($request,$id); 
            return redirect(route('user-show'))->with('sucess','updated');
    }

    public function destroy( RegistrationService $register,$id)
    {
        $register->delete($id);
        return redirect(route('user-show'))->with('sucess', 'User is Deleted Successful!');
    }
}
