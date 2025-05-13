<?php

namespace App\Http\Controllers\candidat;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class mesCandidaturesController extends Controller
{
    public function index(Request $request){
        // $profiles=Profile::paginate(10);
        // $profiles=Profile::all();
        return view('candidat.mesCandidatures');
    }
}
