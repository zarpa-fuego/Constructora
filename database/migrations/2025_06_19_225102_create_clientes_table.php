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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('ID_Cliente');
            $table->string('Nombre', 50);
            $table->string('Apellido_Paterno', 50);
            $table->string('Apellido_Materno', 50);
            $table->string('DNI', 20);
            $table->string('Correo', 50);
            $table->string('Telefono', 20);
            $table->string('Direccion', 50);
            $table->string('Estado_Cliente', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
