@extends('auth.layouts.auth')

@section('content')
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<header>
    <h1>Daftar akun baru</h1>
</header>
<hr>

<!-- Form -->
<form action="/register" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-floating">
        <label for="name">Nama Lengkap</label>
        <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Nama" required>
        <small>Masukakan nama asli anda, nama akan digunakan pada profile</small>
    </div><br>
    <div class="form-floating">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email" required>
        <small>Email nantinya akan digunakan untuk verifikasi akun</small>
    </div><br>
    <div class="form-floating">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Masukan password" required>
        <small>Masukkan password</small>
    </div><br>
    <!-- <div class="form-floating">
        <label for="password">Konfirmasi Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Konfirmasi password">
        <small>Ulangi password diatas sekali lagi</small>
    </div><br> -->

    <div>
        <button class="btn btn-primary btn-block" type="submit">Daftar</button>
    </div>
</form>
<!-- /Form -->
<div class="text-center dont-have">Sudah punya akun?<a href="/login"> Masuk sekarang</a></div>
<hr>

<div>
    <small>
        <p class="mt-2 mb-3 text-muted">&copy; 2022 | Las Roha - Sistem Informasi Toko Obat Las Roha Balige All Rights Reserved</p>
    </small>
</div>
@endsection