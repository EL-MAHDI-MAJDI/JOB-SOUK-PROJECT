<?php

namespace App\Http\Controllers\index;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class choixInscriptionController extends Controller
{
    public function index(Request $request){
        // $profiles=Profile::paginate(10);
        // $profiles=Profile::all();
        return view('index.choixInscription');
    }
}
