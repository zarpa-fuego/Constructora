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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('ID_Pago');
            $table->unsignedBigInteger('ID_Cliente');
            $table->unsignedBigInteger('ID_Terreno');
            $table->date('Fecha_Pago');
            $table->decimal('Monto', 10, 2);
            $table->string('Metodo_Pago', 50);
            $table->string('Tipo_Pago', 50);
            $table->unsignedBigInteger('ID_Contrato');

            $table->foreign('ID_Cliente')->references('ID_Cliente')->on('clientes');
            $table->foreign('ID_Terreno')->references('ID_Terrreno')->on('terrenos');
            $table->foreign('ID_Contrato')->references('ID_Contrato')->on('contratos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
