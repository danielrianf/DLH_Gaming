<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suratjln;
use App\Http\Controllers\Auth;
use App\Models\pelanggan;
use App\Models\bibit;
use Illuminate\Support\Facades\DB;

class suratjlnController extends Controller
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
            $dataSuratjln = suratjln::all()->with('pelanggan')->sortable()
            ->where('suratjlns.no_suratjln','like','%'.$cari.'%')
            // ->orWhere('suratjlns.nama_bibit','like','%'.$cari.'%')
            ->paginate(5)->onEachSide(1)->fragment('suratjlns');
        }else{
            $dataSuratjln = suratjln::with('pelanggan')->sortable()->paginate(5)->onEachSide(1)->fragment('srtjlns');
        }

        return view('suratjln.suratjln')->with([
            'suratjln' => $dataSuratjln,
            'cari' => $cari,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('/suratjln.create');
        $pel = pelanggan::all();
        $suratjln = suratjln::all();
        // $bibit = bibit::all();
        return view('/suratjln.create', compact('pel','suratjln'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataSuratjln = suratjln::all();
        $request->validate([
            'no_suratjln' => 'required',
            'tanggal_kirim'=> 'required',
            'pelanggan_id'=> 'required',
            // 'bibit_id'=> 'required',
            'bibit_suratjln'=> 'required',
            'qty'=> 'required',
            'satuan_suratjln'=> 'required',
            'keterangan'=> 'required',
        ]);
        suratjln::create($request->all());

        return redirect('/suratjln')->with('success', 'Surat jalan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\suratjln  $suratjln
     * @return \Illuminate\Http\Response
     */
    public function show(suratjln $suratjln)
    {
        $suratjln = suratjln::find($suratjln);
        return view('/suratjln.show', compact('suratjln'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\suratjln  $suratjln
     * @return \Illuminate\Http\Response
     */
    public function edit(suratjln $suratjln)
    {
        $pel = pelanggan::all();
        // $bibit = bibit::all();
        $suratjln = suratjln::find($suratjln);
        return view('/suratjln.edit', compact('pel','suratjln'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\suratjln  $suratjln
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, suratjln $suratjln)
    {
        $request->validate([
        'no_suratjln' => 'required',
        'tanggal_kirim' => 'required',
        'pelanggan_id' => 'required',
        'bibit_suratjln' => 'required',
        'qty' => 'required',
        'satuan_suratjln' => 'required',
        'keterangan' => 'required'
        ]);

        $suratjln->no_suratjln = $request->no_suratjln;
        $suratjln->tanggal_kirim = $request->tanggal_kirim;
        $suratjln->pelanggan_id = $request->pelanggan_id;
        $suratjln->bibit_suratjln= $request->bibit_suratjln;
        $suratjln->qty = $request->qty;
        $suratjln->satuan_suratjln = $request->satuan_suratjln;
        $suratjln->keterangan = $request->keterangan;
        $suratjln->save();

         //jika data berhasil diupdate, akan kembali ke halaman utama
         return redirect('/suratjln')
         ->with('success', 'Data Surat Jalan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\suratjln  $suratjln
     * @return \Illuminate\Http\Response
     */
    public function destroy(suratjln $suratjln)
    {
        $suratjln->delete();
        return redirect('/suratjln')->with('success', 'Data Surat Jalan berhasil dihapus');
    }

    public function print(suratjln $suratjln)
    {
        $suratjln = suratjln::find($suratjln);
        return view('suratjln.print', compact('suratjln'));
    }
}
