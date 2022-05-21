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

        Permission::create(['name' => 'socios'])->syncRoles([$role1]);
        Permission::create(['name' => 'ver.socio'])->syncRoles([$role1]);
        Permission::create(['name' => 'cuentas'])->syncRoles([$role1]);
        Permission::create(['name' => 'ver.cuenta'])->syncRoles([$role1]);
        Permission::create(['name' => 'cuenta.abono'])->syncRoles([$role1]);
        Permission::create(['name' => 'cuenta.retiro'])->syncRoles([$role1]);
        Permission::create(['name' => 'cuenta.cuenta'])->syncRoles([$role1]);
        Permission::create(['name' => 'cuenta.re.impresion'])->syncRoles([$role1]);

        // Register
        Permission::create(['name' => 'register'])->syncRoles([$role1]);

    }
}
