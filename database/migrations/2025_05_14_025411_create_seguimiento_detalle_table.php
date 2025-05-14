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
        Schema::create('seguimiento_detalle', function (Blueprint $table) {
            $table->unsignedInteger('id_detalle')->autoIncrement();
            $table->unsignedInteger('id_seguimiento');
            $table->timestamp('fecha_accion')->useCurrent();
            $table->string('accion', 100);
            $table->text('observaciones')->nullable();
            $table->unsignedInteger('usuario_accion');
            $table->timestamp('creado_en')->useCurrent();

            // FKs
            $table->foreign('id_seguimiento')
                ->references('id_seguimiento')->on('seguimiento')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('usuario_accion')
                ->references('id_usuario')->on('man_usuario')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento_detalle');
    }
};
