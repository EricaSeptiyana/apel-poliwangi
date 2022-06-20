<?php

namespace App\Exports;

use App\jabatan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class HalamanJabatanExport implements FromView
{
    public function view(): View
    {

        $jabatan = jabatan::all();

        return view('admin.user.import-templates.template-import-jabatan', ['jabatan' => $jabatan]);
    }
}
