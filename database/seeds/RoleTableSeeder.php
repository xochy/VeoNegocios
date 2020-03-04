<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = "administrator";
        $role->description = "Administrador";
        $role->save();

        $role = new Role();
        $role->name = "collector";
        $role->description = "Recolector";
        $role->save();

        $role = new Role();
        $role->name = "costumer";
        $role->description = "cliente";
        $role->save();

        $role = new Role();
        $role->name = "viewer";
        $role->description = "Observador";
        $role->save();
    }
}