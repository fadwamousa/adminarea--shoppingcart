<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminUserController extends Controller
{
    public function index(){
      return view('admin.login');
    }

    public function store(Request $request){
      //valiadte the Log
      $this->validate($request,['email'=>'required|email','password'=>'required']);

      //Attempt Login
      $credinatils = $request->only('email','password');
      if(! Auth::guard('admin')->attempt($credinatils)){

        return back()->withErrors(['message'=>'Wrong Credinatils please try again']);
      }

      //Session
      session()->flash('msg','Goog Welcome back');
      //redirect
      return redirect('/admin');


    }
}
