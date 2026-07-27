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
        Schema::create('pruebas_cerradas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_final')->nullable();
            $table->foreignId('jugadores_id')->constrained('jugadores')->onDelete('cascade');
            $table->foreignId('clubes_id')->constrained('clubes')->onDelete('cascade');
            $table->foreignId('usuarios_club_id')->nullable()->constrained('usuarios_clubs')->onDelete('set null');
            $table->string('lugar')->nullable();
            $table->boolean('alojamiento_incluido')->default(false)->comment('Si el club incluye alojamiento al jugador');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pruebas_cerradas');
    }
};
