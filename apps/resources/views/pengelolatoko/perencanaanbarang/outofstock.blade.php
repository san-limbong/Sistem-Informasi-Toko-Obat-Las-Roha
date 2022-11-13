<html>

<head>
    <title>Rencana Pengadaan Barang</title>
    <style type="text/css">
        body {
            font-family: Verdana;
        }

        div.invoice {
            border: 1px solid #ccc;
            padding: 10px;
            height: 740pt;
            width: 570pt;
        }

        div.company-address {
            border: 1px solid #ccc;
            float: left;
            width: 200pt;
        }

        div.invoice-details {
            border: 1px solid #ccc;
            float: right;
            width: 200pt;
        }

        div.customer-address {
            border: 1px solid #ccc;
            float: right;
            margin-bottom: 50px;
            margin-top: 100px;
            width: 200pt;
        }

        div.clear-fix {
            clear: both;

        }

        #selector {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #selector td,
        #selector th {
            border: 1px solid #ddd;
            padding: 5px;
        }

        #selector tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #selector tr:hover {
            background-color: #ddd;
        }

        #selector th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Daftar Rencana Pengadaan Barang</h1>
    <div class="d-flex bd-highlight mb-3 pb-4">

        <div class="p-2 bd-highlight">
            <h4> Toko Obat Las Roha </h4>
            <p>Alamat: Napitupulu Bagasan, Kec. Balige, Toba, Sumatera Utara</p>
            <p>No Telp: 081397586902</p>
        </div>
        <div class="p-2 bd-highlight">
            <h4>Detail:</h4>
            <p>Tanggal: {{ date('Y-m-d') }} </p>
            <p>Pukul : {{ date('H:i:s') }} </p>
        </div>
    </div>

    <div class="clear-fix"></div>

    <table class="table table-bordered table table text-center mt-4" id="selector">
        <thead class="thead-light">
            <tr class="table-secondary">
                <th scope="col">No</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Jumlah</th>
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
                <td>{{ $item->jumlahrencana }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
</body>

</html>