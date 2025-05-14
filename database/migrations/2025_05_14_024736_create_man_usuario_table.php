<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('man_usuario', function (Blueprint $table) {
            $table->unsignedInteger('id_usuario')->autoIncrement();
            $table->string('dni', 8)->nullable();
            $table->string('clave', 250);
            $table->char('activo', 1)->default('S');
            $table->char('estado', 1)->default('A');
            $table->timestamp('ins')->useCurrent();
            $table->timestamp('upd')->nullable()->useCurrentOnUpdate();
            $table->timestamp('del')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('man_usuario');
    }
};
