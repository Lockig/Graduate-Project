<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListMarkExport implements FromCollection, WithCustomStartCell, WithHeadings
{

    private $grades;


    public function __construct($users)
    {
        $this->grades = $users;
    }

    public function collection()
    {
        return $this->grades;

    }


    public function startCell(): string
    {
        return 'B2';
    }

    public function headings(): array
    {
        return [
            'ID','Điểm lần 1','Điểm lần 2','Điểm lần 3'
        ];
    }
}
