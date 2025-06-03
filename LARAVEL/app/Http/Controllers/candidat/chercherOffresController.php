<?php

namespace App\Http\Controllers\candidat;
use App\Http\Controllers\Controller;
use App\Models\Candidat;
use Illuminate\Http\Request;

class chercherOffresController extends Controller
{
    public function show(Candidat $candidat){
        // $profiles=Profile::paginate(10);
        // $profiles=Profile::all();
        return view('candidat.chercherOffres',compact('candidat'));
    }
}
