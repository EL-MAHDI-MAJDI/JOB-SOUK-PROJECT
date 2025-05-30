<?php

namespace App\Http\Controllers\entreprise;
use App\Http\Controllers\Controller;
use App\Models\Entreprise;

use Illuminate\Http\Request;

class offresEmploiController extends Controller
{
    public function show(Entreprise $entreprise){

        $offres = $entreprise->offreEmplois()
        ->orderBy('created_at', 'desc') // Tri par date de création, les plus récentes en premier
        ->paginate(4); // 10 offres par page
        return view('entreprise.offresEmploi', compact('entreprise', 'offres'));

    }
    public function store(Request $request, Entreprise $entreprise)
    {   

            // ✅ Validation des données
        $request->validate([
            'intitule_offre_emploi' => 'required|string|max:100',
            'description_offre_emploi' => 'required|string',
            'type_contrat' => 'required|string|max:50',
            'salaire_offre_emploi' => 'nullable|string|max:50',
            'niveau_experience_demander' => 'required|string|max:50',
            'avantage_offre_emploi' => 'nullable|string',
            'date_limite_candidature' => 'required|date|after_or_equal:today',
            'email_contact' => 'nullable|email|max:100',
            'telephone_contact' => 'nullable|string|max:30',
            'localisation' => 'required|string|max:100',
            'competences_requises' => 'required|string',
        ], [
            'date_limite_candidature.after_or_equal' => 'La date limite de candidature doit être une date postérieure ou égale à aujourd\'hui.',
        ]);

        // ✅ Création de l'offre d'emploi
        $entreprise->offreEmplois()->create([
            'intitule_offre_emploi' => $request->intitule_offre_emploi,
            'description_offre_emploi' => $request->description_offre_emploi,
            'type_contrat' => $request->type_contrat,
            'salaire_offre_emploi' => $request->salaire_offre_emploi,
            'niveau_experience_demander' => $request->niveau_experience_demander,
            'avantage_offre_emploi' => $request->avantage_offre_emploi,
            'date_limite_candidature' => $request->date_limite_candidature,
            'email_contact' => $request->email_contact,
            'telephone_contact' => $request->telephone_contact,
            'localisation' => $request->localisation,
            'competences_requises' => $request->competences_requises,
            'entreprise_id' => $entreprise->id, // Associer l'offre à l'entreprise
        ]);

        // ✅ Redirection avec un message de succès
        return back()->with('success', 'Offre d\'emploi créée avec succès.');
    }
}
