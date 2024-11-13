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
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            // Datos del Familiar que Recive
            $table->string('name');
            $table->string('address');
            $table->string('no_cell');
            // Movimiento u Operaciones
            $table->decimal('cant_money_recive', 10, 2);
            $table->enum('tipo', ['transferencia', 'efectivo']);
            $table->string('no_card');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
