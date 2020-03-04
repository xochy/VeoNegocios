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
        $role_collector     = Role::where('name', 'collector')->first();
        $role_costumer      = Role::where('name', 'costumer')->first();
        $role_viewer        = Role::where('name', 'viewer')->first();

        $user = new User();
        $user->name = "Administrator";
        $user->email = "administrator@mail.com";
        $user->password = bcrypt('query');
        $user->save();

        $user->roles()->attach($role_administrator);

        $user = new User();
        $user->name = "Collector";
        $user->email = "collector@mail.com";
        $user->password = bcrypt('query');
        $user->save();

        $user->roles()->attach($role_collector);

        $user = new User();
        $user->name = "Costumer";
        $user->email = "costumer@mail.com";
        $user->password = bcrypt('query');
        $user->save();

        $user->roles()->attach($role_costumer);

        $user = new User();
        $user->name = "Viewer";
        $user->email = "viewer@mail.com";
        $user->password = bcrypt('query');
        $user->save();

        $user->roles()->attach($role_viewer);
    }
}