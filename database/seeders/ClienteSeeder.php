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
                'nombre' => 'María',
                'apellido' => 'García López',
                'dni_numero' => '12345678',
                'email' => 'maria.garcia@email.com',
                'telefono' => '987654321',
                'estado_civil' => 'Soltera',
                'direccion' => 'Av. Los Álamos 123, Urbanización Los Jardines',
                'distrito_id' => $distritos->where('nombre', 'Miraflores')->first()?->id ?? $distritos->random()->id
            ],
            [
                'nombre' => 'Carlos',
                'apellido' => 'Rodríguez Mendoza',
                'dni_numero' => '87654321',
                'email' => 'carlos.rodriguez@email.com',
                'telefono' => '912345678',
                'estado_civil' => 'Casado',
                'direccion' => 'Calle Las Flores 456, Conjunto Residencial San Martín',
                'distrito_id' => $distritos->where('nombre', 'San Borja')->first()?->id ?? $distritos->random()->id
            ],
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
                'nombre' => 'Roberto',
                'apellido' => 'Morales Castro',
                'dni_numero' => '55667788',
                'email' => 'roberto.morales@email.com',
                'telefono' => '955443322',
                'estado_civil' => 'Soltero',
                'direccion' => 'Av. El Sol 321, Zona Residencial Norte',
                'distrito_id' => $distritos->where('nombre', 'Los Olivos')->first()?->id ?? $distritos->random()->id
            ],
            [
                'nombre' => 'Lucía',
                'apellido' => 'Vargas Huamán',
                'dni_numero' => '99887766',
                'email' => 'lucia.vargas@email.com',
                'telefono' => '966554433',
                'estado_civil' => 'Casada',
                'direccion' => 'Calle Los Laureles 654, Asociación de Vivienda Santa Rosa',
                'distrito_id' => $distritos->where('nombre', 'Villa El Salvador')->first()?->id ?? $distritos->random()->id
            ],
            [
                'nombre' => 'Pedro',
                'apellido' => 'Chávez Romero',
                'dni_numero' => '33445566',
                'email' => 'pedro.chavez@email.com',
                'telefono' => '977665544',
                'estado_civil' => 'Viudo',
                'direccion' => 'Av. Universitaria 987, Urb. El Pacífico',
                'distrito_id' => $distritos->where('nombre', 'San Martín de Porres')->first()?->id ?? $distritos->random()->id
            ],
            [
                'nombre' => 'Carmen',
                'apellido' => 'Torres Quispe',
                'dni_numero' => '77889900',
                'email' => 'carmen.torres@email.com',
                'telefono' => '944332211',
                'estado_civil' => 'Conviviente',
                'direccion' => 'Jr. Independencia 147, Barrio San José',
                'distrito_id' => $distritos->where('nombre', 'Breña')->first()?->id ?? $distritos->random()->id
            ],
            [
                'nombre' => 'Miguel',
                'apellido' => 'Herrera Vega',
                'dni_numero' => '22334455',
                'email' => 'miguel.herrera@email.com',
                'telefono' => '933221100',
                'estado_civil' => 'Soltero',
                'direccion' => 'Calle San Martín 258, Centro Histórico',
                'distrito_id' => $distritos->where('nombre', 'Lima')->first()?->id ?? $distritos->random()->id
            ],
            [
                'nombre' => 'Rosa',
                'apellido' => 'Delgado Paredes',
                'dni_numero' => '66778899',
                'email' => 'rosa.delgado@email.com',
                'telefono' => '922110099',
                'estado_civil' => 'Casada',
                'direccion' => 'Av. La Marina 369, Residencial Los Pinos',
                'distrito_id' => $distritos->where('nombre', 'San Miguel')->first()?->id ?? $distritos->random()->id
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
