<?php

use App\City;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new City();
        $city->name = 'Apatzingán';
        $city->slug = 'ap';
        $city->save();

        $city = new City();
        $city->name = 'Antúnez';
        $city->slug = 'an';
        $city->save();

        // $city = new City();
        // $city->name = 'Nueva Italia';
        // $city->slug = 'ni';
        // $city->save();
    }
}
