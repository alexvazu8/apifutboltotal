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
        Schema::table('jugadores', function (Blueprint $table): void {
            $table->string('path_foto_jugador')->nullable()->after('descripcion_jugador');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jugadores', function (Blueprint $table): void {
            $table->dropColumn('path_foto_jugador');
        });
    }
};
