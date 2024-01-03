<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name'=> 'Coordinador']);
        $role2 = Role::create(['name'=> 'Docente']);
        $role3 = Role::create(['name'=> 'Preceptor']);

        Permission::create(['name'=> 'docentes.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=> 'docentes.create'])->assignRole($role1);
        Permission::create(['name'=> 'docentes.update'])->assignRole($role1);
        Permission::create(['name'=> 'docentes.destroy'])->assignRole($role1);
        Permission::create(['name'=> 'docentes.buscar'])->assignRole($role1);

        Permission::create(['name'=> 'materia.create'])->assignRole($role1);

        Permission::create(['name'=> 'estudiantes.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=> 'estudiantes.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=> 'estudiantes.update'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=> 'estudiantes.destroy'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=> 'estudiantes.buscar'])->syncRoles([$role1, $role2, $role3]);

    }
}
