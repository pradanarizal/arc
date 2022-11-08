<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\LoginModel;

class LoginController extends Controller
{
    public function view_login()
    {
        return view('login.login');
    }
    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard');
        }
        return redirect('/');
    }
    public function refreshCapcha()
    {
        return captcha_img();
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function dashboard()
    {
        return view('layout.template');
    }
}
