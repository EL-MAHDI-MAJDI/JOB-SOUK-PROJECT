<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Entreprise;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(Request $request){
        // Récupère les entreprises dont le statut est "a_valider"
        $entreprises = Entreprise::where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->take(5) // Limite à 5, retire cette ligne si tu veux tout afficher
            ->get();
        return view('admin.dashboard',compact('entreprises'));
    }
}
