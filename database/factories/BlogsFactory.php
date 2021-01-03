<?php

use Faker\Generator as Faker;

$factory->define(App\Blog::class, function (Faker $faker) {
	return [
		'title' => $faker->sentence(10),
		'body' => $faker->sentence(100),
		'address' => $faker->word(100),
		'city' => $faker->word(100),
		'region' => $faker->word(100),
		'video' => $faker->word(100),
	];
});
