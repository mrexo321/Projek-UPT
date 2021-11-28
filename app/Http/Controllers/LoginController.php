<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login.index');
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            if(auth()->user()->tipe == 2){
                return redirect()->intended('/dashboard');
            }
            return redirect()->intended('/');
        }
        
        
    }

    public function logout(Request $request)
    {   
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
