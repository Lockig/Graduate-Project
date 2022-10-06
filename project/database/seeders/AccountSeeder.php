<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            [
                'user_id' => '1',
                'role_id' => '1',
                'password' => Hash::make('minh2001')
            ],
            [
                'user_id' => '2',
                'role_id' => '2',
                'password' => Hash::make('linh1234')
            ],
            [
                'user_id'=>'3',
                'role_id'=>'3',
                'password'=> Hash::make('123456')
            ]
        ]);
        //
    }
}
