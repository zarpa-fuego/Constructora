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
            $table->id(); // id_cliente
            $table->string('estado_civil', 20);
            $table->string('nombre', 120);
            $table->string('apellido', 180);
            $table->foreignId('distrito_id')->constrained('distritos')->onDelete('cascade');
            $table->string('direccion', 200);
            $table->string('telefono', 11);
            $table->string('email', 150)->unique();
            $table->string('dni_numero', 8)->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
