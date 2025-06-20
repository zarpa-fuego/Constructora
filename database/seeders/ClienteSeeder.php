<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'Nombre' => 'Juan',
                'Apellido_Paterno' => 'Pérez',
                'Apellido_Materno' => 'Lopez',
                'DNI' => '12345678',
                'Correo' => 'juan@example.com',
                'Telefono' => '987654321',
                'Direccion' => 'Av. Siempre Viva 123',
                'Estado_Cliente' => 'Activo',
            ],
            [
                'Nombre' => 'María',
                'Apellido_Paterno' => 'Ramírez',
                'Apellido_Materno' => 'Torres',
                'DNI' => '87654321',
                'Correo' => 'maria@example.com',
                'Telefono' => '912345678',
                'Direccion' => 'Jr. Las Flores 456',
                'Estado_Cliente' => 'Inactivo',
            ],
        ]);
    }
}
