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
    Schema::create('cursos', function (Blueprint $table) {
      $table->id();
      $table->string('nombre', 50);
      $table->string('descripcion', 50);
      $table->unsignedBigInteger('docente_id')->nullable();
      $table->boolean('estado')->default(true);
      //table->foreignId('persona_dni')->constrained('personas','dni)->onDelete('cascade');
      $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
      $table->timestamps();
    });
  }
  public function down(): void
  {
    Schema::dropIfExists('cursos');
  }
};



