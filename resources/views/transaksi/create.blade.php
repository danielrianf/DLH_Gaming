@extends('adminlte::page')

@section('content')
<div class="mx-4">
    <form method="post" role="form" action="{{ action('App\Http\Controllers\transaksiController@store') }}" class="row">
      @method('POST')
      @csrf
      {{-- Card pertama --}}
      <div class="col-4">
        <div class="card card-warning mt-5">
          <div class="card-header text-center">
            Tambah Transaksi
          </div>
          <div class="card-body">
              <div class="form-group">
                  <label>No. Invoice</label>
                  <input type="text" name="invoice" class="form-control @error('invoice')
                           is-invalid @enderror" readonly="" value="{{ '2002/INV/' .$inv}}" value="{{ old('invoice') }}" autofocus>
                  @error('invoice')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
            <div class="form-group">
              <label>Tanggal Transaksi</label>
              <input type="date" name="tanggal_transaksi" class="form-control @error('tanggal_transaksi')
                  is-invalid @enderror" value="{{ old('tanggal_transaksi') }}" required>
              @error('tanggal_transaksi')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Nama Pelanggan</label>
              <select class="form-control select2" style="width: 100%;" name="pelanggan_id" id="pelanggan_id">
                <option disabled value>Pilih Pelanggan</option>
                @foreach ($pelanggan as $data_pelanggan)
                <option value="{{ $data_pelanggan->id}}">{{ $data_pelanggan->nama_pelanggan }}</option>
                @endforeach
              </select>
            </div>
            <div class="input-group">
              <label>Ongkir</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp</span>
                <input type="number" name="ongkir" class="form-control @error('ongkir')
                  is-invalid @enderror" value="{{ old('ongkir') }}" aria-label="ongkir" min="0">
              </div>
            </div>
            <div class="input-group">
              <label>DP (Down Payment)</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp</span>
                <input type="number" name="dp" class="form-control @error('dp')
                  is-invalid @enderror" value="{{ old('dp') }}" aria-label="dp" min="0">
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control select2" style="width: 100%;" name="status">
                    <option value=Baru>Baru</option>
                    <option value=Proses>Proses</option>
                    <option value=Lunas>Lunas</option>
                    <option value=Selesai>Selesai</option>
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="input-group">
                  <label>Diskon</label>
                  <div class="input-group mb-3">
                    <input type="number" name="diskon" class="form-control @error('diskon')
                is-invalid @enderror" value="{{ old('diskon') }}" aria-label="diskon" min="0" max="100">
                    <span class="input-group-text" id="basic-addon1">%</span>
                  </div>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary mt-30 mb-50">Submit</button>
            <a class="btn btn-success mt-30 mb-50" href="{{ url('transaksi') }}">Kembali</a>
          </div>
        </div>
      </div>
      {{-- Sampai ini --}}

      {{-- Card kedua yang samping --}}
      <div class="col-md-8">
        <div class="card card-warning mt-5">
          <div class="card-header d-flex align-items-center">
            <h5 class="card-title flex-grow-1">Detail</h5>
            <button class="btn btn-success btn-add" type="button">+</button>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Bibit</th>
                  <th>Qty</th>
                  <th>Harga Satuan</th>
                  <th>Sub Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="item in model.bibit" class="item-transaksi" id="item-transaksi-0">
                  <td>
                    <span class="numbering">1</span>
                  </td>
                  <td>
                    <select class="form-control select2 w-100 nama_bibit" name="bibit_id[]">
                      <option disabled value>Pilih Bibit</option>
                      @foreach ($bibit as $val)
                      <option value="{{ $val->id }}" data-harga="{{ $val->harga }}" data-satuan="{{ $val->satuan }}">{{ $val->nama_bibit }}</option>
                      @endforeach
                    </select>
                  </td>
                  {{-- kolom qty --}}
                  <td>
                    <div class="input-group">
                      <input type="number" class="form-control text-center qty" name="qty[]" min="0">
                    </div>
                  </td>
                  {{-- kolom harga satuan --}}
                  <td>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp. </span>
                      </div>
                      <input type="text" class="form-control text-center harga_satuan" format="currency" name="harga_satuan[]" value="{{ $bibit[0]->harga }}" readonly>
                    </div>
                  </td>
                  {{-- kolom sub total --}}
                  <td>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp. </span>
                      </div>
                      <input type="text" class="form-control text-right subtotal" format="currency" name="subtotal[]" value="0" readonly>
                    </div>
                  </td>
                  <td>
                    <button class="btn btn-warning btn-remove" type="button">-</button>
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="4" class="text-right">
                    <h4>Total</h4>
                  </td>
                  <td colspan="2">
                    <h4>
                      Rp. <span id="total">0</span>
                    </h4>
                    <input type="number" name="total_harga" class="d-none">
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
      {{-- Sampai ini --}}
    </form>
  </div>
  @section('js')
  <script>
    let item_transaksi = document.getElementById("item-transaksi-0");

    $('.btn-add').bind('click', function() {
      let clone = item_transaksi.cloneNode(true);
      let numbering = $(clone).children('td').children('.numbering')

      document.querySelector("table tbody").appendChild(clone);
      setNumbering()
      bibitQtyListener()
      setTotalHarga()

      $('.item-transaksi .btn-remove').unbind('click')
      $('.item-transaksi .btn-remove').bind('click', function() {
        let item_transaksi = $(this).closest('.item-transaksi')
        item_transaksi.remove();

        setNumbering()
        setTotalHarga()
      })
    });

    bibitQtyListener()

    function bibitQtyListener() {
      $('.item-transaksi .qty').unbind('input')
      $('.item-transaksi .qty').bind('input', function() {
        setHarga(this)
      })

      $('.item-transaksi .nama_bibit').unbind('input')
      $('.item-transaksi .nama_bibit').bind('input', function() {
        setHarga(this)
      })
    }

    function setHarga(_this) {
      let parent = $(_this)
        .closest('.item-transaksi')
        .children('td')
      let qty = parent.children().children('.qty')
      let bibit = parent.children('.nama_bibit').find(":selected")

      parent.children().children('.harga_satuan').val(bibit.data('harga'))
      parent.children().children('.subtotal').val(bibit.data('harga') * qty.val())

      setTotalHarga()
    }

    function setTotalHarga() {
      let total = 0
      $('.subtotal').each(function() {
        total += +$(this).val()
      })
      $('#total').text(total)
      $('#total').parent().siblings('input').val(total)
    }

    function setNumbering() {
      $('.numbering').each(function(i) {
        $(this).text(i + 1)
      })
    }
  </script>
  @stop
@endsection
