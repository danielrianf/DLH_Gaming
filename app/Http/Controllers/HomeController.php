<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\pelanggan;
use App\Models\bibit;
use App\Models\suratjln;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Cbibit= bibit::count();
        $Cpelanggan= pelanggan::count();
        $Ctransaksi= transaksi::where('status', 'baru')->count();
        $Lunas= transaksi::where('status', 'selesai')->count();
        $CtransAll= transaksi::count();
        $Csuratjln= suratjln::count();
        $totalPenjualan = transaksi::selectRaw('sum(total_harga + ongkir) as RP')->get();

        // coba
        $TRansaksi = transaksi::select(DB::raw("CAST(SUM(total_harga) as int) as total_harga"))
        ->GroupBy(DB::raw("Month(tanggal_transaksi)"))
        ->pluck('total_harga');

        $bulan = transaksi::select(DB::raw("MONTHNAME(tanggal_transaksi) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(tanggal_transaksi)"))
        ->orderBy('tanggal_transaksi','ASC')
        ->pluck('bulan');

        // sampai ini
        return view('home', compact('Cbibit','Cpelanggan','Ctransaksi','totalPenjualan','TRansaksi',
        'bulan','Csuratjln','CtransAll','Lunas'));
    }
}
