<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TerrenoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('terrenos')->insert([
            [
                'ID_Terrreno' => 1,
                'Nombre_Terreno' => 'Lote A1',
                'Area_m2' => 120.50,
                'Estado_Terreno' => 'Disponible',
                'Dirrecion' => 'Calle 1, Manzana A',
                'Precio' => 25000.00,
                'ID_Urbanizacion' => 1,
                'ID_Contrato' => 1,
            ],
            [
                'ID_Terrreno' => 2,
                'Nombre_Terreno' => 'Lote A2',
                'Area_m2' => 130.00,
                'Estado_Terreno' => 'Disponible',
                'Dirrecion' => 'Calle 2, Manzana A',
                'Precio' => 26000.00,
                'ID_Urbanizacion' => 1,
                'ID_Contrato' => 2,
            ],
            [
                'ID_Terrreno' => 3,
                'Nombre_Terreno' => 'Lote B1',
                'Area_m2' => 110.75,
                'Estado_Terreno' => 'Disponible',
                'Dirrecion' => 'Calle 1, Manzana B',
                'Precio' => 24000.00,
                'ID_Urbanizacion' => 2,
                'ID_Contrato' => 3,
            ],
            [
                'ID_Terrreno' => 4,
                'Nombre_Terreno' => 'Lote B2',
                'Area_m2' => 125.00,
                'Estado_Terreno' => 'Disponible',
                'Dirrecion' => 'Calle 2, Manzana B',
                'Precio' => 25500.00,
                'ID_Urbanizacion' => 2,
                'ID_Contrato' => 4,
            ],
            [
                'ID_Terrreno' => 5,
                'Nombre_Terreno' => 'Lote C1',
                'Area_m2' => 140.00,
                'Estado_Terreno' => 'Disponible',
                'Dirrecion' => 'Calle 1, Manzana C',
                'Precio' => 27000.00,
                'ID_Urbanizacion' => 3,
                'ID_Contrato' => 5,
            ],
            [
                'ID_Terrreno' => 6,
                'Nombre_Terreno' => 'Lote C2',
                'Area_m2' => 135.50,
                'Estado_Terreno' => 'Disponible',
                'Dirrecion' => 'Calle 2, Manzana C',
                'Precio' => 26500.00,
                'ID_Urbanizacion' => 3,
                'ID_Contrato' => 6,
            ],
            [
                'ID_Terrreno' => 7,
                'Nombre_Terreno' => 'Lote D1',
                'Area_m2' => 150.00,
                'Estado_Terreno' => 'Disponible',
                'Dirrecion' => 'Calle 1, Manzana D',
                'Precio' => 28000.00,
                'ID_Urbanizacion' => 4,
                'ID_Contrato' => 7,
            ],
            [
                'ID_Terrreno' => 8,
                'Nombre_Terreno' => 'Lote D2',
                'Area_m2' => 145.00,
                'Estado_Terreno' => 'Disponible',
                'Dirrecion' => 'Calle 2, Manzana D',
                'Precio' => 27500.00,
                'ID_Urbanizacion' => 4,
                'ID_Contrato' => 8,
            ],
            [
                'ID_Terrreno' => 9,
                'Nombre_Terreno' => 'Lote E1',
                'Area_m2' => 160.00,
                'Estado_Terreno' => 'Disponible',
                'Dirrecion' => 'Calle 1, Manzana E',
                'Precio' => 29000.00,
                'ID_Urbanizacion' => 5,
                'ID_Contrato' => 9,
            ],
            [
                'ID_Terrreno' => 10,
                'Nombre_Terreno' => 'Lote E2',
                'Area_m2' => 155.00,
                'Estado_Terreno' => 'Disponible',
                'Dirrecion' => 'Calle 2, Manzana E',
                'Precio' => 28500.00,
                'ID_Urbanizacion' => 5,
                'ID_Contrato' => 10,
            ],
        ]);
    }
}
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(TerrenoSeeder::class);
    }
}
