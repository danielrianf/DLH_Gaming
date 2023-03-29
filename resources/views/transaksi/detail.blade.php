@extends('adminlte::page')
@section('judul')
    Detail Transaksi
@endsection
@section('content')
<main>
    <div class="container pt-1">
      <div class="d-flex mb-2 justify-content-between" style="gap: 6px">
        <a class="btn btn-success mt-2" href="{{ url('/transaksi') }}">Kembali</a>
        <a class="btn btn-info mt-2" href="{{ url('/invoice/print/'.$transaksi->id) }}">Print</a>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card w-100">
            <div class="card-header">
              Detail List Project
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Tanggal Transaksi: </b>{{ $transaksi->tanggal_transaksi }} </li>
                <li class="list-group-item"><b>Staf: </b>{{ $transaksi->pelanggan->nama_pelanggan }}</li>
                <li class="list-group-item"><b>Status: </b>{{ $transaksi->status }}</li>
                <!-- <li class="list-group-item"><b>Diskon: </b>{{ $transaksi->diskon ?? 0 }}%</li>
                <li class="list-group-item"><b>Ongkir: </b>Rp. {{ $transaksi->ongkir ?? '-' }}</li>
                <li class="list-group-item"><b>DP: </b>Rp. {{ $transaksi->dp ?? 0 }}</li>
                <li class="list-group-item"><b>Harga: </b>Rp. {{ $transaksi->total_harga }}</li>
                <li class="list-group-item"><b>Total Harga: </b>Rp. {{ $transaksi->total_harga + $transaksi->ongkir ?? 0 }}</li> -->
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card w-100">
            <div class="card-header">
              Daftar Project
            </div>
            <table class="table table-stiped table-bordered table-penjualan mb-0">
              <thead>
                <tr>
                  <th width="5%">No</th>
                  <th width="20%">Nama Project</th>
                  <!-- <th>Qty</th>
                  <th>Harga</th>
                  <th>Sub Total</th> -->
                </tr>
              </thead>
              <tbody>
                <?php $total_harga = 0 ?>
                @foreach ($detail_trans as $i => $detail)
                  <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $detail->project->nama_project }}</td>
                    <!-- <td>{{ $detail->jumlah }}</td>
                    <td>Rp. {{ $detail->harga_jual }}</td>
                    <td>Rp. {{ $detail->subtotal }}</td>
                    <?php $total_harga += $detail->subtotal ?> -->
                  </tr>
                @endforeach
                <tr>
                  <!-- <td colspan="4" class="text-center">Total</td>
                  <td>Rp. {{ $total_harga }}</td> -->
                </tr>
              </tbody>
            </table>
          </div>
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


