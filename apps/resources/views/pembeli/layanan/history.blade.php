@extends('pembeli.layouts.main')
@section('content')

<div class="container pt-5">
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
                            <th>Tanggal Transaksi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $data)
                        <tr class="py-1">
                            <td>{{ $data->id_header_transaksi }}</td>
                            <td>{{ date('d-m-Y', strtotime($data->tanggal_transaksi)); }}</td>
                            <td>{{ $data->status }}</td>
                            <td>
                                <a href="/detailriwayat/{{ $data->id_header_transaksi }}" class="badge bg-primary"
                                    style="text-decoration: none">Lihat</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <p class="text-center fs-6">Data not found</p>
    @endif
</div>

<div class="container">
    <div class="d-flex justify-content-start py-2">
        {{ $transaksi->links() }}
    </div>
</div>

@endsection