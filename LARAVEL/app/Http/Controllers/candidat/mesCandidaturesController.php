<?php

namespace App\Http\Controllers\candidat;
use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\Candidature;
use Illuminate\Http\Request;
use App\Models\OffreEmploi;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'messageCandidature' => 'nullable|string|max:500',
        ]);

         // Vérifier si une candidature existe déjà
        $existe = Candidature::where('candidat_id', $candidat->id)
            ->where('offre_emploi_id', $offre->id)
            ->exists();

        if ($existe) {
            return back()->with('error', 'Vous avez déjà postulé à cette offre.');
        }

        // Gestion du fichier CV
        $cv = $candidat->cv;
        $path = null;
        $nomFichier = null;

        if ($cv && $cv->fichier) {
            // Générer un nouveau nom pour éviter les conflits
            $nouveauNom = uniqid('cv_') . '_' . $cv->nom_fichier;
            // Copier le fichier dans le dossier des candidatures
            Storage::disk('public')->copy($cv->fichier, 'cvsCandidature/' . $nouveauNom);
            $path = 'cvsCandidature/' . $nouveauNom;
            $nomFichier = $cv->nom_fichier;
        }
        // Création de la candidature
        $candidature = Candidature::create([
            'candidat_id' => $candidat->id,
            'offre_emploi_id' => $offre->id,
            'statut' => 'En attente',
            'messageCandidature' => $request->input('messageCandidature'),
            'fichier' => $path,
            'nom_fichier' => $nomFichier
            // ...autres champs si besoin...
        ]);

        return to_route('candidat.chercherOffres', ['candidat' => $candidat->id])
            ->with('success', 'Vous avez postulé avec succès à l\'offre !');
    }

    public function showDetails(Candidat $candidat, Candidature $candidature)
    {
        // Charger les relations nécessaires pour éviter les requêtes N+1
        $candidature->load(['offreEmploi.entreprise', 'candidat.cv']);

        // Vous pouvez accéder au CV via $candidature->fichier et $candidature->nom_fichier
        // ou si vous voulez le CV principal du candidat : $candidat->cv

        return view('candidat.candidature_details', compact('candidat', 'candidature'));
    }
}
