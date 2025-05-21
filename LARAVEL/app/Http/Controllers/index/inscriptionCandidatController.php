<?php

namespace App\Http\Controllers\index;
use App\Http\Controllers\Controller;
use App\Models\Candidat;
use Illuminate\Http\Request;

class inscriptionCandidatController extends Controller
{
    public function create(Request $request){
        // $profiles=Profile::paginate(10);
        // $profiles=Profile::all(); 
        return view('index.inscriptionCandidat');
    }
    public function store(Request $request){
        // recuperation des données
        $prenom=$request->prenom;
        $nom=$request->nom;
        $email=$request->email;
        $phone=$request->phone;
        $ville=$request->ville;
        $adresse=$request->adresse;
        $titre_professionnel=$request->titre_professionnel;
        $url_cv=$request->url_cv;
        $password=$request->password;
        
        // validation des données
        $request->validate([
            'prenom'=>'required|string|max:30',
            'nom'=>'required|string|max:30',
            'email'=>'required|email|unique:candidats',
            'phone'=>'required|regex:/^[0-9\-]+$/|max:15',
            'ville'=>'required|string|max:30',
            'adresse'=>'required|string|max:100',
            'titre_professionnel'=>'nullable|string|max:50',
            'url_cv'=>'nullable|url|max:255',
            'password'=>'required|string|min:8|confirmed',
        ]);
        // insertion
        Candidat::create([
            'prenom'=>$prenom,
            'nom'=>$nom,
            'email'=>$email,
            'phone'=>$phone,
            'ville'=>$ville,
            'adresse'=>$adresse,
            'titre_professionnel'=>$titre_professionnel,
            'url_cv'=>$url_cv,
            'password'=>bcrypt($password),
        ]);

        // redirection
        return redirect()->route('candidat.dashboard')->with('success', 'Votre compte a été créé avec succès !');
    }
}
