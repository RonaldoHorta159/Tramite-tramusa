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
        Schema::create('usuario_oficina', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario_oficina')->autoIncrement();
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('id_oficina');
            $table->char('activo', 1)->default('S');
            $table->char('estado', 1)->default('A');
            $table->timestamp('ins')->useCurrent();
            $table->timestamp('upd')->nullable()->useCurrentOnUpdate();
            $table->timestamp('del')->nullable();

            $table->unique(['id_usuario', 'id_oficina'], 'ux_user_office');
            $table->index('id_usuario', 'idx_uo_usuario');
            $table->index('id_oficina', 'idx_uo_oficina');

            $table->foreign('id_usuario')
                ->references('id_usuario')
                ->on('man_usuario')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('id_oficina')
                ->references('id_oficina')
                ->on('oficina')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_oficina');
    }
};
