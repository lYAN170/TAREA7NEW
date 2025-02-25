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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
                $table->string('persona_dni', 8)->unique();
                $table->boolean('estado')->default(true);
                //$table->foreignId('persona_dni')->contrained('personas', 'dni')->onDelete('cascade');
                $table->foreign('persona_dni')->references('dni')->on('personas')->onDelete('cascade');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};
