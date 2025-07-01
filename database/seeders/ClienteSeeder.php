<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Distrito;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener algunos distritos para asignar a los clientes
        $distritos = Distrito::all();

        if ($distritos->isEmpty()) {
            $this->command->error('No hay distritos disponibles. Ejecute primero UbicacionSeeder.');
            return;
        }

        // Crear clientes de prueba
        $clientes = [
            [
                'nombre' => 'Ana',
                'apellido' => 'Fernández Silva',
                'dni_numero' => '11223344',
                'email' => 'ana.fernandez@email.com',
                'telefono' => '998877665',
                'estado_civil' => 'Divorciada',
                'direccion' => 'Jr. Los Rosales 789, Pueblo Joven El Progreso',
                'distrito_id' => $distritos->where('nombre', 'San Juan de Lurigancho')->first()?->id ?? $distritos->random()->id
            ],

            [
                'nombre' => 'Alejandro',
                'apellido' => 'Ramírez Flores',
                'dni_numero' => '44556677',
                'email' => 'alejandro.ramirez@email.com',
                'telefono' => '911009988',
                'estado_civil' => 'Divorciado',
                'direccion' => 'Calle Los Cedros 741, Cooperativa de Vivienda El Futuro',
                'distrito_id' => $distritos->where('nombre', 'Comas')->first()?->id ?? $distritos->random()->id
            ]
        ];

        foreach ($clientes as $clienteData) {
            Cliente::create($clienteData);
        }

        $this->command->info('Clientes de prueba creados exitosamente: ' . count($clientes) . ' clientes');
    }
}
