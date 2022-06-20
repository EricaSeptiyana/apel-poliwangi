<?php

namespace App\Imports;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UserImport implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            'Worksheet' => new HalamanUserImport
        ];
    }
}
