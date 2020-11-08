<?php

use App\Category;
use App\Image;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = factory(Category::class)->create();
        $image1 = factory(Image::class)->create(['position' => 1]);
        $image2 = factory(Image::class)->create(['position' => 2]);

        $category->images()->attach($image1);
        $category->images()->attach($image2);

        // $category = factory(Category::class)->create();
        // $image1 = factory(Image::class)->create(['position' => 1]);
        // $image2 = factory(Image::class)->create(['position' => 2]);

        // $category->images()->attach($image1);
        // $category->images()->attach($image2);

        // $category = factory(Category::class)->create();
        // $image1 = factory(Image::class)->create(['position' => 1]);
        // $image2 = factory(Image::class)->create(['position' => 2]);

        // $category->images()->attach($image1);
        // $category->images()->attach($image2);
    }
}
