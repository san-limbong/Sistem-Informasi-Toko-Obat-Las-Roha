@extends('pengelolatoko.layouts.main')
@section('content')
<div class="container-fluid p-0">
  <h1 class="h3 mb-3"><strong>Ubah Jumlah Rencana Barang</strong> </h1>
  <hr>
  <nav
    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a style="text-decoration: none" href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/rencanapengadaan" style="text-decoration: none">Rencana Pengadaan Barang</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Ubah Jumlah Rencana Barang</li>
    </ol>
  </nav>

  <form action="{{ url('update-rencana',$bar->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group col-md-2">
      <label for="jumlahrencana" class="col-form-label"><strong>Jumlah:</strong></label>
      <input type="number" class="form-control" name="jumlahrencana" id="jumlahrencana" placeholder="jumlah" required
        value="{{ $bar->jumlahrencana  }}">
    </div>
    <hr>
    <a href="/rencanapengadaan" class="btn btn-danger"><span data-feather=""><svg xmlns="http://www.w3.org/2000/svg"
          width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
        </svg> Kembali</a>
    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Ubah Data</button>
  </form>
</div>
@endsection