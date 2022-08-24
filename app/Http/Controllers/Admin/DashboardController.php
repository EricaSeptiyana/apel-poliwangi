<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\jabatan;
use App\kelompokk;
use App\pelaporann;
use App\penugasankaryawan;
use App\prodi;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $datalogin=Auth::user();

        //total per user
        $totalperjadin = pelaporann::where('user_id', $datalogin->id)->count();
        $totalpengajuan = kelompokk::where('user_id', $datalogin->id)->count();
        $totalprodi = prodi::all()->count();
        $totaljabatan = jabatan::all()->count();
        $totalkaryawan = User::all()->count();
        $totalarsipsurat = penugasankaryawan::where('nip', $datalogin->id)->count();
        
        // $data = kelompokk::where('user_id', $datalogin->id)->get()->sortDesc();
        //total pertahun
        // $totalpengajuanpertahun = kelompokk::whereYear('created_at', Carbon::today()->year)->count();
        // $totalpengajuan = kelompokk::whereYear('created_at', Carbon::today()->year)->count();
        // $totalarsipsurat = kelompokk::whereYear('created_at', Carbon::today()->year)->count();
        // $totalperjadin = pelaporann::whereYear('created_at', Carbon::today()->year)->count();

        return view('admin.dashboard', compact( 'datalogin', 'totalperjadin', 'totalpengajuan', 'totalkaryawan', 'totalprodi', 'totaljabatan', 'totalarsipsurat'));
    }
}
