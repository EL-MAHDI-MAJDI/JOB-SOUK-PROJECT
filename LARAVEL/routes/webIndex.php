<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\index\accueilController;
use App\Http\Controllers\index\offreController;
use App\Http\Controllers\index\choixInscriptionController;
use App\Http\Controllers\index\loginController;
use App\Http\Controllers\index\inscriptionCandidatController;
use App\Http\Controllers\index\inscriptionEntrepriseController;
use App\Http\Controllers\index\entreprisesController;


Route::get('/', [accueilController::class,'index'])->name('accueil');

Route::get('/accueil', [accueilController::class,'index'])->name('accueil');

Route::get('/offre', [offreController::class,'index'])->name('offre');

Route::get('/login', [loginController::class,'show'])->name('loginShow');
Route::post('/login', [loginController::class,'login'])->name('login');

Route::get('/choixInscription', [choixInscriptionController::class,'index'])->name('choixInscription');

Route::get('/inscriptionCandidat', [inscriptionCandidatController::class,'create'])->name('inscriptionCandidat');
Route::post('/inscriptionCandidat', [inscriptionCandidatController::class,'store'])->name('inscriptionCandidat');

Route::get('/inscriptionEntreprise', [inscriptionEntrepriseController::class,'create'])->name('inscriptionEntreprise');
Route::post('/inscriptionEntreprise', [inscriptionEntrepriseController::class,'store'])->name('inscriptionEntreprise');


Route::get('/entreprises', [entreprisesController::class,'index'])->name('entreprises');
