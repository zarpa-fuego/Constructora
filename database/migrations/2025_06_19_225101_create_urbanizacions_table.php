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
        Schema::create('urbanizacions', function (Blueprint $table) {
            $table->id('ID_Urbanizacion');
            $table->string('Nombre_Urbanizacion', 50);
            $table->string('Direccion', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('urbanizacions');
    }
};
