<?php

namespace App\Http\Controllers;

use App\Country;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

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
                  if (Auth::attempt(['eamil' => request()->email,'password' => request()->password])) {
                    Session::put('frontSession',$data['email']);
                    return redirect()->intended('/')->with('success','You are successfully login');
                }

                  return redirect()->back()->with('error','Incorrect data');
           
        }
        return view('user.login_register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' =>'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            Session::put('frontSession',$request->email);
            return redirect()->intended('/')->with('success','You are successfully login');
        }
        else{
            return redirect()->back()->with('error','Invalid email and password');
        }
    }

    public function account(Request $request){

        if($request->isMethod('post')){
          $user = User::find($request->id);
          $user->name =$request->name;
          $user->address = $request->address;
          $user->city = $request->state;
          $user->state =$request->state;
          $user->country = $request->country;
          $user->pincode = $request->pincode;
          $user->mobile = $request->mobile;
          $user->save();
          
          return redirect('/')->with('success','Account is successfully updated');
        }

        $countries = Country::all();

        return view('user.account')
               ->withCountries($countries);
    }
    public function checkpassword(Request $request){
        $data = $request->all();
        $current_pasword = $data['current_password'];
        $check_password = auth()->user();
        if(Hash::check($current_pasword,$check_password->password)){
            echo "true";die;
        }else{
            echo "false";
            die;
        }
    }

    public function updatepassword(Request $request){
        $request->validate([
            'password' => 'required',
            'newpassword' => 'required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required'
        ]);
        $data = $request->all();
        $user = auth()->user();
        $current_password = $data['password'];
        if(Hash::check($current_password,$user->password)){
            $password = bcrypt($data['newpassword']);
           $user =$user->update(['password' => $password]);
           
            return redirect()->back()->with('success',"Password Successfully Updated");
        }else{
            return redirect()->back()->with('error',"Invalid Data");
        }
    }
   

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
