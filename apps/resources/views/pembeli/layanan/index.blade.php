@extends('pembeli.layouts.main')
@section('content')
<header>
    <div class="px-3 py-2 border-bottom mb-3 align-content-end me-2">
        <div class="container d-flex flex-wrap justify-content-center">
            <div class="text-start px-5 pt-1">
                <h4>Cari</h4>
            </div>
            <form class="w-50 justify-content-end d-flex" action="/layanan" method="GET">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Cari id/nama/merek/harga" name="search">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
</header>

<div class="container px-4 pt-3" id="custom-cards">
    <ul class="d-flex list-unstyled mt-auto border-bottom">
        <li class="me-auto">
            <h4>Semua Produk</h4>
        </li>
    </ul>

    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 py-2">
            @foreach($barang as $item)
            <div class="col py-3">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: 
            url('{{asset('images/products/'.$item->gambar)}}');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1"
                        style="background-color: rgba(0, 0, 0, 0.1)">
                        <h3 class="pt-5 mt-5">{{ $item->name }}</h3>
                        <small class="mb-4">Rp. {{ number_format($item->harga) }}</small>
                        <ul class="d-flex list-unstyled mt-auto">
                            {{-- <li class="me-auto px-2">
                                <button class="btn btn-primary">View</button>
                            </li> --}}
                            @if(!empty(auth()->user()->namalengkap))
                            @if (auth()->user()->role == 3)
                            <li class="d-flex align-items-center">
                                <a href="{{ url('/cart/tambah/'.$item->id) }}" class="btn btn-success">Add to Cart</a>
                            </li>
                            @endif
                            @endif
                        </ul>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="d-flex align-items-center">
                                <a href="" class="btn btn-primary" data-toggle="modal"
                                    data-target="#view-{{ $item->id }}">Detail</a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @foreach ($barang as $data)
    <div id="view-{{ $data->id }}" class="modal fade" role="dialog">
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
                                            <th><strong>Stok:</strong></th>
                                            <td>{{ $data->stok }}</td>
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

    <div class="container">
        <div class="d-flex justify-content-start py-2">
            {{ $barang->links() }}
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
    @endsection