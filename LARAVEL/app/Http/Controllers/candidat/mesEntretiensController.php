<?php

namespace App\Http\Controllers\candidat;
use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\Entretien;
use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Can;

class mesEntretiensController extends Controller
{
    public function show(Candidat $candidat)
    {
        // Vérification compte désactivé
        if ($candidat->status === 'pending') {
        return view('candidat.compte_desactive', compact('candidat'));
        }
        // Récupérer les entretiens en attente du candidat avec leurs relations
        $entretiens = Entretien::with(['candidature.offreEmploi.entreprise', 'enPersonnes', 'telephoniques', 'visioconferences'])
            ->whereHas('candidature', function($query) use ($candidat) {
                $query->where('candidat_id', $candidat->id);
            })
            ->whereIn('statut', ['En attente','Confirme'])
            ->orderBy('date_entretien', 'asc')
            ->get();
        // charge les candidatures assignees a l'entretien
        $candidatures = Candidature::with('offreEmploi.entreprise')
            ->whereHas('entretiens', function($query) use ($entretiens) {
                $query->whereIn('id', $entretiens->pluck('id'));
            })
            ->get();
        return view('candidat.mesEntretiens', compact('candidat', 'entretiens','candidatures'));
    }
    // Fonction pour COnfirmer un entretien
    public function confirm(Candidat $candidat, Entretien $entretien)
    {
        // Vérification compte désactivé
        if ($candidat->status === 'pending') {
            return view('candidat.compte_desactive', compact('candidat'));
        }
        // Vérification si l'entretien appartient au candidat
        if ($entretien->candidature->candidat_id !== $candidat->id) {
            abort(403, 'Unauthorized action.');
        }
        // Mettre à jour le statut de l'entretien
        $entretien->update(['statut' => 'Confirme']);
        return back()->with('success', 'Entretien confirmé avec succès.');

    }
}
