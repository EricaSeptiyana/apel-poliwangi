<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\jabatan;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename='Data Jabatan';
        $i = 0;
        $data=jabatan::all()->sortDesc();
        return view('admin.jabatan.index', compact('data', 'pagename', 'i'));
        // return view('admin.jabatan.index', );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $data_User=User::all();
        $jabatan = Jabatan::all();
        // $nomorfill = Undangan::max('nomor');
        // $nomormax = $nomorfill + 1;
        // $cek = count($undangan);
        $pagename="Form Input Jabatan";
        return view('admin.jabatan.create', compact('pagename'));
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
            'nama_jabatan'=>'required',
        ]);

        $data_jabatan=new jabatan([
            'nama_jabatan' => $request->get('nama_jabatan'),
        ]);

        // $tanggal = date("d");
        // $tanggalsurat = substr($request->get('date_tanggalsurat'), 8);
        // if($tanggal == $tanggalsurat){
        //     if($nomorfill >= 20){
        //         return redirect('admin/undangan/create')->with('gagal','lebih dari 20');
        //     }
        // }

        $data_jabatan->save();
        return redirect('admin/jabatan')->with('sukses','Data Jabatan Berhasil Dibuat');
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
        $data_jabatan=jabatan::all();
        // $data_User=User::all();
        $pagename='Update Jabatan';
        $data=jabatan::find($id);
        return view('admin.jabatan.edit', compact('data', 'pagename'));
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
            'nama_jabatan'=>'required',
        ]);

        $jabatan = jabatan::find($id);
        $jabatan->nama_jabatan = $request->get('nama_jabatan');

        $jabatan->save();
        return redirect('admin/jabatan')->with('sukses','Jabatan Berhasil Diupdate');
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
        $jabatan=jabatan::find($id);

        $jabatan->delete();
        return redirect('admin/jabatan')->with('sukses','Jabatan Berhasil Dihapus');
    }
}
