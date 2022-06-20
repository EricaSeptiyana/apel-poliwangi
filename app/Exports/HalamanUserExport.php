<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class HalamanUserExport implements FromView
{
    public function view(): View
    {
        return view('admin.user.import-templates.template-import');
    }
}
