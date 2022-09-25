<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([[
            'position_name'=>'Front-end Developer'
        ],[
            'position_name'=>'PHP Back-end Developer'
        ],[
            'position_name'=>'Ruby Developer'
        ],[
            'position_name'=>'AI '
        ]]);
        //
    }
}
