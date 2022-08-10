<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationService {
    public function create($request){
        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            
          ]);
          return $user;
    }
    public function update($request,$id){
        $user = User::findOrFail($id);
        $user->update($request->all());
        return $user;
    }
    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
      }
}