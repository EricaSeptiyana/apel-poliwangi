<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\kelompok;
use APP\User;

class KelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename='Data Surat Tugas Kelompok';
        $data=kelompok::all();
        return view('admin.kelompok.index', compact('data', 'pagename'));
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
        $kelompok = Kelompok::all();
        $nomorfill = Kelompok::max('nomor');
        $nomormax = $nomorfill + 1;
        // $cek = count($perorangan);
        $pagename="Form Input Surat Tugas Kelompok";
        return view('admin.kelompok.create', compact('pagename', 'data_User', 'nomormax'));
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
        //
        //
        //dd($request);
        // $bulan = date('n');
        // $romawi = getRomawi($bulan);
        // $tahun = date('Y');
        // $nomor = "/LP".$romawi."/".$tahun;

        $nomormax = Kelompok::max('nomor');
        $nomorfill = $nomormax + 1;
        // $tanggal = date("d");
        // $tanggalsurat = substr($request->get('date_tanggalsurat'), 8);

        // if($nomorfill >= 20){
        //     return redirect('admin/perorangan/create')->with('gagal','lebih dari 20');
        // }

        $request->validate([
            'txt_pembuka'=>'required',
            'jenis_kegiatan'=>'required',
            'waktu_mulai'=>'required',
            'waktu_selesai'=>'required',
            'txt_tempat'=>'required',
            'file_undangan'=>'required',
            'file_disposisi'=>'required',
            'date_tanggalsurat'=>'required',
            // 'int_nomor'=>'required',
            'int_kode'=>'required',
            'string_jenissurat' => 'required',
            'year_tahunsurat' => 'required',
            'nama'=>'required',
            // 'nip_nipppk'=>'required', 
            'txt_jabatan'=>'required',
        ]);

        $data_kelompok=new kelompok([
            'pembuka' => $request->get('txt_pembuka'),
            'jenis_kegiatan' => $request->get('jenis_kegiatan'),
            'waktu_mulai' => $request->get('waktu_mulai'),
            'waktu_selesai' => $request->get('waktu_selesai'),
            'tempat' => $request->get('txt_tempat'),
            'tanggal_surat' => $request->get('date_tanggalsurat'),
            'file_undangan' => $request->get('file_undangan'),
            'file_disposisi' => $request->get('file_disposisi'),
            // 'nomor' => $request->get('int_nomor'),
            'nomor' => $nomorfill,
            'kode_surat' => $request->get('int_kode'),
            'jenis_surat' => $request->get('string_jenissurat'),
            'tahun_surat' => $request->get('year_tahunsurat'),
            'penanda_tangan' => $request->get('optionid_user'),
            'nama' => $request->get('txt_nama'),
            // 'nip_nipppk' => $request->get('nip_nipppk'),
            'jabatan' => $request->get('txt_jabatan'),
        ]);

        // $tanggal = date("d");
        // $tanggalsurat = substr($request->get('date_tanggalsurat'), 8);
        // if($tanggal == $tanggalsurat){
        //     if($nomorfill >= 20){
        //         return redirect('admin/perorangan/create')->with('gagal','lebih dari 20');
        //     }
        // }

        $data_kelompok->save();
        return redirect('admin/kelompok')->with('sukses','Surat Tugas Kelompok Berhasil Diajukan');
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
    }
}
