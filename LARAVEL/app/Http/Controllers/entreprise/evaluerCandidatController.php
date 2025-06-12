<?php

namespace App\Http\Controllers\entreprise;
use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\OffreEmploi;
use App\Models\Candidat;
use App\Models\Candidature;
use Illuminate\Http\Request;

class evaluerCandidatController extends Controller
{
    public function show(Entreprise $entreprise){
        // $profiles=Profile::paginate(10);
        // $profiles=Profile::all();
        $offres=$entreprise->offreEmplois()->with('candidats')->get();
        // dd($offres);
        return view('entreprise.evaluerCandidat', compact('entreprise', 'offres'));
    }
    public function update(Entreprise $entreprise , OffreEmploi $offre,Candidat $candidat , Request $request)
    {
        $request->validate([
            'scoreEvaluation' => 'required|numeric|min:0|max:5',
            'commentairesEvaluation' => 'nullable|string|max:255',
        ]);

        // Récupérer la candidature via l'offre
        $candidature = $offre->candidatures()->where('candidat_id', $candidat->id)->first();

        if ($candidature) {
            $candidature->update([
                'scoreEvaluation' => $request->input('scoreEvaluation'),
                'commentairesEvaluation' => $request->input('commentairesEvaluation'),
                'statut' =>"Évaluation terminée", // valeur par défaut si non envoyée
            ]);
            return back()->with('success', 'Candidat ' . $candidat->nom . ' évalué avec succès.');
        } else {
            return back()->with('error', 'Candidature introuvable.');
        }
    }
}
