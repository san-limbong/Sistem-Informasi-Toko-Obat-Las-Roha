@extends('pengelolatoko.layouts.main')
@section('content')
<div class="container-fluid p-0">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <h1 class="h3 mb-3"><strong>Keranjang Sampah</strong> </h1>
    <hr>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a style="text-decoration: none" href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/databarang" style="text-decoration: none">Mengelola Barang</a></li>
            <li class="breadcrumb-item active" aria-current="page">Keranjang Sampah</li>
        </ol>
    </nav>


    <div class="d-flex bd-highlight mb-3">
        <div class="me-auto p-2 bd-highlight">

            <div class="pull-left">
                <a href="{{ url ('/databarang/trash/detele') }}" class="btn btn-danger btn-sm"
                    onclick="return confirm('Apakah anda yakin untuk menghapus semua barang secara permanen?')"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-x-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg> Hapus Semua</a>

                <a href="{{ url ('/databarang/restore') }}" class="btn btn-success btn-sm"
                    onclick="return confirm('Apakah anda yakin untuk memulihkan semua barang?')"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-recycle" viewBox="0 0 16 16">
                        <path
                            d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z" />
                    </svg> Pulihkan Semua</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered table table text-center mt-3">
        <thead class="thead-light">
            <tr class="table-secondary">
                <th scope="col">No</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Kategori</th>
                <th style="width:15%; height:70px;" class="cart-product-thumbnail">Gambar</th>
                <th scope="col">Aksi</th>

            </tr>
        </thead>
        <tbody>
            @foreach($barang as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category->name }}</td>
                <td class="cart-product-thumbnail"><img class="card-img-top "
                        src="{{asset('images/products/'.$item->gambar)}}" alt="" width="50px"></td>
                <td>
                    <a href="" data-toggle="modal" data-target="#target1" class="btn btn-primary">Lihat</a>
                    <a href="{{ url ('/databarang/restore', $item->id) }}" class="btn btn-success"
                        onclick="return confirm('Apakah anda yakin untuk memulihkan barang?')">Pulihkan</a>
                    <a href="{{ url ('/databarang/trash/detele',$item->id) }}" class="btn btn-danger"
                        onclick="return confirm('Apakah anda yakin untuk menghapus barang secara permanen?')">Hapus
                        Permanen</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/databarang" class="btn btn-danger"><span data-feather=""><svg xmlns="http://www.w3.org/2000/svg"
                width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg> Kembali</a>

    <hr>

</div>

<!-- tampilan Modal -->
<div id="target1" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                Detail Barang
            </div>
            <div class="modal-body">
                <table class="table table-bordered table table table-striped">
                    <thead class="bg-info text-black text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Merek</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Kadaluwarsa</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Deskripsi</th>
                        <th style="width:10%; height:50px;" class="cart-product-thumbnail">Gambar</th>

                    </thead>
                    <tbody>
                        @foreach($barangs as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->merek }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->kadaluwarsa)); }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td class="cart-product-thumbnail"><img class="card-img-top"
                                    src="{{asset('images/products/'.$item->gambar)}}" alt="" width="50px"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="footer">
                <button class="btn btn-danger float-right my-3 mx-3" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    {{-- B --}}
    <div class="modal fade" id="modal2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Yakin akan menghapus data ini?</p>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endsection