<?php

namespace App\Http\Controllers\entreprise;
use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\Candidat;
use Illuminate\Http\Request;

class rechercherCandidatsController extends Controller
{
    public function show(Entreprise $entreprise, Request $request)
    {
        $query = Candidat::query();
        
        // Recherche par mots-clés
        // if ($request->filled('keywords')) { // Utiliser filled() pour vérifier si la valeur n'est pas vide
        //     $keywords = $request->keywords;
        //     $query->where(function($q) use ($keywords) {
        //         $q->where('titre_professionnel', 'like', "%{$keywords}%")
        //           ->orWhere('prenom', 'like', "%{$keywords}%")
        //           ->orWhere('nom', 'like', "%{$keywords}%")
        //           // Vous pourriez aussi vouloir rechercher dans les compétences, descriptions, etc.
        //           ->orWhereHas('competences', function ($subQuery) use ($keywords) {
        //               $subQuery->where('nom', 'like', "%{$keywords}%");
        //           });
        //     });
        // }

        // Filtre par localisation
        // if ($request->filled('location') && $request->location !== 'Localisation') {
        //     $query->where('ville', $request->location);
        // }

        // Filtre par expérience (Exemple basique, à adapter)
        // if ($request->filled('experience') && $request->experience !== 'Expérience') {
        //     // Supposons que 'experience' est un nombre d'années minimum
        //     // Et que votre modèle Candidat a une relation 'experiences' avec un champ 'duree_annees' ou similaire
        //     // Cette partie est un exemple et doit être adaptée à votre structure de données
        //     $annees_experience = (int) $request->experience;
        //     if ($annees_experience > 0) {
        //         $query->whereHas('experiences', function ($subQuery) use ($annees_experience) {
        //             // Exemple: si vous stockez la durée en années
        //             // $subQuery->where('duree_annees', '>=', $annees_experience);
        //         });
        //     }
        // }

        // Récupérer les candidats avec leurs relations
        $candidats = $query ->with(['competences', 'experiences', 'formations'])
                            ->paginate(10);

        return view('entreprise.rechercherCandidats', compact('entreprise', 'candidats'));
    }

    public function voirProfil(Entreprise $entreprise, Candidat $candidat)
    {
        // Charger les relations nécessaires pour l'affichage du profil
        $candidat->load(['experiences', 'formations', 'competences']); // Ajoutez d'autres relations si besoin (ex: langues)

        return view('entreprise.voirProfilCandidat', compact('entreprise', 'candidat'));
    }
}
