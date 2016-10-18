<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
            'password'=>bcrypt($request->input('password')),
        ]);
        //Auth::login($user);
        $user->save();
        if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
            if(Session::has('oldUrl')){
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect('user/profile');
        }
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
            if(Session::has('oldUrl')){
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect('user/profile');
        }
        return redirect()->back();
    }

    public function getProfile(){
        return view ('user.profile');
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }
}
