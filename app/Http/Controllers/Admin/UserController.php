<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UserTemplateExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserImport;
use App\User;
use App\jabatan;
use App\prodi;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        //
        $pagename="Data User";
        $i = 0;
        $allUser=User::all()->sortDesc();
        return view('admin.user.index', compact('pagename', 'allUser', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename="Tambah User";
        $allRoles=Role::all();
        $data_jabatan=jabatan::all();
        $data_prodi=prodi::all();

        return view('admin.user.create', compact('pagename', 'allRoles', 'data_jabatan', 'data_prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'txtnama_user' => 'required',
            'txt_nip' => 'required',
            'txtemail_user' => 'required|email|unique:users,email',
            'txtpassword_user' => 'required|same:txtkonfirmasipassword_user',
            'role_user' => 'required'
        ]);

        $user=new User();
        $user->name=$request->txtnama_user;
        $user->username=$request->txt_username;
        $user->nip=$request->txt_nip;
        $user->jabatan_id=$request->jabatan_id;
        $user->prodi_id=$request->prodi_id;
        $user->email=$request->txtemail_user;
        $user->password=Hash::make($request->txtpassword_user);
        $user->save();

        $user->assignRole($request->role_user);
        return redirect()->route('user.index')->with ('sukses', 'User berhasil dibuat');
        //
        // $this->validate($request, [
        //     'txtnama_user'=>'required',
        //     'txt_username'=>'required',
        //     'txt_nip'=>'required',
        //     'txtemail_user'=>'required|email|unique:user, email',
        //     'txtpassword_user'=>'required|save:txtkonfirmasipassword_user',
        //     'role_user'=>'required'
        // ]);

        // $user=new User();
        // $user->name=$request->txtnama_user;
        // $user->username=$request->txt_username;
        // $user->nip=$request->txt_nip;
        // $user->email=$request->txtemail_user;
        // $user->password=$request->Hash::make($request->txtpassword_user);
        // $user->save();

        // $user->assignRole($request->role_user);
        // return redirect()->route('users.index')->with('sukses', 'User berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        return response()->json([
            'user' => User::with('jabatan')->find($user)
        ]);
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
        $pagename='Edit User';
        $user=User::find($id);
        $data_jabatan=jabatan::find($id);
        $data_prodi=prodi::find($id);
        $allRoles=Role::all();
        $userRole=$user->roles->pluck('id')->all();

        return view('admin.user.edit', compact('pagename', 'data_jabatan', 'data_prodi','user', 'allRoles', 'userRole'));
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
        $this->validate($request, [
            'txtnama_user' => 'required',
            // 'txt_username' => 'required',
            'txt_nip' => 'required',
            // 'nama_jabatan' => 'required',
            // 'nama_prodi' => 'required',
            'txtemail_user' => 'required|email',
            //'txtpassword_user' => 'required|same:txtkonfirmasipassword_user',
            'role_user' => 'required'
        ]);

        $user=User::find($id);
        $user->name=$request->txtnama_user;
        $user->username=$request->txt_username;
        $user->nip=$request->txt_nip;
        $user->jabatan=$request->nama_jabatan;
        $user->prodi=$request->nama_prodi;
        $user->email=$request->txtemail_user;
        if($request->txtpassword_user !=null){
            $user->password=Hash::make($request->txtpassword_user);
        }
        $user->update();

        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->role_user);
        return redirect()->route('user.index')->with ('sukses', 'User berhasil diupdate');
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
        $user=User::find($id);
        $user->delete();

        return redirect()->route('user.index')->with ('sukses', 'User berhasil dihapus');
    }

    // public function profile($id)
    // {
    //     //
    //     $title = "My Profile";
    //     $user = User::where('id', Auth::user()->id)->first();

    //     return view('user.profile', compact('tittle', 'user'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function importUser(Request $request)
    {
        // dd($request->file('excel-karyawan'));
        // $request->validate([
        //     'file' => 'required|max:10000|mimes:xlsx,xls',
        // ]);
        $file=$request->file('excel-karyawan');
        // dd($file);
        Excel::import(new UserImport    , $file);
        return redirect()->back();
    }

    public function exportTemplate()
    {
        return 1;
        // return Excel::download(new UserTemplateExport, 'template.xlsx');
    }
}
