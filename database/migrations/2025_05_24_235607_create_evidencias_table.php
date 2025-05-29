<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('evidencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('corte_id')->constrained('cortes')->onDelete('cascade');
            $table->string('foto_url');
            $table->decimal('latitud', 10, 7)->nullable();
            $table->decimal('longitud', 10, 7)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('evidencias');
    }
};
