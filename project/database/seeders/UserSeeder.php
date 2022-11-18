<?php

namespace Database\Seeders;

use Faker\Factory;
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
                'first_name' => 'admin',
                'last_name' => 'admin',
                'date_of_birth' => '2001-01-01',
                'email' => 'admin@gmail.com',
                'mobile_number' => '0904159596',
                'avatar' => '',
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'admin',
                'fingerprint'=>'0'
            ],
            [
                'first_name' => 'Cô',
                'last_name' => 'Hương',
                'date_of_birth' => '2001-02-02',
                'email' => 'teacher@gmail.com',
                'mobile_number' => '0904159595',
                'avatar' => '',
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'teacher',
                'fingerprint' => '0'
            ],
            [
                'first_name' => 'Thầy',
                'last_name' => 'Long',
                'date_of_birth' => '2001-02-02',
                'email' => 'teacher1@gmail.com',
                'mobile_number' => '0123456789',
                'avatar' => '',
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'teacher',
                'fingerprint' => '0'
            ],
            [
                'first_name' => 'Nguyễn',
                'last_name' => 'Ngọc Long',
                'date_of_birth' => '2001-02-02',
                'email' => 'student@gmail.com',
                'mobile_number' => '0123456788',
                'avatar' => '',
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'student',
                'fingerprint' => '0'
            ],
            [
                'first_name' => 'Nguyễn',
                'last_name' => 'Trường Thịnh',
                'date_of_birth' => '2001-02-02',
                'email' => 'student1@gmail.com',
                'mobile_number' => '0123456787',
                'avatar' => '',
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'student',
                'fingerprint' => '0'
            ],
            [
                'first_name' => 'Trần',
                'last_name' => 'Thanh Tâm',
                'date_of_birth' => '2001-02-02',
                'email' => 'student2@gmail.com',
                'mobile_number' => '0904159595',
                'avatar' => '',
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'student',
                'fingerprint' => '0'
            ],
            [
                'first_name' => 'Nguyễn Tuấn',
                'last_name' => 'Trung',
                'date_of_birth' => '2001-02-02',
                'email' => 'student3@gmail.com',
                'mobile_number' => '0904159595',
                'avatar' => '',
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'student',
                'fingerprint' => '0'
            ],
            [
                'first_name' => 'Nguyễn',
                'last_name' => 'Thúy Quỳnh',
                'date_of_birth' => '2001-02-02',
                'email' => 'student4@gmail.com',
                'mobile_number' => '0904159595',
                'avatar' => '',
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'student',
                'fingerprint' => '0'
            ],
            [
                'first_name' => 'Nguyễn',
                'last_name' => 'Ngọc Linh',
                'date_of_birth' => '2001-02-02',
                'email' => 'student5@gmail.com',
                'mobile_number' => '0904159595',
                'avatar' => '',
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'student',
                'fingerprint' => '0'
            ],
            [
                'first_name' => 'Trần',
                'last_name' => 'Đức Nam',
                'date_of_birth' => '2001-02-02',
                'email' => 'student6@gmail.com',
                'mobile_number' => '0904159595',
                'avatar' => '',
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'student',
                'fingerprint' => '0'
            ],
            [
                'first_name' => 'Nguyễn',
                'last_name' => 'Hoàng Long',
                'date_of_birth' => '2001-02-02',
                'email' => 'student7@gmail.com',
                'mobile_number' => '0904159595',
                'avatar' => '',
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'student',
                'fingerprint' => '0'
            ],
            [
                'first_name' => 'Trần',
                'last_name' => 'Bích Ngọc',
                'date_of_birth' => '2001-02-02',
                'email' => 'student8@gmail.com',
                'mobile_number' => '0904159595',
                'avatar' => '',
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'student',
                'fingerprint' => '0'
            ],
            [
                'first_name' => 'Hoàng',
                'last_name' => 'Văn Thái',
                'date_of_birth' => '2001-02-02',
                'email' => 'student9@gmail.com',
                'mobile_number' => '0904159595',
                'avatar' => '',
                'address'=>'Ha Noi',
                'password'=> Hash::make('1'),
                'role'=>'student',
                'fingerprint' => '0'
            ],
            [
                'first_name' => 'Trần',
                'last_name' => 'Trung Hiếu',
                'date_of_birth' => '2001-02-02',
                'email' => 'student10@gmail.com',
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
