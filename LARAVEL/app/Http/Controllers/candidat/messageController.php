<?php

namespace App\Http\Controllers\candidat;
use App\Http\Controllers\Controller;
use App\Models\Candidat;
use Illuminate\Http\Request;

class messageController extends Controller
{
    public function show(Candidat $candidat){
        // Vérification compte désactivé
        if ($candidat->status === 'pending') {
        return view('candidat.compte_desactive', compact('candidat'));
        }
        return view('candidat.message',compact('candidat'));
    }
}
