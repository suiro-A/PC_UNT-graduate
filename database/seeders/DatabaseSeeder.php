<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuarios de ejemplo:
        // 2 egresados
        User::create([
            'nombres' => 'Juan',
            'apellidos' => 'Pérez',
            'dni' => '12345678',
            'email' => 'egresado1@example.com',
            'password' => Hash::make('password'),
            'anio_egreso' => 2020,
            'role' => 'egresado',
        ]);

        User::create([
            'nombres' => 'María',
            'apellidos' => 'González',
            'dni' => '87654321',
            'email' => 'egresado2@example.com',
            'password' => Hash::make('password'),
            'anio_egreso' => 2021,
            'role' => 'egresado',
        ]);

        // 2 gestores
        User::create([
            'nombres' => 'Carlos',
            'apellidos' => 'Lopez',
            'dni' => '11223344',
            'email' => 'gestor1@example.com',
            'password' => Hash::make('password'),
            'role' => 'gestor',
        ]);

        User::create([
            'nombres' => 'Luisa',
            'apellidos' => 'Martínez',
            'dni' => '44332211',
            'email' => 'gestor2@example.com',
            'password' => Hash::make('password'),
            'role' => 'gestor',
        ]);

        // 1 admin
        User::create([
            'nombres' => 'Admin',
            'apellidos' => 'Super',
            'dni' => '00001111',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 1 director
        User::create([
            'nombres' => 'Director',
            'apellidos' => 'General',
            'dni' => '11110000',
            'email' => 'director@example.com',
            'password' => Hash::make('password'),
            'role' => 'director',
        ]);
    }
}
