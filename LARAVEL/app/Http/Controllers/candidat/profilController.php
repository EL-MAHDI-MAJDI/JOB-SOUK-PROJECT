<?php

namespace App\Http\Controllers\candidat;
use App\Http\Controllers\Controller;
use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class profilController extends Controller
{
    public function show(Candidat $candidat){
        // $profiles=Profile::paginate(10);
        // $profiles=Profile::all();
        return view('candidat.profil',compact('candidat'));
    }
    public function update(Request $request, Candidat $candidat)
    {
        if ($request->action_type === 'profile') {
             // Validation des données
             $request->validate([
                    'prenom' => 'required|string|max:50',
                    'nom' => 'required|string|max:50',
                    'titre_professionnel' => 'required|string|max:100',
                    'ville' => 'required|string|max:100',
             ]);
              // Mise à jour des informations de l'entreprise
             $candidat->update($request->all());
             // Redirection avec un message de succès
             return back()->with('success', 'votre modification a été faite avec succès');
        } elseif ($request->action_type === 'photo') {
            if ($request->hasFile('photoProfile')) {
                // Validation de l'image
                $request->validate([
                    'photoProfile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                // Supprimer l'ancienne photo si elle existe
                if ($candidat->photoProfile) {
                    Storage::delete('public/' . $candidat->photoProfile);
                }

                // Stockage de la nouvelle image
                $path = $request->file('photoProfile')->store('photoProfile', 'public');

                // Mise à jour de la photo du candidat
                $candidat->update(['photoProfile' => $path]);

                return back()->with('success', 'Photo mise à jour avec succès');
            }

            if ($request->has('remove_photo')) {
                // Supprimer la photo existante
                if ($candidat->photoProfile) {
                    Storage::delete('public/' . $candidat->photoProfile);
                    $candidat->update(['photoProfile' => null]);
                }

                return back()->with('success', 'Photo supprimée avec succès');
            }
        }elseif ($request->action_type === 'apropos') {
            $request->validate([
            'contenu' => 'required|string|min:10',
            ]);

            $candidat->apropos()->updateOrCreate(
                [], // aucun critère — un seul "à propos" par candidat
                ['contenu' => $request->contenu]
            );

            return back()->with('success', 'À propos mis à jour avec succès.');
        } elseif ($request->action_type === 'competence') {
            // Validation
            $request->validate([
                'nom' => 'required|string|max:255',
                'type' => 'required|in:technical,soft',
                'niveau' => 'required|integer|between:1,4',
            ]);

            // Convert values to proper types before creating
            $data = [
                'nom' => $request->nom,
                'type' => strval($request->type), // Ensure type is properly cast to string
                'niveau' => intval($request->niveau) // Ensure niveau is properly cast to integer
            ];

            // Créer la nouvelle compétence
            $candidat->competences()->create($data);

            return back()->with('success', 'Compétence ajoutée avec succès');
        } elseif ($request->action_type === 'delete_competence') {
            $request->validate([
                'competence_id' => 'required|exists:competences,id'
            ]);

            $competence = $candidat->competences()->findOrFail($request->competence_id);
            $competence->delete();

            return back()->with('success', 'Compétence supprimée avec succès');
        }
    }
}