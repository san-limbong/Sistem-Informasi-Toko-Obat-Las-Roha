@extends('pembeli.layouts.main')
@section('content')
<header>
    <div class="px-3 py-2 border-bottom mb-3 align-content-end me-2">
        <div class="container d-flex flex-wrap justify-content-center">
            <div class="text-start px-5 pt-1">
                <h4>Cari</h4>
            </div>
            <form action="/daftarharga" method="GET" class="w-50 justify-content-end d-flex">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Cari id/nama/merek/harga" name="search">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
</header>

<div class="container">
    <div class="col-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar & Harga</h5>
            </div>
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>ID Barang</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach ($barang as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="#" data-toggle="modal" data-target="#view-{{ $item->id }}"
                                style="text-decoration: none"> {{ $item->name }}</a></td>
                        <td>{{ $item->category->name }}</td>
                        <td>Rp. {{ number_format($item->harga) }}</td>
                        <td>{{ $item->stok }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
                                        <th><strong>Category:</strong></th>
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
                                        <th><strong>Kadaluwarsa:</strong></th>
                                        <td>{{ date('d-m-Y', strtotime($data->kadaluwarsa)); }}</td>
                                    </tr>
                                    <tr class="cart_item">
                                        <th><strong>Harga:</strong></th>
                                        <td> {{ $data->harga }}</td>
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