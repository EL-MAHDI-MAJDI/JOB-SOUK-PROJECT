<?php

namespace App\Http\Controllers\index;
use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class entreprisesController extends Controller
{
    public function index(Request $request){
        $entreprises = Entreprise::withCount('offreEmplois')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
            
        return view('index.entreprises', compact('entreprises'));
    }
}
