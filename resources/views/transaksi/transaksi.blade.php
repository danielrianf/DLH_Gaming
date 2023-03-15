@extends('adminlte::page')

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="card-title">Data Transaksi</h3>
            {{-- @if (auth()->user()->level=="2") --}}
            <div class="float-right mb-5">
              <a class="btn btn-success" href="{{ url('/transaksi/create') }}"><i class="fas fa-fw fa-plus"></i> Tambah Transaksi</a>
            </div>
            {{-- @endif --}}
            <form action="/transaksi">
              <div class="float-right input-group mb-2 ml-4 col-md-4">
                <input type="text" name="cari" id="cari" class="form-control" placeholder="Cari berdasarkan Tanggal Transaksi" value="{{ $cari }}">
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
                <th>@sortablelink('tanggal_transaksi','Tanggal Transaksi')</th>
                <th>Nama Pelanggan</th>
                <th>@sortablelink('status','status')</th>
                <th width="10%">Aksi</th>
              </tr>
            </thead>
            <tbody>
    @php
        $nomor = 1 + (($transaksi->currentPage()-1)* $transaksi->perPage());
    @endphp
        </div>
        @foreach ($transaksi as $item)
        <tr>
          <th scope="row"></th>
          <td>{{ $nomor++ }}</td>
          <td>{{ $item->tanggal_transaksi }}</td>
          <td>{{ $item->pelanggan->nama_pelanggan }}</td>
          <td><a class="btn btn-primary btn-sm">{{ $item->status }} </td></a>
          <td class="text-center">
            <form action="{{ action('App\Http\Controllers\transaksiController@destroy', $item->id ?? 0) }}" method="POST">
              <a class="btn btn-info btn-xs" href="{{ route('transaksi.show',$item->id) }}">
                <i class="fas fa-fw fa-eye"></i>
              </a>
              {{-- @if (auth()->user()->level=="1") --}}
              <a class="btn btn-primary btn-xs" href="{{ url('transaksi/'.$item->id.'/edit') }}">
                <i class="fas fa-edit"></i>
              </a>
              {{-- @endif --}}
              @method('DELETE')
              @csrf
              {{-- @if (auth()->user()->level=="2") --}}
              <button
                type="submit"
                class="btn btn-danger btn-xs"
                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                <i class="fas fa-trash-alt"></i>
              </button>
              {{-- @endif --}}
            </form>
          </td>
        </tr>
        @endforeach
        </tbody>
        </table>
        {!! $transaksi->appends(Request::except('page'))->render() !!}
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
