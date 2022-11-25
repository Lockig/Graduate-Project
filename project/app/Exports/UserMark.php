<?php

namespace App\Exports;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithBackgroundColor;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UserMark implements FromCollection, WithCustomStartCell, ShouldQueue, WithHeadings,WithStyles, ShouldAutoSize,WithBackgroundColor
{
    use Exportable;

    public $list;

    public function __construct($list){
        $this->list = $list;
    }

    public function collection()
    {

        return $this->list;
        //
    }

    public function startCell(): string
    {
        return 'B2';
    }

    public function headings(): array{

        return [
            'Mã lớp học',
            'Tên lớp học',
            'Điểm lần 1',
            'Điểm lần 2',
            'Điểm lần 3'
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

    public function backgroundColor()
    {

    }
}
