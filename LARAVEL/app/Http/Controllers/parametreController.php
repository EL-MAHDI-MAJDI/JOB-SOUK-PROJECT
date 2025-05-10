<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class parametreController extends Controller
{
    public function index(Request $request){
        // $profiles=Profile::paginate(10);
        // $profiles=Profile::all();
        return view('candidat.parametre');
    }
}
