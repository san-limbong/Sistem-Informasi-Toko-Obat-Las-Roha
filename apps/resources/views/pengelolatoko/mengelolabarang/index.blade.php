@extends('pengelolatoko.layouts.main')
@section('content')
<div class="container-fluid p-0">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <h1 class="h3 mb-3"><strong>Data Barang</strong> </h1>
    <hr>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a style="text-decoration: none" href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/databarang" style="text-decoration: none">Mengelola Barang</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
        </ol>
    </nav>
    <div class="row justify-content-center mb-2">
        <div class="col-md-6">
            <form action="/databarang">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Barang / Vendor" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg> Cari</button>

                </div>
            </form>
        </div>
    </div>
    <table class="table table-bordered table table text-center">
        <thead class="thead-light">
            <tr class="table-secondary">
                <th scope="col">No</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Kategori</th>
                <th scope="col">Vendor</th>
                <th style="width:10%; height:50px;" class="cart-product-thumbnail">Gambar</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $key => $item)
            <tr>
                <td>{{ $barang->firstItem() +$key }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category->name }}</td>
                <td>{{ $item->vendor }}</td>
                <td class="cart-product-thumbnail"><img class="card-img-top"
                        src="{{asset('images/products/'.$item->gambar)}}" alt="" width="50px"></td>
                <td c>
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#edit-{{ $item->id }}">Lihat</a>
                    <a href="{{ url('edit-barang',$item->id) }}" class="btn btn-warning">Ubah</a>
                    <a href="/databarang/delete2/{{ $item->id }}" class="btn btn-danger"
                        onclick="return confirm('Apakah anda yakin untuk menghapus barang sementara?')">Hapus</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <a href="/databarang/create" class="btn btn-primary mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="16"
            height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
        </svg> Tambah Barang</a>
    <a href="/databarang/trash" class="btn btn-success mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="16"
            height="16" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
            <path
                d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z" />
        </svg> Keranjang Sampah</a>
    <hr>

</div>

@foreach ($barang as $data)
<div id="edit-{{ $data->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <strong style="font-size: 30px;">Detail Barang</strong>
            </div>

            <div class="card border-success">
                <div class="card-header bg-info text-white" style="font-size: 23px;">
                    <strong><i class="fa fa-database"></i>{{ $data->name }}</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="table-responsive">
                                <table class="table cart">

                                    <tr class="cart_item">
                                        <th><strong>Nama:</strong></th>
                                        <td>{{ $data->name }}</td>
                                    </tr>
                                    <tr class="cart_item">
                                        <th><strong>Merek:</strong></th>
                                        <td>{{ $data->merek }}</td>
                                    </tr>
                                    <tr class="cart_item">
                                        <th><strong>Kategori:</strong></th>
                                        <td>{{ $data->category->name}}</td>
                                    </tr>
                                    <tr class="cart_item">
                                        <th><strong>Vendor:</strong></th>
                                        <td>{{ $data->vendor }}</td>
                                    </tr>
                                    <tr class="cart_item">
                                        <th><strong>Stok:</strong></th>
                                        <td>{{ $data->stok }}</td>
                                    </tr>
                                    <tr class="cart_item">
                                        <th><strong>Minimal Stok:</strong></th>
                                        <td>{{ $data->minimal_stok }}</td>
                                    </tr>
                                    <tr class="cart_item">
                                        <th><strong>Kadaluwarsa:</strong></th>
                                        <td>{{ date('d-m-Y', strtotime($data->kadaluwarsa)); }}</td>
                                    </tr>
                                    <tr class="cart_item">
                                        <th><strong>Harga:</strong></th>
                                        <td>{{ $data->harga }}</td>
                                    </tr>
                                    <tr class="cart_item">
                                        <th><strong>Deskripsi:</strong></th>
                                        <td>{{ $data->deskripsi }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="slide" data-thumb="{{asset('images/products/'.$data->gambar)}}"><a
                                    href="{{asset('images/products/'.$data->gambar)}}"
                                    title="Preview Dress - Front View" data-lightbox="gallery-item"><img
                                        src="{{asset('images/products/'.$data->gambar)}}" alt="{{$data->gambar}}"
                                        class="img-fluid img-thumbnail"></a></div>
                        </div>
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

<div class="pull-left">
    Showing
    {{ $barang->firstItem() }}
    to
    {{ $barang->lastItem() }}
    of
    {{ $barang->total() }}
    entries
</div>
<div class="d-flex justify-content-end">
    {{ $barang->links() }}
</div>
@endsection