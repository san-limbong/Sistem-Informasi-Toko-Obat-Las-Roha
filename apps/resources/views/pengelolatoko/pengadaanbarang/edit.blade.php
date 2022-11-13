@extends('pengelolatoko.layouts.main')
@section('content')
<div class="justify-content-center pb-2 mb-3 border-bottom">
    <h2>Review Pengadaan Barang</h2>
</div>
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a style="text-decoration: none" href="/pengadaanbarang">Pengadaan Barang</a></li>
        <li class="breadcrumb-item active" aria-current="page">Review Pengadaan Barang</li>
    </ol>
</nav>

<form action="/pengadaanbarang/update/{{ $pengadaan->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="karyawan_id" class="form-label">Nama </label>
        <input type="text" class="form-control" value="{{ auth()->user()->namalengkap }}" readonly>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Perbarui Status</label>
        <select class="form-select" name="status">
            <option readonly hidden>Pilih Status</option>
            <option value="Diterima">Diterima</option>
            <option value="Dibatalkan">Dibatalkan</option>
        </select>
        @error('status') <div class="invalid-feedback"> {{ $message }} </div> @enderror
    </div>
    <a href="/pengadaanbarang" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
            fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
        </svg> Kembali</a>
    <button type="submit" class="btn btn-success text-white" onclick="return confirm('Simpan data?')">Simpan</button>
</form>
@endsection