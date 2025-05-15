<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\index\accueilController;
use App\Http\Controllers\index\offreController;
use App\Http\Controllers\index\choixInscriptionController;
use App\Http\Controllers\index\conexionController;
use App\Http\Controllers\index\inscriptionCandidatController;
use App\Http\Controllers\index\inscriptionEntrepriseController;
use App\Http\Controllers\index\entreprisesController;

Route::get('/', [accueilController::class,'index'])->name('accueil');

Route::get('/accueil', [accueilController::class,'index'])->name('accueil');

Route::get('/offre', [offreController::class,'index'])->name('offre');

Route::get('/conexion', [conexionController::class,'index'])->name('conexion');

Route::get('/choixInscription', [choixInscriptionController::class,'index'])->name('choixInscription');

Route::get('/inscriptionCandidat', [inscriptionCandidatController::class,'index'])->name('inscriptionCandidat');

Route::get('/inscriptionEntreprise', [inscriptionEntrepriseController::class,'index'])->name('inscriptionEntreprise');

Route::get('/entreprises', [entreprisesController::class,'index'])->name('entreprises');
