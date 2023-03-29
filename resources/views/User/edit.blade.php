@extends('adminlte::page')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                <h5 class="text pt-2"><b>Edit Data User</h5></b>
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
            @foreach ($user as $item )
            <form method="post" action="{{ url('user/'.$item->id) }}" id="myForm">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $item->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" value="{{ $item->email }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" value="">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control @error('role')
                    is-invalid @enderror" autofocus>

                        <option value="">Pilih Role</option>
                        <option value="admin" {{$item->role == admin ? 'selected' : ''}}>Administrator</option>
                        <option value="staf" {{$item->role == staf ? 'selected' : ''}}>Staf</option>

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
