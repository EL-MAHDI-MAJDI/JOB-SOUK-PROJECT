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
        Schema::create('competence_recherchees', function (Blueprint $table) {
        $table->id();
        $table->string('nom'); // le nom de la compétence recherchée
        $table->foreignId('entreprise_id')->constrained()->onDelete('cascade'); // FK vers entreprise
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competence_recherchees');
    }
};
