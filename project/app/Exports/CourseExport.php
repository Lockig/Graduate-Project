<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CourseExport implements FromCollection,WithHeadings,WithCustomStartCell,ShouldAutoSize
{
    use Exportable;

    private $courses;

    public function __construct($courses)
    {
        $this->courses = $courses;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->courses;
        //
    }
    public function headings():array
    {
        return [
            'STT',
            'Ten khoa',
            'Ngay bat dau',
            'Ngay ket thuc',
            'Mo ta',
            'Tinh trang',
        ];
    }
    public function startCell(): string
    {
        return 'B2';
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
