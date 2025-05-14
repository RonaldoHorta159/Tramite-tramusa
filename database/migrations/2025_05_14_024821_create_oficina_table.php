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
        Schema::create('oficina', function (Blueprint $table) {
            $table->unsignedInteger('id_oficina')->autoIncrement();
            $table->string('nombre', 250);
            $table->string('abreviatura', 20)->nullable();
            $table->unsignedInteger('oficina_padre')->nullable();
            $table->char('activo', 1)->default('S');
            $table->timestamp('creado_en')->useCurrent();
            $table->timestamp('actualizado_en')->nullable()->useCurrentOnUpdate();

            $table->foreign('oficina_padre')
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
        Schema::dropIfExists('oficina');
    }
};
