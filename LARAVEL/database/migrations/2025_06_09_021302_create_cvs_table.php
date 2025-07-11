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
    Schema::create('cvs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('candidat_id')->unique()->constrained()->onDelete('cascade');
        $table->string('fichier'); // chemin du fichier
        $table->string('nom_fichier'); // nom original du fichier
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cvs');
    }
};
