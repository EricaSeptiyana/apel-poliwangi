<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $pagename='Data Laporan Hasil Perjalanan Dinas';
        $i = 0;
        $data=pelaporann::all()->sortDesc();
        $acc='disetujui';
        $role=Auth::user()->name;
        if($role=='keuangan'){
            $acc='disetujui';
            $data=pelaporann::all()->where('status',$acc)->sortDesc();
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
        // $nomorfill = pelaporann::max('nomor');
        // $nomormax = $nomorfill + 1;
        // $cek = count($pelaporann);
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
            'penutup'=>'required',
            'date_tanggalsurat'=>'required',
            'optionid_user'=>'required',
        ]);

        // if(empty($imgName)){
        //     $data_pelaporann=new pelaporann([
        //         'judul_laporan' => $request->get('judul_laporan'),
        //         'dasar_pelaksanaan' => $request->get('dasar_pelaksanaan'),
        //         'maksud_perjalanandinas' => $request->get('maksud_perjalanandinas'),
        //         'instansi' => $request->get('instansi'),
        //         'waktu_mulai' => $request->get('waktu_mulai'),
        //         'waktu_selesai' => $request->get('waktu_selesai'),
        //         'hasil' => $request->get('hasil'),
        //         'foto_kegiatan2' => $imgName2,
        //         'foto_kegiatan3' => $imgName3,
        //         'tanggal_surat' => $request->get('date_tanggalsurat'),
        //         'penanda_tangan' => $request->get('optionid_user'),
        //     ]);
        // }

        // if(empty($imgName2)){
        //     $data_pelaporann=new pelaporann([
        //         'judul_laporan' => $request->get('judul_laporan'),
        //         'dasar_pelaksanaan' => $request->get('dasar_pelaksanaan'),
        //         'maksud_perjalanandinas' => $request->get('maksud_perjalanandinas'),
        //         'instansi' => $request->get('instansi'),
        //         'waktu_mulai' => $request->get('waktu_mulai'),
        //         'waktu_selesai' => $request->get('waktu_selesai'),
        //         'hasil' => $request->get('hasil'),
        //         'foto_kegiatan' => $imgName,
        //         'foto_kegiatan3' => $imgName3,
        //         'tanggal_surat' => $request->get('date_tanggalsurat'),
        //         'penanda_tangan' => $request->get('optionid_user'),
        //     ]);
        // }

        // if(empty($imgName3)){
        //     $data_pelaporann=new pelaporann([
        //         'judul_laporan' => $request->get('judul_laporan'),
        //         'dasar_pelaksanaan' => $request->get('dasar_pelaksanaan'),
        //         'maksud_perjalanandinas' => $request->get('maksud_perjalanandinas'),
        //         'instansi' => $request->get('instansi'),
        //         'waktu_mulai' => $request->get('waktu_mulai'),
        //         'waktu_selesai' => $request->get('waktu_selesai'),
        //         'hasil' => $request->get('hasil'),
        //         'foto_kegiatan' => $imgName,
        //         'foto_kegiatan2' => $imgName2,
        //         'tanggal_surat' => $request->get('date_tanggalsurat'),
        //         'penanda_tangan' => $request->get('optionid_user'),
        //     ]);
        // }

        // $imgName = $request->foto_kegiatan->getClientOriginalName() . '-' . time()
        // . '-' . $request->foto_kegiatan->extension();

        // $request->foto_kegiatan->move(public_path() . '/fotokegiatan', $imgName);

        // $imgName2 = $request->foto_kegiatan2->getClientOriginalName() . '-' . time()
        // . '-' . $request->foto_kegiatan2->extension();
        
        // $request->foto_kegiatan2->move(public_path() . '/fotokegiatan2', $imgName2);

        // $imgName3 = $request->foto_kegiatan3->getClientOriginalName() . '-' . time()
        // . '-' . $request->foto_kegiatan3->extension();
        
        // $request->foto_kegiatan3->move(public_path() . '/fotokegiatan3', $imgName3);

        $data_pelaporann=new pelaporann([
            'judul_laporan' => $request->get('judul_laporan'),
            'dasar_pelaksanaan' => $request->get('dasar_pelaksanaan'),
            'maksud_perjalanandinas' => $request->get('maksud_perjalanandinas'),
            'instansi' => $request->get('instansi'),
            'waktu_mulai' => $request->get('waktu_mulai'),
            'waktu_selesai' => $request->get('waktu_selesai'),
            'hasil' => $request->get('hasil'),
            'penutup' => $request->get('penutup'),
            // 'foto_kegiatan' => $imgName,
            // 'foto_kegiatan2' => $imgName2,
            // 'foto_kegiatan3' => $imgName3,
            'tanggal_surat' => $request->get('date_tanggalsurat'),
            'penanda_tangan' => $request->get('optionid_user'),
        ]);

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
        $data=pelaporann::find($id);
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

        return view('admin.pelaporann.show', compact('data', 'hari', 'tanggal'));
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
            'optionid_user'=>'required', //penandatangan
            'dasar_pelaksanaan'=>'required',
            'maksud_perjalanandinas'=>'required',
            'instansi'=>'required',
            'waktu_mulai'=>'required',
            'waktu_selesai'=>'required',
            'hasil'=>'required',
            'penutup'=>'required',
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
        $pelaporann->penutup = $request->get('penutup');
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

    public function acc(Request $request, $id)
    {
        //
        $pagename='Data Laporan Perjalanan Dinas Disetujui';
        $i = 0;
        $acc='disetujui';
        $data=pelaporann::all()->where('status',$acc)->sortDesc();
        $pelaporann=pelaporann::find($id);
        $pelaporann->status='disetujui';
        $pelaporann->save();

        return redirect()->back();
    }
}
