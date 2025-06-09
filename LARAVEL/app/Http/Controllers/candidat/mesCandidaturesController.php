<?php

namespace App\Http\Controllers\candidat;
use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\Candidature;
use Illuminate\Http\Request;
use App\Models\OffreEmploi;

class mesCandidaturesController extends Controller
{
    public function show(Candidat $candidat){
        // $profiles=Profile::paginate(10);
        // $profiles=Profile::all();
        $candidatures = Candidature::where('candidat_id', $candidat->id)
            ->with(['offreEmploi', 'offreEmploi.entreprise'])
            ->get();
        return view('candidat.mesCandidatures',compact('candidat', 'candidatures'));
    }
     public function postuler(Request $request, Candidat $candidat, OffreEmploi $offre)
    {
        $candidat->offresCandidature()->syncWithoutDetaching([$offre->id]);
        $messageCandidature = $request->input('messageCandidature');
        $request->validate([
                'messageCandidature' =>'nullable|string|max:500',
            ]);
        // dd($messageCandidature);
        $candidat->offresCandidature()->syncWithoutDetaching([
            $offre->id => ['messageCandidature' => $messageCandidature]
        ]);
        return to_route('candidat.chercherOffres', ['candidat' => $candidat->id])
                ->with('success', 'Vous avez postulé avec succès à l\'offre !');
        }  
}
