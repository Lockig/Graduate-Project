<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            [
                'subject_id'=>'A1',
                'subject_name' => 'Toán'
            ],
            [
                'subject_id'=>'B1',
                'subject_name' => 'Văn'
            ],
            [
                'subject_id'=>'C1',
                'subject_name' => 'Anh'
            ]
        ]);
    }
}
