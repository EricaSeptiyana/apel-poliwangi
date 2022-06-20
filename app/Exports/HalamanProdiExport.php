<?php

namespace App\Exports;

use App\prodi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class HalamanProdiExport implements FromView
{
    public function view(): View
    {

        $prodi = prodi::all();

        return view('admin.user.import-templates.template-import-prodi', compact('prodi'));
    }
}
