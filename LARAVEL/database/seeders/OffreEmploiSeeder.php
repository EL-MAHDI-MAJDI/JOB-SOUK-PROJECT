<?php

namespace Database\Seeders;

use App\Models\OffreEmploi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OffreEmploiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OffreEmploi::factory(10)->create();
    }
}
