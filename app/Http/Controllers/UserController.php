<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
class UserController extends Controller
{
    public function getSignup(){
        return view('user.signup');
    }

    public function postSignup(Request $request){
        $this->validate($request,[
            'email'=> 'email|required|unique:users',
            'password'=>'required|min:4'
        ]);
        $user = new User([
            'email'=> $request->input('email'),
            'password'=>bcrypt($request->input('password'))
        ]);
        $user->save();
        return redirect('user/profile');
    }

    public function getLogin(){
        return view('user.login');
    }

    public function postLogin(Request $request){
        $this->validate($request,[
            'email'=> 'email|required',
            'password' =>'required|min:4'
        ]);
        if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
            return redirect('user/profile');
        }
        return redirect()->back();
    }

    public function getProfile(){
        return view ('user.profile');
    }
}
