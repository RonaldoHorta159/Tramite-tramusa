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
        Schema::create('seguimiento', function (Blueprint $table) {
            $table->unsignedInteger('id_seguimiento')->autoIncrement();
            $table->unsignedInteger('id_documento');
            $table->timestamp('fecha_envio')->useCurrent();
            $table->unsignedInteger('id_oficina_origen');
            $table->unsignedInteger('id_parte_origen');
            $table->unsignedInteger('id_oficina_destino')->nullable();
            $table->unsignedInteger('id_parte_destino')->nullable();
            $table->text('observaciones')->nullable();
            $table->unsignedInteger('usuario_envio');
            $table->timestamp('creado_en')->useCurrent();

            // FKs
            $table->foreign('id_documento')
                ->references('id_documento')->on('documento')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('id_oficina_origen')
                ->references('id_oficina')->on('oficina')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('id_parte_origen')
                ->references('id_parte')->on('parte')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('id_oficina_destino')
                ->references('id_oficina')->on('oficina')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('id_parte_destino')
                ->references('id_parte')->on('parte')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('usuario_envio')
                ->references('id_usuario')->on('man_usuario')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento');
    }
};
