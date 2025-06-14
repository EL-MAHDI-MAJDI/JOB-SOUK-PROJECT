<?php

namespace App\Http\Controllers\candidat;
use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\Entretien;
use Illuminate\Http\Request;

class mesEntretiensController extends Controller
{
    public function show(Candidat $candidat)
    {
        // Récupérer les entretiens en attente du candidat avec leurs relations
        $entretiens = Entretien::with(['candidature.offreEmploi.entreprise', 'enPersonnes', 'telephoniques', 'visioconferences'])
            ->whereHas('candidature', function($query) use ($candidat) {
                $query->where('candidat_id', $candidat->id);
            })
            ->whereIn('statut', ['En attente','Confirme'])
            ->orderBy('date_entretien', 'asc')
            ->get();
        // dd($entretiens);
        return view('candidat.mesEntretiens', compact('candidat', 'entretiens'));
    }
}
