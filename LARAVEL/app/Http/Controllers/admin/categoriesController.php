<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
    public function show()
    {
        try {
            $categories = Categorie::whereNull('parent_id')->paginate(12);
            $stats = [
                'categories_count' => Categorie::whereNull('parent_id')->count(),
                'subcategories_count' => Categorie::whereNotNull('parent_id')->count(),
                'total_offers' => 0
            ];
            return view('admin.categories', compact('categories', 'stats'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors du chargement des catégories.');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nom' => 'required|string|max:255|unique:categories',
                'description' => 'nullable|string',
                'icone' => 'required|string',
                'couleur' => 'required|string',
                'is_active' => 'boolean'
            ]);

            $categorie = Categorie::create($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Catégorie créée avec succès',
                'data' => $categorie
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de la création de la catégorie'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $categorie = Categorie::findOrFail($id);
            
            $request->validate([
                'nom' => 'required|string|max:255|unique:categories,nom,' . $id,
                'description' => 'nullable|string',
                'icone' => 'required|string',
                'couleur' => 'required|string',
                'is_active' => 'boolean'
            ]);

            $categorie->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Catégorie mise à jour avec succès',
                'data' => $categorie
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Catégorie non trouvée'
            ], 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de la mise à jour de la catégorie'
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $categorie = Categorie::findOrFail($id);
            
            // Vérifier si la catégorie a des sous-catégories
            if ($categorie->enfants()->count() > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Impossible de supprimer cette catégorie car elle contient des sous-catégories'
                ], 400);
            }

            $categorie->delete();
            return response()->json([
                'success' => true,
                'message' => 'Catégorie supprimée avec succès'
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Catégorie non trouvée'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de la suppression de la catégorie'
            ], 500);
        }
    }

    public function getSousCategories($id)
    {
        try {
            $categorie = Categorie::findOrFail($id);
            $sousCategories = $categorie->enfants;
            
            return response()->json([
                'success' => true,
                'data' => $sousCategories,
                'message' => $sousCategories->isEmpty() ? 'Aucune sous-catégorie trouvée' : 'Sous-catégories récupérées avec succès'
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Catégorie non trouvée'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de la récupération des sous-catégories'
            ], 500);
        }
    }

    public function addSousCategorie(Request $request, $id)
    {
        try {
            $categorie = Categorie::findOrFail($id);
            
            $request->validate([
                'nom' => 'required|string|max:255|unique:categories',
                'description' => 'nullable|string',
                'icone' => 'required|string',
                'couleur' => 'required|string',
                'is_active' => 'boolean'
            ]);

            $sousCategorie = $categorie->enfants()->create($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Sous-catégorie ajoutée avec succès',
                'data' => $sousCategorie
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Catégorie parente non trouvée'
            ], 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de l\'ajout de la sous-catégorie'
            ], 500);
        }
    }

    public function getCategory(Categorie $categorie)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $categorie,
                'message' => 'Catégorie récupérée avec succès'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération de la catégorie: ' . $e->getMessage()
            ], 422);
        }
    }
}
