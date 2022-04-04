<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role; //Importamos el modelo de Role
use Spatie\Permission\Models\Permission; //Importamos el modelo de permiso

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);

        Permission::create(['name' => 'admin.users'])->syncRoles([$role1]);
    }
}
