<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\entreprise\dashboardController;
use App\Http\Controllers\entreprise\entretiensController;
use App\Http\Controllers\entreprise\offresEmploiController;
use App\Http\Controllers\entreprise\messagesController;
use App\Http\Controllers\entreprise\monProfilController;
use App\Http\Controllers\entreprise\evaluerCandidatController;
use App\Http\Controllers\entreprise\parametresController;
use App\Http\Controllers\entreprise\notificationController;
use App\Http\Controllers\entreprise\rechercherCandidatsController;

Route::get('/entreprise/dashboard', [dashboardController::class,'index'])->name('entreprise.dashboard');

Route::get('/entreprise/entretiens', [entretiensController::class,'index'])->name('entreprise.entretiens');

Route::get('/entreprise/offresEmploi', [offresEmploiController::class,'index'])->name('entreprise.offresEmploi');

Route::get('/entreprise/messages', [messagesController::class,'index'])->name('entreprise.messages');

Route::get('/entreprise/monProfil', [monProfilController::class,'index'])->name('entreprise.monProfil');

Route::get('/entreprise/evaluerCandidat', [evaluerCandidatController::class,'index'])->name('entreprise.evaluerCandidat');

Route::get('/entreprise/parametres', [parametresController::class,'index'])->name('entreprise.parametres');

Route::get('/entreprise/notification', [notificationController::class,'index'])->name('entreprise.notification');

Route::get('/entreprise/rechercherCandidats', [rechercherCandidatsController::class,'index'])->name('entreprise.rechercherCandidats');