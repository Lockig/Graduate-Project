<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('check_times')->insert([[
            'time_in' => '08:00:00',
            'time_out' => '12:00:00'
        ],[
            'time_in' => '03:00:00',
            'time_out' => '17:30:00'
        ]]);
        //
    }
}
