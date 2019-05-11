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

       //Validator
       $this->validate($request,['email'=>'required','password'=>'required']);

       $credintails = $request->only(['email','password']);

       //check
       if(! Auth::guard('admin')->attempt($credintails) ){
         session()->flash('msg','Some Error Here Please try again');
         return redirect()->back();
       }else{
         session()->flash('msg','Welcome back');
         return redirect('/admin');
       }
    }


    public function logout(){
      auth()->guard('admin')->logout();
      session()->flash('msg','You have Logged Out');

      return redirect('admin/login');
    }

}
