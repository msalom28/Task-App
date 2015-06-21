<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();
		foreach (range(1, 10) as $index) {
		
			User::create([
				
				'name' 			=> 	$faker->firstName,
				'email'			=>	$faker->unique()->email,
				'password'		=> 	bcrypt('secret')
				
			]);
		}
	}
}