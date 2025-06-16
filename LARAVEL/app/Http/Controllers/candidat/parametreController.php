<?php

namespace App\Http\Controllers\candidat;
use App\Http\Controllers\Controller;
use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class parametreController extends Controller
{
    public function show(Candidat $candidat){
        // $profiles=Profile::paginate(10);
        // $profiles=Profile::all();
        return view('candidat.parametre',compact('candidat'));
    }
    public function update(Request $request, Candidat $candidat){
        if($request->update === 'update_password') {
            // Validation des données
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ]);

            // Vérifier si l'ancien mot de passe est correct
            if (!Hash::check($request->current_password, $candidat->password)) {
                return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect']);
            }

            // Vérifier si le nouveau mot de passe est différent de l'ancien
            if (Hash::check($request->new_password, $candidat->password)) {
                return back()->withErrors(['new_password' => 'Le nouveau mot de passe doit être différent de l\'ancien']);
            }

            // Mettre à jour le mot de passe
            $candidat->update([
                'password' => Hash::make($request->new_password)
            ]);

            return back()->with('success', 'Votre mot de passe a été mis à jour avec succès');
        } else {
            // Validation des données
            $request->validate([
                'prenom' => 'required|string|max:50',
                'nom' => 'required|string|max:50',
                'email' => [
                    'required',
                    'email',
                    'max:100',
                    // Vérification de l'unicité de l'email dans la table candidats, en ignorant l'ID du candidat actuel
                    // pour éviter les conflits lors de la mise à jour
                    Rule::unique('candidats')->ignore($candidat->id),
                    Rule::unique('admins'),
                    Rule::unique('entreprises'),
                ],
                'adresse' => 'required|string|max:255',
                'titre_professionnel' => 'nullable|string|max:100',
                'phone' => 'required|regex:/^\+?[0-9\-]+$/|max:20',
                'ville' => 'required|string|max:100',
            ]);
            // Mise à jour des informations du candidat
            $candidat->update($request->all());
            // Redirection avec un message de succès
            return back()->with('success', 'Vos paramètres ont été mis à jour avec succès');
        }
    }
}
