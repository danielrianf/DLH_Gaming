<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bibit;
use Illuminate\Support\Facades\DB;

class bibitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //coba
    public function index(Request $request)
    {
        $cari = $request->query('cari');
        if(!empty($cari)){
            $dataBibit = bibit::sortable()
            ->where('bibits.kode','like','%'.$cari.'%')
            ->orWhere('bibits.nama_bibit','like','%'.$cari.'%')
            ->orWhere('bibits.modal','like','%'.$cari.'%')
            ->orWhere('bibits.harga','like','%'.$cari.'%')
            ->orWhere('bibits.satuan','like','%'.$cari.'%')
            ->orWhere('bibits.stok','like','%'.$cari.'%')
            ->paginate(5)->onEachSide(1)->fragment('bibit');
        }else{
            $dataBibit = bibit::sortable()->paginate(5)->onEachSide(1)->fragment('bibit');
        }
        return view('bibit.bibit')->with([
            'bibit' => $dataBibit,
            'cari' => $cari,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create() {
        $bibit = bibit::all();
        $q = DB::table('bibits')->select(DB::raw('MAX(RIGHT(kode,3)) as kode'));
        $kd="";
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return view('/bibit.create', compact('bibit','kd'));
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
            'kode' => 'required',
            'nama_bibit'=> 'required',
            'modal'=> 'required',
            'harga'=> 'required',
            'satuan'=> 'required',
            'stok'=> 'required'
        ],
        [
            'nama_bibit.required' => 'Nama bibit tidak boleh kosong!',
            'modal.required' => 'Harus diisi!',
            'harga.required' => 'harga tidak boleh kosong!',
            'satuan.required' => 'harus diisi!',
            'stok' => 'harus diisi!',
        ]
    );

        bibit::create($request->all());
        return redirect('/bibit')->with('success', 'Bibit berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bibit  $bibit
     * @return \Illuminate\Http\Response
     */
    public function show(bibit $bibit)
    {
        $bibit = bibit::find($bibit);
        return view('/bibit.detail', compact('bibit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bibit  $bibit
     * @return \Illuminate\Http\Response
     */
    public function edit(bibit $bibit)
    {
        $bibit = bibit::find($bibit);
        return view('/bibit.edit', compact('bibit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bibit  $bibit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bibit $bibit)
    {
        $request->validate([
            'kode' => 'required',
            'nama_bibit'=> 'required',
            'modal'=> 'required',
            'harga'=> 'required',
            'satuan'=> 'required',
            'stok'=> 'required'
        ]);

        $bibit->kode = $request->kode;
        $bibit->nama_bibit = $request->nama_bibit;
        $bibit->modal = $request->modal;
        $bibit->harga = $request->harga;
        $bibit->satuan = $request->satuan;
        $bibit->stok = $request->stok;
        $bibit->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect('/bibit')
            ->with('success', 'Bibit Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bibit  $bibit
     * @return \Illuminate\Http\Response
     */
    public function destroy(bibit $bibit)
    {
        $bibit->delete();
        return redirect('/bibit')->with('success', 'Bibit berhasil dihapus');
    }
}
