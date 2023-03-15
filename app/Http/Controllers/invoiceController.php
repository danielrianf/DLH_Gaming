<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;

class invoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        if(!empty($cari)){
            $dataInvoice = transaksi::with('pelanggan')->sortable()
              ->where('transaksis.invoice','like','%'.$cari.'%')
              ->orWhere('transaksis.tanggal_transaksi','like','%'.$cari.'%')
              ->orWhere('transaksis.pelanggan_id','like','%'.$cari.'%')
              ->paginate(7)->onEachSide(1)->fragment('trans');
        }else{
            $dataInvoice = transaksi::with('pelanggan')->sortable()->paginate(7)->onEachSide(1)->fragment('trans');
        }

        return view('invoice.invoice')->with([
            'invoice' => $dataInvoice,
            'cari' => $cari,
        ]);
    }

    public function print(transaksi $transaksi) {
      $detail_trans = $transaksi->detail_transaksi;
      return view('invoice.print', compact('transaksi', 'detail_trans'));
    }
}
