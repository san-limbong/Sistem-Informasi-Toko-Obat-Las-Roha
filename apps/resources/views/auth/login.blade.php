@extends('auth.layouts.auth')

@section('content')
<header>
    <h1>Masuk</h1>
</header>
<hr>
<!-- Form -->
<form action="/login" method="POST">
    @csrf
    @if(session('success'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('success') }}</li>
    </div>
    @endif
    <div class="form-group">
        <input class="form-control" name="email" type="text" placeholder="Alamat email">
    </div>
    <div class="form-group">
        <div class="input-group">
            <input class="form-control" id="password" name="password" type="password" placeholder="Masukkan password">
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit">Masuk</button>
    </div>
</form>
<!-- /Form -->
<div class="text-center dont-have">Belum punya akun?<a href="/register"> Ayo daftar</a></div>
<hr>

<div>
    <small>
        <p class="mt-2 mb-3 text-muted">&copy; 2022 | Las Roha - Sistem Informasi Toko Obat Las Roha Balige All Rights Reserved</p>
    </small>
</div>
@endsection