<?php

namespace App\Http\Controllers\entreprise;
use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class monProfilController extends Controller
{
    public function show(Entreprise $entreprise){
        // $profiles=Profile::paginate(10);
        // $profiles=Profile::all();
        return view('entreprise.monProfil',compact('entreprise'));
    }
public function update(Request $request, Entreprise $entreprise)
    {
         if ($request->action_type === 'apropos') {
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
