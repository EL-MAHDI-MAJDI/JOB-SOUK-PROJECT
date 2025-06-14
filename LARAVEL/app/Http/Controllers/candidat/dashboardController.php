<?php

namespace App\Http\Controllers\candidat;
use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\Candidature;
use App\Models\Entretien;
use App\Models\OffreEmploi;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function show(Candidat $candidat){
        // Statistiques principales
        $stats = [
            'candidatures' => $candidat->candidatures()->count(),
            'entretiens' => $candidat->candidatures()
                ->whereHas('entretiens')
                ->count(),
            'offres_recommandees' => OffreEmploi::where('status', 'active')
                ->whereNotIn('id', $candidat->candidatures()->pluck('offre_emploi_id'))
                ->count(),
            'vues_profil' => 0 // À implémenter si nécessaire
        ];

        // Candidatures récentes
        $candidatures_recentes = $candidat->candidatures()
            ->with(['offreEmploi.entreprise'])
            ->latest()
            ->take(4)
            ->get();

        // Entretiens à venir
        $entretiens = Entretien::whereHas('candidature', function($query) use ($candidat) {
                $query->where('candidat_id', $candidat->id);
            })
            ->with([
                'candidature.offreEmploi.entreprise',
                'enPersonnes',      // Pour les entretiens en personne
                'telephoniques',    // Pour les entretiens téléphoniques (si modèle spécifique)
                'visioconferences'  // Pour les entretiens en visioconférence
            ])
            ->where('date_entretien', '>=', now()->format('Y-m-d'))
            ->orderBy('date_entretien')
            ->take(2)
            ->get();

        // Offres recommandées
        $offres_recommandees = OffreEmploi::where('status', 'active')
            ->whereNotIn('id', $candidat->candidatures()->pluck('offre_emploi_id'))
            ->with('entreprise')
            ->latest()
            ->take(3)
            ->get();

        return view('candidat.dashboard', compact(
            'candidat',
            'stats',
            'candidatures_recentes',
            'entretiens',
            'offres_recommandees'
        ));
    }
}
