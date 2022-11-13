@extends('pengelolatoko.layouts.main')
@section('content')
<div class="container-fluid p-0">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <h1 class="h3 mb-3"><strong>Rencana Pengadaan Barang</strong> </h1>
    <hr>

    <nav
    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a style="text-decoration: none" href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Rencana Pengadaan Barang</li>
    </ol>
  </nav>


    <h5>Daftar Rencana Pengadaan Barang</h5>

    <? php
        $barang = \DB::select("select * from barangs where stok < minimal_stok");
    ?>
    <table class="table table-bordered table table text-center mt-4">
        <thead class="thead-light" >
            <tr class="table-secondary">
                <th scope="col">No</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Vendor</th>
                <th scope="col">Stok saat ini</th>
                <th scope="col">Jumlah Rencana Pengadaan</th>
                <th scope="col">Ubah Jumlah Rencana Pengadaan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $barang = \DB::select("select * from barangs where stok < minimal_stok");
          ?>
            @foreach($barang as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->vendor}}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->jumlahrencana }}</td>

                <td>
                    <a href="{{ url('edit-rencana',$item->id) }}" class="btn btn-warning">Ubah</a>
                </td>
                {{-- <td>
                    <form action="{{ url('update',$item->id) }}" method="POST">
                        @csrf
                        <input type="number" name="" min="1" value="{{ " jumlah" }}">
                        <button class="btn btn-warning btn-sm text-white" type="submit"
                            onclick="return confirm('Are you sure?')">Update</button>
                    </form>
                </td> --}}

                @endforeach


            </tr>


        </tbody>
    </table>
    <hr>
    <div class="p-2 bd-highlight">
        <a href="/outofstock" class="btn btn-primary">Unduh Daftar Rencana Pengadaan Barang </a>
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