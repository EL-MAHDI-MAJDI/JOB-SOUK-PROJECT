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

        // Récupérer les candidatures avec les statuts spécifiés
        $statuts = ['Entretien prévu', 'Entretien terminé', 'Accepté', 'Refusé'];
        $candidaturesAll = Candidature::whereHas('offreEmploi.entreprise', function ($query) use ($entreprise) {
            $query->where('id', $entreprise->id);
        })
        ->whereIn('statut', $statuts)
        ->get();

        // Charger les relations nécessaires pour les candidatures
        $candidaturesAll->load('offreEmploi', 'candidat', 'entretiens');

        // Récupérer tous les entretiens associés à ces candidatures
        $entretiensAll = Entretien::whereIn('candidature_id', $candidaturesAll->pluck('id'))
            ->get();
        
        // Charger les détails spécifiques pour chaque entretien
        $entretiensAll->load('enPersonnes', 'telephoniques', 'visioconferences');
        return view('entreprise.entretiens', compact('entreprise', 'offres', 'candidatures', 'entretiens', 'candidaturesAll', 'entretiensAll'));
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
            'type' => 'required|string|in:Visioconference,Telephonique,EnPersonne',
            'participant'=> 'required|string|max:255',
            'notes' => 'nullable|string|max:1000',
        ], [
            'date_entretien.after_or_equal' => 'La date de l\'entretien doit être une date postérieure ou égale à aujourd\'hui.',
        ]);

        // Vérification du type d'entretien
        if ($request->type == 'Visioconference') {
            $request->validate([
                'lien' => 'required|url',
                // dd($request->lien),
            ]);
            
        } elseif ($request->type == 'Telephonique') {
            $request->validate([
                'numero_telephone' => 'required|string|max:15',
            ]);
            // dd($request->numero_telephone);
        } elseif ($request->type == 'EnPersonne') {
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
        
        if ($request->type == 'Visioconference') {
            // Création d'une visioconférence associée à l'entretien
            $entretien->visioconferences()->create([
                'entretien_id' => $entreprise->id,
                'lien' => $request->lien,
            ]);
        } elseif ($request->type == 'Telephonique') {
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
        // changer le statut de la candidature
        $candidature->update(['statut' => 'Entretien prévu']);
        // Rediriger vers la page des entretiens de l'entreprise avec un message de succès
        return redirect()->route('entreprise.entretiens', ['entreprise' => $entreprise->id])
                         ->with('success', 'Entretien créé avec succès.');
    }
    public function update(Entreprise $entreprise, Request $request, $id)
    {
        // Validation des données de la requête
        $request->validate([
            'date_entretien' => 'required|date|after_or_equal:today',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'nullable|date_format:H:i|after:heure_debut',
            'type' => 'required|string|in:Visioconference,Telephonique,EnPersonne',
            'participant'=> 'required|string|max:255',
            'notes' => 'nullable|string|max:1000',
        ]);

        // Trouver l'entretien par son ID
        $entretien = Entretien::findOrFail($id);

        // Mettre à jour les informations de l'entretien
        $entretien->update([
            'date_entretien' => $request->date_entretien,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'type' => $request->type,
            'participant' => $request->participant,
            'notes' => $request->notes,
        ]);

        // Mettre à jour les détails spécifiques selon le type
        if ($request->type == 'Visioconference') {
            $entretien->visioconferences()->updateOrCreate(
                ['entretien_id' => $entretien->id],
                ['lien' => $request->lien]
            );
            $entretien->telephoniques()->delete();
            $entretien->enPersonnes()->delete();
        } elseif ($request->type == 'Telephonique') {
            $entretien->telephoniques()->updateOrCreate(
                ['entretien_id' => $entretien->id],
                ['numero_telephone' => $request->numero_telephone]
            );
            $entretien->visioconferences()->delete();
            $entretien->enPersonnes()->delete();
        } else {
            $entretien->enPersonnes()->updateOrCreate(
                ['entretien_id' => $entretien->id],
                ['lieu' => $request->lieu]
            );
            $entretien->visioconferences()->delete();
            $entretien->telephoniques()->delete();
        }

        return redirect()->route('entreprise.entretiens', ['entreprise' => $entreprise->id])
                         ->with('success', 'Entretien modifié avec succès.');
    }
    public function cancel(Entreprise $entreprise, $id)
    {
        $entretien = Entretien::findOrFail($id);
        $entretien->statut = 'Annuler'; // valeur ENUM correcte pour entretien
        $entretien->save();

        // Mettre à jour le statut de la candidature liée
        if ($entretien->candidature) {
            $entretien->candidature->statut = 'Évaluation terminée'; // valeur autorisée
            $entretien->candidature->save();
        }

        return redirect()->route('entreprise.entretiens', ['entreprise' => $entreprise->id])
            ->with('success', 'Entretien annulé avec succès.');
    }
}
