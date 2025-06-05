<?php

namespace App\Http\Controllers\candidat;
use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\OffreEmploi;
use Illuminate\Http\Request;

class offreSauvgarderController extends Controller
{
    public function show(Request $request, Candidat $candidat){
        $offresSauvegardees= $candidat->offresSauvegardees()
            ->with('entreprise') // Charger les informations de l'entreprise associée
            ->orderBy('created_at', 'desc') // Trier par date de sauvegarde, par exemple
            ->get();
            // ->paginate(4); // 4 offres par page
        return view('candidat.offreSauvgarder',compact('candidat', 'offresSauvegardees'));
    }
}
