<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
class RegisterController extends Controller
{
    //

    public function index(){
      return view('front.registertion.index');
    }

    public function store(Request $request){

       //validate
       $this->validate($request,[
         'name'=>'required',
         'email'=>'required|email',
         'password'=>'required|confirmed',
         'address'=>'required']);

      //create user
      $user = User::create([
        'name'    => $request->name,
        'email'   => $request->email,
        'password'=> bcrypt($request->password),
        'address' => $request->address
      ]);

      //sign user
      Auth::login($user);

      //redirect user
      session()->flash('msg','Welcome '.$user->name);
      return redirect('/admin');
    }


}
