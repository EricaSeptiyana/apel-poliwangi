<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\pelaporann;
use APP\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
        $pagename='Data Laporan Hasil Perjalanan Dinas';
        $i = 0;

        $data=pelaporann::where('user_id', Auth::user()->id)->get()->sortDesc();
        $acc='disetujui';
        $role=Auth::user()->name;
        if(str_contains(strtolower($role), 'keuangan')){
            $data=pelaporann::all()->sortDesc();
            return view('admin.pelaporann.index', compact('data', 'pagename', 'i', 'role'));
        }
        return view('admin.pelaporann.index', compact('data', 'pagename', 'i', 'acc', 'role'));
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
        $pagename="Form Input Laporan Hasil Perjalanan Dinas";
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
     
        $request->validate([
            'judul_laporan'=>'required',
            'dasar_pelaksanaan'=>'required',
            'maksud_perjalanandinas'=>'required',
            'instansi'=>'required',
            'waktu_mulai'=>'required',
            'hasil'=>'required',
            'penutup'=>'required',
            'tanggal_surat'=>'required',
            'penanda_tangan'=>'required',
        ]);

        $data_pelaporann = new pelaporann;
        $data_pelaporann->judul_laporan = $request->input('judul_laporan');
        $data_pelaporann->user_id = Auth::user()->id;
        $data_pelaporann->dasar_pelaksanaan = $request->input('dasar_pelaksanaan');
        $data_pelaporann->maksud_perjalanandinas = $request->input('maksud_perjalanandinas');
        $data_pelaporann->instansi = $request->input('instansi');
        $data_pelaporann->waktu_mulai = $request->input('waktu_mulai');
        $data_pelaporann->waktu_selesai = $request->input('waktu_selesai');
        $data_pelaporann->hasil = $request->input('hasil');
        $data_pelaporann->penutup = $request->input('penutup');
        $data_pelaporann->tanggal_surat = $request->input('tanggal_surat');
        $data_pelaporann->penanda_tangan = $request->input('penanda_tangan');
        if($request->hasFile('foto_kegiatan')) {
            $request->file('foto_kegiatan')->move('fotoKegiatan1/', $request->file('foto_kegiatan')->getClientOriginalName());
            $data_pelaporann->foto_kegiatan = $request->file('foto_kegiatan')->getClientOriginalName();
        }
        if($request->hasFile('foto_kegiatan2')) {
            $request->file('foto_kegiatan2')->move('fotoKegiatan2/', $request->file('foto_kegiatan2')->getClientOriginalName());
            $data_pelaporann->foto_kegiatan2 = $request->file('foto_kegiatan2')->getClientOriginalName();
        }
        if($request->hasFile('foto_kegiatan3')) {
            $request->file('foto_kegiatan3')->move('fotoKegiatan3/', $request->file('foto_kegiatan3')->getClientOriginalName());
            $data_pelaporann->foto_kegiatan3 = $request->file('foto_kegiatan3')->getClientOriginalName();
        }
        if($request->hasFile('dokumen_pendukung')) {
            $request->file('dokumen_pendukung')->move(public_path('file/'), $request->file('dokumen_pendukung')->getClientOriginalName());
            $data_pelaporann->dokumen_pendukung = $request->file('dokumen_pendukung')->getClientOriginalName();
        }
        
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
        $datas=pelaporann::select('pelaporanns.*','users.*')
            ->join('users','pelaporanns.penanda_tangan','=','users.id')
            ->where('pelaporanns.id',$id)
            ->get();
     
        foreach ($datas as $data) {
            
       }
        
        return view('admin.pelaporann.show', compact('data'));
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
        $pagename='Update Laporan Hasil Perjalanan Dinas';
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
            'penanda_tangan'=>'required', //penandatangan
            'dasar_pelaksanaan'=>'required',
            'maksud_perjalanandinas'=>'required',
            'instansi'=>'required',
            'waktu_mulai'=>'required',
            'hasil'=>'required',
            'penutup'=>'required',
            'tanggal_surat'=>'required',
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
        $pelaporann->penutup = $request->get('penutup');
        $pelaporann->tanggal_surat = $request->get('tanggal_surat');
        $pelaporann->penanda_tangan = $request->get('penanda_tangan');

        if($request->hasFile('foto_kegiatan')) {
            if(File::exists('fotoKegiatan1/'. $pelaporann->foto_kegiatan)) {
                File::delete('fotoKegiatan1/'. $pelaporann->foto_kegiatan);
            }
            $request->file('foto_kegiatan')->move('fotoKegiatan1/', $request->file('foto_kegiatan')->getClientOriginalName());
            $pelaporann->foto_kegiatan = $request->file('foto_kegiatan')->getClientOriginalName();
        }
        if($request->hasFile('foto_kegiatan2')) {
            $request->file('foto_kegiatan2')->move('fotoKegiatan2/', $request->file('foto_kegiatan2')->getClientOriginalName());
            $pelaporann->foto_kegiatan2 = $request->file('foto_kegiatan2')->getClientOriginalName();
        }
        if($request->hasFile('foto_kegiatan3')) {
            $request->file('foto_kegiatan3')->move('fotoKegiatan3/', $request->file('foto_kegiatan3')->getClientOriginalName());
            $pelaporann->foto_kegiatan3 = $request->file('foto_kegiatan3')->getClientOriginalName();
        }
        if($request->hasFile('dokumen_pendukung')) {
            $request->file('dokumen_pendukung')->move(public_path('file/'), $request->file('dokumen_pendukung')->getClientOriginalName());
            $pelaporann->dokumen_pendukung = $request->file('dokumen_pendukung')->getClientOriginalName();
        }

        $pelaporann->save();
        return redirect('admin/pelaporann')->with('sukses','Pelaporan Hasil Perjalanan Dinas Berhasil Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $laporan_id=$request->input('laporan_id');
        $pelaporann=pelaporann::find($laporan_id);

        $pelaporann->delete();
        return redirect('admin/pelaporann')->with('sukses','Pelaporan Hasil Perjalanan Dinas Berhasil Dihapus');
    }

    //ACC PELAPORAN
    public function acc(Request $request, $id)
    {
        //
        // $pagename='Data Laporan Perjalanan Dinas Disetujui';
        // $i = 0;
        $acc='disetujui';
        $data=pelaporann::all()->where('status',$acc)->sortDesc();
        $pelaporann=pelaporann::find($id);
        $pelaporann->status='disetujui';
        $pelaporann->save();

        return redirect()->back();
    }
    
    //UNDUH DOKUMEN PENDUKUNG PERJADIN
    public function getDokumenPendukungfile($id)
    {
        $filedokumenpendukung = pelaporann::find($id);
  
        $file_path = public_path('file/' . $filedokumenpendukung->dokumen_pendukung);
        return response()->download($file_path);
    }
}
