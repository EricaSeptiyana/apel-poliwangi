<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\prodi;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename='Data Program Studi';
        $i = 0;
        $data=prodi::all()->sortDesc();
        return view('admin.prodi.index', compact('data', 'pagename', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $prodi = Prodi::all();
        // $nomorfill = Undangan::max('nomor');
        // $nomormax = $nomorfill + 1;
        // $cek = count($undangan);
        $pagename="Form Input Program Studi";
        return view('admin.prodi.create', compact('pagename'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_prodi'=>'required',
        ]);

        $data_prodi = new prodi([
            'nama_prodi' => $request->get('nama_prodi'),
        ]);

        // $tanggal = date("d");
        // $tanggalsurat = substr($request->get('date_tanggalsurat'), 8);
        // if($tanggal == $tanggalsurat){
        //     if($nomorfill >= 20){
        //         return redirect('admin/undangan/create')->with('gagal','lebih dari 20');
        //     }
        // }

        $data_prodi->save();
        return redirect('admin/prodi')->with('sukses','Data Prodi Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data_prodi=prodi::all();
        // $data_User=User::all();
        $pagename='Update Program Studi';
        $data=prodi::find($id);
        return view('admin.prodi.edit', compact('data', 'pagename'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama_prodi'=>'required',
        ]);

        $prodi = prodi::find($id);
        $prodi->nama_prodi = $request->get('nama_prodi');

        $prodi->save();
        return redirect('admin/prodi')->with('sukses','Program Studi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $prodi=prodi::find($id);

        $prodi->delete();
        return redirect('admin/prodi')->with('sukses','Program Studi Berhasil Dihapus');
    }
}
