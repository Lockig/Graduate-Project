<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name'=>'do',
            'last_name'=>'minh',
            'date_of_birth'=>'2001-01-01',
            'email'=>'minhntt2001hn@gmail.com',
            'mobile_number'=>'0904159596',
            'avatar'=>''
        ]);
        //
    }
}