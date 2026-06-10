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
        Schema::create('posiciones_jugador', function (Blueprint $table) {
            $table->id();
            $table->foreignId('posiciones_id')->constrained('posiciones');
            $table->foreignId('jugadores_id')->constrained('jugadores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posiciones_jugador');
    }
};
