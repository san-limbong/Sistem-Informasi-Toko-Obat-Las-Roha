@extends('pengelolatoko.layouts.main')
@section('content')


<div class="justify-content-center pb-2 mb-3 border-bottom">
  <h1 class="h2">Keranjang Sampah</h1>
</div>
<nav
  style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
  aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a style="text-decoration: none" href="/datapesanan">Transaksi</a></li>
    <li class="breadcrumb-item active" aria-current="page">Keranjang Sampah</li>
  </ol>
</nav>

<div>
  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if (session()->has('warning'))
  <div class="alert alert-warning alert-dismissible" role="alert">
    {{ session('warning') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if (session()->has('primary'))
  <div class="alert alert-primary alert-dismissible" role="alert">
    {{ session('primary') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
</div>
@if (session()->has('danger'))
<div class="alert alert-danger alert-dismissible" role="alert">
  {{ session('danger') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($transaksi->count())
<div class="row">
  <div class=d-flex">
    <div class="card flex-fill">
      <div class="card-header">
        <h5 class="card-title mb-0 py-2">Daftar Transaksi</h5>
      </div>
      <table class="table table-hover my-0 text-center">
        <thead>
          <tr class="py-1">
            <th>Id</th>
            <th>ID - Nama Lengkap</th>
            <th>Tanggal Transaksi</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($transaksi as $data)
          <tr class="py-1">
            <td>{{ $data->id_header_transaksi }}</td>
            <td>{{ $data->customer_id }} -{{$data->customer->namalengkap}}</td>
            <td>{{ date('d-m-Y', strtotime($data->tanggal_transaksi)); }}</td>
            <td>{{ $data->status }}</td>
            <td>
              <a href="/datapesanan/{{ $data->id_header_transaksi }}" class="badge bg-primary"
                style="text-decoration: none">Lihat</a>
              <a href="/datapesanan/trashbin/pulihkan/{{ $data->id_header_transaksi }}" class="badge bg-warning"
                style="text-decoration: none">Pulihkan</a>
              <a href="/datapesanan/trashbin/delete/{{ $data->id_header_transaksi }}"
                onclick="return confirm('Anda yakin?, Dengan menekan ya maka item akan dihapus permanen dan tidak akan dapat dipulihkan')"
                style="text-decoration: none" class="badge bg-danger">
                Hapus Permanen
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="container-fluid">
  <ul class="d-flex list-unstyled mt-auto">
    <li class="me-auto">
      <div class="pull-left">
        Showing
        {{ $transaksi->firstItem() }}
        to
        {{ $transaksi->lastItem() }}
        of
        {{ $transaksi->total() }}
        entries
      </div>
    </li>
    <li class="d-flex align-items-center">
      <div class="d-flex justify-content-end">
        {{ $transaksi->links() }}
      </div>
    </li>
  </ul>
</div>

@else
<p class="text-center fs-6">Data not found</p>
<a href="/datapesanan" style="text-decoration: none">
  <p class="text-center fs-6">Tampilkan semua data</p>
</a>
@endif
@if ($transaksi->count())
<a href="/datapesanan/trashbin/pulihkansemua" class="btn btn-success">Pulihkan Semua</a>
@endif

@endsection