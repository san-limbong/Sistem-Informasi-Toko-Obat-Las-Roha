@extends('pembeli.layouts.main')
@section('content')

<div class="container py-2">
    <a href="/layanan" class="btn btn-success btn-sm" role="button">Beli Produk</a>
</div>
@if (empty($cart) || count($cart) == 0)
<div class="container">
    <div class="alert alert-warning alert-dismissible" role="alert">
        Keranjang anda kosong, silahkan beli produk
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@else
<div class="container">
    <div class="col-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">Keranjangku</h5>
                </div>
                <table   table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah saat ini</th>
                        <th>Update</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @php
                        $no=1; 
                        $grandtotal=0;
                    @endphp
                    @foreach ($cart as $ct => $val)
                    @php
                        $subtotal = $val['harga'] * $val["jumlah"];
                    @endphp
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $val["name"] }}</td>
                        <td>{{ number_format($val["harga"]) }}</td>
                        <td>{{ $val["jumlah"] }} Pcs</td>
                        <td>
                            <form action="{{ url('/cart/update/'. $ct) }}" method="POST">
                                @csrf
                            <input type="number" name="jumlah" min="1" value="{{ $val["jumlah"] }}">
                            <button class="btn btn-warning btn-sm text-white" type="submit" onclick="return confirm('Are you sure?')" >Update</button>
                            </form>
                        </td>
                        <td>{{ number_format($subtotal) }}</td>
                        <td>
                            <a style="text-decoration:none" class="btn btn-danger btn-sm" href="{{ url('/cart/hapus/'. $ct) }}">Hapus</a>
                        </td>
                        <td></td>
                    </tr>
                    @php
                        $grandtotal += $subtotal;
                    @endphp
                    @endforeach
                </tbody>
                
            </table>
            <div class="card-footer d-flex bd-highlight">
                {{-- <div><b>Total Harga : {{ $grandtotal }}</b></div> --}}
                <div><b>Total Harga: Rp.{{ number_format($grandtotal) }}</b></div>
                <div class="ms-auto">
                    <form action="{{ url('/cart/checkout') }}" method="post">
                        @csrf
                        <input type="text" name="totalharga" value="{{ $grandtotal }}" hidden>
                        <input type="number" name="customer_id" value="1" hidden>
                        <button class="btn btn-primary btn-sm" type="submit">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-2">
    <a href="/cart/kosongkancart" class="btn btn-secondary" role="button">Kosongkan Cart</a>
</div>
@endif
@endsection

