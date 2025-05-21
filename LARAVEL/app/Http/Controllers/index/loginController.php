<?php

namespace App\Http\Controllers\index;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function show(){
        return view('index.conexion');
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

            return to_route('candidat.dashboard');

        }else{
            return back()->withErrors([
                'error' => 'Votre adresse e-mail ou votre mot de passe est incorrect. Veuillez le vérifier.',
            ])->onlyInput('email');
        }
        

    }



}
