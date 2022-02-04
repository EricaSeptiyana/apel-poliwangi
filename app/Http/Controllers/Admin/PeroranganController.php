<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\perorangan;
use APP\User;

class PeroranganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename='Data Surat Tugas Perorangan';
        $data=perorangan::all();
        return view('admin.perorangan.index', compact('data', 'pagename'));
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
        $perorangan = Perorangan::all();
        $nomorfill = Perorangan::max('nomor');
        $nomormax = $nomorfill + 1;
        // $cek = count($perorangan);
        $pagename="Form Input Surat Tugas Perorangan";
        return view('admin.perorangan.create', compact('pagename', 'data_User', 'nomormax'));
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
        //dd($request);
        // $bulan = date('n');
        // $romawi = getRomawi($bulan);
        // $tahun = date('Y');
        // $nomor = "/LP".$romawi."/".$tahun;

        $nomormax = Perorangan::max('nomor');
        $nomorfill = $nomormax + 1;
        // $tanggal = date("d");
        // $tanggalsurat = substr($request->get('date_tanggalsurat'), 8);

        // if($nomorfill >= 20){
        //     return redirect('admin/perorangan/create')->with('gagal','lebih dari 20');
        // }

        $request->validate([
            'txt_pembuka'=>'required',
            'nama'=>'required',
            'nip_nipppk'=>'required', 
            'txt_jabatan'=>'required',
            'jenis_kegiatan'=>'required',
            'waktu_mulai'=>'required',
            'waktu_selesai'=>'required',
            'txt_tempat'=>'required',
            'date_tanggalsurat'=>'required',
            // 'int_nomor'=>'required',
            'int_kode'=>'required',
            'string_jenissurat' => 'required',
            'year_tahunsurat' => 'required',
        ]);

        $data_perorangan=new perorangan([
            'pembuka' => $request->get('txt_pembuka'),
            'nama' => $request->get('txt_nama'),
            'nip_nipppk' => $request->get('nip_nipppk'),
            'jabatan' => $request->get('txt_jabatan'),
            'jenis_kegiatan' => $request->get('jenis_kegiatan'),
            'waktu_mulai' => $request->get('waktu_mulai'),
            'waktu_selesai' => $request->get('waktu_selesai'),
            'tempat' => $request->get('txt_tempat'),
            'tanggal_surat' => $request->get('date_tanggalsurat'),
            // 'nomor' => $request->get('int_nomor'),
            'nomor' => $nomorfill,
            'kode_surat' => $request->get('int_kode'),
            'jenis_surat' => $request->get('string_jenissurat'),
            'tahun_surat' => $request->get('year_tahunsurat'),
            'penanda_tangan' => $request->get('optionid_user'),
        ]);

        // $tanggal = date("d");
        // $tanggalsurat = substr($request->get('date_tanggalsurat'), 8);
        // if($tanggal == $tanggalsurat){
        //     if($nomorfill >= 20){
        //         return redirect('admin/perorangan/create')->with('gagal','lebih dari 20');
        //     }
        // }

        $data_perorangan->save();
        return redirect('admin/perorangan')->with('sukses','Surat Tugas Perorangan Berhasil Diajukan');
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
        $data_perorangan=perorangan::all();
        $data_User=User::all();
        $pagename='Update Surat Tugas Perorangan';
        $data=perorangan::find($id);
        return view('admin.perorangan.edit', compact('data', 'pagename', 'data_perorangan' , 'data_User'));
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
            'txt_pembuka'=>'required',
            'optionid_user'=>'required', //penandatangan
            'txt_nama'=>'required',
            'nip_nipppk'=>'required',
            'txt_jabatan'=>'required',
            'jenis_kegiatan'=>'required',
            'waktu_mulai'=>'required',
            'waktu_selesai'=>'required',
            'txt_tempat'=>'required',
            'date_tanggalsurat'=>'required',
            'int_nomor'=>'required',
            'int_kode'=>'required',
            'string_jenissurat' => 'required',
            'year_tahunsurat' => 'required',
        ]);

        $perorangan = perorangan::find($id);
        $perorangan->pembuka = $request->get('txt_pembuka');
        $perorangan->nama = $request->get('txt_nama');
        $perorangan->nip_nipppk = $request->get('nip_nipppk');
        $perorangan->jabatan= $request->get('txt_jabatan');
        $perorangan->jenis_kegiatan = $request->get('jenis_kegiatan');
        $perorangan->waktu_mulai = $request->get('waktu_mulai');
        $perorangan->waktu_selesai = $request->get('waktu_selesai');
        $perorangan->tempat = $request->get('txt_tempat');
        $perorangan->tanggal_surat = $request->get('date_tanggalsurat');
        $perorangan->nomor = $request->get('int_nomor');
        $perorangan->kode_surat = $request->get('int_kode');
        $perorangan->jenis_surat = $request->get('string_jenissurat');
        $perorangan->tahun_surat = $request->get('year_tahunsurat');
        $perorangan->penanda_tangan = $request->get('optionid_user');

        $perorangan->save();
        return redirect('admin/perorangan')->with('sukses','Surat Tugas Perorangan Berhasil Diupdate');
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
        $perorangan=perorangan::find($id);

        $perorangan->delete();
        return redirect('admin/perorangan')->with('sukses','Surat Tugas Perorangan Berhasil Dihapus');
    }
}
