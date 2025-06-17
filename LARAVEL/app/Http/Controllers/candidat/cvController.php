<?php

namespace App\Http\Controllers\candidat;
use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class cvController extends Controller
{
    public function show(Candidat $candidat){
        // Vérification compte désactivé
        if ($candidat->status === 'pending') {
        return view('candidat.compte_desactive', compact('candidat'));
        }
        return view('candidat.cv',compact('candidat'));
    }

    public function store(Request $request, Candidat $candidat)
    {
        // Valider le fichier CV
        $request->validate([
            'cv_file' => 'required|mimes:pdf,doc,docx|max:5120', // 5MB max
        ]);

        try {
            // Supprimer l'ancien CV s'il existe
            if($candidat->cv) {
                Storage::delete('public/' . $candidat->cv->fichier);
                $candidat->cv->delete();
            }

            // Stocker le nouveau fichier
            $file = $request->file('cv_file');
            $path = $file->store('cvs', 'public');

            // Créer l'entrée dans la base de données
            Cv::create([
                'candidat_id' => $candidat->id,
                'fichier' => $path,
                'nom_fichier' => $file->getClientOriginalName() // Sauvegarde du nom original
            ]);

            return redirect()->back()->with('success', 'CV téléchargé avec succès');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors du téléchargement du CV');
        }
    }

    public function destroy(Candidat $candidat)
    {
        try {
            if($candidat->cv) {
                // Supprimer le fichier physique
                Storage::delete('public/' . $candidat->cv->fichier);
                
                // Supprimer l'entrée dans la base de données
                $candidat->cv->delete();

                return redirect()->back()->with('success', 'CV supprimé avec succès');
            }

            return redirect()->back()->with('error', 'Aucun CV trouvé');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la suppression du CV');
        }
    }
}
