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
        Schema::table('notas', function (Blueprint $table) {
            $table->foreignId('categoria_id')
                ->nullable()
                ->after('id')
                ->constrained('categorias')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('notas', function (Blueprint $table) {
            $table->dropConstrainedForeignId('categoria_id');
        });
    }
};
