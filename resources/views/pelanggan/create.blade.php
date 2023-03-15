@extends('adminlte::page')

@section('content')
<div class="container pt-5">
    @if (Session::get('warning'))
    <div class="alert alert-warning" role="alert">
      {{ Session::get('warning') }}
    </div>
    @endif
    <div class="row justify-content-center align-items-center">
      <div class="card" style="width: 24rem;">
        <div class="card-header">
          Tambah Data Pelanggan
        </div>
        <div class="card-body">
          <form method="post" action="{{ url('pelanggan') }}" id="myForm">
            @csrf
            {{-- <div class="form-group">
              <label>Kode Pelanggan</label>
              <input type="text" name="kode_pelanggan" class="form-control @error('kode_pelanggan')
                   is-invalid @enderror" readonly="" value="{{ 'P-' .$kd}}" value="{{ old('kode_pelanggan') }}" autofocus>
              @error('kode_pelanggan')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div> --}}
            <div class="form-group">
              <label>Nama Pelanggan</label>
              <input type="text" name="nama_pelanggan" class="form-control @error('nama_pelanggan') is-invalid @enderror"
              value="{{ old('nama_pelanggan') }}" aria-label="nama_pelanggan" required>
              @error('nama_pelanggan')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
              value="{{ old('alamat') }}" aria-label="alamat" required>
              @error('alamat')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
              value="{{ old('email') }}" aria-label="email" required>
              @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>No Telp</label>
              <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
              value="{{ old('no_telp') }}" aria-label="no_telp" required>
              @error('no_telp')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-30 mb-50">Submit</button>
            <a class="btn btn-success mt-30 mb-50" href="{{ url('pelanggan') }}">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
