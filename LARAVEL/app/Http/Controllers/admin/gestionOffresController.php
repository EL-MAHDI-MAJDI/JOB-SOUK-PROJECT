<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\OffreEmploi;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class gestionOffresController extends Controller
{
    public function index(Request $request)
    {
        // Récupérer toutes les offres avec leurs relations
        $offres = OffreEmploi::with(['entreprise', 'candidats'])
            ->when($request->has('status'), function($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->when($request->has('type_contrat'), function($query) use ($request) {
                $query->where('type_contrat', $request->type_contrat);
            })
            ->when($request->has('entreprise'), function($query) use ($request) {
                $query->where('entreprise_id', $request->entreprise);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Récupérer la liste des entreprises pour le filtre
        $entreprises = Entreprise::all();

        return view('admin.gestionOffres', compact('offres', 'entreprises'));
    }

    public function destroy($id)
    {
        $offre = OffreEmploi::findOrFail($id);
        $offre->delete();

        return redirect()->route('admin.gestionOffres')->with('success', "Offre supprimée avec succès.");
    }

    public function show($id)
    {
        $offre = OffreEmploi::with(['entreprise', 'candidats'])->findOrFail($id);
        return response()->json($offre);
    }
}
