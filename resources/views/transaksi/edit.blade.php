@extends('adminlte::page')

@section('content')

<div class="container pt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Edit Status Transaksi
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
            @foreach ($transaksi as $item )
            <form method="post" action="{{ url('transaksi/'.$item->id) }}" id="myForm">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>Tanggal Transaksi</label>
                <input type="date" name="tanggal_transaksi" class="form-control" id="name" value="{{ $item->tanggal_transaksi }}">
            </div>
            <div class="form-group">
                <label>Nama Pelanggan</label>
                <select class="form-control select2" style="width: 100%;" name="pelanggan_id" id="pelanggan_id">
                    <option disabled value>Pilih Pelanggan</option>
                    <option disabled value="{{ $item->pelanggan_id}}">{{ $item->pelanggan->nama_pelanggan}}</option>
                    @foreach ($pel as $pelanggan)
                    <option value="{{ $pelanggan->id}}">{{ $pelanggan->nama_pelanggan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                    <label>Status</label>
                    <select class="form-control select2" style="width: 100%;" name="status">
                        <option value=Baru>Baru</option>
                        <option value=Proses>Proses</option>
                        <option value=Selesai>Selesai</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
