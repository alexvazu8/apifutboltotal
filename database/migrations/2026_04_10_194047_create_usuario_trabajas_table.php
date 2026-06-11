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
        Schema::create('usuario_trabajas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuarios_club_id')->constrained('usuarios_clubs');
            $table->char('tipo_usuario_club', 2);
            $table->foreignId('clubes_id')->constrained('clubes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_trabajas');
    }
};
