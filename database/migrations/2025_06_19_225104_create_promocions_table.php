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
        Schema::create('promocions', function (Blueprint $table) {
            $table->id('ID_Promocion');
            $table->string('Nombre_Promocion', 50);
            $table->string('Descripcion', 50);
            $table->date('Fecha_Inicio_Promocion');
            $table->date('Fecha_Fin_Promocion');
            $table->unsignedBigInteger('ID_Contrato');

            $table->foreign('ID_Contrato')->references('ID_Contrato')->on('contratos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promocions');
    }
};
