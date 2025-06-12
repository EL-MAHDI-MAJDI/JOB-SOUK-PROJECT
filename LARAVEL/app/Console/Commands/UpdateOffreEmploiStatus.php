<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\OffreEmploi;
use Carbon\Carbon;

class UpdateOffreEmploiStatus extends Command
{
    protected $signature = 'offre-emploi:update-status';
    protected $description = 'Met à jour le statut des offres selon la date limite de candidature';

    public function handle()
    {
        $today = Carbon::today();

        // Désactive les offres expirées
        OffreEmploi::where('date_limite_candidature', '<', $today)
            ->where('statut', 'active')
            ->update(['statut' => 'desactive']);

        // (Optionnel) Réactive les offres valides
        OffreEmploi::where('date_limite_candidature', '>=', $today)
            ->where('statut', 'desactive')
            ->update(['statut' => 'active']);

        $this->info('Statut des offres mis à jour.');
    }
}