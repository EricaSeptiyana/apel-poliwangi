<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\undangan;
use APP\User;

class UndanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename='Data Surat Undangan';
        $data=undangan::all();
        return view('admin.undangan.index', compact('data', 'pagename'));
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
        $undangan = Undangan::all();
        $nomorfill = Undangan::max('nomor');
        $nomormax = $nomorfill + 1;
        $cek = count($undangan);
        $pagename="Form Input Surat Undangan";
        return view('admin.undangan.create', compact('pagename', 'data_User', 'nomormax', 'cek'));
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
        //dd($request);
        // $bulan = date('n');
        // $romawi = getRomawi($bulan);
        // $tahun = date('Y');
        // $nomor = "/LP".$romawi."/".$tahun;

        $nomormax = Undangan::max('nomor');
        $nomorfill = $nomormax + 1;
        // $tanggal = date("d");
        // $tanggalsurat = substr($request->get('date_tanggalsurat'), 8);

        // if($nomorfill >= 20){
        //     return redirect('admin/undangan/create')->with('gagal','lebih dari 20');
        // }

        $request->validate([
            'txt_tertuju'=>'required',
            'optionid_user'=>'required', //penandatangan
            'txt_tertuju'=>'required',
            'txt_instansi'=>'required',
            'txt_agenda'=>'required',
            'date_haritanggal'=>'required',
            'time_pukul'=>'required',
            'txt_tempat'=>'required',
            'date_tanggalsurat'=>'required',
            // 'int_nomor'=>'required',
            'int_kode'=>'required',
            'string_jenissurat' => 'required',
            'year_tahunsurat' => 'required',
        ]);

        $data_undangan=new undangan([
            'tertuju' => $request->get('txt_tertuju'),
            'instansi' => $request->get('txt_instansi'),
            'agenda' => $request->get('txt_agenda'),
            'hari_tanggal' => $request->get('date_haritanggal'),
            'pukul' => $request->get('time_pukul'),
            'tempat' => $request->get('txt_tempat'),
            'tanggal_surat' => $request->get('date_tanggalsurat'),
            // 'nomor' => $request->get('int_nomor'),
            'nomor' => $nomorfill,
            'kode_surat' => $request->get('int_kode'),
            'jenis_surat' => $request->get('string_jenissurat'),
            'tahun_surat' => $request->get('year_tahunsurat'),
            'penanda_tangan' => $request->get('optionid_user'),
        ]);

        $tanggal = date("d");
        $tanggalsurat = substr($request->get('date_tanggalsurat'), 8);
        if($tanggal == $tanggalsurat){
            if($nomorfill >= 20){
                return redirect('admin/undangan/create')->with('gagal','lebih dari 20');
            }
        }

        $data_undangan->save();
        return redirect('admin/undangan')->with('sukses','Surat Undangan Berhasil Diajukan');
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
        $data_undangan=undangan::all();
        $data_User=User::all();
        // $nomorfill = Undangan::max('nomor');
        // $nomormax = $nomorfill + 1;
        $pagename='Update Surat Undangan';
        $data=undangan::find($id);
        return view('admin.undangan.edit', compact('data', 'pagename', 'data_undangan' , 'data_User'));
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
            'txt_tertuju'=>'required',
            'optionid_user'=>'required', //penandatangan
            'txt_tertuju'=>'required',
            'txt_instansi'=>'required',
            'txt_agenda'=>'required',
            'date_haritanggal'=>'required',
            'time_pukul'=>'required',
            'txt_tempat'=>'required',
            'date_tanggalsurat'=>'required',
            'int_nomor'=>'required',
            'int_kode'=>'required',
            'string_jenissurat' => 'required',
            'year_tahunsurat' => 'required',
        ]);

        $undangan = undangan::find($id);
        $undangan->tertuju = $request->get('txt_tertuju');
        $undangan->instansi = $request->get('txt_instansi');
        $undangan->agenda = $request->get('txt_agenda');
        $undangan->hari_tanggal= $request->get('date_haritanggal');
        $undangan->pukul = $request->get('time_pukul');
        $undangan->tempat = $request->get('txt_tempat');
        $undangan->tanggal_surat = $request->get('date_tanggalsurat');
        $undangan->nomor = $request->get('int_nomor');
        $undangan->kode_surat = $request->get('int_kode');
        $undangan->jenis_surat = $request->get('string_jenissurat');
        $undangan->tahun_surat = $request->get('year_tahunsurat');
        $undangan->penanda_tangan = $request->get('optionid_user');

        $undangan->save();
        return redirect('admin/undangan')->with('sukses','Surat Undangan Berhasil Diupdate');

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
        $undangan=undangan::find($id);

        $undangan->delete();
        return redirect('admin/undangan')->with('sukses','Surat Undangan Berhasil Dihapus');
    }
}
