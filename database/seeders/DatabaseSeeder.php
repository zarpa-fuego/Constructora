<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamar a los seeders en orden de dependencia
        $this->call([
            UbicacionSeeder::class,  // Primero las ubicaciones
            ClienteSeeder::class,    // Después los clientes
            UserSeeder::class
        ]);

        $this->command->info('✅ Base de datos poblada exitosamente');
        $this->command->info('📍 Ubicaciones: Departamentos, Provincias y Distritos');
        $this->command->info('👥 Clientes de prueba creados');

        // Comentado para referencia futura
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
