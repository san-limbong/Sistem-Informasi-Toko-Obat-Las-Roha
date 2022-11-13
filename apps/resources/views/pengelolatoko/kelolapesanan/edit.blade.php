@extends('pengelolatoko.layouts.main')
@section('content')
<div class="justify-content-center pb-2 mb-3 border-bottom">
    <h2>Kelola Pesanan</h2>
</div>
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a style="text-decoration: none" href="/datapesanan">Transaksi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kelola pesanan</li>
    </ol>
</nav>
@foreach($transaksi as $data)
@endforeach
@if(!empty($data->status))
<div class="alert alert-warning alert-dismissible" role="alert">
    Data telah pernah diubah sebelumnya
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@foreach($transaksi as $data)
<form action="/datapesanan/ubahpesanan/{{ $data->id_header_transaksi }}" method="POST">
    @csrf
    @method('put')
    @endforeach
    <div class="mb-3">
        <label for="idkaryawan" class="form-label">ID - Pesanan</label>
        <input type="text" class="form-control" value="{{ $data->id_header_transaksi }} " disabled>
    </div>

    <div class="mb-3">
        <label for="idpemesan" class="form-label">IDPemesan - Nama Pemesan</label>
        <input type="text" class="form-control" value="{{ $data->customer_id }} - {{ $data->namalengkap }}" disabled>
    </div>

    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal Transaksi</label>
        <input type="text" class="form-control" value="{{ date('d-m-Y', strtotime($data->tanggal_transaksi)); }}" readonly>
    </div>

    <div class="mb-3">
        <label for="tanggal" class="form-label">Status</label>
        <input type="text" class="form-control" id="tanggal" value="{{ $data->status }}" readonly>
    </div>


    <div class="mb-3">
        <label for="status" class="form-label">Perbarui Status</label>
        <select class="form-select  @error('status') is-invalid @enderror" name="status" id="status">
            <option readonly hidden>Pilih Status</option>
            <option value="Diterima">Diterima</option>
            <option value="Dibatalkan">Dibatalkan</option>
        </select>
        @error('status') <div class="invalid-feedback"> {{ $message }} </div> @enderror
    </div>

    <h5>Keranjang</h5>
    <table class="table table-hover my-0 text-center">
        <thead>
            <tr class="py-1">
                <th>ID Detail Transaksi</th>
                <th>Nama Barang</th>
                <th>Harga Satuan</th>
                <th>Jumlah Barang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $item)
            <tr class="py-1">
                <td scope="row">{{ $item->id_detail_transaksi }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ number_format($item->hargasatuan) }}</td>
                <td>{{ $item->jumlahbarang }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex bd-highlight mb-3">
        <div class="me-auto p-2 bd-highlight"></div>
        <div class="px-2 py-4 bd-highlight">Total harga: Rp. {{ number_format($item->totalharga) }}</div>
    </div>
    <button type="submit" class="btn btn-warning text-white" onclick="return confirm('Perbarui data?')">Save
        Changes</button>
    <a href="/datapesanan" class="btn btn-danger">Cancel</a>

</form>
@endsection