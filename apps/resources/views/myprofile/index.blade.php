@extends('pembeli.layouts.main')
@section('content')

<div class="container pt-4">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>

@foreach ($users as $user)
<div class="container">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card border-success">
                <div class="card-header bg-info text-white" style="font-size: 23px;">
                    <strong><i class="fa fa-database"></i>Profil Anda</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="table-responsive">
                                <table class="table cart">
                                    <tr class="cart_item">
                                        <th><strong>Nama:</strong></th>
                                        <td>{{ $user->namalengkap }}</td>
                                    </tr>

                                    <tr class="cart_item">
                                        <th><strong>Email:</strong></th>
                                        <td>{{ $user->email }}</td>
                                    </tr>

                                    <tr class="cart_item">
                                        <th><strong>No Telp:</strong></th>
                                        <td>{{ $user->notelp }}</td>
                                    </tr>

                                    <tr class="cart_item">
                                        <th><strong>Alamat:</strong></th>
                                        <td>{{ $user->alamat }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="slide" data-thumb="/img/images.png"><a href="/img/images.png"
                                    title="Preview Dress - Front View" data-lightbox="gallery-item"><img
                                        src="/img/images.png" class="img-fluid img-thumbnail"></a></div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <a class="btn btn-primary float-right my-3 mx-3" href="/myprofile/edit/{{ $user->id }}">Perbaharui
                        data</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container pt-2">
    <div class="mb-3 row">
        <label for="namalengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
            <input type="text" readonly class="ps-2 form-control-plaintext" value="{{ $user->namalengkap }}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" readonly class="ps-2 form-control-plaintext" value="{{ $user->email }}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">No Telp</label>
        <div class="col-sm-10">
            <input type="text" readonly class="ps-2 form-control-plaintext" value="{{ $user->notelp }}">
        </div>
    </div>


    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
            <input type="text" readonly class="ps-2 form-control-plaintext" value="{{ $user->alamat }}">
        </div>
    </div>

    <a href="#" class="btn btn-primary">Edit Profile</a>

</div> --}}
@endforeach
@endsection