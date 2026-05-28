<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // showSignupForm (Get), signup (Post), showloginForm (Get), login (Post), logout (Post) 


    public function showSignupForm()
    {
        return view('auth/signup',['pageTitle' => 'Signup']);
    }

    public function signup(SignupRequest $r)
    {
       
        $user= new User();
        $user->name = $r->input('name');
        $user->email = $r->input('email');
        $user->password = Hash::make($r->input('password'));

        $user->save();
        Auth::login($user);

        return redirect('/');

    }

    public function showLoginForm()
    {
        return view('auth/login',['pageTitle' => 'Login']);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'email' =>'The provided credentials do not match our records',
        ])->withInput();
    }
  
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
