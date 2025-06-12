<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OffreEmploi>
 */
class OffreEmploiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $dateLimite = $this->faker->dateTimeBetween('-10 days', '+10 days');
        $today = now();
        $status = $today->lt($dateLimite) ? 'active' : 'desactive';
        return [
            'intitule_offre_emploi' => $this->faker->jobTitle(),
            'description_offre_emploi' => $this->faker->paragraph(),
            'type_contrat' => $this->faker->randomElement(['CDI', 'CDD', 'Freelance']),
            'salaire_offre_emploi' => $this->faker->numberBetween(5000, 15000) . ' MAD',
            'niveau_experience_demander' => $this->faker->randomElement(['Débutant', 'Intermédiaire', 'Senior']),
            'avantage_offre_emploi' => $this->faker->sentence(),
            'date_limite_candidature' => $dateLimite,
            'email_contact' => $this->faker->email(),
            'telephone_contact' => $this->faker->phoneNumber(),
            'localisation' => $this->faker->city(),
            'competences_requises' => implode(', ', $this->faker->words(5)),
            'entreprise_id' => 11, 
            'status' => $status,
        ];
    }

}
