<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\jabatan;
use App\prodi;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename='Profile Karyawan';
        $datalogin=Auth::user();
        $user=User::find($datalogin->id);
        return view('admin.user.profile', compact('pagename','datalogin', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $id_user=Auth::user()->id;
        $pagename='Edit Karyawan';
        $user=User::find($id_user);
        $data_jabatan=jabatan::find($id);
        $data_prodi=prodi::find($id);
        $allRoles=Role::all();
        $userRole=$user->roles->pluck('id')->all();

        return view('admin.user.edit', compact('pagename'));
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
        $user=User::find($id);
        $user->name=$request->name;
        $user->username=$request->username;
        $user->nip=$request->nip;
        $user->jabatan=$request->jabatan;
        $user->prodi=$request->prodi;
        $user->email=$request->email;
        // $user->password=$request->password;
        $user->save();
        return back();
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
