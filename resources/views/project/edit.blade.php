@extends('adminlte::page')
@section('content')
<div class="container pt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Edit Project
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
            @foreach ($project as $item )
            <form method="post" action="{{ url('project/'.$item->id) }}" id="myForm">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Kode</label>
                <input type="text" name="kode" class="form-control" id="kode" value="{{ $item->kode }}">
                <label for="email">Project</label>
                <input type="text" name="nama_project" class="form-control" id="nama_project" value="{{ $item->nama_project }}">
                <label for="writer">Sub Project</label>
                <input type="text" name="sub_project" class="form-control" id="sub_project" value="{{ $item->sub_project }}">
                <!-- <label for="writer">Harga</label>
                <input type="text" name="harga" class="form-control" id="harga" value="{{ $item->harga }}">
                <label for="writer">Satuan</label>
                <input type="text" name="satuan" class="form-control" id="satuan" value="{{ $item->satuan }}">
                <label for="writer">Stok</label>
                <input type="text" name="stok" class="form-control" id="stok" value="{{ $item->stok }}"> -->
            </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
