<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('day_off_requests')->insert(
            [
                'student_id'=>'4',
                'schedule_id'=>'4',
                'content'=>'em xin nghỉ ốm ạ',
                'stage'=>'Chờ duyệt'
            ]
        );

        //
    }
}
