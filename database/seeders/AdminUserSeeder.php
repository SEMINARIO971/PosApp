<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear el usuario
        $admin = User::updateOrCreate([
            'email' => 'admin@admin.com'
        ], [
            'name' => 'Administrador',
            'password' => Hash::make('00000000'), // Hasheamos la contraseña
        ]);

        // Asignar el rol de Administrador
        $adminRole = Role::firstOrCreate(['name' => 'Administrador']); // Crear o buscar el rol
        $admin->assignRole($adminRole); // Asignar el rol al usuario
    }
}
