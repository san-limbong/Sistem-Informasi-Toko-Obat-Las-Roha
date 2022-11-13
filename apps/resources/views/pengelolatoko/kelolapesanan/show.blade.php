@extends('pengelolatoko.layouts.main')
@section('content')

<div class="justify-content-center pb-2 mb-3 border-bottom">
    <h2>Lihat Pesanan </h2>
</div>

<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a style="text-decoration: none" href="/datapesanan">Transaksi</a></li>
    <li class="breadcrumb-item active" aria-current="page">Lihat pesanan</li>
    </ol>
</nav>

<div class="container">
    <div class="d-flex bd-highlight mb-3">
        <div class="p-2 bd-highlight"><a href="/datapesanan" class="btn btn-danger">Kembali</a></div>
        @foreach ($transaksi as $item)
        @endforeach
        <div class="ms-auto p-2 bd-highlight"><a href="/receipt/{{ $item->id_header_transaksi }}" class="btn btn-success">Download</a>
        </div>
    </div>
</div>

<div class="card container">
    <div class="card-title">
        @foreach ($transaksi as $item)
        @endforeach
        <h2 class="pt-4" style="text-align: center">Invoice Pesanan #{{ $item->id_header_transaksi }}</h2>
    </div>
    <div class="d-flex bd-highlight mb-3 pb-4">
        <div class="me-auto p-2 bd-highlight">
            <h4>Pembeli: </h4>
            @foreach ($transaksi as $item)
            @endforeach
            <p>Nama : {{ $item->namalengkap }}</p>
            <p>Alamat : {{ $item->alamat }}</p>
            <p>No Telp : {{ $item->notelp }} </p>
            <p>Status : {{ $item->status }} </p>
            <p>Tanggal Pesan : {{ date('d-m-Y', strtotime($item->tanggal_transaksi)); }} </p>
        </div>
        <div class="p-2 bd-highlight">
            <h4>Penjual:</h4>
            <p> Toko Obat Las Roha </p>
            <p>Napitupulu Bagasan, Kec. Balige, </p>
            <p>Toba, Sumatera Utara</p>
            <p>No Telp: 081397586902</p>
        </div>
    </div>
    <h5>Keranjang</h5>
    <table class="table table-hover my-0 text-center">
        <thead>
            <tr class="py-1">
                <th>Nomor</th>
                <th>Nama Barang</th>
                <th>Merek</th>
                <th>Harga Satuan</th>
                <th>Jumlah Barang</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($transaksi as $item)
            <tr class="py-1">
                <td scope="row">{{ $no++ }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->merek }}</td>
                <td> {{ number_format($item->hargasatuan) }}</td>
                <td>{{ $item->jumlahbarang }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex bd-highlight mb-3">
        <div class="me-auto p-2 bd-highlight"></div>
        <div class="px-2 py-4 bd-highlight">Total harga: Rp. {{ number_format($item->totalharga) }}</div>
    </div>
</div>
@endsection