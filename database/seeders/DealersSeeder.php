<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DealersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dealers')->insert([
            'name' => 'Rasmus Lerdorf',
            'country' => 'Greenland',
            'state' => 'GR',
			'city' => 'Qeqertarsuaq',
			'zip' => '90001'
        ]);         
		
		DB::table('dealers')->insert([
            'name' => 'Taylor Otwell',
            'country' => 'USA',
			'state' => 'LA',
			'city' => 'Los Angeles',
			'zip' => '90002'
        ]);		
		
		DB::table('dealers')->insert([
            'name' => 'Elon Musk',
            'country' => 'USA',
			'state' => 'CA',
			'city' => 'Silicon Valley',
			'zip' => '90003'
        ]);		
		
		DB::table('dealers')->insert([
            'name' => 'Mark Zuckerberg',
            'country' => 'USA',
			'state' => 'CA',
			'city' => 'Silicon Valley',
			'zip' => '90004'
        ]);		
		
		DB::table('dealers')->insert([
            'name' => 'Dilshod Khudoyarov',
            'country' => 'Uzbekistan',
			'state' => 'UZ',
			'city' => 'Tashkent',
			'zip' => '10001'
        ]);
    }
}
