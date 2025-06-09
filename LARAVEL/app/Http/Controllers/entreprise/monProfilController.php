<?php

namespace App\Http\Controllers\entreprise;
use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\CompetenceRecherchee;

class monProfilController extends Controller
{
    public function show(Entreprise $entreprise){
        // $profiles=Profile::paginate(10);
        // $profiles=Profile::all();
        return view('entreprise.monProfil',compact('entreprise'));
    }
public function update(Request $request, Entreprise $entreprise)
    {
        // Vérifier le type d'action
        if ($request->action_type === 'competence_add') {
            // Validation des données
            $request->validate([
                'nom' => 'required|string|max:255',
            ]);

            // Création de la nouvelle compétence
            $competence = CompetenceRecherchee::create([
                'nom' => $request->nom,
                'entreprise_id' => $entreprise->id,
            ]);

            return redirect()->back()->with('success', 'Compétence ajoutée avec succès');
        }
        elseif ($request->action_type === 'competence_update') {
            $request->validate([
                'competence_id' => 'required|exists:competence_recherchees,id',
                'nom' => 'required|string|max:255'
            ]);

            $competence = CompetenceRecherchee::find($request->competence_id);
            $competence->update([
                'nom' => $request->nom
            ]);

            return redirect()->back()->with('success', 'Compétence mise à jour avec succès');
        }
        elseif ($request->action_type === 'competence_delete') {
            // Validation de la requête
            $request->validate([
                'competence_id' => 'required|exists:competence_recherchees,id'
            ]);

            // Récupérer et vérifier que la compétence appartient à l'entreprise
            $competence = CompetenceRecherchee::where('id', $request->competence_id)
                ->where('entreprise_id', $entreprise->id)
                ->firstOrFail();

            // Supprimer la compétence
            $competence->delete();

            // Redirection avec message de succès
            return redirect()->back()->with('success', 'Compétence supprimée avec succès');
        }
        elseif ($request->action_type === 'apropos') {
             // Validation des données
             $request->validate([
                 'description' => 'nullable|string|max:500',
                 'SecteurActivite' => 'required|string|max:50',
                 'tailleEntreprise' => 'required|string|max:50',
                 'dateCreation' => 'required|date|after_or_equal:1900-01-01|before_or_equal:today',
                 'siteWeb' => 'nullable|url|max:255',
                 ], [
                 'dateCreation.before_or_equal' => 'La date ne peut pas être dans le futur.',
             ]);
     
             // Mise à jour des informations de l'entreprise
             $entreprise->update($request->all());
     
             // Redirection avec un message de succès
             return back()->with('success', 'votre modification a été faite avec succès');
        } elseif ($request->action_type === 'logo') {
            // Validation de l'image
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        
            // Stockage de l'image
            $path = $request->file('logo')->store('logoEntreprise', 'public');
        
            // Mise à jour du logo de l'entreprise
            $entreprise->update(['logo' => $path]);
        
            // Redirection avec un message de succès
            return back()->with('success', 'Logo mis à jour avec succès');
        }elseif ($request->action_type === 'Competences_recherchees'){
            // Validation des compétences
            $request->validate([
                'competences' => 'required|array',
                'competences.*' => 'string|max:50',
            ]);
        
            // Suppression des compétences existantes
            $entreprise->competencesRecherchees()->delete();
        
            // Ajout des nouvelles compétences
            foreach ($request->competences as $competence) {
                $entreprise->competencesRecherchees()->create(['nom' => $competence]);
            }
        
            // Redirection avec un message de succès
            return back()->with('success', 'Compétences mises à jour avec succès');
        }
    }
    public function destroyLogo(Entreprise $entreprise)
    {
        // Suppression du logo de l'entreprise
        if ($entreprise->logo) {
            Storage::disk('public')->delete($entreprise->logo);
            $entreprise->update(['logo' => null]);
        }
        
        // Redirection avec un message de succès
        return back()->with('danger', 'Logo supprimé avec succès');
    }
}
