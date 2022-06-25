<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\perorangann;
use App\kelompokk;
use App\penugasankaryawan;
use App\User;
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
        $pagename='Data Permohonan Surat Tugas Perorangan';
        $i = 0;
        $data=perorangann::all()->sortDesc();
        // $data=kelompokk::all()->sortDesc();
        // $datastatus=user::all();
        $acc='disetujui';
        $role=Auth::user()->name;
        if($role=='sekdir'){
            $acc='disetujui';
            $data=perorangann::all()->where('status',$acc)->sortDesc();
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
        $data_User=User::all();
        $datalogin=Auth::user();
        $perorangann = Perorangann::all();
        // $nomorfill = Perorangann::max('nomor');
        // $nomormax = $nomorfill + 1;
        // $cek = count($perorangan);
        $pagename="Form Input Permohonan Surat Tugas Perorangan";
        // $select = User::find(id);

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
        dd($request);
        $data = Perorangann::all();
        $request->validate([
            'nomor_permohonan'=>'required',
            'lampiran'=>'required',
            'hal'=>'required',
            'tanggal_permohonan'=>'required', 
            'pembuka'=>'required',
            'jenis_kegiatan'=>'required',
            // 'nama'=>'required',
            // 'nip'=>'required', 
            'jabatan'=>'required',
            'waktu_pelaksanaan'=>'required',
            // 'pukul_pelaksanaan'=>'required',
            // 'waktu_selesai'=>'required',
            'tempat'=>'required',
            'penutup'=>'required',
            // 'date_tanggalsurat'=>'required',
            // 'int_nomor'=>'required',
            // 'int_kode'=>'required',
            // 'string_jenissurat' => 'required',
            // 'year_tahunsurat' => 'required',
            'nama_penandatangan' => 'required',
            // 'nip_penandatangan' => 'required',
            // 'jabatan_penandatangan' => 'required',
        ]);
        
        // $data_disposisi = new disposisi([
        //     'nomor_permohonan' => $request->get('nomor_permohonan'),
        //     'lampiran' => $request->get('lampiran'),
        //     'hal' => $request->get('hal'),
        //     'tanggal_permohonan' => $request->get('tanggal_permohonan'),
        // ]);
        // $data_disposisi->save();

        $tipe_surat="perorangan";
        $data_perorangann = kelompokk::create([
            'user_id'=>Auth::user()->id,
            'jabatan' => $request->get('jabatan'),
            // 'nama'=>$data->name,
            // 'nama' => $request->get('nama'),
            // 'nip' => $request->get('nip'),
            // 'nama'=>Auth::user()->name,
            // 'nip'=>Auth::user()->nip,
            // 'jabatan'=>Auth::user()->jabatan,
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

            // 'pukul' => $request->get('time_pukul'),
            // 'tanggal_surat' => $request->get('date_tanggalsurat'),
            // 'nomor' => $request->get('int_nomor'),
            'nama_penandatangan' => $request->get('nama_penandatangan'),
            'nip_penandatangan' => $request->get('nip_penandatangan'),
            'jabatan_penandatangan' => $request->get('jabatan_penandatangan'),
            // 'tipe_surat' =>$tipe_surat,
            'tipe_surat' =>'perorangan',
            'status' => 'belum disetujui'
        ]);
        
        $penugasankaryawan=new penugasankaryawan([
            'user_id'=>Auth::user()->id,
            'name'=>Auth::user()->name,
            'nip'=>Auth::user()->nip,
            'jabatan' => $request->get('jabatan'),
            'kelompokk_id' => $data_perorangann -> id,
        ]);

        $penugasankaryawan->save();
    

        // return redirect('admin/kelompokk')->with('sukses','Permohonan Surat Tugas Berhasil Diajukan');
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
        // $perorangann=perorangann::find($id);
        $data=kelompokk::find($id);
        // $data=perorangann::With('user')->get();
        // $data=perorangann::With('user')->get();
        $pagename="Form Input Surat Tugas Perorangan";
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

        // $list_bulan =  array( 1 => 'Januari',
        //     'Februari',
        //     'Maret',
        //     'April',
        //     'Mei',
        //     'Juni',
        //     'Juli',
        //     'Agustus',
        //     'September',
        //     'Oktober',
        //     'November',
        //     'Desember',
        // );
        // $bulan=$list_bulan[$tanggal];

        return view('admin.perorangann.show', compact('data', 'pagename', 'hari', 'tanggal'));
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
        $data_perorangann=perorangann::all();
        $data_User=User::all();
        $datalogin=Auth::user();
        $selectUser=perorangann::find($id);
        $pagename='Update Surat Tugas Perorangan';
        $data=perorangann::find($id);
        return view('admin.perorangann.edit', compact('data', 'pagename', 'selectUser', 'data_perorangann' , 'data_User', 'datalogin'));
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
                'jabatan'=>'required',
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

            $perorangann = perorangann::find($id);
            $perorangann->nomor_permohonan = $request->get('nomor_permohonan');
            $perorangann->lampiran = $request->get('lampiran');
            $perorangann->hal = $request->get('hal');
            $perorangann->jabatan = $request->get('jabatan');
            $perorangann->tanggal_permohonan= $request->get('tanggal_permohonan');
            $perorangann->pembuka= $request->get('pembuka');
            $perorangann->jenis_kegiatan= $request->get('jenis_kegiatan');
            $perorangann->waktu_pelaksanaan = $request->get('waktu_pelaksanaan');
            $perorangann->pukul_pelaksanaan = $request->get('pukul_pelaksanaan');
            $perorangann->waktu_selesai = $request->get('waktu_selesai');
            $perorangann->tempat = $request->get('tempat');
            $perorangann->penutup = $request->get('penutup');
            $perorangann->nama_penandatangan = $request->get('nama_penandatangan');
            $perorangann->nip_penandatangan = $request->get('nip_penandatangan');
            $perorangann->jabatan_penandatangan = $request->get('jabatan_penandatangan');

            $perorangann->save();
        }
        // else{
        //     $request->validate([
        //         'nomor_agenda'=>['unique:peroranganns']
        //         // 'nomor_agenda'=>['required', 'unique:peroranganns']
        //     ]);
        //     $perorangann = perorangann::find($id);
        //     $perorangann->nomor_agenda = $request->get('nomor_agenda');
        //     $perorangann->save();
        // }
        return redirect('admin/kelompokk')->with('sukses','Permohonan Surat Tugas Perorangan Berhasil Diupdate');
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
        penugasankaryawan::where('kelompokk_id', $id)->delete();

        $perorangann=perorangann::find($id);
        $perorangann->delete();

        return redirect('admin/kelompokk')->with('sukses','Permohonan Surat Tugas Perorangan Berhasil Dihapus');
    }

    public function acc(Request $request, $id)
    {
        //
        $pagename='Data Permohonan Surat Tugas Perorangan';
        $i = 0;
        $acc='disetujui';
        $data=perorangann::all()->where('status',$acc)->sortDesc();
        $perorangann=perorangann::find($id);
        $perorangann->status='disetujui';
        $perorangann->save();

        // return view('admin.perorangann.index');
        // return view('admin.perorangann.index', compact('data', 'pagename', 'i','acc'));
        // return redirect()->route('perorangann.index');
        return redirect()->back();
    }

    // public function findnip(Request $request, $id)
    // {
    //     //
    //     $p=Product::select('nip')->where('id', $request->id)->first();
    //     return response()->json($p);
       
    // }

}
