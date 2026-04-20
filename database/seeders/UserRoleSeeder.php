<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Paciente;
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
        $paciente1 = User::create([
            'name' => 'María García',
            'email' => 'paciente@example.com',
            'password' => Hash::make('password'),
            'role' => 'paciente',
            'email_verified_at' => now(),
        ]);

        Paciente::create([
            'user_id' => $paciente1->id,
            'nombre' => 'María',
            'apellido' => 'García',
            'dni' => 'PAC-' . $paciente1->id,
        ]);

        // Crear más usuarios de prueba
        $medico2 = User::create([
            'name' => 'Dr. Ana López',
            'email' => 'medico2@example.com',
            'password' => Hash::make('password'),
            'role' => 'medico',
            'email_verified_at' => now(),
        ]);

        $paciente2 = User::create([
            'name' => 'Carlos Rodríguez',
            'email' => 'paciente2@example.com',
            'password' => Hash::make('password'),
            'role' => 'paciente',
            'email_verified_at' => now(),
        ]);

        Paciente::create([
            'user_id' => $paciente2->id,
            'nombre' => 'Carlos',
            'apellido' => 'Rodríguez',
            'dni' => 'PAC-' . $paciente2->id,
        ]);
    }
}
