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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id('ID_Factura');
            $table->unsignedBigInteger('ID_Cliente');
            $table->date('Fecha_Emision');
            $table->decimal('Monto_Total', 10, 2);
            $table->string('Estado_Factura', 50);
            $table->unsignedBigInteger('ID_Pago');

            $table->foreign('ID_Cliente')->references('ID_Cliente')->on('clientes');
            $table->foreign('ID_Pago')->references('ID_Pago')->on('pagos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
