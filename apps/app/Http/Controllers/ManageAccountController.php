<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ManageAccountController extends Controller
{

    public function index()
    {
        $user = User::all();
        return view('pengelolatoko.manage_account.index',[
            'active' =>'manageaccount',
            'title' =>'Mengelola Akun',
        ],compact('user'));
    }


    public function create()
    {
        return view('pengelolatoko.manage_account.create',[
            'active' =>'manageaccount',
            'title' =>'Tambah Akun Karyawan',
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namalengkap' => 'required',
            'email' => 'required',
            'notelp' => 'required',
            'password' => 'required',
            'role' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        $file = $request->file('foto');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'images/karyawans';
        $file->move($tujuanFile, $namaFile);

        $user = new User;
        $user->namalengkap = $request->namalengkap;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->notelp = $request->notelp;
        $user->password = bcrypt($request->password);
        $user->foto = $namaFile;
        $user->save();

        return redirect('/profile/list')->with('success', 'Akun Karyawan Berhasil Ditambahkan!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('pengelolatoko.manage_account.ubah',[
            'active' => 'manageaccount',
            'title' =>'Ubah Akun Karyawan',
        ],compact('user'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'namalengkap' => 'required',
            'email' => 'required',
            'notelp' => 'required',
            'password' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        $user = User::findorfail($id);
        $user->namalengkap = $request->namalengkap;
        $user->email = $request->email;
        $user->notelp = $request->notelp;
        $user->password = bcrypt($request->password);
        $user->foto = $request->foto;

        if($request->hasfile('foto'))
        {
            $destination ='images/karyawans/'.$user->foto;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension ();
            $extention = $file->getClientOriginalName ();
            $filename = time().'.'.$extention;
            $file->move('images/karyawans/',$filename);
            $user->foto= $filename;     
        }
        $user->save();
        return redirect('/profile/list')->with('success','Informasi Akun telah di Perbaharui!');
    }


    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('/profile/list')->with('success', 'Akun Karyawan Berhasil Dihapus!');
    }
}
