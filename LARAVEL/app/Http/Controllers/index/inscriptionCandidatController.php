<?php

namespace App\Http\Controllers\index;
use App\Http\Controllers\Controller;
use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class inscriptionCandidatController extends Controller
{
    public function create(Request $request){
        // $profiles=Profile::paginate(10);
        // $profiles=Profile::all(); 
        return view('index.inscriptionCandidat');
    }
    public function store(Request $request){
        // recuperation des données
        if ($request->hasFile('photoProfile')) $photoProfile = $request->file('photoProfile')->store('photoProfile', 'public');
        else $photoProfile = null;
        $prenom=$request->prenom;
        $nom=$request->nom;
        $email=$request->email;
        $phone=$request->phone;
        $ville=$request->ville;
        $adresse=$request->adresse;
        $titre_professionnel=$request->titre_professionnel;
        $password=$request->password;
        $testPhone=$request->testPhone;
        
        // dd($photoProfile,$prenom,$nom,$email,$phone,$ville,$adresse,$titre_professionnel,$password);
        // validation des données
        $request->validate([
            'prenom'=>'required|string|max:30',
            'nom'=>'required|string|max:30',
            'email' => [
                'required',
                'email',
                Rule::unique('candidats'),
                Rule::unique('admins'),
                Rule::unique('entreprises'),
            ],
            'phone' => [
                'required',
                'regex:/^\+?[0-9\-]+$/',
                'max:30',
                function($attribute, $value, $fail) use ($request) {
                    if ($request->testPhone === 'nonValide') {
                        $fail('Veuillez saisir un numéro de téléphone valide.');
                    }
                },
            ],
            'ville'=>'required|string|max:30',
            'adresse'=>'required|string|max:100',
            'titre_professionnel'=>'nullable|string|max:50',
            'photoProfile'=>'nullable|image|max:2048',
            'password'=>'required|string|min:8|confirmed',
        ]);
        // dd($photoProfile,$prenom,$nom,$email,$phone,$ville,$adresse,$titre_professionnel,$password);
        // dd($testPhone);
        // insertion
        $candidat=Candidat::create([
            'prenom'=>$prenom,
            'nom'=>$nom,
            'email'=>$email,
            'phone'=>$phone,
            'ville'=>$ville,
            'adresse'=>$adresse,
            'titre_professionnel'=>$titre_professionnel,
            'photoProfile'=>$photoProfile,
            'password'=>bcrypt($password),
        ]);
       Auth::guard('candidats')->login($candidat);
        
        // redirection
        return redirect()->route('candidat.dashboard',['candidat'=> $candidat->id])->with('success', 'Votre compte a été créé avec succès !');
    }
}
