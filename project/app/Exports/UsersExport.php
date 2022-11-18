<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithCustomStartCell, ShouldQueue, WithHeadings
{
    use Exportable;

    /**
     *
     */
    private $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function collection()
    {
        return $this->users->except('avatar');
    }

    public function startCell(): string
    {
        return 'B2';
    }

    public function query()
    {
        return User::query();
    }

    public function headings(): array
    {
        return [
            'STT',
            'Ho',
            'Ten',
            'Ngay sinh',
            'Email',
            'So dien thoai',
            'Avatar'
        ];
    }
}
