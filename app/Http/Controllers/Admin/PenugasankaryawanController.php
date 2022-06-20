<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\penugasankaryawan;
use App\User;

class PenugasankaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename='Data Permohonan Surat Tugas Kelompok';
        $i = 0;
        // $data=penugasankaryawan::all()->sortDesc();
        $data_User=User::all();
        $datalogin=Auth::user();
        return view('admin.penugasankaryawan.create', compact( 'pagename', 'i', 'datalogin', 'data_User'));
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
        $penugasankaryawan = Penugasankaryawan::all();
        $pagename="Form Input Permohonan Surat Tugas Kelompok";
        // $select = User::find(id);

        return view('admin.penugasankaryawan.create', compact('pagename', 'data_User', 'datalogin', 'i'));
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
        // dd($request->all());
        $name = $request->name;
        $nip = $request->nip;
        $jabatan = $request->jabatan;

        // for ($i=0; $i < count($name); $i++){
        //     $datasave = [
        //         'name' => $name[$i],
        //         'nip' => $nip[$i],
        //         'jabatan' => $jabatan[$i]
        //     ];
        //     DB::table('penugasankaryawans')->insert($datasave);
        // }
        // Session::put('success', "Save Data Success");
        return back();
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
