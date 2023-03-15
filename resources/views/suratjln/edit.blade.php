@extends('adminlte::page')

@section('content')

<div class="container pt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 40rem;">
            <div class="card-header">
            Edit Data Surat Jalan
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @foreach ($suratjln as $item )
            <form method="post" action="{{ url('suratjln/'.$item->id) }}" id="myForm">
            @method('PUT')
            @csrf
            <div class="col">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nomor Surat Jalan</label>
                    </div>
                    <div class="col-3 col-md-5">
                        <input type="text" name="no_suratjln" class="form-control" id="no_suratjln" value="{{ $item->no_suratjln }}">
                        <small class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Tanggal Kirim</label>
                    </div>
                    <div class="col-3 col-md-5">
                        <input type="date" name="tanggal_kirim" class="form-control" id="tanggal_kirim" value="{{ $item->tanggal_kirim }}">
                        <small class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Pelanggan</label>
                    </div>
                    <div class="col-3 col-md-5">
                        <select class="form-control select2" style="width: 100%;" name="pelanggan_id" id="pelanggan_id">
                            <option disabled value>Pilih Pelanggan</option>
                            <option disabled value="{{ $item->pelanggan_id}}">{{ $item->pelanggan->nama_pelanggan}}</option>
                            @foreach ($pel as $pelanggan)
                            <option value="{{ $pelanggan->id}}">{{ $pelanggan->nama_pelanggan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nama Bibit</label>
                    </div>
                    <div class="col-3 col-md-5">
                        <input type="input" name="bibit_suratjln" class="form-control" id="bibit_suratjln" value="{{ $item->bibit_suratjln }}">
                        <small class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Qty</label>
                    </div>
                    <div class="col-3 col-md-2">
                        <input type="number" name="qty" class="form-control" id="qty" value="{{ $item->qty }}">
                        <small class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Satuan</label>
                    </div>
                    <div class="col-3 col-md-5">
                        <input type="text" name="satuan_suratjln" class="form-control" id="satuan_suratjln" value="{{ $item->satuan_suratjln }}">
                        <small class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class=" form-control-label">Keterangan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="textarea" name="keterangan" class="form-control" id="keterangan" rows="9" style="height: 100px" value="{{ $item->keterangan }}">
                    </div>
                </div>
                <div class="footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                    <a class="btn btn-danger text-white" href="{{url('suratjln')}}" type="reset">Kembali</a>
                </div>
            </div>
            </form>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
