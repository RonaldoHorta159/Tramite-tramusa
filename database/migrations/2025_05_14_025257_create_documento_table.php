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
        Schema::create('documento', function (Blueprint $table) {
            $table->unsignedInteger('id_documento')->autoIncrement();
            $table->char('codigo_uuid', 36)->unique();
            $table->integer('nro_libro')->nullable();
            $table->timestamp('fecha_registro')->useCurrent();
            $table->unsignedInteger('id_tipo_documento');
            $table->string('nro_documento', 50);
            $table->integer('nro_folios')->nullable();
            $table->string('asunto', 500)->nullable();
            $table->unsignedInteger('id_tipo_tramite');
            $table->unsignedInteger('id_estado');
            $table->unsignedInteger('id_medio_envio')->default(1);
            $table->unsignedInteger('id_origen_oficina');
            $table->unsignedInteger('id_origen_parte');
            $table->unsignedInteger('id_destino_oficina')->nullable();
            $table->unsignedInteger('id_destino_parte')->nullable();
            $table->string('archivo_ruta', 250)->nullable();
            $table->unsignedInteger('usuario_creo');
            $table->timestamp('creado_en')->useCurrent();
            $table->timestamp('actualizado_en')->nullable()->useCurrentOnUpdate();

            // Índices de búsqueda frecuentes
            $table->index('fecha_registro', 'idx_fecha_registro');
            $table->index('nro_documento', 'idx_nro_documento');
            $table->index('asunto', 'idx_asunto');

            // Claves foráneas (mismas longitudes y unsignedness)
            $table->foreign('id_tipo_documento')
                ->references('id_tipo_documento')->on('tipo_documento')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('id_tipo_tramite')
                ->references('id_tipo_tramite')->on('tipo_tramite')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('id_estado')
                ->references('id_estado')->on('estado_documento')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('id_medio_envio')
                ->references('id_medio')->on('medio_envio')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('id_origen_oficina')
                ->references('id_oficina')->on('oficina')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('id_origen_parte')
                ->references('id_parte')->on('parte')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('id_destino_oficina')
                ->references('id_oficina')->on('oficina')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('id_destino_parte')
                ->references('id_parte')->on('parte')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('usuario_creo')
                ->references('id_usuario')->on('man_usuario')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documento');
    }
};
