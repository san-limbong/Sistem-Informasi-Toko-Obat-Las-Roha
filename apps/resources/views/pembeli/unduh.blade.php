<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
</head>
<style>
    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }

    a {
        color: #5D6975;
        text-decoration: underline;
    }

    body {
        position: relative;
        height: 29.7cm;
        margin: 0 auto;
        color: #001028;
        background: #FFFFFF;
        font-family: Arial, sans-serif;
        font-size: 12px;
        font-family: Arial;
    }

    header {
        padding: 10px 0;
        margin-bottom: 30px;
    }

    #logo {
        text-align: center;
        margin-bottom: 10px;
    }

    #logo img {
        width: 90px;
    }

    h1 {
        border-top: 1px solid #5D6975;
        border-bottom: 1px solid #5D6975;
        color: #5D6975;
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        margin: 0 0 20px 0;
        background: url(dimension.png);
    }

    #project {
        float: left;
    }

    #project span {
        color: #5D6975;
        text-align: right;
        width: 52px;
        margin-right: 10px;
        display: inline-block;
        font-size: 0.8em;
    }

    #company {
        float: right;
        text-align: right;
        margin-right: 10px;
    }

    #project div,
    #company div {
        white-space: nowrap;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
    }

    table tr:nth-child(2n-1) td {
        background: #F5F5F5;
    }

    table th,
    table td {
        text-align: center;
    }

    table th {
        padding: 5px 20px;
        color: #5D6975;
        border-bottom: 1px solid #C1CED9;
        white-space: nowrap;
        font-weight: normal;
    }

    table .service,
    table .desc,
    table .unit,
    table .qty,
    table .total {
        text-align: left;
    }



    table td {
        padding: 20px;
        text-align: right;
    }

    table td.service,
    table td.desc {
        vertical-align: top;
    }

    table td.unit,
    table td.qty,
    table td.total {
        font-size: 1.2em;
    }

    table td.grand {
        border-top: 1px solid #5D6975;
        ;
    }

    #notices .notice {
        color: #5D6975;
        font-size: 1.2em;
        text-align: center;
    }

    footer {
        color: #5D6975;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #C1CED9;
        padding: 8px 0;
        text-align: center;
    }
</style>

<body>
    <header class="clearfix">
        @foreach ($transaksi as $item)
        @endforeach
        <h1 style="border: none">Invoice Pesanan #{{ $item->id_header_transaksi }}</h1>
        <div id="company" class="clearfix">
            <h4>Penjual:</h4>
            <div>Toko Obat Las Roha</div>
            <div>Napitupulu Bagasan, Kec. Balige, </div>
            <div>Toba, Sumatera Utara</div>
            <div>No Telp: 081397586902</div>
        </div>
        <div id="project">
            @foreach ($transaksi as $item)
            @endforeach
            <h4>Pembeli: </h4>
            <div><span>Nama</span>{{ $item->namalengkap }}</div>
            <div><span>Alamat</span> {{ $item->alamat }}</div>
            <div><span>No Telp</span> {{ $item->notelp }} </div>
            <div><span>Status</span> {{ $item->status }} </div>
            <div><span>Tanggal Pesan</span>  {{ date('d-m-Y', strtotime($item->tanggal_transaksi)); }} </div>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="service">Nomor</th>
                    <th class="desc">Nama Barang</th>
                    <th class="unit">Merek</th>
                    <th class="qty">Harga Satuan</th>
                    <th class="total">Jumlah Barang</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($transaksi as $item)
                <tr>
                    <td class="service">{{ $no++ }}</td>
                    <td class="desc">{{ $item->name }}</td>
                    <td class="unit">{{ $item->merek }}</td>
                    <td class="qty">Rp. {{ number_format($item->hargasatuan) }}</td>
                    <td class="total">{{ $item->jumlahbarang }}</td>
                </tr>
                @endforeach

                <tr>
                    <td colspan="4" class="grand total">Total Harga</td>
                    <td class="grand total"> Rp. {{ number_format($item->totalharga) }}</td>
                </tr>
            </tbody>
        </table>
        <div id="notices">
            <div class="notice">Pesan:</div>
            <div class="notice">Harap menunjukkan ini pengelola toko sehingga pesanan anda dapat diproses.</div>
        </div>
    </main>
</body>

</html>