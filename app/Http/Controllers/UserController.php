<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //show register/create form
   public function register(){
    return view('users.register');
}

   //create New User

   public function storeuser(Request $request){

    $formField=$request->validate([
      'name'=>['required','min:3'],
      'email'=>['required','email',Rule::unique('users','email')],
      'password'=>'required|confirmed|min:6'


    ]);

    //Hash Password
    $formField['password']=bcrypt($formField['password']);

    //Create User
    $user=User::create($formField);

    //Login
    auth()->login($user);
    return redirect('/')->with('message','User created and Logged in ');

   }

   // Log User Out

   public function logout(Request $request){
  
    auth()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('message','you have been logged out');

   }

   //Show Login form
   public function login(){
    return view('users.login');
   }


   //authenticate User
   public function authenticate(Request $request){
    $formField=$request->validate([
        
        'email'=>['required','email'],
        'password'=>'required'
      ]);  

      if(auth()->attempt($formField)){
           $request->session()->regenerate();
           return redirect('/')->with('message','You are Now Logged in !');
      }

      return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');

   }

}
