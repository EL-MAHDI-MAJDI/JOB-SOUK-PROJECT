<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CandidatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'nom' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' =>Hash::make('password'),
            'prenom'=> fake()->name(),
            'phone'=> fake()->phoneNumber(),
            'ville'=> fake()->city(),
            'adresse'=> fake()->address(),
            'titre_professionnel'=> fake()->jobTitle(),
            'URL_CV'=> fake()->url(),
        ];
    }
}
