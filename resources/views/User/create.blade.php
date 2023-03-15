@extends('adminlte::page')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">
            <h5 class="text pt-2"><b>Tambah Data User</h5></b>
        </div>
        <div class="card-body">
            <form method="post" action="{{ url('user') }}" id="myForm">
            @csrf
                
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control @error('name')
                    is-invalid @enderror" value="{{ old('name') }}" autofocus >
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control @error('email')
                    is-invalid @enderror" value="{{ old('email') }}" autofocus >
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control @error('password')
                    is-invalid @enderror" value="{{ old('password') }}" autofocus >
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password Confirmation</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation')
                    is-invalid @enderror" value="{{ old('password_confirmation') }}" autofocus >
                    @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <select name="role" id="" class="form-control @error('role')
                    is-invalid @enderror" autofocus>

                        <option value="">Pilih Role</option>
                        <option value="admin">Administrator</option>
                        <option value="manajer">Manajer</option>

                    </select>
                    @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-success" href="{{ url('user') }}">Kembali</a>
            </form>
            </div>
        </div>
    </div>
    </div>
@endsection
