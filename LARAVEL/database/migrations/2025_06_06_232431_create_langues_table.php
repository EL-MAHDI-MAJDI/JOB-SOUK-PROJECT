<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('langues', function (Blueprint $table) {
        $table->id();
        $table->foreignId('candidat_id')->constrained()->onDelete('cascade');
        $table->string('nom');
        $table->enum('niveau', ['native', 'fluent', 'professional', 'intermediate', 'basic']);
        $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('langues');
    }
};
