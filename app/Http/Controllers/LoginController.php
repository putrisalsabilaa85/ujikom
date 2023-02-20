<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function halamanlogin(){
        return view('auth.login');
    }

    public function postlogin(Request $request){
        // dd($request);
        if(Auth::attempt($request->only('username','password'))){
            return redirect('/');
        }
            return redirect('/dashboard');
    }
}
