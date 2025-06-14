<?php

namespace App\Http\Controllers\entreprise;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\OffreEmploi;
use App\Models\Candidature;
use App\Models\Entretien;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function show(Entreprise $entreprise)
    {
        // Statistiques principales
        $stats = [
            'offres_actives' => $entreprise->offreEmplois()
                ->where('status', 'active')
                ->count(),
            'candidatures' => Candidature::whereHas('offreEmploi', function($query) use ($entreprise) {
                $query->where('entreprise_id', $entreprise->id);
            })->count(),
            'entretiens' => Entretien::whereHas('candidature.offreEmploi', function($query) use ($entreprise) {
                $query->where('entreprise_id', $entreprise->id);
            })->count(),
            'embauches' => Candidature::whereHas('offreEmploi', function($query) use ($entreprise) {
                $query->where('entreprise_id', $entreprise->id);
            })->where('statut', 'Accepté')->count()
        ];

        // Activité récente
        $activites = collect();

        // Ajouter les nouvelles offres
        $nouvelles_offres = $entreprise->offreEmplois()
            ->with('entreprise')
            ->latest()
            ->take(5)
            ->get()
            ->map(function($offre) {
                return [
                    'type' => 'offre',
                    'date' => $offre->created_at,
                    'titre' => 'Nouvelle offre publiée',
                    'description' => $offre->titre,
                    'lien' => route('entreprise.offresEmploi.details', [$offre->entreprise, $offre])
                ];
            });

        // Ajouter les nouvelles candidatures
        $nouvelles_candidatures = Candidature::whereHas('offreEmploi', function($query) use ($entreprise) {
                $query->where('entreprise_id', $entreprise->id);
            })
            ->with(['candidat', 'offreEmploi'])
            ->latest()
            ->take(5)
            ->get()
            ->map(function($candidature) {
                return [
                    'type' => 'candidature',
                    'date' => $candidature->created_at,
                    'titre' => 'Candidature reçue',
                    'description' => $candidature->candidat->nom . ' pour le poste de ' . $candidature->offreEmploi->titre,
                    'lien' => route('entreprise.candidatures.show', [$candidature->offreEmploi->entreprise, $candidature])
                ];
            });

        // Ajouter les entretiens programmés
        $entretiens_programmes = Entretien::whereHas('candidature.offreEmploi', function($query) use ($entreprise) {
                $query->where('entreprise_id', $entreprise->id);
            })
            ->with(['candidature.candidat', 'candidature.offreEmploi'])
            ->latest()
            ->take(5)
            ->get()
            ->map(function($entretien) {
                return [
                    'type' => 'entretien',
                    'date' => $entretien->created_at,
                    'titre' => 'Entretien programmé',
                    'description' => 'Avec ' . $entretien->candidature->candidat->nom . ' pour le poste de ' . $entretien->candidature->offreEmploi->titre,
                    'lien' => route('entreprise.entretiens.show', [$entretien->candidature->offreEmploi->entreprise, $entretien])
                ];
            });

        // Fusionner et trier toutes les activités
        $activites = $activites->concat($nouvelles_offres)
            ->concat($nouvelles_candidatures)
            ->concat($entretiens_programmes)
            ->sortByDesc('date')
            ->take(5);

        // Candidats récents
        $candidats_recents = Candidature::whereHas('offreEmploi', function($query) use ($entreprise) {
                $query->where('entreprise_id', $entreprise->id);
            })
            ->with(['candidat', 'offreEmploi'])
            ->latest()
            ->take(5)
            ->get();

        return view('entreprise.dashboard', compact('entreprise', 'stats', 'activites', 'candidats_recents'));
    }
}