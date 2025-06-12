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
        Schema::create('offre_emplois', function (Blueprint $table) {
            $table->id(); // idOffreEmploi
            $table->string('intitule_offre_emploi');
            $table->text('description_offre_emploi');
            $table->string('type_contrat');
            $table->string('salaire_offre_emploi')->nullable();
            $table->string('niveau_experience_demander');
            $table->text('avantage_offre_emploi')->nullable();
            $table->date('date_limite_candidature');
            $table->string('email_contact')->nullable();
            $table->string('telephone_contact')->nullable();
            $table->string('localisation'); // Nouveau champ
            $table->text('competences_requises'); // Nouveau champ
            $table->enum('status', ['active', 'desactive'])->default('active');
            $table->foreignId('entreprise_id')->constrained('entreprises')->cascadeOnDelete(); // Clé étrangère vers la table entreprises
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('offre_emplois');
    }
};