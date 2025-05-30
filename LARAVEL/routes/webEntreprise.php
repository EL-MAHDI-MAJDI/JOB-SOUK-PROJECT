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

    Route::get('evaluerCandidat', [evaluerCandidatController::class,'show'])
    ->where('entreprise','\d+')
    ->name('evaluerCandidat');

    Route::get('parametres', [parametresController::class,'show'])
    ->where('entreprise','\d+')
    ->name('parametres');

    Route::get('notification', [notificationController::class,'show'])
    ->where('entreprise','\d+')
    ->name('notification');

    Route::get('rechercherCandidats', [rechercherCandidatsController::class,'show'])
    ->where('entreprise','\d+')
    ->name('rechercherCandidats');

});