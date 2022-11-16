<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CourseExport implements FromCollection,WithHeadings,WithCustomStartCell
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
}
