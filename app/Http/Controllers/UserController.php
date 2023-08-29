<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Usercontroller extends Controller
{
    public function register(){
        return view('register');
    }
    public function registered(request $request){
        $request->validate([
            'name' => 'required|string|min:3|max:40',
            'email' => 'required|email:dns|regex:/(.*)@gmail\.com/',
            'tlp' => 'required|regex:/^08/|max:12',
            'password'=>'required|min:6|max:12',
            'confirm_password'=>'required|min:6|max:12'
        ]);

        if($request->password != $request->confirm_password){
            return back()->withErrors('The Password doesn\'t match');
        }

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'tlp'=>$request->tlp,
            'password'=>Hash::make($request->password),
            'confirm_password'=>$request->confirm_password,
        ]);
        return redirect('login')->with('success', 'User registered!');
    }

    public function login(){
        return view('login');
    }

    public function logined(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect('login')->withSuccess('Logged out successfully!');
    }
}
