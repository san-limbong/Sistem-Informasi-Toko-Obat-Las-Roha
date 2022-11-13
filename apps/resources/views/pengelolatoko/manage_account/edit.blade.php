@extends('pengelolatoko.layouts.main')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>Ubah Karyawan</strong></h1>
    <hr>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/databarang">Manage Account</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Employee's Account</li>
        </ol>
    </nav>
    <form action="{{ url('update-profile',$kar->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="namalengkap" class="col-form-label"><strong>Nama Karyawan :</strong></label>
                <input type="text" name="namalengkap" class="form-control" placeholder="nama" id="namalengkap" required
                    value="{{ $kar->namalengkap }}">
            </div>
            <div class="form-group col-md-6">
                <label for="email" class="col-form-label"><strong>Email :</strong></label>
                <input type="text" name="email" class="form-control" placeholder="smith@gmmail.com" required
                    value="{{ $kar->email }}">
            </div>
            <div class="form-group col-md-6">
                <label for="password" class="col-form-label"><strong>Password :</strong></label>
                <input type="password" name="password" class="form-control" placeholder="" required
                    value="{{ $kar->password }}">
            </div>

            <div class="form-group col-md-6">
                <label for="phone_number" class="col-form-label"><strong>No Hp :</strong></label>
                <input type="text" name="phone_number" class="form-control" placeholder="081333344454" id="phone_number"
                    required value="{{ $kar->phone_number }}">
            </div>

        </div>e2


        {{-- <div class="form-group">
            <div class="form-group col-md-12">
                <label for="image" class="col-form-label"><strong>Image :</strong></label>
                <input type="file" value="{{ old('image') }}" class=" form-control" name="image" id="image"
                    placeholder="Image URL" value="{{ old('image') }}">
            </div>
        </div> --}}

        <hr>
        <a href="/profile/list" class="btn btn-danger"><span data-feather=""><svg xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg> Back</a>
        <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Simpan</button>
    </form>

</div>
@endsection