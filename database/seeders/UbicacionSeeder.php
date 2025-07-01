<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Distrito;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear Departamento de Lima
        $lima = Departamento::create(['nombre' => 'Lima']);

        // Crear Provincia de Lima
        $provinciaLima = Provincia::create([
            'nombre' => 'Lima',
            'departamento_id' => $lima->id
        ]);

        // Crear Provincia de Callao
        $provinciaCallao = Provincia::create([
            'nombre' => 'Callao',
            'departamento_id' => $lima->id
        ]);

        // Distritos de Lima Metropolitana
        $distritosLima = [
            'Ancón', 'Ate', 'Barranco', 'Breña', 'Carabayllo',
            'Chaclacayo', 'Chorrillos', 'Cieneguilla', 'Comas',
            'El Agustino', 'Independencia', 'Jesús María',
            'La Molina', 'La Victoria', 'Lima', 'Lince',
            'Los Olivos', 'Lurigancho', 'Lurín', 'Magdalena del Mar',
            'Miraflores', 'Pachacámac', 'Pucusana', 'Pueblo Libre',
            'Puente Piedra', 'Punta Hermosa', 'Punta Negra',
            'Rímac', 'San Bartolo', 'San Borja', 'San Isidro',
            'San Juan de Lurigancho', 'San Juan de Miraflores',
            'San Luis', 'San Martín de Porres', 'San Miguel',
            'Santa Anita', 'Santa María del Mar', 'Santa Rosa',
            'Santiago de Surco', 'Surquillo', 'Villa El Salvador',
            'Villa María del Triunfo'
        ];

        foreach ($distritosLima as $distrito) {
            Distrito::create([
                'nombre' => $distrito,
                'provincia_id' => $provinciaLima->id
            ]);
        }
        foreach ($distritosLima as $distrito) {
    Distrito::create([
        'nombre' => $distrito,
        'provincia_id' => $provinciaLima->id
    ]);
}

// Agrega los distritos del Callao
$distritosCallao = [
    'Callao', 'Bellavista', 'Carmen de la Legua Reynoso', 'La Perla', 'La Punta', 'Ventanilla', 'Mi Perú'
];

foreach ($distritosCallao as $distrito) {
    Distrito::create([
        'nombre' => $distrito,
        'provincia_id' => $provinciaCallao->id
    ]);
}
      }

}
