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
        Schema::create('estado_documento', function (Blueprint $table) {
            $table->unsignedInteger('id_estado')->autoIncrement();
            $table->string('nombre', 30);
            $table->string('descripcion', 100)->nullable();
            // sólo created_at para saber cuándo agregaste el estado
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_documento');
    }
};
