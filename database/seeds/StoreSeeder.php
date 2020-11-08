<?php

use App\Address;
use App\City;
use App\Image;
use App\Store;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = City::all();
        $stores = factory(Store::class)->times(1)->create();

        foreach ($stores as $store) {
            $store->images()->attach(factory(Image::class)->create());
            $store->images()->attach(factory(Image::class)->create(['position' => 1]));
            $store->images()->attach(factory(Image::class)->create(['position' => 2]));
            $store->images()->attach(factory(Image::class)->create(['position' => 3]));

            factory(Address::class)->create(['store_id' => $store->id, 'city_id' => $cities->random()->id]);
        }
    }
}
