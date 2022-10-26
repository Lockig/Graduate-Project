<?php

namespace App\Exports;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendanceExport implements FromCollection, WithCustomStartCell, ShouldQueue, WithHeadings
{
    private $attendance;
    public function __construct($attendance)
    {
        $this->attendance = $attendance;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }

    public function startCell(): string
    {
        return 'B2';
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
