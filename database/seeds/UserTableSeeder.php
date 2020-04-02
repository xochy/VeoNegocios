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
        $user->email = "administrator@mail.com";
        $user->password = bcrypt('?!queryadministrador2020');
        $user->save();

        $user->roles()->attach($role_administrator);
    }
}