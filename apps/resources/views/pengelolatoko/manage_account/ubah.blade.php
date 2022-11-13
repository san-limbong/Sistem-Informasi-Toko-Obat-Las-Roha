@extends('pengelolatoko.layouts.main')
@section('content')
<div class="container-fluid p-0">

    <div class="justify-content-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola Akun Karyawan</h1>
    </div>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a style="text-decoration: none" href="/profile/list">List Akun Karyawan</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Kelola Akun Karyawan</li>
        </ol>
    </nav>

    <form action="/profile/update/{{ $user->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-row">
            <div class="form-group">
                <label for="namalengkap" class="col-form-label"><strong>Nama Karyawan :</strong></label>
                <input type="text" name="namalengkap" class="form-control" placeholder="Masukkan Nama Lengkap" required
                    value="{{ $user->namalengkap }}">
            </div>
            <div class="form-group">
                <label for="email" class="col-form-label"><strong>Email :</strong></label>
                <input type="text" name="email" class="form-control" placeholder="Masukkan Email" required
                    value="{{ $user->email }}">
            </div>

            <div class="form-group">
                <label for="notelp" class="col-form-label"><strong>Nomor Telephone :</strong></label>
                <input type="integer" name="notelp" class="form-control" placeholder="Masukkan No Telepon" required
                    value="{{ $user->notelp }}">
            </div>
            <div class="form-group col-md-6">
                <label for="password" class="col-form-label"><strong>Password :</strong></label>
                <input type="password" name="password" class="form-control" placeholder="" required
                    value="{{ $user->password }}">
            </div>
            <div class="form-group">
                <div class="form-group col-md-12">
                    <label for="foto" class="col-form-label"><strong>Foto:</strong></label>
                    <input type="file" class="form-control" name="foto" id="foto" placeholder="Image URL">
                    <img src="{{asset('images/karyawans/'.$user->foto)}}" alt="{{$user->foto}}"
                        class="img-fluid img-thumbnail">
                </div>
            </div>

            {{-- <div class="form-group">
                <div class="form-group col-md-12">
                    <label for="image" class="col-form-label"><strong>Gambar:</strong></label>
                    <input type="file" class=" form-control" name="foto" placeholder="Pilih Gambar">
                </div>
            </div> --}}


        </div>


        <div class="pt-3">
            <button type="submit" class="btn btn-warning text-white" onclick="return confirm('Perbarui data?')">Save
                Changes</button>
            <a href="/profile/list" class="btn btn-danger">Cancel</a>
        </div>
    </form>

</div>
@endsection