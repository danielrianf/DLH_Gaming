<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Jalan</title>
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
    <div class="d-flex head gap-3 border-bottom border-4 border-dark pb-2 mb-3 pt-2">
      <img src="https://i.ibb.co/xMdftRR/air.png" width="105" height="105">
      <div class="row w-100">
        <div class="col-8">
          <h5 class="fw-bold">PT AGRO INDO RAYA</h5>
          <div class="lh-sm">
            <p>Jl. Ir.Soekarno 7B, Dusun Jatirejo Rt 05 Rw 02 Desa Glagahagung,</p>
            <p>Kec. Purwoharjo - Kab. Banyuwangi</p>
            <p>Telepon : 081 230 038 137 / 082 116 289 288</p>
            <p>Email : agroindoraya.pt@gmail.com</p>
          </div>
        </div>
        <div class="col-4 text-center d-flex flex-column justify-content-center pl-3 border-start border-dark my-1">
          <h5 class="mb-0"><b><u>SURAT JALAN</u></b></h5>
          <p><b>No. {{ $suratjln[0]->no_suratjln }}</b></p>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-between">
      <div class="lh-sm no-space mb-4" style="max-width: 350px">
        <p>Kepada Yth.</p>
        <p>{{ $suratjln[0]->pelanggan->nama_pelanggan }}</p>
        {{-- <p>Dusun Kaliwungu RT 35 RW 04,</p> --}}
        <p>{{ $suratjln[0]->pelanggan->alamat }}</p>
      </div>
      <p><b>Tanggal Kirim: {{ $suratjln[0]->tanggal_kirim }}</b></p>
    </div>

    <p class="mb-1">Bersama dengan ini kami kirimkan sejumlah barang berikut ini:</p>
    <table class="w-100 mb-3">
      <thead>
        <tr style="background-color: #ababab">
          <th class="border border-dark text-center py-2" style="max-width: 15px">No.</th>
          <th class="border border-dark text-center py-2">Nama Bibit</th>
          <th class="border border-dark text-center py-2" style="max-width: 40px">Jumlah Bibit</th>
          <th class="border border-dark text-center py-2">Satuan</th>
          <th class="border border-dark text-center py-2">Tanggal Diterima</th>
          <th class="border border-dark text-center py-2">Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border border-dark">
          <td class="border border-dark text-center">1</td>
          <td class="border border-dark px-1">{{ $suratjln[0]->bibit_suratjln }}</td>
          <td class="border border-dark px-1 text-center">{{ $suratjln[0]->qty }}</td>
          <td class="border border-dark px-1 text-center">{{ $suratjln[0]->satuan_suratjln }}</td>
          <td class="border border-dark px-1 text-end"></td>
          <td class="border border-dark px-1">{{ $suratjln[0]->keterangan }}</td>
        </tr>
      </tbody>
    </table>

    <p>Mohon untuk dicek dan diterima.</p>
    <p class="mb-0">Hormat Kami,</p>
    <div class="row">
      <div class="col-3">
        <p>Penanggungjawab</p>
        <br/><br/><br/><br/>
        <p>(<?php for ($i = 0; $i<30; $i++) echo '.' ?>)</p>
      </div>
      <div class="col-5 text-center">
        <p>Pengirim</p>
        <br/><br/><br/><br/>
        <p>(<?php for ($i = 0; $i<30; $i++) echo '.' ?>)</p>
      </div>
      <div class="col-4 text-center">
        <p>Penerima</p>
        <br/><br/><br/><br/>
        <p>(<?php for ($i = 0; $i<30; $i++) echo '.' ?>)</p>
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
</body>
</html>
