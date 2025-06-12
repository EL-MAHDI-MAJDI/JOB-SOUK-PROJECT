<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidature;

class CandidatureSeeder extends Seeder
{
    public function run()
    {
        // Génère 20 candidatures factices
        Candidature::factory()->count(20)->create();
    }
}
