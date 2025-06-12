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
        Schema::create('entretiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidature_id')->constrained()->onDelete('cascade');
            $table->date('date_entretien');
            $table->time('heure_debut');
            $table->time('heure_fin')->nullable();
            $table->enum('participant', ['Responsable RH', 'Tech Lead', 'Manager', 'CEO', 'Autre']);
            $table->text('notes')->nullable();
            $table->enum('type', ['EnPersonne', 'Telephonique', 'Visioconference']);
            $table->enum('statut', ['En attente','Confirme','Annuler','Terminé']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entretiens');
    }
};
