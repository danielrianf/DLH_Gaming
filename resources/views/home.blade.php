@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h3>Sistem Administrasi Penjualan Bibit Tanaman Berbasis Web</h3>
@stop

@section('content')
@if (auth()->user()->role=="admin")
<section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-lg-3 col-6">
    <div class="small-box bg-info">
    <div class="inner">
    <h3>{{ $Cbibit }}</h3>
    <p>Jumlah Bibit</p>
    </div>
    <div class="icon">
        <i class="fas fa-fw fa-seedling"></i>
    </div>
    <a href="/bibit" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>

    <div class="col-lg-3 col-6">
    <div class="small-box bg-success">
    <div class="inner">
    <h3>{{ $Cpelanggan }}</h3>
    <p>Pelanggan</p>
    </div>
    <div class="icon">
        <i class="fas fa-users"></i>
    </div>
    <a href="/pelanggan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>

    <div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
    <div class="inner">
    <h3>{{ $Ctransaksi }}</h3>
    <p>Total Transaksi</p>
    </div>
    <div class="icon">
        <i class="fas fa-fw fa-layer-group"></i>
    </div>
    <a href="/transaksi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>

    <div class="col-lg-3 col-6">
    <div class="small-box bg-danger">
    <div class="inner">
    <h3>{{$Lunas}}</h3>
    <p>Transaksi Selesai</p>
    </div>
    <div class="icon">
    <i class="fas fa-fw fa-file"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Penjualan Setiap Bulan</div>
            <div class="card-body"></div>
                <div id="grafik"></div>
        </div>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script type="text/javascript">
        var penjualan = <?php echo json_encode($TRansaksi) ?>;
        var bulan = <?php echo json_encode($bulan) ?>;
            Highcharts.chart('grafik', {
    title : {
        text: 'Grafik Penjualan'
    },
    xAxis : {
        categories : bulan
    },
    yAxis : {
        title: {
            text : 'Nominal Penjualan'
        }
    },
    plotOptions: {
        series: {
            allowPointSelect: true
        }
    },
    series: [
        {
            name: 'Bulan',
            data: penjualan
        }
    ]
});
</script>
    </div>
</section>
@endif

@if (auth()->user()->role=="marketing")
<div class="row">
<div class="col-lg-3 col-6">
    <div class="small-box bg-info">
    <div class="inner">
    <h3>{{ $Csuratjln }}</h3>
    <p>Jumlah Surat Jalan</p>
    </div>
    <div class="icon">
        <i class="fas fa-users"></i>
    </div>
    <a href="/suratjln" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>

    <div class="col-lg-3 col-6">
    <div class="small-box bg-success">
    <div class="inner">
    <h3>{{ $CtransAll }}</h3>
    <p>Total Transaksi</p>
    </div>
    <div class="icon">
        <i class="fas fa-users"></i>
    </div>
    <a href="/transaksi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
</div>
@endif

@if (auth()->user()->role=="manajer")
<div class="col-md-12">
        <div class="card">
            <div class="card-header">Penjualan Setiap Bulan</div>
            <div class="card-body"></div>
            <div id="grafik"></div>
        </div>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script type="text/javascript">
        var penjualan = <?php echo json_encode($TRansaksi) ?>;
        var bulan = <?php echo json_encode($bulan) ?>;
            Highcharts.chart('grafik', {
    title : {
        text: 'Grafik Penjualan'
    },
    xAxis : {
        categories : bulan
    },
    yAxis : {
        title: {
            text : 'Nominal Penjualan'
        }
    },
    plotOptions: {
        series: {
            allowPointSelect: true
        }
    },
    series: [
        {
            name: 'Bulan',
            data: penjualan
        }
    ]
});
</script>
    </div>
@endif

@section('footer')
    <strong>Copyright &copy; 2022 <a href="">PT Agro Indo Raya</a>.</strong>
    All rights reserved.
@stop
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
