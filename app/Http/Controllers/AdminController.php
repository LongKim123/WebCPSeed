<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAdmin(){
    	// dd(bcrypt('longkim123'));
    	if(Auth()->check()){
    		 return redirect()->to('home');
    	}
    	return view('login');
    }
    public function postloginAdmin(Request $request){


    	$remember=$request->has('remember_me')?true:false;
    	 if (Auth::attempt([
    	 	'email'=>$request->email,
    	 	'password'=>$request->password],$remember)) {
            // Authentication passed...
            return redirect()->to('home');
        }
    }
}
