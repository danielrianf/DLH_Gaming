@extends('adminlte::page')

@section('judul')
    Form cetak laporan
@endsection
@section('content')

{{-- MENAMPILKAN LAPORAN ARUS KAS MASUK DARI FAKTUR PENJUALAN --}}

<div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card mt-5">
            <div class="card-body">
                <table style="width: 100%">
                    <tr>
                        <td align="center">
                            <span style="line-height: 1.6; font-weight:bold;">
                                LAPORAN PENJUALAN PERTANGGAL
                                <br>PT AGRO INDO RAYA
                            </span>
                        </td>
                    </tr>
                </table>
                <hr class="line-title">
          <div class="card-body">
            <div class="row">
              <div class="col col-lg-4 col-md-4">
                <h4 class="text-center">Ringkasan Transaksi</h4>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td>Total Penjualan</td>
                    <td>Rp. {{ $amount }}</td>
                  </tr>
                  <tr>
                    <td>Total Transaksi</td>
                    <td>{{ $num_rows }}</td>
                  </tr>
                </tbody>
                </table>
              </div>
              <div class="col col-lg-8 col-md-8">
                <h5 class="text-center">Rincian Transaksi</h5>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Invoice</th>
                          <th>Ongkir</th>
                          <th>Diskon</th>
                          <th>Sub Total</th>
                          <th>Total Harga</th>
                        </tr>
                      </thead>
                    <tbody>
                @foreach ($CetakDataPerTanggal as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal_transaksi}}</td>
                    <td>{{ $item->invoice }}</td>
                    <td>Rp. {{ $item->ongkir }}</td>
                    <td>{{ $item->diskon }}</td>
                    <td>Rp. {{ $item->total_harga }}</td>
                    <td>Rp. {{ $item->total_harga + $item->ongkir + $item->diskon ?? 0 }}</td>
                </tr>
                @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    window.print();
</script>
@endsection
