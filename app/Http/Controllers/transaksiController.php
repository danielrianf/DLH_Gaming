<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\detailtran;
use App\Models\pelanggan;
use Illuminate\Http\Request;
use App\Models\transaksi;

use Illuminate\Support\Facades\DB;

class transaksiController extends Controller
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
            $dataTransaksi = transaksi::with('pelanggan')->sortable()
              ->where('transaksis.tanggal_transaksi','like','%'.$cari.'%')
              ->paginate(7)->onEachSide(1)->fragment('trans');
        }else{
            $dataTransaksi = transaksi::with('pelanggan')->sortable()->paginate(7)->onEachSide(1)->fragment('trans');
        }
        return view('transaksi.transaksi')->with([
            'transaksi' => $dataTransaksi,
            'cari' => $cari,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create() {
        $pelanggan = pelanggan::all();
        $transaksi = transaksi::all();
        $project = project::all();
        if ($project->isEmpty()) {
          return redirect('/project/create')->with('warning', 'Data project masih kosong, tambahkan terlebih dahulu!');
        } else if ($pelanggan->isEmpty()) {
          return redirect('/pelanggan/create')->with('warning', 'Belum memiliki data staff, tambahkan terlebih dahulu!');
        }

        // coba
        $q = DB::table('transaksis')->select(DB::raw('MAX(RIGHT(invoice,3)) as invoice'));
        $inv="";
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->invoice)+1;
                $inv = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $inv = "001";
        }
        // sampai ini

        return view('transaksi.create', compact('pelanggan','transaksi', 'project','inv'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'invoice' => 'required',
            'tanggal_transaksi' => 'required',
            'pelanggan_id'=> 'required',
            'status'=> 'required'
        ]);

        $transaksi_id = DB::table('transaksis')->insertGetId([
          'invoice' => $request->invoice,
          'tanggal_transaksi' => $request->tanggal_transaksi,
          'pelanggan_id' => $request->pelanggan_id,
          'status' => $request->status,
        //   'ongkir' => $request->ongkir,
        //   'diskon' => $request->diskon,
        //   'total_harga' => $request->total_harga,
        ]);

        $detailtrans = [];
        foreach ($request->project_id as $i => $detail) {
          array_push($detailtrans, [
            // 'harga_jual' => $request->harga_satuan[$i],
            // 'jumlah' => $request->qty[$i],
            // 'diskon' => 0,
            'project_id' => $request->project_id[$i],
            'transaksi_id' => $transaksi_id,
            // 'subtotal' => $request->subtotal[$i],
          ]);
        }
        // return json_encode($detailtrans);
        DB::table('detailtrans')->insert($detailtrans);
        // transaksi::create($request->all());
        return redirect('/transaksi')->with('success', 'Transaksi berhasil ditambahkan');
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(transaksi $transaksi)
    {
        $detail_trans = $transaksi->detail_transaksi;
        return view('/transaksi.detail', compact('transaksi', 'detail_trans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(transaksi $transaksi)
    {
        $pel = pelanggan::all();
        $transaksi = transaksi::with('pelanggan')->find($transaksi);
        return view('/transaksi.edit', compact('pel','transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaksi $transaksi)
    {
        $request->validate([
            'tanggal_transaksi' => 'required',
            'pelanggan_id' => 'required',
            'status'=> 'required'
        ]);

        $transaksi->tanggal_transaksi = $request->tanggal_transaksi;
        $transaksi->pelanggan_id = $request->pelanggan_id;
        $transaksi->status= $request->status;
        $transaksi->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect('/transaksi')
            ->with('success', 'transaksi Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = transaksi::find($id);
        $transaksi->hapus_transaksi();
        return redirect('/transaksi')->with('success', 'transaksi berhasil dihapus');
    }
}
