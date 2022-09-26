<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\surattugas;
use App\kelompokk;
use App\User;
use App\penugasankaryawan;
use DB;
use Illuminate\Support\Facades\Redirect;

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
    public function create(Request $request)
    {
        //
        $pagename = "Form Input Surat Tugas";
        $data_User = User::all();
        $data = kelompokk::find($request->id);
        $dataSurattugas = surattugas::select('*')
            ->where('kelompokk_id', $request->id)
            ->get();

        return view('admin.surattugas.create', compact('pagename', 'data_User', 'data', 'dataSurattugas'));
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
            'tanggal_surattugas' => 'required',
            'namattd_surattugas' => 'required',
        ]);

        if ($request->tanggal_surattugas == null) {
            return Redirect::back()->withErrors(['Gagal' => 'Mohon isi tanggal penanda tangan atau tanggal ']);
        }
        try {
            $data_surattugas = new surattugas([
                'nomor_surattugas' => $request->get('nomor_surattugas'),
                'pembuka' => $request->get('pembuka_surattugas'),
                'penutup' => $request->get('penutup_surattugas'),
                'tanggal_surattugas' => $request->get('tanggal_surattugas'),
                'namattd_surattugas' => $request->get('namattd_surattugas'),
                'nipttd_surattugas' => $request->get('nipttd_surattugas'),
                'jabatanttd_surattugas' => $request->get('jabatanttd_surattugas'),
            ]);
            $data_surattugas->save();



            return redirect('admin/kelompokk')->with('sukses', 'Surat Tugas Berhasil Dibuat');
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['Gagal' => 'Nomor Surat Tugas Sudah Digunakan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //SHOW SURAT TUGAS PERORANGAN
    public function show($id)
    {
        //
        $datakaryawan = penugasankaryawan::select('*')->where('kelompokk_id', $id)->get();
        foreach ($datakaryawan as $karyawan) {
        }
        $data = kelompokk::find($id);

        $surat = surattugas::join('users as u', 'surattugas.namattd_surattugas', '=', 'u.id')
            ->join('jabatans as j', 'u.jabatan_id','=','j.id')  
            ->where('surattugas.kelompokk_id', $id)
            ->get()
            ->first();

        return view('admin.surattugas.show_perorangan', compact('data', 'karyawan', 'surat'));
    }

    //SHOW SURAT TUGAS KELOMPOKK
    public function showKelompok($id)
    {
        //
        $karyawan = penugasankaryawan::all()->where('kelompokk_id', $id);
        $data = kelompokk::find($id);

        $surat = surattugas::join('users as u', 'surattugas.namattd_surattugas', '=', 'u.id')
            ->join('jabatans as j', 'u.jabatan_id','=','j.id')
            ->where('surattugas.kelompokk_id', $id)
            ->get()
            ->first();
        $i = 1;

        return view('admin.surattugas.show_kelompok', compact('data', 'karyawan', 'i', 'surat'));
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
        $pagename = "Form Input Surat Tugas";
        $data_User = User::all();
        $data = kelompokk::find($id);
        $dataSurattugas = surattugas::select('*')
            ->where('kelompokk_id', $id)
            ->get();

        return view('admin.surattugas.create', compact('pagename', 'data_User', 'data', 'dataSurattugas'));
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
            'tanggal_surattugas' => 'required',
            'namattd_surattugas' => 'required',
        ]);
        try {
            $data =  surattugas::find($id);

            $data->pembuka = $request->pembuka_surattugas;
            $data->nomor_surattugas = $request->nomor_surattugas;
            $data->penutup = $request->penutup_surattugas;
            $data->tanggal_surattugas = $request->tanggal_surattugas;
            $data->namattd_surattugas = $request->namattd_surattugas;
            $data->save();
            $data_surat = kelompokk::find($request->id_surat);

            $data_surat->waktu_pelaksanaan = $request->waktu_pelaksanaan;
            $data_surat->pukul_pelaksanaan = $request->pukul_pelaksanaan;
            $data_surat->waktu_selesai = $request->waktu_selesai;
            $data_surat->tempat = $request->tempat;

            $data_surat->save();

            return redirect('admin/kelompokk')->with('sukses', 'Surat Tugas Berhasil Dibuat');
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['Gagal' => $e->getMessage()]);
        }
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


    //KIRIM SURAT TUGAS
    public function sendLetter(Request $request, $id)
    {
        $request->validate([
            'file_surattugas' => 'required',
        ]);

        $dataSurattugas = surattugas::where('kelompokk_id', $id);


        if ($request->hasFile('file_surattugas')) {
            $request->file('file_surattugas')->move('public/file/', $request->file('file_surattugas')->getClientOriginalName());
        }

        //UPDATE SURAT TUGAS
        $dataSurattugas->update(['file_surattugas' => $request->file('file_surattugas')->getClientOriginalName()]);

        return redirect('admin/kelompokk')->with('sukses', 'Surat Tugas Berhasil dikirim');
    }
}
