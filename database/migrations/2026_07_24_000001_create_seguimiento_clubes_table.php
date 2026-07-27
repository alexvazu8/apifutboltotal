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
        Schema::create('seguimiento_clubes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clubes_id')->constrained('clubes')->onDelete('cascade');
            $table->string('contacto_email')->nullable();
            $table->string('contacto_telefono')->nullable();
            $table->string('nombre_persona_contacto_club')->nullable();
            $table->foreignId('jugadores_id')->nullable()->constrained('jugadores')->onDelete('set null');
            $table->dateTime('fecha')->nullable();
            $table->text('texto')->nullable();
            $table->enum('estado', [
                'Mensaje enviado',
                'En Seguimiento',
                'Tiene Prueba Abierta',
                'Tiene Prueba Cerrada',
                'Quieren Ficharlo',
                'No Hay respuestas',
                'No lo necesitan'
            ])->default('Mensaje enviado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento_clubes');
    }
};
