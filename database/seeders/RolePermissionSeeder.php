<?php
// database/seeders/RolePermissionSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos
        $permission1 = Permission::create(['name' => 'view dashboard']);
        $permission2 = Permission::create(['name' => 'edit users']);
        
        // Crear roles
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);

        // Asignar permisos a roles
        $roleAdmin->givePermissionTo($permission1);
        $roleAdmin->givePermissionTo($permission2);

        $roleUser->givePermissionTo($permission1);

        // Crear usuario si no existe
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'], // Cambia este email si es necesario
            ['name' => 'Admin', 'password' => bcrypt('password')] // Cambia estos datos si es necesario
        );

        // Asignar rol al usuario
        $user->assignRole($roleAdmin);
    }
}
