<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_administrator = Role::where('name', 'administrator')->first();

        $user = new User();
        $user->name = "Administrator";
        $user->cel = "4531022978";
        $user->email = "admin@mail.com";
        $user->password = bcrypt('admin');
        $user->save();

        $user->roles()->attach($role_administrator);

        $role_costumer = Role::where('name', 'costumer')->first();

        $user = new User();
        $user->name = "jorge";
        $user->cel = "0";
        $user->email = "jorge@mail.com";
        $user->password = bcrypt('jorge');
        $user->save();

        $user->roles()->attach($role_costumer);

        $user = new User();
        $user->name = "mario";
        $user->cel = "0";
        $user->email = "mario@mail.com";
        $user->password = bcrypt('mario');
        $user->save();

        $user->roles()->attach($role_costumer);

        $user = new User();
        $user->name = "jose";
        $user->cel = "0";
        $user->email = "jose@mail.com";
        $user->password = bcrypt('jose');
        $user->save();

        $user->roles()->attach($role_costumer);

        $user = new User();
        $user->name = "martin";
        $user->cel = "0";
        $user->email = "martin@mail.com";
        $user->password = bcrypt('martin');
        $user->save();

        $user->roles()->attach($role_costumer);
    }
}
