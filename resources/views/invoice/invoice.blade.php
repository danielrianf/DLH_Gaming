@extends('adminlte::page')
@section('content')

<main>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card mt-5">
              <div class="card-header">
                <h3 class="card-title"> Invoice</h3>
                <form action="/invoice">
                  <div class="float-right input-group mb-2 ml-4 col-md-4">
                    <input type="text" name="cari" id="cari" class="form-control" placeholder="Cari" value="{{ $cari }}">
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
                    <th>@sortablelink('invoice','No Invoice')</th>
                    <th>@sortablelink('pelanggan_id->nama_pelanggan','Nama Pelanggan')</th>
                    <th>@sortablelink('tanggal_transaksi','Tanggal Invoice')</th>
                    <!-- <th>@sortablelink('total_harga','Total Harga')</th> -->
                    <th width="10%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @php
                    $nomor = 1 + (($invoice->currentPage()-1)* $invoice->perPage());
                @endphp
            </div>
            @foreach ($invoice as $item)
            <tr>
              <th scope="row"></th>
              <td>{{ $nomor++ }}</td>
              <td>{{ $item->invoice }}</td>
              <td>{{ $item->pelanggan->nama_pelanggan }}</td>
              <td>{{ $item->tanggal_transaksi }}</td>
              <!-- <td>Rp. {{ $item->total_harga }}</td> -->
              <td class="text-center">
                <!-- <form action="{{ url('invoice/'.$item->id) }}" method="POST">
                  @method('DELETE')
                  @csrf -->
                  {{-- <a class="btn btn-primary btn-xs" href="{{ url('invoice/'.$item->id.'/edit') }}"><i class="fas fa-edit"></i></a> --}}
                  <a class="btn btn-info btn-xs" href="/invoice/print/{{ $item->id }}">
                    <i class="fas fa-print"></i>
                  </a>
                  <!-- <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button> -->
                <!-- </form> -->
              </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            {!! $invoice->appends(Request::except('page'))->render() !!}
          </div>
        </div>
      </div>
    </main>
    @section('footer')
        <strong>Copyright &copy; 2023 <a href="">Dinas Lingkungan Hidup Banyuwangi</a>.</strong>
        All rights reserved.
    @stop
@endsection
