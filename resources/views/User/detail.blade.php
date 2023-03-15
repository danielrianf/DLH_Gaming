@extends('adminlte::page')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                <h5 class="text pt-2"><b>Detail Data User</h5></b>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach ($user as $item)
                    <li class="list-group-item"><b>Nama : </b>{{$item->name}}</li>
                    <li class="list-group-item"><b>Email: </b>{{$item->email}}</li>
                    <li class="list-group-item"><b>Role: </b>{{$item->role}}</li>
                    @endforeach
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ url('/user') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection
