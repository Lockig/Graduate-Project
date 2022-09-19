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
           'position_id'=>'1',
            'position_name'=>'Front-end Developer'
        ],[
            'position_id'=>'2',
            'position_name'=>'PHP Back-end Developer'
        ],[
            'position_id'=>'3',
            'position_name'=>'Ruby Developer'
        ],[
            'position_id'=>'4',
            'position_name'=>'AI '
        ],[
            'position_id'=>'5',
            'position_name'=>'PHP Front-end Developer'
        ]]);
        //
    }
}
