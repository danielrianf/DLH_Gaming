@extends('adminlte::page')
@section('content')
<main>
  <div class="container">
      <div class="row">
        <div class="col-md-12">
  <div class="card mt-5">
    <div class="card-header">
            <h3 class="card-title"> Data Project</h3>
            <div class="float-right mb-5">
                <a class="btn btn-success" href="{{ url('/project/create') }}"><i class="fas fa-fw fa-plus"></i> Tambah Data Project</a>
              </div>
                <form action="/project">
                    <div class="float-right input-group mb-2 ml-4 col-md-4">
                        <input type="text" name="cari" id="cari" class="form-control"
                        placeholder="Cari" value="{{ $cari }}">
                        <div class="input-group-append">
                            <button class="input-group-text btn btn-info">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
        </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-hover">
  <thead>
    <tr>
        <th></th>
        <th>No</th>
        <th>@sortablelink('kode','Kode')</th>
        <th>@sortablelink('nama_project','Project')</th>
        <th>@sortablelink('sub_project','Sub Project')</th>
        <!-- <th>@sortablelink('harga','Harga Jual')</th>
        <th>@sortablelink('satuan','Satuan')</th>
        <th>@sortablelink('stok','Stok')</th> -->
        <th width="7%">Aksi</th>
      </tr>
    </thead>
    <tbody>
    </div>
      @foreach ($project as $item)
      <tr>
        <th scope="row"></th>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->kode }}</td>
        <td>{{ $item->nama_project }}</td>
        <td>{{ $item->sub_project }}</td>
        <!-- <td>{{ $item->harga }}</td>
        <td>{{ $item->satuan }}</td>
        <td>{{ $item->stok }}</td> -->
        @if (auth()->user()->role == 'admin')
        <td class="text-center">
        <form action="{{ url('project/'.$item->id) }}" method="POST">
          @method('DELETE')
          <!-- @endif -->
          @csrf
            {{-- <a class="btn btn-info btn-xs" href="{{ route('project.show',$project->id) }}"><i class="fas fa-fw fa-eye"></i></a> --}}
            @if (auth()->user()->role == 'admin')
            <a class="btn btn-primary btn-xs" href="{{ url('project/'.$item->id.'/edit') }}"><i class="fas fa-edit"></i></a>
            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button>
            @endif
        </form>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $project->appends(Request::except('page'))->render() !!}
</div>
</div>
  </div>
</div>
</main>
@section('footer')
<strong>Copyright &copy; 2023 <a href="">Dinas Lingkungan Hidup Banyuwangi</a>.</strong>
All rights reserved.
@stop
@endsection
