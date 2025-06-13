<?php

namespace App\Http\Controllers\candidat;
use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\OffreEmploi;
use Illuminate\Http\Request;

class chercherOffresController extends Controller
{
    public function show(Candidat $candidat, Request $request, OffreEmploi $offre){
        
        // if ($request->has('save')) {
        //    return $this->sauvegarder($request, $candidat, $offre);
        // }
        if (!empty($request->input('search'))) {
            return $this->search($request, $candidat);
        }else{
            $sortBy = $request->input('sortBy', 'created_at'); // ou la valeur par défaut

            $offresSauvegardeesIds = $candidat->offresSauvegardees()->pluck('offre_emplois.id')->toArray();
            // Récupérer les IDs des offres auxquelles le candidat a postulé
            $appliedOfferIds = $candidat->candidatures()->pluck('offre_emploi_id')->toArray();

            $query = OffreEmploi::with('entreprise')
                ->where('status', 'active')
                ->whereNotIn('id', $appliedOfferIds)      // Exclure les offres postulées
                ->whereNotIn('id', $offresSauvegardeesIds); // Exclure les offres sauvegardées

            $countoffres = $query->count(); // Compter après tous les filtres
            $offres = $query->orderBy($sortBy)->paginate(4); // Trier et paginer
            
            return view('candidat.chercherOffres', compact('candidat', 'offres', 'countoffres', 'sortBy', 'offresSauvegardeesIds', 'appliedOfferIds'));
        }
    }
    public function search(Request $request, Candidat $candidat)
    {
        $searchTerm = $request->input('search');
        $sortBy = $request->input('sortBy', 'created_at'); // ou la valeur par défaut

        $offresSauvegardeesIds = $candidat->offresSauvegardees()->pluck('offre_emplois.id')->toArray();
        $appliedOfferIds = $candidat->candidatures()->pluck('offre_emploi_id')->toArray();

        $query = OffreEmploi::with('entreprise')
        ->where(function($query) use ($searchTerm) {
            $query->where('intitule_offre_emploi', 'like', '%' . $searchTerm . '%')
                ->orWhere('description_offre_emploi', 'like', '%' . $searchTerm . '%')
                ->orWhere('localisation', 'like', '%' . $searchTerm . '%')
                ->orWhereHas('entreprise', function($q) use ($searchTerm) {
                    $q->Where('nomEntreprise', 'like', '%' . $searchTerm . '%')
                    ->orWhere('secteurActivite', 'like', '%' . $searchTerm . '%')
                    ->orWhere('competences_requises', 'like', '%' . $searchTerm . '%');
                });
        })
            ->where('status', 'active')
            ->whereNotIn('id', $appliedOfferIds)      // Exclure les offres postulées
            ->whereNotIn('id', $offresSauvegardeesIds); // Exclure les offres sauvegardées

        $countoffres = $query->count(); // Compter après tous les filtres
        $offres = $query->orderBy($sortBy)->paginate(4); // Trier et paginer


        return view('candidat.chercherOffres', compact('candidat', 'offres', 'countoffres', 'sortBy', 'offresSauvegardeesIds', 'appliedOfferIds'));
    }
    public function sauvegarder(Request $request, Candidat $candidat, OffreEmploi $offre)
    {
        $result = $candidat->offresSauvegardees()->toggle($offre->id);

        if (!empty($result['attached'])) {
            // L'offre a été sauvegardée
            return back()->with('success', 'Offre sauvegardée avec succès !');
        } elseif (!empty($result['detached'])) {
            // L'offre a été retirée des sauvegardes
            return back()->with('success', 'Offre retirée des sauvegardes avec succès !');
        }

        return back()->with('info', 'Aucune action de sauvegarde n\'a été effectuée.'); // Message par défaut si rien ne change
    }
    public function detail(Candidat $candidat, OffreEmploi $offre)
    {
        $offre->load('entreprise');
        $offresSauvegardeesIds = $candidat->offresSauvegardees()->pluck('offre_emplois.id')->toArray();
        // Optionnel : Si vous avez besoin de savoir si l'offre détaillée est postulée sur la page de détails
        // $appliedOfferIds = $candidat->candidatures()->pluck('offre_emploi_id')->toArray();
        // return view('candidat.offreDetails', compact('candidat', 'offre', 'offresSauvegardeesIds', 'appliedOfferIds'));
        // Pour l'instant, je ne l'ajoute pas à la vue 'offreDetails' car la demande initiale concernait 'chercherOffres'
        return view('candidat.offreDetails', compact('candidat', 'offre', 'offresSauvegardeesIds'));
    }
}
