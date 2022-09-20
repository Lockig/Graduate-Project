<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function startCell(): string
    {
        return 'B2';
    }
}
