<?php

namespace App\Http\Controllers\entreprise;
use App\Http\Controllers\Controller;
use App\Http\Requests\OffreEmploiRequest;
use App\Models\Entreprise;
use App\Models\OffreEmploi;
use App\Models\Candidature;
use App\Models\Entretien;

use Illuminate\Http\Request;

class offresEmploiController extends Controller
{
    public function show(Entreprise $entreprise){
        // Récupérer les statistiques
        $stats = [
            'offres_actives' => $entreprise->offreEmplois()->where('status', 'active')->count(),
            'candidatures' => Candidature::whereHas('offreEmploi', function($query) use ($entreprise) {
                $query->where('entreprise_id', $entreprise->id);
            })->count(),
            'entretiens' => Entretien::whereHas('candidature.offreEmploi', function($query) use ($entreprise) {
                $query->where('entreprise_id', $entreprise->id);
            })->count(),
            'offres_cloturees' => $entreprise->offreEmplois()->where('status', 'desactive')->count()
        ];

        $offres = $entreprise->offreEmplois()
            ->orderBy('created_at', 'desc') // Tri par date de création, les plus récentes en premier
            ->paginate(4); // 10 offres par page
        return view('entreprise.offresEmploi', compact('entreprise', 'offres', 'stats'));
    }
    public function store(OffreEmploiRequest $request, Entreprise $entreprise)
    {   
        // ✅ Validation des données
        $formfields = $request->validated();
        $formfields['entreprise_id'] = $entreprise->id; // Ajoute l'entreprise_id
        // ✅ Création de l'offre d'emploi
        OffreEmploi::create($formfields);
        // ✅ Redirection avec un message de succès
        return back()->with('success', 'Offre d\'emploi créée avec succès.');
    }
    public function details(Entreprise $entreprise,OffreEmploi $offre)
    {
        return view('entreprise.offreDetails', compact('entreprise', 'offre'));
    }
    public function update(Entreprise $entreprise, OffreEmploi $offre, OffreEmploiRequest $request)
    {
        $formfields = $request->validated();
        // ✅ Edite de l'offre d'emploi
        $isUpdated = $offre->fill($formfields)->save();
        // dd($isUpdated);
        // Retourner la vue pour éditer l'offre d'emploi
        return back()->with('success', 'La modification de l\'offre d\'emploi a été effectuée avec succès.'); 
    }

    public function destroy(Entreprise $entreprise, OffreEmploi $offre)
    {
        // Supprimer l'offre d'emploi
        $offre->delete();
        // Rediriger avec un message de succès
        return redirect()->route('entreprise.offresEmploi', $entreprise->id)
            ->with('danger', 'Offre d\'emploi supprimée avec succès.');
    }
}
