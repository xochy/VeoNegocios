<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use App\Network;
use App\Store;
use Faker\Generator as Faker;

$factory->define(Network::class, function (Faker $faker) {

    $stores = Store::all();
    $contacts = Contact::all();
    $id_contact = $contacts->random()->id;
    $value_description = '';

    switch ($id_contact) {
        case 1:
            $value_description = $faker->tollFreePhoneNumber;
            break;
        case 2:
            $value_description = $faker->tollFreePhoneNumber;
            break;
        case 3:
            $value_description = $faker->url;
            break;
        case 4:
            $value_description = $faker->url;
            break;
        default:
            $value_description = '';
            break;
    }

    return [
        'description' => $value_description,
        'store_id'    => $stores->random()->id,
        'contact_id'  => $id_contact,
    ];
});
