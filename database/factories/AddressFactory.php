<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use App\City;
use App\Store;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {

    $stores = Store::all();
    $cities = City::all();

    return [
        'address_address' => $faker->address,
        'address_latitude' => $faker->latitude,
        'address_longitude' => $faker->longitude,
        'reference' => $faker->sentence(10),
        'schedule' => $faker->sentence(10),
        'slug' => $faker->slug,
        'store_id' => $stores->random()->id,
        'city_id' => $cities->random()->id,
    ];
});
