<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Throwable;
use App\Models\pelanggan;
use Illuminate\Support\Facades\DB;

class pelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Baru
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        if(!empty($cari)){
            $dataPelanggan = pelanggan::sortable()
            ->where('pelanggans.nama_pelanggan','like','%'.$cari.'%')
            ->orWhere('pelanggans.alamat','like','%'.$cari.'%')
            ->orWhere('pelanggans.email','like','%'.$cari.'%')
            ->orWhere('pelanggans.no_telp','like','%'.$cari.'%')
            ->paginate(5)->onEachSide(1)->fragment('pelanggan');
        }else{
            $dataPelanggan = pelanggan::sortable()->paginate(5)->onEachSide(1)->fragment('pelanggan');
        }

        return view('pelanggan.pelanggan')->with([
            'pelanggan' => $dataPelanggan,
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
        return view('/pelanggan.create', compact('pelanggan'));
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
            'nama_pelanggan'=> 'required',
            'alamat'=> 'required',
            'email'=> 'required',
            'no_telp'=> 'required'
        ]);
        pelanggan::create($request->all());
        return redirect('/pelanggan')->with('success', 'Data pelanggan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(pelanggan $pelanggan)
    {
        $pelanggan = pelanggan::find($pelanggan);
        return view('/pelanggan.detail', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(pelanggan $pelanggan)
    {
        $pelanggan = pelanggan::find($pelanggan);
        return view('/pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pelanggan $pelanggan)
    {
        $request->validate([
            'nama_pelanggan'=> 'required',
            'alamat'=> 'required',
            'email'=> 'required',
            'no_telp'=> 'required'
        ]);

        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->email = $request->email;
        $pelanggan->no_telp = $request->no_telp;
        $pelanggan->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect('/pelanggan')
            ->with('success', 'Data pelanggan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect('/pelanggan')->with('success', 'Data Pelanggan berhasil dihapus');
    }
}
