<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\kelompokk;
use App\User;
use App\surattugas;
use DB;
// use Mavinoo\Batch\Batch;
use Mavinoo\Batch\BatchFacade;
use App\penugasankaryawan;
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
        $pagename='Data Permohonan Surat Tugas';
        $i = 0;
        $data=kelompokk::all()->sortDesc();
        $acc='disetujui';
        $role=Auth::user()->name;
        if($role=='sekdir'){
            $acc='disetujui';
            $data=kelompokk::all()->where('status',$acc)->sortDesc();
            return view('admin.kelompokk.index', compact('data', 'pagename', 'i', 'role'));
        }
        return view('admin.kelompokk.index', compact('data', 'pagename', 'i', 'acc', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $i = 0;
        $data_User=User::all();
        $datalogin=Auth::user();
        $kelompokk = Kelompokk::all();
        $pagename="Form Input Permohonan Surat Tugas Kelompok";
        // $select = User::find(id);

        return view('admin.kelompokk.create', compact('pagename', 'data_User', 'datalogin', 'i'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        //
        // dd($request);
        $data = Kelompokk::all();
        $request->validate([
            'nomor_permohonan'  =>'required',
            'lampiran'          =>'required',
            'hal'               =>'required',
            'tanggal_permohonan'=>'required', 
            'pembuka'           =>'required',
            'jenis_kegiatan'    =>'required',
            'waktu_pelaksanaan'=>'required',
            'tempat'=>'required',
            'penutup'=>'required',
            'nama_penandatangan' => 'required',
            // 'nip_penandatangan' => 'required',
            // 'jabatan_penandatangan' => 'required',
            
            // 'nama'=>'required',
            // 'nip'=>'required', 
            // 'jabatan'=>'required',
            // 'pukul_pelaksanaan'=>'required',
            // 'file_disposisi' => 'nimes:doc,docx,pdf',
        ]);
        // $file_disposisi = $request->file('file_disposisi');
        // $namafiledisposisi = 'FT'.date('Ymdhis').'.'.$request->file('file_disposisi')->getClientOriginalExtension();
        // $file_disposisi->move('file_disposisi/',$namafiledisposisi);

        // $namafiledisposisi = $request->file_disposisi->getClientOriginalName() . '_' . time() . '.' . $request->file_disposisi->extension();
        $tipe_surat="kelompok";

        $data_kelompokk=new kelompokk;
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
        $data_kelompokk->nip_penandatangan = $request->nip_penandatangan;
        $data_kelompokk->jabatan_penandatangan = $request->jabatan_penandatangan;
        $data_kelompokk->tipe_surat = $tipe_surat;
        $data_kelompokk->save();

        $data_penugasan = [];
        foreach($request->get('name') as $i => $data) {
            array_push($data_penugasan, [
                'user_id'=> Auth::user()->id,
                'kelompokk_id' => $data_kelompokk->id,
                'name' => $request->get('name')[$i],
                'nip' => $request->get('nip')[$i],
                'jabatan' => $request->get('jabatan')[$i],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        
        penugasankaryawan::insert($data_penugasan);

        return redirect('admin/kelompokk')->with('sukses','Permohonan Surat Tugas Berhasil Diajukan');

    }


    // button kirim disposisi
    // public function suratdisposisi(Request $request){
    
    //     $suratdisposisi=surattugas::create([
    //         'nomor_surattugas'=> $request->nomor_surattugas,
    //     ]);

    //     $suratdisposisi->disposisi()->create([
    //         'surattugas_id' => $suratdisposisi->id,
                
    //     ]);
    //     if($request->hasFile('file_disposisi')){
    //         $request->file('file_disposisi')->move('suratDisposisi/', $request->file('file_disposisi')->getClientOriginalName());
    //         $suratdisposisi->disposisi->file_disposisi = $request->file('file_disposisi')->getClientOriginalName();
    //         $suratdisposisi->disposisi->save();
    //     }
    //     return redirect()->back();
    // }


    // public function getsurattugas($id)
    // {
    //     $surattugas = surattugas::find($id);
    //     return response()->json(['surattugas'=>$surattugas]);
    // }

    // public function uploadsurattugas(Request $request)
    // {
    //     if($request->hasFile('file_surattugas')){
    //         $request->file('file_surattugas')->move('suratTugas/', $request->file('file_surattugas')->getClientOriginalName());
    //         $surattugas->file_surattugas = $request->file('file_surattugas')->getClientOriginalName();
    //         $surattugas->update();
    //     }
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data=kelompokk::find($id);
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

        return view('admin.kelompokk.show', compact('data', 'hari', 'tanggal'));
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
        $data_kelompokk=kelompokk::all();
        $data_User=User::all();
        $datalogin=Auth::user();
        $selectUser=kelompokk::find($id);
        
        $pagename_kelompok='Update Surat Tugas Kelompok';
        $pagename_perorangan='Update Surat Tugas Perorangan';
        $pagename_disposisi='Form Surat Disposisi';
        $pagename_surattugas='Form Surat Tugas';
        $data=kelompokk::find($id);
        $datapenugasan=penugasankaryawan::all()->where('kelompokk_id', $id);
        return view('admin.kelompokk.edit', compact('i', 'datapenugasan', 'data', 'pagename_kelompok', 'pagename_perorangan', 'pagename_disposisi', 'pagename_surattugas', 'selectUser', 'data_kelompokk' , 'data_User', 'datalogin'));
        // if(){
        //     return view('admin.kelompokk.edit', compact('i', 'datapenugasan', 'data', 'pagename', 'pagename_disposisi', 'pagename_surattugas', 'selectUser', 'data_kelompokk' , 'data_User', 'datalogin'));
        // }else{
        //     return view('admin.kelompokk.edit', compact('i', 'datapenugasan', 'data', 'pagename', 'pagename_disposisi', 'pagename_surattugas', 'selectUser', 'data_kelompokk' , 'data_User', 'datalogin'));
        // }
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
        $role=Auth::user()->name;
        if($role=='karyawan'){
                $request->validate([
                    'nomor_permohonan'=>'required',
                    'lampiran'=>'required',
                    'hal'=>'required',
                    'tanggal_permohonan'=>'required', 
                    'pembuka'=>'required',
                    'jenis_kegiatan'=>'required',
                    'waktu_pelaksanaan'=>'required',
                    'tempat'=>'required',
                    'penutup'=>'required',
                    'nama_penandatangan' => 'required',
                    // 'nip_penandatangan' => 'required',
                    // 'jabatan_penandatangan' => 'required',
                ]);
                $kelompokk = kelompokk::find($id);
                $kelompokk->nomor_permohonan = $request->get('nomor_permohonan');
                $kelompokk->lampiran = $request->get('lampiran');
                $kelompokk->hal = $request->get('hal');
                $kelompokk->tanggal_permohonan= $request->get('tanggal_permohonan');
                $kelompokk->pembuka= $request->get('pembuka');
                $kelompokk->jenis_kegiatan= $request->get('jenis_kegiatan');
                $kelompokk->waktu_pelaksanaan = $request->get('waktu_pelaksanaan');
                $kelompokk->pukul_pelaksanaan = $request->get('pukul_pelaksanaan');
                $kelompokk->waktu_selesai = $request->get('waktu_selesai');
                $kelompokk->tempat = $request->get('tempat');
                $kelompokk->penutup = $request->get('penutup');
                $kelompokk->nama_penandatangan = $request->get('nama_penandatangan');
                $kelompokk->nip_penandatangan = $request->get('nip_penandatangan');
                $kelompokk->jabatan_penandatangan = $request->get('jabatan_penandatangan');

                
                
                $kelompokk->save();
        }
        if($role=='sekdir'){
            $kelompokk = kelompokk::find($id);
            $kelompokk->nomor_agenda = $request->get('nomor_agenda');
            $kelompokk->tanggal_terima = $request->get('tanggal_terima');

            $kelompokk->disposisi()->create([
                'kelompokk_id'=> $kelompokk->id,
                'nomor_agenda' => $request->nomor_agenda,
                'tanggal_terima' => $request->tanggal_terima,
            ]);

            $kelompokk->update();
        }
        // else{
        //     $request->validate([
        //         // 'nomor_agenda'=>['unique:kelompokks']
        //         'nomor_agenda'=>['required', 'unique:kelompokks']
        //     ]);
        //     $kelompokk = kelompokk ::find($id);
        //     $kelompokk ->nomor_agenda = $request->get('nomor_agenda');

        //     $kelompokk ->save();
        // }

        $data_penugasan = [
            'lama' => [],
            'baru' => []
        ];
        foreach($request->get('name') as $i => $data) {
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
            }
            else {
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
        BatchFacade::update(new penugasankaryawan, $data_penugasan['lama'], 'id');
        if (empty($request->get('id')[$i])) {
            penugasankaryawan::insert($data_penugasan['baru']);
        }

        return redirect('admin/kelompokk')->with('sukses','Permohonan Surat Tugas Kelompok Berhasil Diupdate');
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
        $penugasan = penugasankaryawan::where('kelompokk_id', $id);
        $penugasan->delete();
        $kelompokk=kelompokk::find($id);
        $kelompokk->delete();
        // $perorangann=kelompokk::find($id);
        // $perorangann->delete();
        

        return redirect('admin/kelompokk')->with('sukses','Permohonan Surat Tugas Kelompok Berhasil Dihapus');
    }

    public function acc(Request $request, $id)
    {
        //
        $pagename='Data Permohonan Surat Tugas Kelompokk';
        $i = 0;
        $acc='disetujui';
        $data=kelompokk::all()->where('status',$acc)->sortDesc();
        $kelompokk=kelompokk::find($id);
        $kelompokk->status=$acc;
        $kelompokk->save();

        // return view('admin.perorangann.index');
        // return view('admin.perorangann.index', compact('data', 'pagename', 'i','acc'));
        return redirect()->route('kelompokk.index');
    }

}
