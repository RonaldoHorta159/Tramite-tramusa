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
        Schema::create('medio_envio', function (Blueprint $table) {
            $table->unsignedInteger('id_medio')->autoIncrement();
            $table->string('nombre', 30);
            // timestamp con nombre fiel a tu DDL original
            $table->timestamp('creado_en')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medio_envio');
    }
};
