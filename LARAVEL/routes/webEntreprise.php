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

Route::prefix('entreprise/{entreprise}')->name('entreprise.')->group(function () {
    Route::get('dashboard', [dashboardController::class,'show'])
    ->where('entreprise','\d+')
    ->name('dashboard');

    Route::get('monProfil', [monProfilController::class,'show'])
    ->where('entreprise','\d+')
    ->name('monProfil');
    Route::put('monProfil', [monProfilController::class,'update'])
    ->where('entreprise','\d+')
    ->name('updateEntreprise');
    Route::delete('monProfil', [monProfilController::class,'destroyLogo'])
    ->where('entreprise','\d+')
    ->name('destroyLogo');

    Route::get('offresEmploi', [offresEmploiController::class,'show'])
    ->where('entreprise','\d+')
    ->name('offresEmploi');
    Route::post('offresEmploi', [offresEmploiController::class,'store'])
    ->where('entreprise','\d+')
    ->name('offresEmploi.store');
    
    Route::get('messages', [messagesController::class,'show'])
    ->where('entreprise','\d+')
    ->name('messages');
    
    Route::get('entretiens', [entretiensController::class,'show'])
    ->where('entreprise','\d+')
    ->name('entretiens');
    Route::post('entretiens', [entretiensController::class,'store'])
    ->where('entreprise','\d+')
    ->name('entretiens.store');

    Route::get('evaluerCandidat', [evaluerCandidatController::class,'show'])
    ->where('entreprise','\d+')
    ->name('evaluerCandidat');
    Route::post('evaluerCandidat/{offre}/{candidat}', [evaluerCandidatController::class,'update'])
    ->where(['entreprise' => '\d+', 'offre' => '\d+', 'candidat' => '\d+'])
    ->name('evaluerCandidat.update');
        
    Route::get('notification', [notificationController::class,'show'])
    ->where('entreprise','\d+')
    ->name('notification');
    
    Route::get('rechercherCandidats', [rechercherCandidatsController::class,'show'])
    ->where('entreprise','\d+')
    ->name('rechercherCandidats');
    // Route pour voir le profil d'un candidat spécifique
    Route::get('rechercherCandidats/{candidat}', [rechercherCandidatsController::class, 'voirProfil'])
    ->where(['entreprise' => '\d+', 'candidat' => '\d+'])
    ->name('rechercherCandidats.voirProfil');
    
    Route::get('parametres', [parametresController::class,'show'])
    ->where('entreprise','\d+')
    ->name('parametres');
    Route::put('parametres', [parametresController::class,'update'])
    ->where('entreprise','\d+')
    ->name('parametres.update');
    // Route::put('parametres/password', [parametresController::class,'update'])
    // ->where('entreprise','\d+')
    // ->name('parametres.update_password');

    // afficher page detail de l'offre d'emploi
    Route::get('offresEmploi/{offre}', [offresEmploiController::class,'details'])
    ->where(['entreprise' => '\d+', 'offre' => '\d+'])
    ->name('offresEmploi.details');
    Route::put('offresEmploi/{offre}', [offresEmploiController::class,'update'])
    ->where(['entreprise' => '\d+', 'offre' => '\d+'])
    ->name('offresEmploi.edit');
    Route::delete('offresEmploi/{offre}', [offresEmploiController::class,'destroy'])
    ->where(['entreprise' => '\d+', 'offre' => '\d+'])
    ->name('offresEmploi.destroy');
});