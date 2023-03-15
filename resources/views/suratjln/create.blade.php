@extends('adminlte::page')

@section('content')
<div class="container">
    @if (Session::get('warning'))
<div class="alert alert-warning" role="alert">
{{ Session::get('warning') }}
</div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="card mt-5">
<div class="section-body">
    <div class="section-header" style="top: 0; position: sticky; z-index: 890">
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="{{url('/suratjln')}}"></a></div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body card-block">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Surat Jalan</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body card-block">
        {{-- @if($errors->any())
            <div class="alert alert-danger">
                <div class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item" style="color:red">
                            {{ $error }}
                        </li>
                    @endforeach
                </div>
            </div>
            @elseif(session()->get('gagal'))
                    <div class="alert alert-succes" style="color:red">
                    {{session()->get('gagal')}}
                    </div>
                @endif --}}
                    <form method="post" action="{{ url('suratjln') }}" id="myForm">
                        @csrf
                    <div class="col">
                        {{-- <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nomor Surat Jalan</label>
                            </div>
                            <div class="col-3 col-md-3">
                                <input type="string" id="text-input" name="no_suratjln" class="form-control">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div> --}}
                        <div class="row form-group">
                            <div class="col col-md-3">
                            <label>No. Surat Jalan</label>
                            </div>
                            <div class="col col-md-3">
                            <input type="text" name="no_suratjln" class="form-control @error('no_suratjln') is-invalid @enderror"
                            value="{{ old('no_suratjln') }}" placeholder="08.009/PT.AIR/VIII/2022" aria-label="no_suratjln" required>
                          </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal Surat Jalan</label>
                            </div>
                            <div class="col-3 col-md-3">
                                <input type="date" name="tanggal_kirim" class="form-control @error('tanggal_kirim') is-invalid @enderror" value="{{ old('tanggal_kirim') }}" aria-label="tanggal_kirim" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Pelanggan</label>
                            </div>
                            <div class="col-3 col-md-3">
                                <select class="form-control select2" style="width: 100%;" name="pelanggan_id" id="pelanggan_id">
                                    <option disabled value>Pilih Pelanggan</option>
                                    @foreach ($pel as $data_pelanggan)
                                    <option value="{{ $data_pelanggan->id}}">{{ $data_pelanggan->nama_pelanggan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nama Bibit</label>
                            </div>
                            <div class="col-3 col-md-3">
                                <input type="text" name="bibit_suratjln" class="form-control @error('bibit_suratjln') is-invalid @enderror"
                                value="{{ old('bibit_suratjln') }}" aria-label="bibit_suratjln" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Qty</label>
                            </div>
                            <div class="col-3 col-md-2">
                                <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror"
                            value="{{ old('qty') }}" aria-label="qty" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Satuan</label>
                            </div>
                            <div class="col-3 col-md-3">
                                <input type="text" name="satuan_suratjln" class="form-control @error('satuan_suratjln') is-invalid @enderror"
                                value="{{ old('satuan_suratjln') }}" aria-label="satuan_suratjln" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Keterangan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="keterangan" id="text-input" rows="9" style="height: 100px" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                            <a class="btn btn-danger text-white" href="{{url('suratjln')}}" type="reset">Kembali</a>
                        </div>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection
