<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <style>
    body {
      height: 297mm;
      width: 210mm;
      /* to centre page on screen*/
      margin-left: auto;
      margin-right: auto;
    }
    table {
      border-collapse: collapse;
    }
    .fab-container {
      position: fixed;
      bottom: 20px;
      right: 20px;
    }
    .head p,
    .no-space p {
      padding: 0;
      margin: 0;
    }

    .spelling-text {
      position: fixed;
      top: 20px;
      right: 20px;
    }
    @media print {
      body {
        visibility: hidden;
      }
      #printable {
        visibility: visible;
      }
    }
  </style>
</head>

<body>
  <div style="font-family: 'Times New Roman', Times, serif" id="printable">
    <div class="d-flex head gap-3 border-bottom border-2 border-dark pb-2 mb-2">
      <img src="https://i.ibb.co/xMdftRR/air.png" width="105" height="105" class="mt-2">
      <div>
        <h5 class="fw-bold">PT AGRO INDO RAYA</h5>
        <p>Jl. Ir.Soekarno 7B, Dusun Jatirejo Rt 05 Rw 02 Desa Glagahagung,</p>
        <p>Kec. Purwoharjo - Kab. Banyuwangi</p>
        <p>Telepon : 081 230 038 137 / 082 116 289 288</p>
        <p>Email : agroindoraya.pt@gmail.com</p>
      </div>
    </div>

    <div class="d-flex justify-content-between">
      <table>
        <tr>
          <td>No. Nota</td>
          <td>: {{ $transaksi->invoice }}</td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td>: {{ $transaksi->tanggal_transaksi }}</td>
        </tr>
        <tr>
          <td>Pembayaran</td>
          <td>: Transfer/Cash</td>
        </tr>
      </table>
      <div class="border border-dark border-2 rounded-3 p-2">
        <table>
          <tr>
            <td rowspan="2" valign="top">Kepada :</td>
            <td>{{ $transaksi->pelanggan->nama_pelanggan }}</td>
          </tr>
          <tr>
            <td style="max-width: 350px;">{{ $transaksi->pelanggan->alamat }}</td>
          </tr>
        </table>
      </div>
    </div>

    <p class="text-center fw-bold mb-0">INVOICE</p>
    <table class="w-100">
      <thead>
        <tr style="background-color: #ababab">
          <th class="border border-dark text-center py-2" style="max-width: 15px">No.</th>
          <th class="border border-dark text-center py-2">Nama Barang</th>
          <th class="border border-dark text-center py-2" style="max-width: 40px">Jumlah (polibag)</th>
          <th class="border border-dark text-center py-2">Pajak</th>
          <th class="border border-dark text-center py-2">Harga Satuan</th>
          <th class="border border-dark text-center py-2">Total Harga</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($detail_trans as $i => $detail)
        <tr class="border border-dark">
          <td class="border border-dark text-center">{{ $i+1 }}</td>
          <td class="border border-dark px-1">{{ $detail->bibit->nama_bibit }}</td>
          <td class="border border-dark px-1 text-center">{{ $detail->jumlah }}</td>
          <td class="border border-dark px-1 text-center">{{ $detail->pajak ? $detail->pajak.'%' : '-' }}</td>
          <td class="border border-dark px-1 text-end">Rp. {{ $detail->harga_jual }}</td>
          <td class="border border-dark px-1 text-end">Rp. {{ $detail->subtotal }}</td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td rowspan="5" colspan="4">
            <div class="m-2 p-3 border border-dark text-center">
              <p class="mb-0">Total Terbilang :</p>
              <h5><b>"<span id="total-terbilang">-tuliskan terlebih dahulu di pojok kanan atas-</span>"</b></h5>
            </div>
          </td>
          <th class="border border-dark text-center">TOTAL</th>
          <td class="border border-dark px-1 text-end">Rp. {{ $transaksi->total_harga }}</td>
        </tr>
        <tr>
          <th class="border border-dark text-center">ONGKIR</th>
          <td class="border border-dark px-1 text-end">Rp. {{ $transaksi->ongkir ?? 0 }}</td>
        </tr>
        <tr>
          <th class="border border-dark text-center">DISKON</th>
          <td class="border border-dark px-1 text-end">{{ $transaksi->diskon ?? 0 }}%</td>
        </tr>
        <tr>
          <th class="border border-dark text-center">DP</th>
          <td class="border border-dark px-1 text-end">Rp. {{ $transaksi->dp ?? 0 }}</td>
        </tr>
        <tr>
          <th class="border border-dark text-center">SISA</th>
          <td class="border border-dark px-1 text-end">Rp. {{ $transaksi->total_harga + $transaksi->ongkir - $transaksi->dp ?? 0 }}</td>
        </tr>
      </tfoot>
    </table>
    <table class="mt-1 w-100">
      <tr>
        <td class="py-1 px-2 border border-dark text-center" style="width: 150px">
          <div class="">
            <p>DITERIMA OLEH</p>
            <br /><br />
            <p>(
              <?php for ($i = 0; $i < 15; $i++)
                echo '&#8287;&#8287';
              ?>
              )</p>
          </div>
        </td>
        <td class="py-1 px-2 border border-dark text-center" style="width: 150px">
          <div class="">
            <p>HORMAT KAMI</p>
            <br /><br />
            <p>(
              <?php for ($i = 0; $i < 15; $i++)
                echo '&#8287;&#8287';
              ?>
              )</p>
          </div>
        </td>
        <td class="py-1 px-2 border border-dark">
          <div class="no-space">
            <p>Pembayaran ditransfer ke Rek : BCA 8980579973 a.n PT.AGRO INDO RAYA</p>
            <p>Pembayaran dianggap Lunas, bila dana sudah masuk rekening kami.</p>
            <p><b>Pembayaran Down Payment (DP) minimal 50%, sisa pembayaran/pelunasan wajb di transfer saat barang dikirimkan.</b></p>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <div class="spelling-text">
    <div class="card p-3">
      <div class="form-group">
        <label>Tuliskan Total Terbilang :</label>
        <input type="text" name="total-terbilang" class="form-control" placeholder="contoh: Lima Ribu Rupiah" aria-label="invoice" required>
      </div>
    </div>
  </div>

  <div class="fab-container">
    <div class="fab-content">
      <button class="btn btn-primary rounded" onclick="print()">
        Print <i class="fas fa-print"></i>
      </button>
    </div>
  </div>

  <script src="{{ asset('js/jquery.slim.min.js') }}"></script>
  <script>
    let a = 'ad'
    $('[name="total-terbilang"]').on('keyup', function() {
      console.log($(this).val());
      $('#total-terbilang').text($(this).val())
    });
  </script>
</body>

</html>
