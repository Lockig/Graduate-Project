<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserWorkingDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_working_details')->insert([
            [
                'user_id'=>'1',
                'seniority'=>'1',
                'join_date'=>'2022-09-30',
                'max_day_off'=>'1',
                'day_off'=>'2'
            ],
            [
                'user_id'=>'2',
                'seniority'=>'1',
                'join_date'=>'2022-09-30',
                'max_day_off'=>'1',
                'day_off'=>'2'
            ]
        ]);
        //
    }
}
