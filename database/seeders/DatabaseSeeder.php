<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        // Llamar a los seeders en orden de dependencia
        $this->call([
            UbicacionSeeder::class,  // Primero las ubicaciones
            ClienteSeeder::class,    // Después los clientes
            UserSeeder::class,       // <-- Agrega aquí tu UserSeeder
        ]);

        $this->command->info('✅ Base de datos poblada exitosamente');
        $this->command->info('📍 Ubicaciones: Departamentos, Provincias y Distritos');
        $this->command->info('👥 Clientes de prueba creados');
        $this->command->info('🔑 Usuario admin creado');
    }
}
