<?php

namespace App\Http\Controllers\entreprise;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class rechercherCandidatsController extends Controller
{
    public function index(Request $request){
        // $profiles=Profile::paginate(10);
        // $profiles=Profile::all();
        return view('entreprise.rechercherCandidats');
    }
}
