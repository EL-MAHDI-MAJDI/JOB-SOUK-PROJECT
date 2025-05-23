<?php

namespace App\Http\Controllers\index;
use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class inscriptionEntrepriseController extends Controller
{
    public function create(Request $request){
        return view('index.inscriptionEntreprise');
    }
    
    public function store(Request $request){
        // recuperation des données
        $nomEntreprise = $request->nomEntreprise;
        $email = $request->email;
        $SecteurActivite = $request->SecteurActivite;
        $tailleEntreprise = $request->tailleEntreprise;
        $siteWeb = $request->siteWeb;
        $ville = $request->ville;
        $adresse = $request->adresse;
        $dateCreation = $request->dateCreation;
        $description = $request->description;
        $logo = $request->logo;
        $phone = $request->phone;
        $password = $request->password;
        
        // dd($nomEntreprise,$email,$SecteurActivite,$tailleEntreprise,$siteWeb,$ville,$adresse,$dateCreation,$description,$logo,$phone,$password);
        
        // validation des données
        $request->validate([
            'nomEntreprise' => 'required|string|max:100',
            'email' => [
                'required',
                'email',
                Rule::unique('candidats'),
                Rule::unique('admins'),
                Rule::unique('entreprises'),
            ],
            'SecteurActivite' => 'required|string|max:50',
            'tailleEntreprise' => 'required|string|max:50',
            'siteWeb' => 'nullable|url|max:255',
            'ville' => 'required|string|max:50',
            'adresse' => 'required|string|max:100',
            'dateCreation' => 'required|date|after_or_equal:1900-01-01|before_or_equal:today',
            'description' => 'nullable|string|max:500',
            'logo' => 'nullable|image|max:2048',
            'phone' => 'required|regex:/^[0-9\-\+\s]+$/|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);
        // dd($nomEntreprise,$email,$SecteurActivite,$tailleEntreprise,$siteWeb,$ville,$adresse,$dateCreation,$description,$logo,$phone,$password);
        // insertion
        Entreprise::create([
            'nomEntreprise' => $nomEntreprise,
            'email' => $email,
            'SecteurActivite' => $SecteurActivite,
            'tailleEntreprise' => $tailleEntreprise,
            'siteWeb' => $siteWeb,
            'ville' => $ville,
            'adresse' => $adresse,
            'dateCreation' => $dateCreation,
            'description' => $description,
            'logo' => $logo,
            'phone' => $phone,
            'password' => bcrypt($password),
        ]);

        // redirection
        return redirect()->route('entreprise.dashboard')->with('success', 'Votre compte entreprise a été créé avec succès !');
    }
}