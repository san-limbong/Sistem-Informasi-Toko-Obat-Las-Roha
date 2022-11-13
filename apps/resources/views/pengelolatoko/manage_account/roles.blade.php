@extends('pengelolatoko.layouts.main')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
@section('content')
<div class="container-fluid p-0">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <h1 class="h3 mb-3"><strong>Daftar Karyawan</strong> </h1>
    <hr>
    <table class="table table-bordered table text-center">
        <thead class="thead-light">
            <tr class="table-secondary">
                <th scope="col">no</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>

            </tr>
        </thead>
        <tbody>
            @foreach($karyawans as $karyawan )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $karyawan->namalengkap }}</td>

                <td>
                    <a href="" class="btn btn-primary" data-toggle="modal"
                        data-target="#edit1-{{ $karyawan->id }}">Lihat</a>
                    <a href="{{ url('edit-profile',$karyawan->id) }}" class="btn btn-warning">Ubah</a>
                    <a href="/profile/list/delete/{{ $karyawan->id }}" class="btn btn-danger"
                        onclick="return confirm('Apakah anda yakin menghapus akun ini ?')">Delete</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
<a href="/profile/create" class="btn btn-primary mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
        fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
    </svg> Tambah Karyawan</a>
{{-- <a href="/databarang/trash" class="btn btn-success mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="16"
        height="16" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
        <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z" />
        <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z" />
    </svg> Close</a> --}}
<hr>
@foreach ($karyawans as $data)
<div id="edit1-{{ $data->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <strong style="font-size: 30px;">Detail Profile</strong>
            </div>

            <div class="card border-success">
                <div class="card-header bg-info text-white" style="font-size: 23px;">
                    <strong><i class="fa fa-database"></i>{{ $data->namalengkap }}</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="table-responsive">
                                <table class="table cart">

                                    <tr class="cart_item">
                                        <th><strong>Nama:</strong></th>
                                        <td>{{ $data->namalengkap}}</td>
                                    </tr>
                                    <tr class="cart_item">
                                        <th><strong>Email:</strong></th>
                                        <td>{{ $data->email }}</td>
                                    </tr>
                                    <tr class="cart_item">
                                        <th><strong>Password:</strong></th>
                                        <td>{{ $data->password}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="slide" data-thumb="{{asset('images/karyawan/'.$data->image)}}"><a
                                    href="{{asset('images/karyawan/'.$data->image)}}" title="Preview Dress - Front View"
                                    data-lightbox="gallery-item"><img src="{{asset('images/karyawan/'.$data->image)}}"
                                        alt="{{$data->image}}" class="img-fluid img-thumbnail"></a></div>
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