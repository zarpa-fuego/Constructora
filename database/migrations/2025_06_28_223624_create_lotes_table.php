<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->double('precio');
            $table->double('limite_sur');
            $table->double('limite_norte');
            $table->double('limite_este');
            $table->double('limite_oeste');
            $table->foreignId('proyecto_id')->constrained('proyectos')->onDelete('cascade');
            $table->string('manzana');
            $table->string('sector');
            $table->integer('nro_lote');
            $table->string('estado');
            $table->date('fecha_vendido')->nullable();
            $table->double('perimetro');
            $table->double('area');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotes');
    }
};
