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
            [
                'first_name' => 'do',
                'last_name' => 'minh',
                'date_of_birth' => '2001-01-01',
                'email' => 'minhntt2001hn@gmail.com',
                'mobile_number' => '0904159596',
                'avatar' => '',
                'fingerprint' => '1',
                'position_id' => '1'
            ],
            [
                'first_name' => 'nguyen',
                'last_name' => 'thuy linh',
                'date_of_birth' => '2001-02-02',
                'email' => 'linh@gmail.com',
                'mobile_number' => '0904159595',
                'avatar' => '',
                'fingerprint' => '2',
                'position_id' => '2'
            ],
        ]);
        //
    }
}
