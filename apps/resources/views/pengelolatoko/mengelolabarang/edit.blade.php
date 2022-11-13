@extends('pengelolatoko.layouts.main')
@section('content')
<div class="container-fluid p-0">

  <h1 class="h3 mb-3"><strong>Ubah Data Barang</strong> </h1>
  <hr>
  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a style="text-decoration: none" href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/databarang" style="text-decoration: none">Mengelola Barang</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ubah Kategori Barang</li>
    </ol>
  </nav>
  <form action="{{ url('update-barang',$bar->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="form-group col-md-6">
        <label for="name" class="col-form-label"><strong>Nama Barang :</strong></label>
        <input type="text" name="name" class="form-control" value="{{ $bar->name  }}" placeholder="nama" required>
      </div>
      <div class="form-group col-md-6">
        <label for="marek" class="col-form-label"><strong>Merek :</strong></label>
        <input type="text" name="merek" class="form-control" placeholder="merek" required value="{{ $bar->merek }}">
      </div>
      <div class="form-group col-md-6">
        <label for="vendor" class="col-form-label"><strong>Vendor :</strong></label>
        <input type="text" name="vendor" class="form-control" placeholder="vendor" required value="{{ $bar->vendor }}">
      </div>
      <div class="col-md-2">
        <label for="category_id" class="col-form-label"><strong>Kategori :</strong></label>
        <select class="form-select" name="category_id" value="{{ old('category_id') }}">
          @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-4">
        <label for="harga" class="col-form-label"><strong>Harga :</strong></label>
        <input type="text" class="form-control" id="harga" name="harga" placeholder="Rp" required
          value="{{ $bar->harga }}">
      </div>
      <div class="form-group col-md-2">
        <label for="stok" class="col-form-label"><strong>Stok:</strong></label>
        <input type="number" class="form-control" name="stok" id="stok" placeholder="stok" required
          value="{{ $bar->stok  }}">
      </div>
      <div class="form-group col-md-2">
        <label for="minimal_stok" class="col-form-label"><strong>Minimal Stok :</strong></label>
        <input type="number" class="form-control" name="minimal_stok" id="minimal_stok" placeholder=" Minimal Stok"
          required value="{{ $bar->minimal_stok  }}">
      </div>
      <div class="form-group col-md-6">
        <label for="kadaluwarsa" class="col-form-label"><strong>Kadaluwarsa :</strong></label>
        <input type="date" name="kadaluwarsa" class="form-control" placeholder="kadaluwarsa" required
          value="{{ $bar->kadaluwarsa  }}">
      </div>
    </div>
    <div class="form-group">
      <label for="deskripsi" class="col-form-label"><strong> Deskripsi :</strong></label>
      <textarea value="{{($bar->deskripsi)}}" class="form-control" id="deskripsi" name="deskripsi" rows="3"
        required> {{ $bar->deskripsi }}</textarea>
    </div>
    
    <hr>
    <div class="pb-5">
      <a href="/databarang" class="btn btn-danger"><span data-feather=""><svg xmlns="http://www.w3.org/2000/svg"
        width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
          d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
      </svg> Kembali</a>
  <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Ubah Data</button>
    </div>
  </form>
</div>
@endsection