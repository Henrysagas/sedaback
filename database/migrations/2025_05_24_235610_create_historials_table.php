<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('historial', function (Blueprint $table) {
            $table->id();
            $table->foreignId('corte_id')->constrained('cortes')->onDelete('cascade');
            $table->foreignId('tecnico_id')->constrained('users')->onDelete('cascade');
            $table->text('observaciones')->nullable();
            $table->string('estado_final'); // ejecutado o no ejecutado
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('historial');
    }
};
