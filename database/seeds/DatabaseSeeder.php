<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(ContactTableSeeder::class);


        $this->call(CategorySeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(NetworkSeeder::class);
    }
}
