<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Store;
use App\User;
use Faker\Generator as Faker;

$factory->define(Store::class, function (Faker $faker) {


    $categories = Category::all();

    return [
        'name' => $faker->company,
        'description' => $faker->sentence(10),
        'score' => 5.0,
        'activated' => true,
        'slug' => $faker->slug,
        'user_id' => $faker->numberBetween(2, 5),
        'category_id' => $categories->random()->id
    ];
});
