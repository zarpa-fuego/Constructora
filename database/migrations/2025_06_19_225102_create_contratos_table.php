<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id('ID_Contrato');
            $table->unsignedBigInteger('ID_Cliente');
            $table->unsignedBigInteger('ID_Terreno');
            $table->date('Fecha_Inicio');
            $table->date('Fecha_Firma');
            $table->string('Estado_Contrato', 50);

            $table->foreign('ID_Cliente')->references('ID_Cliente')->on('clientes');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
