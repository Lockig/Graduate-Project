<?php

namespace Database\Seeders;

use App\Models\User;
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
        $faker = Factory::create();
        DB::table('users')->insert([
        [
            'first_name' => 'admin',
            'last_name' => 'admin',
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
    ]);
        for($i = 0; $i<30; $i++){
            User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date('Y-m-d'),
                'email' => $faker->name . '@gmail.com',
                'mobile_number' => $faker->phoneNumber,
                'avatar' => '',
                'address'=>$faker->address,
                'password'=> Hash::make('1'),
                'role'=>'student',
                'fingerprint'=>'0'
            ]);
        }

        //
    }
}
