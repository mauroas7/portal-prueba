<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario director
        User::create([
            'name' => 'Director General',
            'email' => 'director@example.com',
            'password' => Hash::make('password'),
            'role' => 'director',
            'email_verified_at' => now(),
        ]);

        // Crear usuario médico
        User::create([
            'name' => 'Dr. Juan Pérez',
            'email' => 'medico@example.com',
            'password' => Hash::make('password'),
            'role' => 'medico',
            'email_verified_at' => now(),
        ]);

        // Crear usuario paciente
        User::create([
            'name' => 'María García',
            'email' => 'paciente@example.com',
            'password' => Hash::make('password'),
            'role' => 'paciente',
            'email_verified_at' => now(),
        ]);

        // Crear más usuarios de prueba
        User::create([
            'name' => 'Dr. Ana López',
            'email' => 'medico2@example.com',
            'password' => Hash::make('password'),
            'role' => 'medico',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Carlos Rodríguez',
            'email' => 'paciente2@example.com',
            'password' => Hash::make('password'),
            'role' => 'paciente',
            'email_verified_at' => now(),
        ]);
    }
}
