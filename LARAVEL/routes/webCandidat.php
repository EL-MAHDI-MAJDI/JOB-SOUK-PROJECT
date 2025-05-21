<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\candidat\dashboardController;
use App\Http\Controllers\candidat\profilController;
use App\Http\Controllers\candidat\cvController;
use App\Http\Controllers\candidat\mesCandidaturesController;
use App\Http\Controllers\candidat\offreSauvgarderController;
use App\Http\Controllers\candidat\chercherOffresController;
use App\Http\Controllers\candidat\mesEntretiensController;
use App\Http\Controllers\candidat\messageController;
use App\Http\Controllers\candidat\notificationController;
use App\Http\Controllers\candidat\parametreController;


Route::prefix('candidat')->name('candidat.')->group(function () {
   
    Route::get('dashboard',[dashboardController::class,'index'])->name('dashboard');

    Route::get('profil',[profilController::class,'index'])->name('profil');

    Route::get('cv',[cvController::class,'index'])->name('cv');

    Route::get('mesCandidatures',[mesCandidaturesController::class,'index'])->name('mesCandidatures');

    Route::get('chercherOffres',[chercherOffresController::class,'index'])->name('chercherOffres');

    Route::get('offreSauvgarder',[offreSauvgarderController::class,'index'])->name('offreSauvgarder');

    Route::get('mesEntretiens',[mesEntretiensController::class,'index'])->name('mesEntretiens');

    Route::get('message',[messageController::class,'index'])->name('message');

    Route::get('notification',[notificationController::class,'index'])->name('notification');

    Route::get('parametre',[parametreController::class,'index'])->name('parametre');

});
