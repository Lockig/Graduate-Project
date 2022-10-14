<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'admin',
                'fingerprint'=>'0'
            ],
            [
                'first_name' => 'nguyen',
                'last_name' => 'tuan trung',
                'date_of_birth' => '2001-02-02',
                'email' => 'minhntt2001hn5@gmail.com',
                'mobile_number' => '0904159595',
                'avatar' => '',
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'teacher',
                'fingerprint' => '0'
            ],
            [
                'first_name' => 'nguyen',
                'last_name' => 'thuy linh',
                'date_of_birth' => '2001-02-02',
                'email' => 'linh@gmail.com',
                'mobile_number' => '0904159595',
                'avatar' => '',
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'teacher',
                'fingerprint' => '0'
            ],
            [
                'first_name' => 'do',
                'last_name' => 'le minh',
                'date_of_birth' => '2001-02-02',
                'email' => 'minhntt2001hn2@gmail.com',
                'mobile_number' => '0904159595',
                'avatar' => '',
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'student',
                'fingerprint' => '0'
            ],
            [
                'first_name' => 'do',
                'last_name' => 'le minh',
                'date_of_birth' => '2001-02-02',
                'email' => 'minhntt2001hn3@gmail.com',
                'mobile_number' => '0904159595',
                'avatar' => '',
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'student',
                'fingerprint' => '0'
            ],
            [
                'first_name' => 'do',
                'last_name' => 'le minh',
                'date_of_birth' => '2001-02-02',
                'email' => 'minhntt2001hn4@gmail.com',
                'mobile_number' => '0904159595',
                'avatar' => '',
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'student',
                'fingerprint' => '0'
            ],
        ]);
        //
    }
}
