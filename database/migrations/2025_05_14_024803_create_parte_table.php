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
        Schema::create('parte', function (Blueprint $table) {
            $table->unsignedInteger('id_parte')->autoIncrement();
            $table->enum('tipo', ['INTERNA', 'EXTERNA']);
            $table->string('dni_ruc', 15)->nullable();
            $table->string('nombre', 250);
            $table->string('celular', 45)->nullable();
            $table->string('correo', 100)->nullable();
            $table->char('activo', 1)->default('S');
            $table->timestamp('creado_en')->useCurrent();
            $table->timestamp('actualizado_en')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parte');
    }
};
