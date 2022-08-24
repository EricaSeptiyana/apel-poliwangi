<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\kelompokk;
use App\User;
use App\surattugas;
use DB;
use App\disposisi;
// use Mavinoo\Batch\Batch;
use Mavinoo\Batch\BatchFacade;
use App\penugasankaryawan;
use Illuminate\Support\Facades\Redirect;

// use App\suratdisposisi;

class KelompokkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'Data Permohonan Surat Tugas';
        $i = 0;

        $acc = 'disetujui';
        $role = Auth::user()->name;

        $datalogin = Auth::user();

        //INDEX PER USER
        $data = kelompokk::where('user_id', $datalogin->id)->get()->sortDesc();

        if (str_contains(strtolower($role), 'direktur')) {
            $acc = 'disetujui';
            $data = kelompokk::all()->where('status', $acc)->sortDesc();
            return view('admin.kelompokk.index', compact('data', 'pagename', 'i', 'role'));
        }
        if ($role == 'Bagian Kepegawaian') {
            $surattugas = surattugas::all()->first();
            $data = kelompokk::join('disposisis as d', 'kelompokks.id', '=', 'd.kelompokk_id')
                ->whereNotNull('d.file_disposisi')
                ->get(['kelompokks.*'])
                ->sortDesc();
            return view('admin.kelompokk.index', compact('data', 'pagename', 'i', 'role', 'surattugas'));
        }
        if (str_contains(strtolower($role), 'kajur')) {
            $surattugas = surattugas::all()->first();
            $data = kelompokk::join('users as u', 'kelompokks.user_id', '=', 'u.id')
                ->where('u.prodi_id', $datalogin->prodi_id)
                ->get(['kelompokks.*'])
                ->sortDesc();
            return view('admin.kelompokk.index', compact('data', 'pagename', 'i', 'role', 'surattugas'));
        }

        return view('admin.kelompokk.index', compact('data', 'pagename', 'i', 'acc', 'role', 'datalogin'));
    }

    //UNTUK INDEX DI ARSIP SURAT
    public function arsipIndex(){
        $pagename = 'Data Permohonan Surat Tugas';
        $pagename_arsip = 'Data Arsip Surat Tugas';
        $i = 0;

        $acc = 'disetujui';
        $role = Auth::user()->name;

        $datalogin = Auth::user();
        $data = kelompokk::join('penugasankaryawans as k', 'kelompokks.id', '=', 'k.kelompokk_id')
            // ->where('kelompokks.tipe_surat', 'kelompok')
            ->where('k.nip', $datalogin->nip)
            ->orwhere('k.name', $datalogin->name)
            ->distinct()
            ->get(['kelompokks.*'])
            ->sortDesc();
            
        return view('admin.arsip.index', compact('data', 'pagename', 'pagename_arsip', 'i', 'acc', 'role', 'datalogin'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $i = 1;
        $data_User = User::all();
        $datalogin = Auth::user();
        $pagename = "Form Input Permohonan Surat Tugas Kelompok";

        return view('admin.kelompokk.create', compact('pagename', 'data_User', 'datalogin', 'i',));
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
        // dd($request);
        $request->validate([
            'nomor_permohonan'  => 'required',
            'lampiran'          => 'required',
            'hal'               => 'required',
            'tanggal_permohonan' => 'required',
            'pembuka'           => 'required',
            'jenis_kegiatan'    => 'required',
            'waktu_pelaksanaan' => 'required',
            'pukul_pelaksanaan'=>'required',
            'tempat' => 'required',
            'penutup' => 'required',
            'nama_penandatangan' => 'required',
            // 'nip_penandatangan' => 'required',
            // 'jabatan_penandatangan' => 'required',

            // 'nama'=>'required',
            // 'nip'=>'required', 
            // 'jabatan'=>'required',
            // 'file_disposisi' => 'nimes:doc,docx,pdf',
        ]);

        try {
        $tipe_surat = "kelompok";

        $data_kelompokk = new kelompokk;
        $data_kelompokk->user_id = Auth::user()->id;
        $data_kelompokk->nomor_permohonan = $request->nomor_permohonan;
        $data_kelompokk->lampiran = $request->lampiran;
        $data_kelompokk->hal = $request->hal;
        $data_kelompokk->tanggal_permohonan = $request->tanggal_permohonan;
        $data_kelompokk->jenis_kegiatan = $request->jenis_kegiatan;
        $data_kelompokk->pembuka = $request->pembuka;
        $data_kelompokk->waktu_pelaksanaan = $request->waktu_pelaksanaan;
        $data_kelompokk->pukul_pelaksanaan = $request->pukul_pelaksanaan;
        $data_kelompokk->waktu_selesai = $request->waktu_selesai;
        $data_kelompokk->tempat = $request->tempat;
        $data_kelompokk->penutup = $request->penutup;
        $data_kelompokk->nama_penandatangan = $request->nama_penandatangan;
        $data_kelompokk->tipe_surat = $tipe_surat;
        $data_kelompokk->save();

        //array_push : untuk menyisipkan 1 atau lebih elemen ke akhir array
        $data_penugasan = [];
        foreach ($request->get('name') as $i => $data) {
            array_push($data_penugasan, [
                'user_id' => Auth::user()->id,
                'kelompokk_id' => $data_kelompokk->id,
                'name' => $request->get('name')[$i],
                'nip' => $request->get('nip')[$i],
                'jabatan' => $request->get('jabatan')[$i],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        penugasankaryawan::insert($data_penugasan);

        return redirect('admin/kelompokk')->with('sukses', 'Permohonan Surat Tugas Berhasil Diajukan');
        }  catch (\Exception $e) {
            return Redirect::back()->withErrors(['Gagal'=>'Nomor Surat Sudah Digunakan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //SHOW SURAT PERMOHONAN KELOMPOKK
    public function show($id)
    {
        //
        $karyawan = penugasankaryawan::all()->where('kelompokk_id', $id);

        $kelompok = kelompokk::select('kelompokks.*', 'u.*', 'j.*')
            ->join('users as u', 'kelompokks.nama_penandatangan', '=', 'u.id')
            ->join('jabatans as j', 'u.jabatan_id', '=', 'j.id')
            ->where('kelompokks.id', $id)
            ->get();
        $data = null;
        foreach ($kelompok as $d) {
            $data = $d;
        }
        $i = 1;

        return view('admin.kelompokk.show', compact('data', 'karyawan', 'i'));
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
        $i = 0;
        $data_kelompokk = kelompokk::all();
        $data_User = User::all();
        $datalogin = Auth::user();
        $selectUser = kelompokk::find($id);

        $pagename_kelompok = 'Update Surat Tugas Kelompok';
        $data = kelompokk::find($id);
        $datapenugasan = penugasankaryawan::all()->where('kelompokk_id', $id);
        return view('admin.kelompokk.edit', compact('i', 'datapenugasan', 'data', 'pagename_kelompok', 'selectUser', 'data_kelompokk', 'data_User', 'datalogin'));
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
        $request->validate([
            'nomor_permohonan' => 'required',
            'lampiran' => 'required',
            'hal' => 'required',
            'tanggal_permohonan' => 'required',
            'pembuka' => 'required',
            'jenis_kegiatan' => 'required',
            'waktu_pelaksanaan' => 'required',
            'pukul_pelaksanaan' => 'required',
            'tempat' => 'required',
            'penutup' => 'required',
            'nama_penandatangan' => 'required',
            // 'nip_penandatangan' => 'required',
            // 'jabatan_penandatangan' => 'required',
        ]);
        try {
        $kelompokk = kelompokk::find($id);
        $kelompokk->nomor_permohonan = $request->get('nomor_permohonan');
        $kelompokk->lampiran = $request->get('lampiran');
        $kelompokk->hal = $request->get('hal');
        $kelompokk->tanggal_permohonan = $request->get('tanggal_permohonan');
        $kelompokk->pembuka = $request->get('pembuka');
        $kelompokk->jenis_kegiatan = $request->get('jenis_kegiatan');
        $kelompokk->waktu_pelaksanaan = $request->get('waktu_pelaksanaan');
        $kelompokk->pukul_pelaksanaan = $request->get('pukul_pelaksanaan');
        $kelompokk->waktu_selesai = $request->get('waktu_selesai');
        $kelompokk->tempat = $request->get('tempat');
        $kelompokk->penutup = $request->get('penutup');
        $kelompokk->nama_penandatangan = $request->get('nama_penandatangan');

        $kelompokk->save();
        
        //BUAT DISPOSISI DI ROLE SEKDIR KETIKA INGIN MEMBUAT SURAT DISPOSISI KARENA SEBAGIAN MENGAMBIL DATA YG DIINPUTKAN KARYAWAN 
        if ($role == 'sekdir') {
            $kelompokk = kelompokk::find($id);
            $kelompokk->nomor_agenda = $request->get('nomor_agenda');
            $kelompokk->tanggal_terima = $request->get('tanggal_terima');

            $kelompokk->disposisi()->create([
                'kelompokk_id' => $kelompokk->id,
                'nomor_agenda' => $request->nomor_agenda,
                'tanggal_terima' => $request->tanggal_terima,
            ]);

            $kelompokk->update();
        }
        //SAMPE SINI

        //NGECEK PILIHAN DI FIELD PENUGASAN KARYAWAN
        $data_penugasan = [
            'lama' => [],
            'baru' => []
        ];
        foreach ($request->get('name') as $i => $data) {
            if ($request->get('id')[$i]) {
                array_push($data_penugasan['lama'], [
                    'id' => $request->get('id')[$i],
                    'user_id' => $request->get('user_id'),
                    'kelompokk_id' => $id,
                    'name' => $request->get('name')[$i],
                    'nip' => $request->get('nip')[$i],
                    'jabatan' => $request->get('jabatan')[$i],
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            } else {
                array_push($data_penugasan['baru'], [
                    'user_id' => $request->get('user_id'),
                    'kelompokk_id' => $id,
                    'name' => $request->get('name')[$i],
                    'nip' => $request->get('nip')[$i],
                    'jabatan' => $request->get('jabatan')[$i],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
        //SAMPE SINI

        //NEGCEK ADA PERUBAHAN DI PENUGASAN KARYAWAN
        $datacek = penugasankaryawan::where('kelompokk_id', $id)->get();
        $datacekarr = [];
        foreach($datacek as $value){
            array_push($datacekarr,
                $value['id'],
            );
        }
        $lama = $data_penugasan['lama'];
        $baru = [];
        foreach($lama as $la){
            array_push($baru,
                $la['id'],
            );
        }
        //SAMPE SINI

        //JIKA ADA PERUBAHAN BAIK MAKA DI PUSH DI DB
        $result=array_values( array_diff($datacekarr, $baru));
        if (count($result) !=0){
            foreach($result as $r){
                $penugasanDeleted = penugasankaryawan::find($r);
                $penugasanDeleted->delete();
            }
        }
        
        BatchFacade::update(new penugasankaryawan, $data_penugasan['lama'], 'id');
        if (empty($request->get('id')[$i])) {
            penugasankaryawan::insert($data_penugasan['baru']);
        }

        return redirect('admin/kelompokk')->with('sukses', 'Permohonan Surat Tugas Kelompok Berhasil Diupdate');
        }  catch (\Exception $e) {
            return Redirect::back()->withErrors(['Gagal'=>'Nomor Surat Sudah Digunakan']);
        }
        //SAMPE SINI
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $surattugas_id=$request->input('surattugas_id');
        // dd($surattugas_id);
        //
        $penugasan = penugasankaryawan::where('kelompokk_id', $surattugas_id);
        $penugasan->delete();
        $surattugas = surattugas::where('kelompokk_id', $surattugas_id);
        $surattugas->delete();
        $kelompokk = kelompokk::find($surattugas_id);
        $kelompokk->delete();
        

        return redirect('admin/kelompokk')->with('sukses', 'Permohonan Surat Tugas Berhasil Dihapus');
    }

    //UNTUK ACC KAJUR
    public function acc(Request $request, $id)
    {
        //
        $acc = 'disetujui';
        $data = kelompokk::all()->where('status', $acc)->sortDesc();
        $kelompokk = kelompokk::find($id);
        $kelompokk->status = $acc;
        $kelompokk->save();

        return redirect()->route('kelompokk.index');
    }


    //KIRIM DISPOSISI
    public function sendLetter(Request $request)
    {
        $request->validate([
            'nomor_surattugas' => 'required',
            'file_disposisi' => 'required',
        ]);

        try {   
        $dataDisposisi = disposisi::all()->where('kelompokk_id', $request->get('kelompokk_id'))->first();
        if ($request->hasFile('file_disposisi')) {
            $request->file('file_disposisi')->move('public/file/', $request->file('file_disposisi')->getClientOriginalName());
            $dataDisposisi->file_disposisi = $request->file('file_disposisi')->getClientOriginalName();
        }
        $dataDisposisi->save();
        
        $suratTugas = new surattugas([
            'nomor_surattugas' => $request->nomor_surattugas,
            'kelompokk_id' => $request->kelompokk_id
        ]);
        $suratTugas->save();

        return redirect('admin/kelompokk')->with('sukses', 'Surat Disposisi Berhasil dikirim');
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['Gagal'=>'Nomor Surat Tugas Sudah Digunakan']);
        }
    }

    //UNDUH DISPOSISI
    public function getDisposisiFile($id)
    {
        $filedisposisi = disposisi::all()->where('kelompokk_id', $id)->first();
        $file_path = public_path('file/' . $filedisposisi->file_disposisi);
        return response()->download($file_path);
    }

    //UNDUH SURAT TUGAS
    public function getSurattugasfile($id)
    {
        $filesurattugas = surattugas::all()->where('kelompokk_id', $id)->first();
        $file_path = public_path('file/' . $filesurattugas->file_surattugas);
        return response()->download($file_path);
    }

    //CETAK SURAT REKAP
    public function cetakSurat()
    {
        $i = 0;
        $rekapsurat = kelompokk::all();
        return view('admin.kelompokk.Cetak-surat',compact('rekapsurat', 'i'));
    }

    //CETAK SURAT PERTANGGAL
    public function cetakForm()
    {
        $pagename_rekap = "Cetak Laporan Pertanggal";
        return view('admin.kelompokk.Cetak-surat-form', compact('pagename_rekap'));
    }

    public function cetakSuratPertanggal($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal: ".$tglawal, "Tsnggal Akhir :".$tglakhir]);

        $i = 0;
        $cetaksuratpertanggal = kelompokk::whereBetween('tanggal_permohonan',[$tglawal, $tglakhir])->get()->sortDesc();
        return view('admin.kelompokk.Cetak-surat-pertanggal',compact('cetaksuratpertanggal', 'i'));
    }
}
