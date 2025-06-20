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
        Schema::create('agente_inmobiliarios', function (Blueprint $table) {
            $table->id('ID_Ag');
            $table->string('Nombre_Ag', 50);
            $table->string('Apellido_Ag', 50);
            $table->string('Telefono', 20);
            $table->string('Correo', 50);
            $table->decimal('Comision', 10, 2);
            $table->unsignedBigInteger('ID_Contrato');

            $table->foreign('ID_Contrato')->references('ID_Contrato')->on('contratos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agente_inmobiliarios');
    }
};
