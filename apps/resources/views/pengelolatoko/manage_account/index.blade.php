@extends('pengelolatoko.layouts.main')
@section('content')
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="justify-content-center pb-2 mb-3 border-bottom">
    <h1 class="h2">List Akun Karyawan</h1>
</div>
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a style="text-decoration: none" href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">List Akun Karyawan</li>
    </ol>
</nav>
<div class="card container-fluid pt-2">
    <table class="table table-hover my-0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no=1;
            @endphp
            @foreach ($user as $item)
            @if($item->role == 2)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->namalengkap }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    <a href="#" class="badge bg-primary" style="text-decoration: none" data-toggle="modal"
                        data-target="#view-{{ $item->id }}">Lihat</a>
                    <a href="/profile/ubah/{{ $item->id }}" class="badge bg-warning"
                        style="text-decoration: none">Ubah</a>
                    <a href="/profile/hapus/{{ $item->id }}" class="badge bg-danger"
                        style="text-decoration: none">Hapus</a>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>

</div>
<a href="/profile/create/" class="btn btn-primary mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
        fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
    </svg> Tambah Akun Karyawan</a>
@foreach ($user as $data)
<div id="view-{{ $data->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <strong style="font-size: 30px;">Detail Akun</strong>
            </div>

            <div class="card border-success">
                <div class="card-header bg-info text-white" style="font-size: 23px;">
                    <strong><i class="fa fa-database"></i>Akun Identifier #{{ $data->id }}</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="table-responsive">
                                <table class="table cart">

                                    <tr class="cart_item">
                                        <th><strong>Nama Lengkap:</strong></th>
                                        <td>{{ $data->namalengkap }}</td>
                                    </tr>
                                    <tr class="cart_item">
                                        <th><strong>Email:</strong></th>
                                        <td>{{ $data->email }}</td>
                                    </tr>
                                    <tr class="cart_item">
                                        <th><strong>Tanggal Dibuat:</strong></th>
                                        <td>{{ date('d-m-Y', strtotime($data->created_at)); }}</td>
                                    </tr>
                                    <tr class="cart_item">
                                        <th><strong>No Telp:</strong></th>
                                        <td> {{ $data->notelp }} </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="slide" data-thumb="{{asset('images/karyawans/'.$data->foto)}}"><a
                                    href="{{asset('images/karyawans/'.$data->gambar)}}"
                                    title="Preview Dress - Front View" data-lightbox="gallery-item"><img
                                        src="{{asset('images/karyawans/'.$data->foto)}}" alt="{{$data->foto}}"
                                        class="img-fluid img-thumbnail"></a></div>
                        </div>
                        {{-- <div class="col-4">
                            <div class="slide" data-thumb="/img/images.png"><a href="/img/images.png"
                                    title="Preview Dress - Front View" data-lightbox="gallery-item"><img
                                        src="/img/images.png" alt="" class="img-fluid img-thumbnail"></a></div>
                        </div> --}}
                    </div>
                </div>
                <div class="footer">
                    <button class="btn btn-danger float-right my-3 mx-3" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
@endsection