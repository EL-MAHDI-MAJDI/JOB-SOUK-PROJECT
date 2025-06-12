<?php

namespace Database\Factories;

use App\Models\Candidature;
use App\Models\Candidat;
use App\Models\OffreEmploi;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidatureFactory extends Factory
{
    protected $model = Candidature::class;

    public function definition()
    {
        return [
            'candidat_id' => $this->faker->numberBetween(1, 11),
            'offre_emploi_id' => $this->faker->numberBetween(1, 10),
            'statut' => $this->faker->randomElement(['En attente','Évaluation terminée','Entretien prévu','Entretien terminé','Accepté','Refusé']),
            'commentairesEvaluation' => $this->faker->optional()->sentence(),
            'scoreEvaluation' => $this->faker->optional()->numberBetween(1, 100),
            'messageCandidature' => $this->faker->optional()->paragraph(),
            'fichier' => $this->faker->lexify('cvsCandidature/cv_684ae844daba5_Abderrahime-Elkourchi-CV.pdf'),
            'nom_fichier' => $this->faker->optional()->word() . '.pdf',
        ];
    }
}
