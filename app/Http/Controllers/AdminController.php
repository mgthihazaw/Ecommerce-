<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;
use App\User;

class AdminController extends Controller
{
    public function login(Request $request){
        // if($request->isMethod('post')){
        //     return "POST REQ";
        // }
        // else{
        //     return "GET REQ";
        // }

        if($request->isMethod('post')){
            $data= $request->input();
            if(Auth::attempt(['email' => $data['email'],'password' => $data['password'],'admin' => '1'])){
                // Session::put('adminSession',$data['email']);
                return redirect('/dashboard')->with('success','Successfully Login');
            }
            else {
                return redirect()->back()->with('error','Invalid Login');
            }
          
        }
        return view('admin.auth.login');

    }
    public function dashboard(){
        // if(Session::has('adminSession')){
        //     return view('admin.dashboard');
        // }else{
        //     return redirect('/admin/login')->with('error','Please login to access');
        // }
        return view('admin.dashboard');
       
    }
    public function setting(){
        return view('admin.setting');
     }

    public function logout(Request $request)
    {
        Session::flush();

        return redirect('/admin/login')->with('success','Successfully Logout');
    }
    public function chkPassword(Request $request){
        $data = $request->all();
        $current_pasword = $data['current_password'];
        $check_password = User::where(['admin' => '1'])->first();
        if(Hash::check($current_pasword,$check_password->password)){
            echo "true";die;
        }else{
            echo "false";
            die;
        }

    }
    public function changePassword(Request $request){
        $data = $request->all();
        $user = User::where(['email' => Auth::user()->email])->first();
        $current_password = $data['currentPassword'];
        if(Hash::check($current_password,$user->password)){
            $password = bcrypt($data['newPassword']);
           $user =$user->update(['password' => $password]);
           
            return redirect()->back()->with('success',"Password Successfully Updated");
        }else{
            return redirect()->back()->with('error',"Invalid Data");
        }
    }
}
