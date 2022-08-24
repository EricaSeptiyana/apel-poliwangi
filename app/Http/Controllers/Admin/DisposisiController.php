<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\perorangann;
use App\kelompokk;
use App\User;
use App\disposisi;
use DB;
use Illuminate\Support\Facades\Redirect;

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
    public function create(Request $request)
    {
        //
        $pagename="Form Input Surat Disposisi";
        $data=kelompokk::find($request->id)
        ->join('users', 'users.id','=','kelompokks.nama_penandatangan')
        ->join('jabatans','jabatans.id', '=' ,'users.jabatan_id')
        ->where('kelompokks.id' ,'=',$request->id)->get();
        
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

        try {
            $data_disposisi=new disposisi([
                'kelompokk_id' => $request->kelompokk_id,
                'nomor_agenda' => $request->nomor_agenda,
                'tanggal_terima' => $request->tanggal_terima,
            ]);
    
            $data_disposisi->save();
    
            return redirect('admin/kelompokk')->with('sukses','Surat Disposisi Berhasil Dibuat');
        } catch (\Exception $e) {
           return Redirect::back()->withErrors(['Gagal'=>'Nomor Surat Agenda Sudah Digunakan']);
        }
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
        $datadisposisi=disposisi::select('*')->where('kelompokk_id',$id)->get();
        foreach ($datadisposisi as $disposisi ) {
          
        }
        
        $data=kelompokk::find($id)
        ->join('users', 'users.id', '=', 'kelompokks.nama_penandatangan')
        ->join('jabatans', 'jabatans.id', '=', 'users.jabatan_id')
        ->where('kelompokks.id', '=', $id)->get()->first();
        // $jabatan=DB::table('penugasankaryawans')->where('kelompokk_id',$id)->get();

        return view('admin.disposisi.show', compact('data', 'disposisi'));
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
