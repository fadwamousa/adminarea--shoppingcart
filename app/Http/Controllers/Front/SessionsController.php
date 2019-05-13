<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    //

    public function __construct(){
       $this->middleware('guest')->except('logout');
    }


    public function index(){
      return view('front.sessions.index');
    }

    public function store(Request $request){

      $rules = ['email'=>'required|email','password'=>'required'];

      $this->validate($request,$rules);

      $data = $request->only(['email','password']);
      if(! auth()->attempt($data) ){

          return back()->withErrors(['msg'=>'The data is invalid']);

      }

      return redirect('/user/profile');

    }


    public function logout(){

      auth()->logout();
      session()->flash('msg','you have logged out');
      return redirect('user/login');

    }

}
