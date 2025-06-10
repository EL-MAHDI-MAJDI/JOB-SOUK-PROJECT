<?php

namespace App\Http\Controllers\index;
use App\Http\Controllers\Controller;
use App\Models\OffreEmploi;
use App\Models\Entreprise;
use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class accueilController extends Controller
{
    public function index(){
        // Statistiques
        $stats = [
            'offres' => OffreEmploi::where('date_limite_candidature', '>', now())->count(),
            'entreprises' => Entreprise::count(),
            'candidats' => Candidat::count(),
            'secteurs' => Entreprise::distinct('SecteurActivite')->count('SecteurActivite')
        ];

        // Offres récentes
        $offresRecentes = OffreEmploi::with('entreprise')
            ->where('date_limite_candidature', '>', now())
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Entreprises récentes
        $entreprisesRecentes = Entreprise::withCount('offreEmplois')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        // Catégories populaires (secteurs d'activité)
        $categoriesPopulaires = DB::table('entreprises')
            ->select('SecteurActivite', DB::raw('count(*) as total_entreprises'))
            ->groupBy('SecteurActivite')
            ->orderBy('total_entreprises', 'desc')
            ->take(8)
            ->get();

        // Entreprises qui nous font confiance (celles avec le plus d'offres et un logo)
        $entreprisesConfiance = Entreprise::withCount('offreEmplois')
            ->whereNotNull('logo')
            ->where('logo', '!=', '')
            ->orderBy('offre_emplois_count', 'desc')
            ->take(6)
            ->get();

        return view('index.accueil', compact('stats', 'offresRecentes', 'entreprisesRecentes', 'categoriesPopulaires', 'entreprisesConfiance'));
    }
}
