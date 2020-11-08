<?php

use App\Image;
use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = factory(Product::class)->times(20)->create();

        foreach ($products as $product) {
            $product->images()->attach(factory(Image::class)->create(['position' => 1]));
        }
    }
}
