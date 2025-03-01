<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Anton',
            'email' => 'anton@datgate.com',
            'password' => Hash::make('123456789'),
        ]);         
		
		DB::table('users')->insert([
            'name' => 'Dishkan',
            'email' => 'dishkan@datgate.com',
            'password' => Hash::make('123456789'),
        ]);
    }
}
