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
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('ville');
            $table->string('adresse');
            $table->string('titre_professionnel')->nullable();
            $table->string('photoProfile')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
        
    }
};
