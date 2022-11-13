<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $data = auth()->user();
        $users = User::where('id', auth()->user()->id)->get();
        return view('myprofile.index', [
            'title' => 'My profile',
            'active' => 'myprofile',
        ], compact('users','data'));
    }

    public function edit()
    {
        $users = User::where('id', auth()->user()->id)->get();
        return view('myprofile.edit', [
            'title' => 'My profile',
            'active' => 'myprofile',
        ], compact('users'));
    }

    public function update(Request $request,$id)
    {
        // $datas = $request->all();
        // dd($datas);
        $user = User::FindOrFail($id);
        $validator = Validator::make($request->all(), [
            'namalengkap' => 'required|max:255',
            'email' => 'required|email:dns',
            'password' => 'required|max:255',
            'notelp' => 'required|max:20',
            'alamat' => 'required|max:20',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        $user->namalengkap = $request->namalengkap;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->notelp = $request->notelp;
        $user->alamat = $request->alamat;
        $user->save();
        // User::where('id', $user)
        // ->update($validatedData);

        return redirect('/myprofile')->with('success', 'Data telah di update!');
    }
}
