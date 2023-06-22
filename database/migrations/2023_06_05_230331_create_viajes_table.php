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
        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->float('origenLat');
            $table->float('origenLng');
            $table->float('destinoLat');
            $table->float('destinoLng');
            $table->time('hora_partida');
            $table->time('hora_llegada');
            $table->foreignId('id_conductor')->constrained('conductores');
            $table->boolean('realizado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viajes');
    }
};
