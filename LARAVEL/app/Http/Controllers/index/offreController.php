<?php

namespace App\Http\Controllers\index;
use App\Http\Controllers\Controller;
use App\Models\OffreEmploi;
use Illuminate\Http\Request;

class offreController extends Controller
{
    public function index(Request $request){
        $offres = OffreEmploi::with('entreprise')
            ->where('date_limite_candidature', '>=', now())
            ->orderBy('created_at', 'desc')
            ->paginate(12);
            
        return view('index.offre', compact('offres'));
    }
}
