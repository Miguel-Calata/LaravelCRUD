<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('etiqueta_nota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nota_id')->constrained()->cascadeOnDelete();
            $table->foreignId('etiqueta_id')->constrained()->cascadeOnDelete();
            $table->unique(['nota_id', 'etiqueta_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('etiqueta_nota');
    }
};
