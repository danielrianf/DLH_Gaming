@extends('adminlte::page')
@section('judul')
    Form cetak laporan
@endsection
@section('content')
<main>
    <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="card mt-5">
            {{-- <div class="card card-grey card-outline">
              <div class="card-header">
                <h3 class="card-title">Form Laporan</h3>
              </div>
              <div class="card-body">
                <form action="{{ url('/laporan/show') }}" method="GET" class="form-group" id="formFilter">
                  <div class="form-group">
                    <label for="month">Bulan</label>
                    <select name="month" id="month" class="form-control">
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">Nopember</option>
                      <option value="12">Desember</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="year">Tahun</label>
                    <select name="year" id="year" class="form-control">
                      @for($a = 2020; $a <= 2050; $a++)
                      <option value="{{$a}}">{{$a}}</option>
                      @endfor
                    </select>
                  </div>
                  <div class="form-group">
                    <a class="btn btn-primary" href="{{ url('/laporan/show') }}">Buka Laporan</a>
                  </div>
                </form>
              </div> --}}
              {{-- coba lagi --}}
              <div class="card card-grey card-outline">
              <div class="card-header card-info card-outline">
                <h3 class="card-title">Form Laporan</h3>
              </div>
              <div class="card-body">
                  <div class="form-group">
                    <label for="tglawal">Tanggal Awal</label>
                    <div class="input-group mb-3">
                        <input type="date" name="tglawal" id="tglawal" class="form-control"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tglakhir">Tanggal Akhir</label>
                    <div class="input-group mb-3">
                        <input type="date" name="tglakhir" id="tglakhir" class="form-control"/>
                    </div>
                  </div>
                  <div class="input group mb-3">
                    <a href="" onclick="this.href='/CetakDataPerTanggal/'+ document.getElementById('tglawal'). value +
                    '/' + document.getElementById('tglakhir').value " target="_blank" class="btn btn-primary col-md-12">Cetak Laporan Pertanggal
                    <i class="fas fa-print"></i></a>
                </div>
                </form>
              </div>
              {{-- sampai ini --}}
            </div>
          </div>
        </div>
      </div>
</main>
@section('footer')
    <strong>Copyright &copy; 2022 <a href="">PT Agro Indo Raya</a>.</strong>
    All rights reserved.
@stop
@endsection
