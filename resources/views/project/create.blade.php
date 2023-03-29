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
        Tambah Data Project
      </div>
      <div class="card-body">
        <form method="post" action="{{ url('project') }}" id="myForm">
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
            <label>Project</label>
            <input type="text" name="nama_project" class="form-control @error('nama_project')
                    is-invalid @enderror" value="{{ old('nama_project') }}" autofocus>
            @error('nama_project')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Sub Project</label>
            <input type="text" name="sub_project" class="form-control @error('sub_project')
                    is-invalid @enderror" value="{{ old('sub_project') }}" autofocus>
            @error('sub_project')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <!-- <div class="form-group">
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
          </div> -->
          <button type="submit" class="btn btn-primary mt-30 mb-50">Submit</button>
          <a class="btn btn-success mt-30 mb-50" href="{{ url('bibit') }}">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
