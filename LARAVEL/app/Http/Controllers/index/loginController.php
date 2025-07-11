<?php

namespace App\Http\Controllers\index;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function show(){
        return view('index.login');
    }


    public function login(Request $request){
        // $email = $request->email;
        // $password = $request->password;

        // recuperation des données 
        $credentials = $request->only('email', 'password');

        // validation
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string|min:8',
        ]);

        if(Auth::guard('candidats')->attempt($credentials)){
            $request->session()->regenerate();
            $candidat = Auth::guard('candidats')->user();
            return to_route('candidat.dashboard', ['candidat' => $candidat->id]);
        }else
        if(Auth::guard('entreprises')->attempt($credentials)){
            $request->session()->regenerate();
            $entreprise = Auth::guard('entreprises')->user();
            return to_route('entreprise.dashboard', ['entreprise' => $entreprise->id]);
        }else
        if(Auth::guard('admins')->attempt($credentials)){
            $request->session()->regenerate();
            return to_route('admin.dashboard');
        }else
            return back()->withErrors([
                'error' => 'Votre adresse e-mail ou votre mot de passe est incorrect. Veuillez le vérifier.',
            ])->onlyInput('email');
    }
    
    public function logout(){
        // supprime les informations de session de l'utilisateur
        Session::flush();
        // Déconnexion de l'utilisateur
        Auth::logout();
        // Redirection vers la page de connexion
        return to_route('loginShow');
    }
}




