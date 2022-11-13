@extends('pengelolatoko.layouts.main')
@section('content')
<div class="container-fluid p-0">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <h1 class="h3 mb-3"><strong>Kategori Barang</strong> </h1>
    <hr>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a style="text-decoration: none" href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Mengelola Kategori</li>
    </ol>
  </nav>

    <div class="row justify-content-center mb-2">
        <div class="col-md-6">
            <form action="/databarang/kategori">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Kategori Barang" name="search"
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
    <table class="table table-bordered table table table-striped">
        <thead class="thead-light">
            <tr class="table-secondary">
                <th scope="col">No</th>
                <th scope="col">Kategori Barang</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Ubah</th>
                <th scope="col">Hapus</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->deskripsi }}</td>

                <td><a href="{{ url('edit-kategori',$category->id) }}" class="btn btn-warning">Ubah</a></td>
                <td><a href="{{ url ('/databarang/kategori/detele',$category->id) }}" class="btn btn-danger btn-sm"
                        onclick="return confirm('Apakah anda yakin untuk menghapus Kategori?')">Hapus</a></td>


            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/databarang/kategori/create" class="btn btn-primary mb-3"><svg xmlns="http://www.w3.org/2000/svg"
            width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
        </svg></i> Tambah Kategori
        Barang</a>

    <hr>

</div>

@endsection