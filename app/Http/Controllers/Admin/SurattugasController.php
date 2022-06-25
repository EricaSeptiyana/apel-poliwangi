<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\surattugas;
use App\kelompokk;
use App\User;


class SurattugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //
        // $data_User=User::all();
        // $disposisi = Disposisi::all();
        $pagename="Form Input Surat Tugas";
        $data_User=User::all();
        // $data=kelompokk::find($id);

        return view('admin.surattugas.create', compact('pagename', 'data_User'));
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
        // $data = Disposisi::all();
        $request->validate([
            'nomor_surattugas'=>'required',
            'pembuka'=>'required',
            'penutup' => 'required',
            'tanggal_surattugas'=>'required',
            'namattd_surattugas'=>'required', 
            // 'nipttd_surattugas'=>'required', 
            // 'jabatanttd_surattugas'=>'required', 
            // 'lampiran'=>'required',
            // 'hal'=>'required',
        ]);
        $data_surattugas=new surattugas([
            'nomor_surattugas' => $request->get('nomor_surattugas'),
            'pembuka' => $request->get('pembuka'),
            'penutup' => $request->get('penutup'),
            'tanggal_surattugas' => $request->get('tanggal_surattugas'),
            'namattd_surattugas' => $request->get('namattd_surattugas'),
            'nipttd_surattugas' => $request->get('nipttd_surattugas'),
            'jabatanttd_surattugas' => $request->get('jabatanttd_surattugas'),
            // 'jabatan_penandatangan' => $request->get('jabatan_penandatangan'),
            // 'nomor_permohonan' => $request->get('nomor_permohonan'),
            // 'tanggal_permohonan' => $request->get('tanggal_permohonan'),
            // 'lampiran' => $request->get('lampiran'),
            // 'hal' => $request->get('hal'),
        ]);
        $data_surattugas->save();
        return redirect('admin/kelompokk')->with('sukses','Surat Tugas Berhasil Dibuat');
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
        //
        // $perorangann=perorangann::find($id);
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

        return view('admin.surattugas.show_perorangan', compact('data', 'hari', 'tanggal'));
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
