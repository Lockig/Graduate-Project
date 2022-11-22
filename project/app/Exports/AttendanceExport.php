<?php

namespace App\Exports;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AttendanceExport implements FromCollection, WithCustomStartCell, ShouldQueue, WithHeadings,ShouldAutoSize
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
    public function styles(Worksheet $sheet)
    {
        return [
            'B2'=>['font'=>['bold'=>true]],
            'C2'=>['font'=>['bold'=>true]],
            'D2'=>['font'=>['bold'=>true]],
            'E2'=>['font'=>['bold'=>true]],
            'F2'=>['font'=>['bold'=>true]],
            'G2'=>['font'=>['bold'=>true]],

        ];
    }
}
