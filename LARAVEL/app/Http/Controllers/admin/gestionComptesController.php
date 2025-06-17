<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidat;
use App\Models\entreprise;

class gestionComptesController extends Controller
{
    public function index(Request $request){
        $users = Candidat::paginate(10);
        $companies = Entreprise::paginate(10);
        return view('admin.gestionComptes', compact('users', 'companies'));
    }
    public function activateEntreprise($id)
    {
        $entreprise = Entreprise::findOrFail($id);
        $entreprise->status = 'active';
        $entreprise->save();
        return back()->with('success', 'Compte entreprise activé.');
    }

    public function deactivateEntreprise($id)
    {
        $entreprise = Entreprise::findOrFail($id);
        $entreprise->status = 'pending';
        $entreprise->save();
        return back()->with('success', 'Compte entreprise désactivé.');
    }
    public function activateCandidat($id)
    {
        $candidat = Candidat::findOrFail($id);
        $candidat->status = 'active';
        $candidat->save();
        return back()->with('success', 'Compte candidat activé.');
    }

    public function deactivateCandidat($id)
    {
        $candidat = Candidat::findOrFail($id);
        $candidat->status = 'pending';
        $candidat->save();
        return back()->with('success', 'Compte candidat désactivé.');
    }
}
