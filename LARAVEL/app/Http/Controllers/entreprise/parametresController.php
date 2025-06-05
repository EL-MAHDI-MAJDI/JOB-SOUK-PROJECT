<?php

namespace App\Http\Controllers\entreprise;
use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class parametresController extends Controller
{
    public function show(Entreprise $entreprise){
        // $profiles=Profile::paginate(10);
        // $profiles=Profile::all();
        return view('entreprise.parametres', compact('entreprise'));
    }
    public function update(Request $request, Entreprise $entreprise)
    {
        if($request->update === 'update_account') {
        // Validation des données
        $request->validate([
            'nomEntreprise' => 'required|string|max:100',
            'email' => [
                'required',
                'email',
                Rule::unique('candidats'),
                Rule::unique('admins'),
                Rule::unique('entreprises')->ignore($entreprise->id),
            ],
            'phone' => [
                'required',
                'regex:/^\+?[0-9\-]+$/',
                'max:30',
                function($attribute, $value, $fail) use ($request) {
                    if ($request->testPhone === 'nonValide') {
                        $fail('Veuillez saisir un numéro de téléphone valide.');
                    }
                },
            ],
            'adresse' => 'required|string|max:100',
            'ville' => 'required|string|max:50',
        ]);

        // Mise à jour des informations de l'entreprise
        $entreprise->update($request->all());

        // Redirection avec un message de succès
        return back()->with('success', 'Vos paramètres ont été mis à jour avec succès');
    }
    elseif ($request->update === 'update_password') {
        // Validation des données
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Vérifier si l'ancien mot de passe est correct
        if (!Hash::check($request->current_password, $entreprise->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect']);
        }

        // Vérifier si le nouveau mot de passe est différent de l'ancien
        if (Hash::check($request->new_password, $entreprise->password)) {
            return back()->withErrors(['new_password' => 'Le nouveau mot de passe doit être différent de l\'ancien']);
        }

        // Mettre à jour le mot de passe
        $entreprise->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Votre mot de passe a été mis à jour avec succès');
    }
}
}
