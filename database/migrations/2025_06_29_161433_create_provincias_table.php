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
        Schema::create('provincias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 120);
            $table->foreignId('departamento_id')->constrained('departamentos')->onDelete('cascade'); // Añadido onDelete
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('provincias');
    }
};
