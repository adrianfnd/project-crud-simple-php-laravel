<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/buku');
        }

        return back()->withErrors(['email' => 'Email atau password anda salah.']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}