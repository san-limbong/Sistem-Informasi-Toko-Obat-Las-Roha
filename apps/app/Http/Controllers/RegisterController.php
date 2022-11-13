<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:255'
        ]);
        $validatedData['namalengkap'] = $request['name'];
        $validatedData['email'] = strtolower($request->email);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect('/register')->with('success', 'Akun berhasil dibuat!');
    }

    public function index()
    {
        return view('auth.register', []);
    }
}
