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
        Tambah Data Bibit
      </div>
      <div class="card-body">
        <form method="post" action="{{ url('bibit') }}" id="myForm">
          @csrf
          <div class="form-group">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control @error('kode')
                     is-invalid @enderror" readonly="" value="{{ 'KB-' .$kd}}" value="{{ old('kode') }}" autofocus>
            @error('kode')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Nama Bibit</label>
            <input type="text" name="nama_bibit" class="form-control @error('nama_bibit')
                    is-invalid @enderror" value="{{ old('nama_bibit') }}" autofocus>
            @error('nama_bibit')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Modal</label>
            <input type="text" name="modal" class="form-control @error('modal')
                    is-invalid @enderror" value="{{ old('modal') }}" autofocus>
            @error('modal')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control @error('harga')
                    is-invalid @enderror" value="{{ old('harga') }}" autofocus>
            @error('harga')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Satuan</label>
            <input type="text" name="satuan" class="form-control @error('satuan')
                    is-invalid @enderror" value="{{ old('satuan') }}" autofocus>
            @error('satuan')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Stok</label>
            <input type="text" name="stok" class="form-control @error('stok')
                    is-invalid @enderror" value="{{ old('stok') }}" autofocus>
            @error('stok')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mt-30 mb-50">Submit</button>
          <a class="btn btn-success mt-30 mb-50" href="{{ url('bibit') }}">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
