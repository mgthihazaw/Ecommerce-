<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(){
        
        if(request()->isMethod('post')){
            request()->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                ]);
             $data = request()->all();
                User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password'])
                  ]);

                  return redirect('/')->with('success','You are successfully logined');
           
        }
        return view('user.login_register');
    }
}
