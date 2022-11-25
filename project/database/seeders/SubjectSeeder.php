<?php

namespace Database\Seeders;

use Faker\Factory;
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
        $faker = Factory::create();
        DB::table('subjects')->insert([
            [
                'subject_id'=>'TOAN',
                'subject_name' => 'Toán'
            ],
            [
                'subject_id'=>'VAN',
                'subject_name' => 'Văn'
            ],
            [
                'subject_id'=>'ANH',
                'subject_name' => 'Anh'
            ]
        ]);
    }
}
