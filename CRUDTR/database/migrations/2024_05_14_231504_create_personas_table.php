<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->string('dni', 8)->primary();
            $table->boolean('estado');
            $table->string('ruc', 11)->nullable()->unique();
            $table->string('apellido_paterno', 50);
            $table->string('apellido_materno', 50);
            $table->string('nombres', 50);
            $table->integer('edad');
            $table->char('sexo', 1);
            $table->string('foto', 255)->nullable();
            $table->string('email', 100)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
