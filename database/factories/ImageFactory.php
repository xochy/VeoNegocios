<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'url' => 'images/' . $faker->image('public/storage/images', 300, 200, null, false),
        'tittle' => $faker->catchPhrase,
        'description' => $faker->sentence(10)
    ];
});
