<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_grades')->insert([
                [
                    'user_id' => '1',
                    'diem_lan_1' => '7',
                    'diem_lan_2' => '8',
                    'diem_lan_3' => '9'
                ], [
                    'user_id' => '6',
                    'diem_lan_1' => '8',
                    'diem_lan_2' => '8',
                    'diem_lan_3' => '8'
                ]
            ]
        );
        //
    }
}
