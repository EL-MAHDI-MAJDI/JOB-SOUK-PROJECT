<?php

namespace App\Http\Controllers\entreprise;
use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\Candidature;
use App\Models\Entretien;

use Illuminate\Http\Request;

class entretiensController extends Controller
{
    public function show(Entreprise $entreprise){
        // Récupérer UNIQUEMENT les offres qui ont au moins une candidature avec statut "Évaluation terminée"
        $offres = $entreprise->offreEmplois()
            ->whereHas('candidatures', function($query) {
                $query->where('statut', 'Évaluation terminée');
            })
            ->with(['candidatures' => function($query) {
                $query->where('statut', 'Évaluation terminée');
            }])
            ->get();
        
        // Charger l'entreprise avec ses offres filtrées et les candidatures filtrées
        $entreprise->load(['offreEmplois' => function($query) {
            $query->whereHas('candidatures', function($subquery) {
                $subquery->where('statut', 'Évaluation terminée');
            });
        }, 'offreEmplois.candidatures' => function($query) {
            $query->where('statut', 'Évaluation terminée');
        }]);
        
        // Récupérer les candidatures associées à l'entreprise avec statut "Évaluation terminée"
        $candidatures = Candidature::whereHas('offreEmploi.entreprise', function ($query) use ($entreprise) {
            $query->where('id', $entreprise->id);
        })
        ->where('statut', 'Évaluation terminée')
        ->get();
        
        // Charger les relations nécessaires pour les candidatures
        $candidatures->load('offreEmploi', 'candidat', 'entretiens');
        
        // Récupérer tous les entretiens associés à ces candidatures
        $entretiens = Entretien::whereIn('candidature_id', $candidatures->pluck('id'))->get();
        
        // Charger les détails spécifiques pour chaque entretien
        $entretiens->load('enPersonnes', 'telephoniques', 'visioconferences');
        return view('entreprise.entretiens', compact('entreprise', 'offres', 'candidatures', 'entretiens'));
        }
    public function store(Entreprise $entreprise, Request $request)
    {
        // Validation des données de la requête
        $request->validate([
            'offre_id' => 'required|exists:offre_emplois,id',
            'candidat_id' => 'required|exists:candidats,id',
            'date_entretien' => 'required|date|after_or_equal:today',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'nullable|date_format:H:i|after:heure_debut',
            'type' => 'required|string|in:visioconference,telephonique,en_personne',
            'participant'=> 'required|string|max:255',
            'notes' => 'nullable|string|max:1000',
        ], [
            'date_entretien.after_or_equal' => 'La date de l\'entretien doit être une date postérieure ou égale à aujourd\'hui.',
        ]);

        // Vérification du type d'entretien
        if ($request->type == 'visioconference') {
            $request->validate([
                'lien' => 'required|url',
                // dd($request->lien),
            ]);
            
        } elseif ($request->type == 'telephonique') {
            $request->validate([
                'numero_telephone' => 'required|string|max:15',
            ]);
            // dd($request->numero_telephone);
        } elseif ($request->type == 'en_personne') {
            $request->validate([
                'lieu' => 'required|string|max:255',
            ]);
            // dd($request->lieu);
        }
        
        // Trouver la candidature correspondante
        $candidature = Candidature::where('candidat_id', $request->candidat_id)
                                ->where('offre_emploi_id', $request->offre_id)
                                ->first();
        
        if (!$candidature) {
            return back()->withErrors(['message' => 'Aucune candidature trouvée pour ce candidat et cette offre.'])->withInput();
        }
        
        // dd($request->offre_id, $request->candidat_id, $request->date, $request->heure_debut, $request->heure_fin, $request->type, $request->participant, $request->notes);
        
        // Création d'un nouvel entretien
        $entretien = new Entretien([
            // 'offre_id' => $request->offre_id,
            // 'candidat_id' => $request->candidat_id,
            'date_entretien' => $request->date_entretien,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'type' => $request->type,
            'participant' => $request->participant,
            'notes' => $request->notes,
            'statut' => 'En attente',
        ]);

            // Associer l'entretien à la candidature
        $candidature->entretiens()->save($entretien);
        
        if ($request->type == 'visioconference') {
            // Création d'une visioconférence associée à l'entretien
            $entretien->visioconferences()->create([
                'entretien_id' => $entreprise->id,
                'lien' => $request->lien,
            ]);
        } elseif ($request->type == 'telephonique') {
            // Création d'un entretien téléphonique associé à l'entretien
            $entretien->telephoniques()->create([
                'entretien_id' => $entreprise->id,
                'numero_telephone' => $request->numero_telephone,
            ]);
        } else {
            // Création d'un entretien en personne associé à l'entretien
            $entretien->enPersonnes()->create([
                'entretien_id' => $entreprise->id,
                'lieu' => $request->lieu,
            ]);
        }
        return redirect()->route('entreprise.entretiens', ['entreprise' => $entreprise->id])
                         ->with('success', 'Entretien créé avec succès.');
    }
    // public function destroy(Entreprise $entreprise, $id)
    // {
    //     // Trouver l'entretien par son ID
    //     $entretien = $entreprise->entretiens()->findOrFail($id);

    //     // Supprimer l'entretien
    //     $entretien->delete();

    //     return redirect()->route('entreprise.entretiens', ['entreprise' => $entreprise->id])
    //                      ->with('success', 'Entretien supprimé avec succès.');
    // }
    // public function update(Entreprise $entreprise, Request $request, $id)
    // {
    //     // Validation des données de la requête
    //     $request->validate([
    //         'date' => 'required|date',
    //         'heure' => 'required|date_format:H:i',
    //         'lieu' => 'required|string|max:255',
    //     ]);

    //     // Trouver l'entretien par son ID
    //     $entretien = $entreprise->entretiens()->findOrFail($id);

    //     // Mettre à jour les informations de l'entretien
    //     $entretien->update([
    //         'date' => $request->date,
    //         'heure' => $request->heure,
    //         'lieu' => $request->lieu,
    //     ]);

    //     return redirect()->route('entreprise.entretiens', ['entreprise' => $entreprise->id])
    //                      ->with('success', 'Entretien mis à jour avec succès.');
    // }
}
