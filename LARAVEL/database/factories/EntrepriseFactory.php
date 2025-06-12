<?php

namespace Database\Factories;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entreprise>
 */
class EntrepriseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'nomEntreprise' => fake()->company(),
            'email' => fake()->unique()->companyEmail(),
            'SecteurActivite' => fake()->word(),
            'tailleEntreprise' => fake()->word(),
            'siteWeb' => fake()->url(),
            'ville' => fake()->city(),
            'adresse' => fake()->address(),
            'dateCreation' => fake()->date(),
            'description' => fake()->optional()->text(50),
            'logo' => 'photoProfile/profile.png',
            'phone' => fake()->phoneNumber(),
            'password' => Hash::make('password'),
        ];
    }
}
