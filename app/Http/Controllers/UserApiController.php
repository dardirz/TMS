<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\Users;
use App\Models\User;
use App\Services\RegistrationService;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function index(){
        $users = User::paginate(10);
        return Users::collection($users);
    }
    public function update(UpdateUserRequest $request, RegistrationService $user,$id){
        $userCreated = $user->update($request,$id);
        return Users::make($userCreated);
    }
    public function delete(RegistrationService $register,$id){
        $register->delete($id);
        return response()->json([
            'message'=>'user deleted successfully'
        ]);
    }
}
