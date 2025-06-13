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
    public function destroy(Request $request, Candidat $candidat, OffreEmploi $offre)
    {
        // Vérifier si l'offre est sauvegardée par le candidat
        if ($candidat->offresSauvegardees()->where('offre_emploi_id', $offre->id)->exists()) {
            // Supprimer l'offre sauvegardée
            $candidat->offresSauvegardees()->detach($offre->id);
            return redirect()->back()->with('success', 'Offre supprimée avec succès.');
        }
        
        return redirect()->back()->with('error', 'Cette offre n\'est pas sauvegardée.');
    }

    public function destroyMultiple(Request $request, Candidat $candidat)
    {
        $request->validate([
            'offre_ids' => 'required|array',
            'offre_ids.*' => 'integer|exists:offre_emplois,id',
        ]);

        $offreIds = $request->input('offre_ids');

        $candidat->offresSauvegardees()->detach($offreIds);

        return redirect()->back()->with('success', count($offreIds) . ' offre(s) supprimée(s) de vos sauvegardes avec succès.');
    }

    public function destroyAll(Request $request, Candidat $candidat)
    {
        // Supprime toutes les offres sauvegardées pour ce candidat
        $candidat->offresSauvegardees()->detach(); // Pas d'argument pour tout détacher

        return redirect()->back()->with('success', 'Toutes vos offres sauvegardées ont été supprimées avec succès.');
    }
}
