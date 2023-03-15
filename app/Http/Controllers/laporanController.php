<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Throwable;
use App\Models\laporan;
use App\Models\transaksi;
use App\Models\detailtran;
use Illuminate\Support\Facades\DB;

class laporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = array('title' => 'Form Laporan Penjualan');
        $dataLaporan = transaksi::with('pelanggan');
        return view('laporan.index')->with([
            'data' => $data,
            'dataLaporan' => $dataLaporan,
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */

    public function show(transaksi $transaksi)
    {
        // $transaksi = transaksi::all();
        // $hitungTransaksi = transaksi::count();
        // $totalPerBulan = transaksi::selectRaw('sum(total_harga + ongkir) as l')->get();
        // return view('/laporan.show', compact('transaksi','hitungTransaksi','totalPerBulan'));
    }

    // public function cetak(transaksi $transaksi) {
    //     $transaksi = transaksi::all();
    //     return view('/laporan.cetak', compact('transaksi'));
    //   }

      //coba
      public function CetakDataPertanggal($tglawal, $tglakhir)
      {
        $hitungTransaksi = transaksi::whereBetween('tanggal_transaksi', [$tglawal, $tglakhir])->get();
        $num_rows = count($hitungTransaksi);
        $amount = transaksi::all()->whereBetween('tanggal_transaksi',[$tglawal, $tglakhir])->sum(function($t){
            return $t->total_harga + $t->ongkir;
        });
        $CetakDataPerTanggal = transaksi::with('pelanggan')->whereBetween('tanggal_transaksi', [$tglawal, $tglakhir])
        ->get();
        return view('/laporan.show', compact('CetakDataPerTanggal','hitungTransaksi','num_rows','amount'));
    }
}
