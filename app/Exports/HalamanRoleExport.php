<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Spatie\Permission\Models\Role;

class HalamanRoleExport implements FromView
{
    public function view(): View
    {

        $roles = Role::all();

        return view('admin.user.import-templates.template-import-role', compact('roles'));
    }
}
