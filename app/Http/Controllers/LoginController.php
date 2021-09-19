<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;

class LoginController extends Controller
{


    public function index()
    {
        return view('layouts.login');
    }

    public function  authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required|email:dns',
            'password'=>'required'
            ]

        );
        //dd("true");
        Auth::attempt($credentials);
        if(Auth::check()){
            dd('auth');
        }
        else{
            dd("false");
        }

        // if (Auth::attempt($credentials)) {
        //     dd("post");
        //     $request->session()->regenerate();

        //     return redirect()->intended('/dashboard');
                
        // }

        return back()->withErrors('loginError','login failed!!!');


    }
}
