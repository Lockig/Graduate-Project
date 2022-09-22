<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithCustomStartCell, ShouldQueue,WithHeadings
{
    use Exportable;
    /**
    *
    */
    protected $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function collection()
    {
        return $this->user;
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
            'So dien thoai'
        ];
    }
}
