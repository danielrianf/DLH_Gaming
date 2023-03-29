@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h3>Pengendalian Proses Proyek</h3>
@stop

@section('content')
@if (auth()->user()->role=="admin")
<section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-lg-6 col-10">
    <div class="small-box bg-info">
    <div class="inner">
    <h3>{{ $Cproject }}</h3>
    <p>Action Plan Project</p>
    </div>
    <div class="icon">
        <i class="fas fa-project-diagram"></i>
    </div>
    <a href="/project" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>

    <div class="col-lg-6 col-10">
    <div class="small-box bg-success">
    <div class="inner">
    <h3>{{ $Cpelanggan }}</h3>
    <p>Action Plan Individu</p>
    </div>
    <div class="icon">
        <i class="fas fa-users"></i>
    </div>
    <a href="/pelanggan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
</section>
@endif

<!-- @if (auth()->user()->role=="marketing")

@endif -->

@if (auth()->user()->role=="staf")
<!-- <div class="row">
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
</div> -->
<section class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-lg-6 col-10">
    <div class="small-box bg-info">
    <div class="inner">
    <h3>{{ $Cproject }}</h3>
    <p>Action Plan Project</p>
    </div>
    <div class="icon">
        <i class="fas fa-project-diagram"></i>
    </div>
    <a href="/project" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>

    <div class="col-lg-6 col-10">
    <div class="small-box bg-success">
    <div class="inner">
    <h3>{{ $Cpelanggan }}</h3>
    <p>Action Plan Individu</p>
    </div>
    <div class="icon">
        <i class="fas fa-users"></i>
    </div>
    <a href="/pelanggan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
</div>
</section>
@endif

@section('footer')
    <strong>Copyright &copy; 2023 <a href="">Dinas Lingkungan Hidup Banyuwangi</a>.</strong>
    All rights reserved.
@stop
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
