<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Store;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    $stores = Store::all();

    return [
        'name'        => $faker->colorName,
        'description' => $faker->sentence(10),
        'price'       => '$100.00',
        'offered'     => true,
        'slug'        => $faker->slug,
        'store_id'    => $stores->random()->id
    ];
});
