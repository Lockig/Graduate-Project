<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attendances')->insert([
            ['user_id'=>'2','schedule_id'=>'1','time_in'=>'2022-11-01 08:00:00','penalty_id'=>'1'],
            ['user_id'=>'4','schedule_id'=>'1','time_in'=>'2022-11-01 08:05:00','penalty_id'=>'2'],
            ['user_id'=>'5','schedule_id'=>'1','time_in'=>'2022-11-01 08:10:00','penalty_id'=>'3'],
            ['user_id'=>'6','schedule_id'=>'1','time_in'=>'2022-11-01 08:15:00','penalty_id'=>'3'],
            ['user_id'=>'7','schedule_id'=>'1','time_in'=>'2022-11-01 08:20:00','penalty_id'=>'3'],
            ['user_id'=>'8','schedule_id'=>'1','time_in'=>'2022-11-01 08:00:00','penalty_id'=>'3'],
        ]);
    }
}
