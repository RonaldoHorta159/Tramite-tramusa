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
        Schema::create('tipo_documento', function (Blueprint $table) {
            $table->unsignedInteger('id_tipo_documento')->autoIncrement();
            $table->string('descripcion', 60);
            $table->string('abreviatura', 20)->nullable();
            $table->char('estado', 1)->default('A');
            // timestamps: created_at y updated_at con CURRENT_TIMESTAMP y ON UPDATE
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_documento');
    }
};
