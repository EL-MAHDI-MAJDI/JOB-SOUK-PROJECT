<?php

namespace App\Http\Controllers\candidat;
use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\OffreEmploi;
use Illuminate\Http\Request;

class chercherOffresController extends Controller
{
    public function show(Candidat $candidat, Request $request, OffreEmploi $offre){
        
        // if ($request->has('save')) {
        //    return $this->sauvegarder($request, $candidat, $offre);
        // }
        if (!empty($request->input('search'))) {
            return $this->search($request, $candidat);
        }else{
            $sortBy = $request->input('sortBy', 'created_at'); // ou la valeur par défaut
            $offres = OffreEmploi::with('entreprise')
            ->where('date_limite_candidature', '>=', now()) // Filtrer les offres dont la date limite est dans le futur
            ->orderBy($sortBy);
            $countoffres = $offres->count();
            $offres = $offres->paginate(4); // 4 offres par page
            $offresSauvegardeesIds = $candidat->offresSauvegardees()->pluck('offre_emplois.id')->toArray();

            return view('candidat.chercherOffres', compact('candidat', 'offres', 'countoffres', 'sortBy', 'offresSauvegardeesIds'));
        }
    }
    public function search(Request $request, Candidat $candidat)
    {
        $searchTerm = $request->input('search');
        $sortBy = $request->input('sortBy', 'created_at'); // ou la valeur par défaut
        $offres = OffreEmploi::with('entreprise')
        ->where(function($query) use ($searchTerm) {
            $query->where('intitule_offre_emploi', 'like', '%' . $searchTerm . '%')
                ->orWhere('description_offre_emploi', 'like', '%' . $searchTerm . '%')
                ->orWhere('localisation', 'like', '%' . $searchTerm . '%')
                ->orWhereHas('entreprise', function($q) use ($searchTerm) {
                    $q->Where('nomEntreprise', 'like', '%' . $searchTerm . '%')
                    ->orWhere('secteurActivite', 'like', '%' . $searchTerm . '%')
                    ->orWhere('competences_requises', 'like', '%' . $searchTerm . '%');
                });
        })
            ->where('date_limite_candidature', '>=', now()) // Filtrer les offres dont la date limite est dans le futur
            ->orderBy($sortBy)
            ->paginate(4); // 4 offres par page

        $countoffres = $offres->count();
        $offresSauvegardeesIds = $candidat->offresSauvegardees()->pluck('offre_emplois.id')->toArray();
        return view('candidat.chercherOffres', compact('candidat', 'offres', 'countoffres', 'sortBy', 'offresSauvegardeesIds'));
    }
    public function sauvegarder(Request $request, Candidat $candidat, OffreEmploi $offre)
    {
        $candidat->offresSauvegardees()->syncWithoutDetaching([$offre->id]);
        // dd($candidat->offresSauvegardees);
        return back()->with('success', 'Offre sauvegardée !');
    }
}
