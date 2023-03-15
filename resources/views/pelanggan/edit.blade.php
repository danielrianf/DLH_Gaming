@extends('adminlte::page')

@section('content')

<div class="container pt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Edit Data Pelanggan
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
            @foreach ($pelanggan as $item )
            <form method="post" action="{{ url('pelanggan/'.$item->id) }}" id="myForm">
            @method('PUT')
            @csrf
            <div class="form-group">
                {{-- <label for="name">Kode Pelanggan</label>
                <input type="text" name="kode_pelanggan" class="form-control" id="kode_pelanggan" value="{{ $item->kode_pelanggan }}"> --}}
                <label for="email">Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" value="{{ $item->nama_pelanggan}}">
                <label for="writer">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $item->alamat }}">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" value="{{ $item->email}}">
                <label for="writer">No Telp</label>
                <input type="text" name="no_telp" class="form-control" id="no_telp" value="{{ $item->no_telp }}">
            </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
