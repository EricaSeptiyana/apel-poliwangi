<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mavinoo\Batch\BatchFacade;
use App\kelompokk;
use App\penugasankaryawan;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

// use APP\disposisi;

class PerorangannController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware(['role:karyawan']);
    // }

    public function index()
    {
        //
        $pagename = 'Data Permohonan Surat Tugas Perorangan';
        $i = 0;
        $data = kelompokk::all()->sortDesc();
        $acc = 'disetujui';
        $role = Auth::user()->name;
        if ($role == 'sekdir') {
            $acc = 'disetujui';
            $data = kelompokk::all()->where('status', $acc)->sortDesc();
            return view('admin.perorangann.index', compact('data', 'pagename', 'i', 'role'));
        }
        return view('admin.perorangann.index', compact('data', 'pagename', 'i', 'acc', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_User = User::all();
        $datalogin = Auth::user();
        $perorangann = kelompokk::all();
        $pagename = "Form Input Permohonan Surat Tugas Perorangan";

        return view('admin.perorangann.create', compact('pagename', 'data_User', 'datalogin'));
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
            'nomor_permohonan' => 'required',
            'lampiran' => 'required',
            'hal' => 'required',
            'tanggal_permohonan' => 'required',
            'pembuka' => 'required',
            'jenis_kegiatan' => 'required',
            'jabatan' => 'required',
            'waktu_pelaksanaan' => 'required',
            'pukul_pelaksanaan'=>'required',
            'tempat' => 'required',
            'penutup' => 'required',
            'nama_penandatangan' => 'required',
        ]);
        
        try {
        $tipe_surat = "perorangan";
        $data_perorangann = kelompokk::create([
            'user_id' => Auth::user()->id,
            'jabatan' => $request->get('jabatan'),
            'nomor_permohonan' => $request->get('nomor_permohonan'),
            'lampiran' => $request->get('lampiran'),
            'hal' => $request->get('hal'),
            'tanggal_permohonan' => $request->get('tanggal_permohonan'),
            'jenis_kegiatan' => $request->get('jenis_kegiatan'),
            'pembuka' => $request->get('pembuka'),
            'waktu_pelaksanaan' => $request->get('waktu_pelaksanaan'),
            'pukul_pelaksanaan' => $request->get('pukul_pelaksanaan'),
            'waktu_selesai' => $request->get('waktu_selesai'),
            'tempat' => $request->get('tempat'),
            'penutup' => $request->get('penutup'),
            'nama_penandatangan' => $request->get('nama_penandatangan'),
            'nip_penandatangan' => $request->get('nip_penandatangan'),
            'jabatan_penandatangan' => $request->get('jabatan_penandatangan'),
            'tipe_surat' => 'perorangan',
            'status' => 'belum disetujui'
        ]);

        $penugasankaryawan = new penugasankaryawan([
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'nip' => Auth::user()->nip,
            'jabatan' => $request->get('jabatan'),
            'kelompokk_id' => $data_perorangann->id,
        ]);

        $penugasankaryawan->save();
        return redirect('admin/kelompokk')->with('sukses', 'Permohonan Surat Tugas Berhasil Diajukan');

       } catch (\Exception $e) {
        return Redirect::back()->withErrors(['Gagal'=>'Nomor Surat Sudah Digunakan']);
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //SHOW SURAT PERMOHONAN PERORANGAN
    public function show($id)
    {
        //

        $datas = kelompokk::select('kelompokks.*', 'u.name', 'u.ttd', 'u.nip')
            ->join('users as u', 'kelompokks.nama_penandatangan', '=', 'u.id')
            ->where('kelompokks.id', $id)
            ->get();

        $jabatan = DB::table('penugasankaryawans')->where('kelompokk_id', $id)->get();

        $data = null;
        foreach ($datas as $d) {
            $data = $d;
        }

        return view('admin.perorangann.show', compact('data', 'jabatan'));
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
        $data_perorangann = kelompokk::all();
        $data_User = User::all();
        $datalogin = Auth::user();
        $selectUser = kelompokk::find($id);
        $pagename = 'Update Surat Tugas Perorangan';
        $data = kelompokk::find($id);
        $datapenugasan = DB::table('penugasankaryawans')->where('kelompokk_id', $id)->get();

        return view('admin.perorangann.edit', compact('data', 'pagename', 'selectUser', 'data_perorangann', 'data_User', 'datalogin', 'datapenugasan'));
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
        $role = Auth::user()->name;


        DB::table('penugasankaryawans')->where('kelompokk_id', $request->kelompokk_id)->update([
            'jabatan' => $request->jabatan
        ]);
      
        $request->validate([
            'nomor_permohonan' => 'required',
            'lampiran' => 'required',
            'hal' => 'required',
            'jabatan' => 'required',
            'tanggal_permohonan' => 'required',
            'pembuka' => 'required',
            'jenis_kegiatan' => 'required',
            'pukul_pelaksanaan' => 'required',
            'waktu_pelaksanaan' => 'required',
            'tempat' => 'required',
            'penutup' => 'required',
            'nama_penandatangan' => 'required',
        ]);

        try {
        $perorangann = kelompokk::find($id);
        $perorangann->nomor_permohonan = $request->get('nomor_permohonan');
        $perorangann->lampiran = $request->get('lampiran');
        $perorangann->hal = $request->get('hal');
        $perorangann->tanggal_permohonan = $request->get('tanggal_permohonan');
        $perorangann->pembuka = $request->get('pembuka');
        $perorangann->jenis_kegiatan = $request->get('jenis_kegiatan');
        $perorangann->waktu_pelaksanaan = $request->get('waktu_pelaksanaan');
        $perorangann->pukul_pelaksanaan = $request->get('pukul_pelaksanaan');
        $perorangann->waktu_selesai = $request->get('waktu_selesai');
        $perorangann->tempat = $request->get('tempat');
        $perorangann->penutup = $request->get('penutup');
        $perorangann->nama_penandatangan = $request->get('nama_penandatangan');

        $perorangann->save();

        return redirect('admin/kelompokk')->with('sukses', 'Permohonan Surat Tugas Perorangan Berhasil Diupdate');
        }  catch (\Exception $e) {
            return Redirect::back()->withErrors(['Gagal'=>'Nomor Surat Sudah Digunakan']);
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
        // penugasankaryawan::where('kelompokk_id', $id)->delete();

        // $perorangann=perorangann::find($id);
        // $perorangann->delete();

        // return redirect('admin/kelompokk')->with('sukses','Permohonan Surat Tugas Perorangan Berhasil Dihapus');
    }

    //TIDAK DIGUNAKAN KARENA GABUNG DI CONTROLLER KELOMPOKK
    public function acc(Request $request, $id)
    {
        //
        // $pagename = 'Data Permohonan Surat Tugas Perorangan';
        // $i = 0;
        $acc = 'disetujui';
        $data = kelompokk::all()->where('status', $acc)->sortDesc();
        $perorangann = kelompokk::find($id);
        $perorangann->status = 'disetujui';
        $perorangann->save();

        return redirect()->back();
    }
}
