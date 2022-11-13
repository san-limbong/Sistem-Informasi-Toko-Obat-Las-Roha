@extends('pengelolatoko.layouts.main')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

    <div class="d-flex">
        <div class="w-100">
            <div class="row">

                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title"><strong>Total</strong> Vendor</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="truck"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3 text-center">{{ $vendor->count() }}</h1>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title"><strong>Total</strong> Transaksi</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3 text-center">{{ $transaksi->count() }}</h1>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title"><strong>Total</strong> Karyawan</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="user-check"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3 text-center">{{ $karyawan }}</h1>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title"><strong>Total</strong> Customer</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="users"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3 text-center">{{ $customer }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-between mb-2">
        <div class="col-md-6">
            <div class="card">
                <div id="chartbarang">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div id="container"></div>
            </div>
        </div>
    </div>

</div>



<script src="https://code.highcharts.com/stock/highstock.js"></script>

<script>
    var users =  <?php echo json_encode($users) ?>;
    let databarang = JSON.parse('{!! $chartbarang !!}')

    Highcharts.chart('chartbarang', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Data Barang'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Sisa Barang'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Sisa Barang: <b>{point.y:.0f}</b>'
        },
        series: [{
            name: 'Population',
            data: databarang,
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.0f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });

    Highcharts.chart('container', {
        title: {
            text: 'Data Pengunjung'
        },
        xAxis: {
            categories: ['May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec','Jan', 'Feb', 'Mar', 'Apr']
        },
        yAxis: {
            title: {
                text: 'Jumlah Pertumbuhan Pengunjung'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Jumlah Pengunjung',
            data: users
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});
</script>
@endsection