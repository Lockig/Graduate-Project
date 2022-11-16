<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenaltySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penalties')->insert([
            [
                'penalty_amount' => '10000'
            ],
            [
                'penalty_amount' => '20000'
            ],
            [
                'penalty_amount' => '30000'
            ],
        ]);
        //
    }
}
