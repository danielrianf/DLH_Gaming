<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use Illuminate\Support\Facades\DB;

class projectController extends Controller
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
            $dataProject = project::sortable()
            ->where('projects.kode','like','%'.$cari.'%')
            ->orWhere('projects.nama_project','like','%'.$cari.'%')
            ->orWhere('projects.sub_project','like','%'.$cari.'%')
            // ->orWhere('projects.harga','like','%'.$cari.'%')
            // ->orWhere('projects.satuan','like','%'.$cari.'%')
            // ->orWhere('project.stok','like','%'.$cari.'%')
            ->paginate(5)->onEachSide(1)->fragment('project');
        }else{
            $dataProject = project::sortable()->paginate(5)->onEachSide(1)->fragment('project');
        }
        return view('project.project')->with([
            'project' => $dataProject,
            'cari' => $cari,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create() {
        $project = project::all();
        $q = DB::table('projects')->select(DB::raw('MAX(RIGHT(kode,3)) as kode'));
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
        return view('/project.create', compact('project','kd'));
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
            'nama_project'=> 'required',
            'sub_project'=> 'required'
            // 'harga'=> 'required',
            // 'satuan'=> 'required',
            // 'stok'=> 'required'
        ],
        [
            'nama_project.required' => 'Nama project tidak boleh kosong!',
            'sub_project.required' => 'Harus diisi!',
            // 'harga.required' => 'harga tidak boleh kosong!',
            // 'satuan.required' => 'harus diisi!',
            // 'stok' => 'harus diisi!',
        ]
    );

        project::create($request->all());
        return redirect('/project')->with('success', 'Project berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bibit  $bibit
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        $project = bibit::find($bibit);
        return view('/project.detail', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bibit  $bibit
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        $project = project::find($project);
        return view('/project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bibit  $bibit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bibit $project)
    {
        $request->validate([
            'kode' => 'required',
            'nama_project'=> 'required',
            'sub_project'=> 'required'
            // 'harga'=> 'required',
            // 'satuan'=> 'required',
            // 'stok'=> 'required'
        ]);

        $project->kode = $request->kode;
        $project->nama_project = $request->nama_project;
        $project->sub_project = $request->sub_project;
        // $bibit->harga = $request->harga;
        // $bibit->satuan = $request->satuan;
        // $bibit->stok = $request->stok;
        $bibit->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect('/project')
            ->with('success', 'Project Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bibit  $bibit
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        $project->delete();
        return redirect('/project')->with('success', 'project berhasil dihapus');
    }
}
