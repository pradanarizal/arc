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
    // aji
    public function postlogin(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
                'captcha' => 'required|captcha',
            ],
            [
                'email.required' => 'Email wajib diisi',
                'password.required' => 'Password wajib diisi',
                'captcha.required' => 'Captcha wajib diisi',
            ]
        );
        // captcha_check($value);

        if (captcha_check($request->captcha) == true) {
            if (Auth::attempt($request->only('email', 'password'))) {
                return redirect('/dashboard');
            }
            return redirect('/login')->with('toast_error', 'Password yang Anda masukkan salah');
        } else {
            return redirect('/login')->with('toast_error', 'Captcha yang Anda masukkan salah');
        }
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
