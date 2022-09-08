<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([[
            'role_id'=> '1',
            'role_name'=>'admin'
        ],[
            'role_id'=>'2',
            'role_name'=>'user'
        ]]);
        //
    }
}
