<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\perorangann;
use App\kelompokk;
use App\disposisi;
use App\User;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $pagename='Data Surat Disposisi';
        // $i = 0;
        // $data=disposisi::all()->sortDesc();
        // return view('admin.disposisi.index', compact('data', 'pagename', 'i'));
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
        // $disposisi = disposisi::all();
        $pagename="Form Input Surat Disposisi";
        $data=kelompokk::all();

        return view('admin.disposisi.create', compact('pagename', 'data'));
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
            'nomor_agenda'=>'required',
            'tanggal_terima'=>'required',
        ]);

        $data_disposisi=new disposisi([
            'kelompokk_id' => $request->kelompokk_id,
            'nomor_agenda' => $request->nomor_agenda,
            'tanggal_terima' => $request->tanggal_terima,
        ]);

        $data_disposisi->save();

        return redirect('admin/kelompokk')->with('sukses','Surat Disposisi Berhasil Dibuat');
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
        //
        $disposisi=disposisi::find($id);
        $data=kelompokk::find($id);
        // $data=perorangann::With('user')->get();
        // $data=perorangann::With('user')->get();
        // $pagename="Form Input Surat Tugas Kelompok";
        $data_tanggal= $data->waktu_pelaksanaan;
        $tanggal=date('d F Y', strtotime($data_tanggal));
        $day = date('D', strtotime($data_tanggal));
        $list_hari =  array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu',
        );
        $hari=$list_hari[$day];

        return view('admin.disposisi.show', compact('data', 'hari', 'tanggal', 'disposisi'));
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
        // $data_disposisi=disposisi::all();
        // $data_User=User::all();
        // $selectUser=perorangann::find($id);
        // $pagename='Update Surat Disposisi';
        // $data=disposisi::find($id);
        // return view('admin.disposisi.edit', compact('data', 'pagename', 'selectUser', 'data_disposisi' , 'data_User'));
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
        // $request->validate([
        //     'nomor_agenda'=>'required',
        //     'jabatan_penandatangan' => 'required',
        //     'nomor_permohonan'=>'required',
        //     'tanggal_permohonan'=>'required', 
        //     'lampiran'=>'required',
        //     'hal'=>'required',
        // ]);
        // $disposisi = disposisi::find($id);
        // $disposisi->nomor_agenda = $request->get('nomor_agenda');
        // $disposisi->nomor_permohonan = $request->get('nomor_permohonan');
        // $disposisi->lampiran = $request->get('lampiran');
        // $disposisi->hal = $request->get('hal');
        // $disposisi->tanggal_permohonan= $request->get('tanggal_permohonan');
        // $disposisi->jabatan_penandatangan = $request->get('jabatan_penandatangan');

        // $disposisi->save();
        // return redirect('admin/disposisi')->with('sukses','Surat Disposisi Berhasil Diupdate');
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
