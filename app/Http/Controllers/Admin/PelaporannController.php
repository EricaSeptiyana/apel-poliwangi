<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\pelaporann;
use APP\User;

class PelaporannController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename='Data Pelaporan Hasil Perjalanan Dinas';
        $i = 0;
        $data=pelaporann::all()->sortDesc();
        return view('admin.pelaporann.index', compact('data', 'pagename', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_User=User::all();
        $pelaporann = pelaporann::all();
        // $nomorfill = pelaporann::max('nomor');
        // $nomormax = $nomorfill + 1;
        // $cek = count($pelaporann);
        $pagename="Form Input Pelaporan Hasil PerjalanaN Dinas";
        return view('admin.pelaporann.create', compact('pagename', 'data_User'));
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
        // $nomormax = pelaporann::max('nomor');
        // $nomorfill = $nomormax + 1;

        $request->validate([
            'judul_laporan'=>'required',
            'dasar_pelaksanaan'=>'required',
            'maksud_perjalanandinas'=>'required',
            'instansi'=>'required',
            'waktu_mulai'=>'required',
            'waktu_selesai'=>'required',
            'hasil'=>'required',
            // 'txt_tempat'=>'required',
            'date_tanggalsurat'=>'required',
            'optionid_user'=>'required',
        ]);

        $data_pelaporann=new pelaporann([
            'judul_laporan' => $request->get('judul_laporan'),
            'dasar_pelaksanaan' => $request->get('dasar_pelaksanaan'),
            'maksud_perjalanandinas' => $request->get('maksud_perjalanandinas'),
            'instansi' => $request->get('instansi'),
            'waktu_mulai' => $request->get('waktu_mulai'),
            'waktu_selesai' => $request->get('waktu_selesai'),
            'hasil' => $request->get('hasil'),
            'tanggal_surat' => $request->get('date_tanggalsurat'),
            'penanda_tangan' => $request->get('optionid_user'),
        ]);

        // $tanggal = date("d");
        // $tanggalsurat = substr($request->get('date_tanggalsurat'), 8);
        // if($tanggal == $tanggalsurat){
        //     if($nomorfill >= 20){
        //         return redirect('admin/pelaporann/create')->with('gagal','lebih dari 20');
        //     }
        // }

        $data_pelaporann->save();
        return redirect('admin/pelaporann')->with('sukses','Pelaporan Hasil Perjalanan Dinas Berhasil Diajukan');
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
        $data_pelaporann=pelaporann::all();
        $data_User=User::all();
        // $nomorfill = pelaporann::max('nomor');
        // $nomormax = $nomorfill + 1;
        $pagename='Update Pelaporan Hasil Perjalanan Dinas';
        $data=pelaporann::find($id);
        return view('admin.pelaporann.edit', compact('data', 'pagename', 'data_pelaporann' , 'data_User'));
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
            'judul_laporan'=>'required',
            'optionid_user'=>'required', //penandatangan
            'dasar_pelaksanaan'=>'required',
            'maksud_perjalanandinas'=>'required',
            'instansi'=>'required',
            'waktu_mulai'=>'required',
            'waktu_selesai'=>'required',
            'hasil'=>'required',
            'date_tanggalsurat'=>'required',
            // 'int_nomor'=>'required',
            // 'int_kode'=>'required',
            // 'string_jenissurat' => 'required',
            // 'year_tahunsurat' => 'required',
        ]);

        $pelaporann = pelaporann::find($id);
        $pelaporann->judul_laporan = $request->get('judul_laporan');
        $pelaporann->dasar_pelaksanaan = $request->get('dasar_pelaksanaan');
        $pelaporann->maksud_perjalanandinas = $request->get('maksud_perjalanandinas');
        $pelaporann->instansi = $request->get('instansi');
        $pelaporann->waktu_mulai = $request->get('waktu_mulai');
        $pelaporann->waktu_selesai = $request->get('waktu_selesai');
        $pelaporann->hasil = $request->get('hasil');
        $pelaporann->tanggal_surat = $request->get('date_tanggalsurat');
        // $pelaporann->nomor = $request->get('int_nomor');
        // $pelaporann->kode_surat = $request->get('int_kode');
        // $pelaporann->jenis_surat = $request->get('string_jenissurat');
        // $pelaporann->tahun_surat = $request->get('year_tahunsurat');
        $pelaporann->penanda_tangan = $request->get('optionid_user');

        $pelaporann->save();
        return redirect('admin/pelaporann')->with('sukses','Pelaporan Hasil Perjalanan Dinas Berhasil Diupdate');

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
        $pelaporann=pelaporann::find($id);

        $pelaporann->delete();
        return redirect('admin/pelaporann')->with('sukses','Pelaporan Hasil Perjalanan Dinas Berhasil Dihapus');
    }
}
