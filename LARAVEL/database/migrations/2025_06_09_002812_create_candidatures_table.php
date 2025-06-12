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
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->text('commentairesEvaluation')->nullable(); // Optional field for evaluation comments
            $table->text('messageCandidature')->nullable(); // Optional field for additional messages
            $table->tinyInteger('scoreEvaluation')->check('scoreEvaluation BETWEEN 1 AND 5')->nullable(); // Optional field for evaluation score, between 1 and 5
            $table->enum('statut', ['En attente','Évaluation terminée','Entretien prévu','Entretien terminé','Accepté','Refusé'])->default('En attente');
            $table->string('fichier'); // chemin du fichier
            $table->string('nom_fichier'); // nom original du fichier
            $table->timestamps();
            
            $table->foreignId('candidat_id')->constrained()->onDelete('cascade');
            $table->foreignId('offre_emploi_id')->constrained('offre_emplois')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
