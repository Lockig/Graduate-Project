<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class CourseExport implements FromCollection
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
        //
    }
}
