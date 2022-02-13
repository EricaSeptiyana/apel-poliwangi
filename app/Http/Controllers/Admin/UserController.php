<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Auth;
use Spatie\Permission\Models\Role;
use App\User;
use Hash;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        return view('admin.user.create', compact('pagename', 'allRoles'));
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
            'txt_username' => 'required',
            'txt_nip' => 'required',
            'txtemail_user' => 'required|email|unique:users,email',
            'txtpassword_user' => 'required|same:txtkonfirmasipassword_user',
            'role_user' => 'required'
        ]);

        $user=new User();
        $user->name=$request->txtnama_user;
        $user->username=$request->txt_username;
        $user->nip=$request->txt_nip;
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
        $pagename='Edit User';
        $user=User::find($id);
        $allRoles=Role::all();
        $userRole=$user->roles->pluck('id')->all();

        return view('admin.user.edit', compact('pagename', 'user', 'allRoles', 'userRole'));
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
            'txt_username' => 'required',
            'txt_nip' => 'required',
            'txtemail_user' => 'required|email',
            //'txtpassword_user' => 'required|same:txtkonfirmasipassword_user',
            'role_user' => 'required'
        ]);

        $user=User::find($id);
        $user->name=$request->txtnama_user;
        $user->username=$request->txt_username;
        $user->nip=$request->txt_nip;
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
}
