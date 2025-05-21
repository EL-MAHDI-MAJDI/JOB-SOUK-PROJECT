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

Route::prefix('entreprise')->name('entreprise.')->group(function () {
    Route::get('dashboard', [dashboardController::class,'index'])->name('dashboard');

    Route::get('entretiens', [entretiensController::class,'index'])->name('entretiens');

    Route::get('offresEmploi', [offresEmploiController::class,'index'])->name('offresEmploi');

    Route::get('messages', [messagesController::class,'index'])->name('messages');

    Route::get('monProfil', [monProfilController::class,'index'])->name('monProfil');

    Route::get('evaluerCandidat', [evaluerCandidatController::class,'index'])->name('evaluerCandidat');

    Route::get('parametres', [parametresController::class,'index'])->name('parametres');

    Route::get('notification', [notificationController::class,'index'])->name('notification');

    Route::get('rechercherCandidats', [rechercherCandidatsController::class,'index'])->name('rechercherCandidats');

});