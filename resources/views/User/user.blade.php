@extends('adminlte::page')

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    <div class="card mt-5">
        <div class="card-header ">
            <div class="text">
                <h3 class="card-title"> Data User</h3>
            </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if (auth()->user()->role == 'admin')
    <div class="float-right mb-4 mr-2">
        <a class="btn btn-success" href="{{ url('/user/create') }}"><i class="fas fa-fw fa-plus"></i> Tambah User</a>
    </div>
    @endif

    <!-- Kode untuk form pencarian / SEARCH -->
    <form action="/user">
        <div class="float-right input-group mb-2 ml-4 col-md-4">
            <input type="text" name="search" value="{{ $search }}"
            placeholder="Cari User" aria-label="Amount (to the nearest dollar)" class="form-control" >
            <div class="input-group-append">
                <button class="input-group-text btn btn-info">cari</button>
            </div>
        </div>
    </form>

    <table class="table table-hover">
        <thead>
        <tr>
            <th></th>
            <th>No</th>
            <th>@sortablelink('name','Nama')</th>
            <th>@sortablelink('email','Email')</th>
            <th>@sortablelink('role','Role')</th>
            @if (auth()->user()->role == 'admin')
            <th width="10%">Aksi</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @php
            $nomor = 1 + (($users->currentPage()-1)* $users->perPage());
        @endphp
        @foreach ($users as $user)
        <tr>
            <th scope="row"></th>
            <td>{{ $nomor++ }}</td>
            <td>{{ $user->name}}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            {{-- @if (auth()->user()->role == 'admin') --}}
            <td class="text-center">
            <form action="{{ url('user/'.$user->id) }}" method="POST">
            @method('DELETE')
            @csrf

            <a class="btn btn-info btn-xs" href="{{ route('user.show',$user->id) }}"><i class="fas fa-fw fa-eye"></i> </a>

            @if (auth()->user()->role == 'admin')

            <a class="btn btn-primary btn-xs" href="{{ url('user/'.$user->id.'/edit') }}"><i class="fas fa-edit"></i> </a>

            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-fw fa-trash-alt"></i> </button>
            </form>
        </td>
        @endif
        </tr>
        @endforeach
    </tbody>
</table>
{!! $users->appends(Request::except('page'))->render() !!}
</div>
</div>
</div>
</div>
</div>
</main>
@section('footer')
        <strong>Copyright &copy; 2022 <a href="">PT Agro Indo Raya</a>.</strong>
        All rights reserved.
    @stop
@endsection
