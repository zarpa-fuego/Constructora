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
        Schema::create('terrenos', function (Blueprint $table) {
            $table->id('ID_Terrreno');
            $table->string('Nombre_Terreno', 50);
            $table->decimal('Area_m2', 10, 2);
            $table->string('Estado_Terreno', 50);
            $table->string('Dirrecion', 50);
            $table->decimal('Precio', 10, 2);
            $table->unsignedBigInteger('ID_Urbanizacion');
            $table->unsignedBigInteger('ID_Contrato');

            $table->foreign('ID_Urbanizacion')->references('ID_Urbanizacion')->on('urbanizacions');
            $table->foreign('ID_Contrato')->references('ID_Contrato')->on('contratos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terrenos');
    }
};
