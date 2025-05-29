<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('cortes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Técnico
            $table->foreignId('zona_id')->constrained('zonas')->onDelete('cascade');
            $table->string('estado')->default('pendiente'); // pendiente, ejecutado, no ejecutado
            $table->date('fecha_asignacion');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('cortes');
    }
};
