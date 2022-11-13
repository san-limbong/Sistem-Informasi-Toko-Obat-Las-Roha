<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    // public function authenticate(Request $request)
    // {
    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

    //         $user = User::where('email', $request->email)->first(); {
    //             return redirect('/dashboard');
    //         }
    //     } else {
    //         return redirect('/login')->with('success', 'Email atau Password anda salah');
    //     }
    // }
    // public function logout()
    // {
    //     session()->flush();
    //     return redirect('/login');
    // }

    public function index()
    {
        return view('auth.login', []);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'

        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->role == 1) {
                return redirect()->intended('/dashboard');
            } elseif (auth()->user()->role == 2) {
                return redirect()->intended('/datapesanan');
            } elseif (auth()->user()->role == 3) {
                return redirect()->intended('/layanan');
            }
        }

        //return back()-> with('loginError', 'Login Failed');
        return redirect('/login')->with('success', 'Email atau Password anda salah! Silahkan coba lagi! ');
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
