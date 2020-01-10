<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
class LoginController extends Controller
{
    public function login(){
        return view('admin.login');
    }
    public function post_login(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'email.required'=>'Email không được để trống',
            'email.email'=>'Email không đúng định dạng',
            'password.required'=>'Mật khẩu không được để trống'
        ]);
        if(Auth::attempt($request->only('email', 'password'),$request->has('remember'))){
            return redirect()->route('list_posts');
        }
        else{
            return redirect()->back()->withInput();
        }
            
    }
    public function register(){
        return view('auth.register');
    }
    public function logout(){
        return "logount";
    }
}
