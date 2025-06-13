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
        } elseif ($request->action_type === 'apropos') {
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

            if ($request->has('competence_id')) {
                // Mettre à jour la compétence existante
                $competence = $candidat->competences()->findOrFail($request->competence_id);
                $competence->update($data);
                return response()->json(['success' => true, 'message' => 'Compétence modifiée avec succès']);
            } else {
                // Créer une nouvelle compétence
                $competence = $candidat->competences()->create($data);
                return response()->json(['success' => true, 'message' => 'Compétence ajoutée avec succès']);
            }
        } elseif ($request->action_type === 'delete_competence') {
            $request->validate([
                'competence_id' => 'required|exists:competences,id'
            ]);

            $competence = $candidat->competences()->findOrFail($request->competence_id);
            $competence->delete();

            return response()->json(['success' => true, 'message' => 'Compétence supprimée avec succès']);
        } elseif ($request->action_type === 'langue') {
            $request->validate([
                'nom' => 'required|string|max:50',
                'niveau' => 'required|in:Native,Fluent,Professional,Intermediate,Basic',
            ]);
            if ($request->filled('langue_id')) {
                // Mise à jour d'une langue existante
                $langue = $candidat->langues()->findOrFail($request->langue_id);
                $langue->update([
                    'nom' => $request->nom,
                    'niveau' => $request->niveau,
                ]);
                return redirect()->back()->with('success', 'Langue modifier avec succès');
            } else {
                // Création d'une nouvelle langue
                $candidat->langues()->create([
                    'nom' => $request->nom,
                    'niveau' => $request->niveau,
                ]);
                return redirect()->back()->with('success', 'Langue ajoutée avec succès');
            }
        } elseif ($request->action_type === 'delete_langue') {
            $langue = $candidat->langues()->findOrFail($request->langue_id);
            $langue->delete();
            return redirect()->back()->with('success', 'Langue supprimée avec succès');
        } elseif ($request->action_type === 'experience') {
            // Vérifier si un poste actuel existe déjà
            if ($request->has('poste_actuel')) {
                $posteActuelExistant = $candidat->experiences()
                    ->where('poste_actuel', true)
                    ->when($request->filled('experience_id'), function($query) use ($request) {
                        return $query->where('id', '!=', $request->experience_id);
                    })
                    ->exists();

                if ($posteActuelExistant) {
                    return back()->withErrors(['poste_actuel' => 'Vous ne pouvez avoir qu\'un seul poste actuel à la fois.']);
                }
            }

            $request->validate([
                'titre_poste' => 'required|string|max:100',
                'entreprise' => 'required|string|max:100',
                'ville' => 'required|string|max:100',
                'date_debut' => [
                    'required',
                    'date',
                    'before_or_equal:today',
                    'after_or_equal:1900-01-01'
                ],
                'date_fin' => [
                    'nullable',
                    'date',
                    'after_or_equal:date_debut',
                    'before_or_equal:today'
                ],
                'poste_actuel' => 'boolean',
                'description' => 'nullable|string'
            ], [
                'date_debut.required' => 'La date de début est obligatoire.',
                'date_debut.date' => 'La date de début doit être une date valide.',
                'date_debut.before_or_equal' => 'La date de début ne peut pas être dans le futur.',
                'date_debut.after_or_equal' => 'La date de début doit être après 1900.',
                'date_fin.date' => 'La date de fin doit être une date valide.',
                'date_fin.after_or_equal' => 'La date de fin doit être après la date de début.',
                'date_fin.before_or_equal' => 'La date de fin ne peut pas être dans le futur.'
            ]);

            $data = [
                'titre_poste' => $request->titre_poste,
                'entreprise' => $request->entreprise,
                'ville' => $request->ville,
                'date_debut' => $request->date_debut,
                'date_fin' => $request->poste_actuel ? null : $request->date_fin,
                'poste_actuel' => $request->has('poste_actuel'),
                'description' => $request->description
            ];

            if ($request->filled('experience_id')) {
                $experience = $candidat->experiences()->findOrFail($request->experience_id);
                $experience->update($data);
                return back()->with('success', 'Expérience mise à jour avec succès.');
            } else {
                $candidat->experiences()->create($data);
                return back()->with('success', 'Expérience ajoutée avec succès.');
            }
        } elseif ($request->action_type === 'delete_experience') {
            $request->validate([
                'experience_id' => 'required|exists:experiences,id'
            ]);
            
            $experience = $candidat->experiences()->findOrFail($request->experience_id);
            $experience->delete();
            return back()->with('success', 'Expérience supprimée avec succès.');
        } elseif ($request->action_type === 'certification') {
            $request->validate([
                'nom' => 'required|string|max:255',
                'organisation' => 'required|string|max:255',
                'date_obtention' => 'required|date',
                'code_certifications_international' => 'nullable|string|max:255',
                'date_obtention' => [
                    'required',
                    'date',
                    'before_or_equal:today',
                    'after_or_equal:1900-01-01'
                ],
                'code_certifications_international' => [
                    'nullable',
                    'string',
                    'max:255',
                    'regex:/^[A-Za-z0-9\-_]+$/', // Alphanumérique avec tirets et underscores
                ],
                [
                    'date_obtention.required' => 'La date d\'obtention est obligatoire.',
                    'date_obtention.date' => 'La date d\'obtention doit être une date valide.',
                    'date_obtention.before_or_equal' => 'La date d\'obtention ne peut pas être dans le futur.',
                    'date_obtention.after_or_equal' => 'La date d\'obtention doit être après 1900.',
                    'code_certifications_international.regex' => 'Le code de certification doit contenir uniquement des lettres, chiffres, tirets et underscores.',
                ]
            ]);

            if ($request->certification_id) {
                // Mise à jour d'une certification existante
                $candidat->certifications()->where('id', $request->certification_id)->update([
                    'nom' => $request->nom,
                    'organisation' => $request->organisation,
                    'date_obtention' => $request->date_obtention,
                    'code_certifications_international' => $request->code_certifications_international,
                ]);
                return back()->with('success', 'Certification mise à jour avec succès.');
            } else {
                // Création d'une nouvelle certification
                $candidat->certifications()->create([
                    'nom' => $request->nom,
                    'organisation' => $request->organisation,
                    'date_obtention' => $request->date_obtention,
                    'code_certifications_international' => $request->code_certifications_international,
                ]);
                return back()->with('success', 'Certification ajoutée avec succès.');
            }
        } elseif ($request->action_type === 'delete_certification') {
            $request->validate([
                'certification_id' => 'required|exists:certifications,id'
            ]);
            
            $certification = $candidat->certifications()->findOrFail($request->certification_id);
            $certification->delete();
            return back()->with('success', 'Certification supprimée avec succès.');
        }elseif( $request->action_type === 'formation') {
            $request->validate([
                'diplome' => 'required|string|max:255',
                'etablissement' => 'required|string|max:255',
                'date_debut' => [
                    'required',
                    'date',
                    'before_or_equal:today',
                    'after_or_equal:1900-01-01'
                ],
                'date_fin' => [
                    'nullable',
                    'date',
                    'after:date_debut',
                    'before_or_equal:today'
                ],
                'description' => 'nullable|string|max:1000'
            ], [
                'diplome.required' => 'Le diplôme est obligatoire.',
                'diplome.max' => 'Le diplôme ne peut pas dépasser 255 caractères.',
                'etablissement.required' => 'L\'établissement est obligatoire.',
                'etablissement.max' => 'L\'établissement ne peut pas dépasser 255 caractères.',
                'date_debut.required' => 'La date de début est obligatoire.',
                'date_debut.date' => 'La date de début doit être une date valide.',
                'date_debut.before_or_equal' => 'La date de début ne peut pas être dans le futur.',
                'date_debut.after_or_equal' => 'La date de début doit être après 1900.',
                'date_fin.date' => 'La date de fin doit être une date valide.',
                'date_fin.after' => 'La date de fin doit être après la date de début.',
                'date_fin.before_or_equal' => 'La date de fin ne peut pas être dans le futur.',
                'description.max' => 'La description ne peut pas dépasser 1000 caractères.'
            ]);

            if ($request->filled('formation_id')) {
                // Mise à jour d'une formation existante
                $candidat->formations()->where('id', $request->formation_id)->update([
                    'diplome' => $request->diplome,
                    'etablissement' => $request->etablissement,
                    'date_debut' => $request->date_debut,
                    'date_fin' => $request->date_fin,
                    'description' => $request->description
                ]);
                return back()->with('success', 'Formation mise à jour avec succès.');
            } else {
                // Création d'une nouvelle formation
                $candidat->formations()->create([
                    'diplome' => $request->diplome,
                    'etablissement' => $request->etablissement,
                    'date_debut' => $request->date_debut,
                    'date_fin' => $request->date_fin,
                    'description' => $request->description
                ]);
                return back()->with('success', 'Formation ajoutée avec succès.');
            }
        } elseif ($request->action_type === 'delete_formation') {
            $candidat->formations()->where('id', $request->formation_id)->delete();
            return back()->with('success', 'Formation supprimée avec succès.');
        }
    }
}