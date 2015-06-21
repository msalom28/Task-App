<?php namespace App\Helpers;

use Faker\Factory as Faker;

class Helpers
{
	public function gravatar_url()
	{
		$faker = Faker::create();

		return $faker->imageUrl($width = 40	, $height = 40);	
	}
} 