@extends('adminlte::page')

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    <div class="card mt-5">
        <div class="card-header">
                <h3 class="card-title"> Data Pelanggan</h3>
                <div class="float-right mb-5">
                    <a class="btn btn-success" href="{{ url('/pelanggan/create') }}"><i class="fas fa-fw fa-plus"></i> Tambah Data Pelanggan</a>
                  </div>
                    <form action="/pelanggan">
                        <div class="float-right input-group mb-2 ml-4 col-md-4">
                            <input type="text" name="cari" id="cari" class="form-control"
                            placeholder="Cari " value="{{ $cari }}">
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
            {{-- <th>@sortablelink('kode_pelanggan','Kode Pelanggan')</th> --}}
            <th>@sortablelink('nama_pelanggan','Nama Pelanggan')</th>
            <th>@sortablelink('alamat','Alamat')</th>
            <th>@sortablelink('email','Email')</th>
            <th>@sortablelink('no_telp','Telephone')</th>
            <th width="7%">Aksi</th>
          </tr>
        </thead>
        <tbody>
        @php
            $nomor = 1 + (($pelanggan->currentPage()-1)* $pelanggan->perPage());
        @endphp
          @foreach ($pelanggan as $item)
          <tr>
            <th scope="row"></th>
            <td>{{ $nomor++ }}</td>
            <td>{{ $item->nama_pelanggan }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->no_telp }}</td>
            <td class="text-center">
            <form action="{{ url('pelanggan/'.$item->id) }}" method="POST">
              @method('DELETE')
              @csrf
                <a class="btn btn-primary btn-xs" href="{{ url('pelanggan/'.$item->id.'/edit') }}"><i class="fas fa-edit"></i></a>
                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button>
            </form>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {!! $pelanggan->appends(Request::except('page'))->render() !!}
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
