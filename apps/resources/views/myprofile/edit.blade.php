@extends('pembeli.layouts.main')
@section('content')
@foreach ($users as $user)

<div class="container">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card border-success">
                <div class="card-header bg-info text-white" style="font-size: 23px;">
                    <strong><i class="fa fa-database"></i>Profil Anda</strong>
                </div>
                <form action="/myprofile/ubah/{{ $user->id }}" method="POST">
                    @csrf
                    @method('put')
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="table-responsive">
                                <table class="table cart">
                                    <tr class="cart_item">
                                        <th><strong>Nama:</strong></th>
                                        <td><input type="text" class="ps-2 form-control-plaintext" name="namalengkap"
                                                value="{{ $user->namalengkap }}" required>
                                        </td>
                                    </tr>

                                    <tr class="cart_item">
                                        <th><strong>Email:</strong></th>
                                        <td><input type="text" class="ps-2 form-control-plaintext" name="email"
                                                value="{{ $user->email }}" required>
                                        </td>
                                    </tr>

                                    <tr class="cart_item">
                                        <th><strong>No Telp:</strong></th>
                                        <td><input type="text" class="ps-2 form-control-plaintext" name="notelp"
                                                value="{{ $user->notelp }}" required>
                                        </td>
                                    </tr>

                                    <tr class="cart_item">
                                        <th><strong>Alamat:</strong></th>
                                        <td><input type="text" class="ps-2 form-control-plaintext" name="alamat"
                                                value="{{ $user->alamat }}" required>
                                        </td>
                                    </tr>

                                    <tr class="cart_item">
                                        <th><strong>New Password:</strong></th>
                                        <td><input type="password" class="ps-2 form-control-plaintext" name="password" id="myInput" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="checkbox" onclick="myFunction()">Show Password
                                        </td>
                                    </tr>
                            </div>
                </table>
            </div>
        </div>
        <div class="col-4">
            <div class="slide" data-thumb="/img/images.png"><a href="/img/images.png" title="Preview Dress - Front View"
                    data-lightbox="gallery-item"><img src="/img/images.png" class="img-fluid img-thumbnail"></a></div>
        </div>
    </div>
</div>
<div class="footer">
    <a class="btn btn-danger float-right my-3 mx-3" href="/myprofile">Kembali</a>
    <button type="submit" class="btn btn-warning text-white float-right my-3 mx-3" onclick="return confirm('Perbarui data?')">Save
        Changes</button>
</div>
</form>
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

<script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
@endsection