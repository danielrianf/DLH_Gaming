@extends('adminlte::page')

@section('content')
<main>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card mt-5">
            <div class="card-header">
              <h3 class="card-title"> Surat Jalan</h3>

              <div class="float-right mb-5">
                <a class="btn btn-success" href="{{ url('/suratjln/create') }}"><i class="fas fa-fw fa-plus"></i></a>
              </div>

              <form action="/suratjln">
                <div class="float-right input-group mb-2 ml-4 col-md-4">
                  <input type="text" name="cari" id="cari" class="form-control" placeholder="Cari" value="{{ $cari }}">
                  <div class="input-group-append">
                    <button class="input-group-text btn btn-info">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-hover">
              <thead>
                <tr>
                  <th></th>
                  <th>No</th>
                  <th>@sortablelink('no_suratjln','No Surat Jalan')</th>
                  <th>@sortablelink('nama_pelanggan','Nama Pelanggan')</th>
                  <th>@sortablelink('tanggal_kirim','Tanggal Surat Jalan')</th>
                  <th>@sortablelink('qty','Total Qty')</th>
                  <th width="10%">Aksi</th>
                </tr>
              </thead>
              <tbody>
              @php
                  $nomor = 1 + (($suratjln->currentPage()-1)* $suratjln->perPage());
              @endphp
          </div>
          @foreach ($suratjln as $item)
          <tr>
            <th scope="row"></th>
            <td>{{ $nomor++ }}</td>
            <td>{{ $item->no_suratjln }}</td>
            <td>{{ $item->pelanggan->nama_pelanggan }}</td>
            <td>{{ $item->tanggal_kirim }}</td>
            <td>{{ $item->qty }}</td>
            <td class="text-center">
              <form action="{{ url('suratjln/'.$item->id) }}" method="POST">
                @method('DELETE')
                @csrf

                <a class="btn btn-primary btn-xs" href="{{ url('suratjln/'.$item->id.'/edit') }}"><i class="fas fa-edit"></i></a>

                <a class="btn btn-info btn-xs" href="/suratjln/print/{{ $item->id }}"><i class="fas fa-print"></i></a>

                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button>

              </form>
            </td>
          </tr>
          @endforeach
          </tbody>
          </table>
          {!! $suratjln->appends(Request::except('page'))->render() !!}
        </div>
      </div>
    </div>
  </main>
  @section('footer')
      <strong>Copyright &copy; 2022 <a href="">PT Agro Indo Raya</a>.</strong>
      All rights reserved.
  @stop
@endsection
