{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Penjualan</title>
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
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta name="csrf-token" content="{{ csrf_token }}"> --}}
    <style>
        table.static {
            position: relative;
            /* left: 3% */
            border: 1px solid #543535
        }
    </style>
    <title>CETAK LAPORAN PENJUALAN </title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Penjualan Setiap Bulan</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Invoice</th>
                <th>Ongkir</th>
                <th>Diskon</th>
                <th>Sub Total</th>
                <th>Total Harga</th>
              </tr>
              @foreach ($transaksi as $item)
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
        </table>
    </div>
    {{-- cetak otomatis --}}
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
