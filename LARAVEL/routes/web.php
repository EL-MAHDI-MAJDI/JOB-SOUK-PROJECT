<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\cvController;
use App\Http\Controllers\mesCandidaturesController;
use App\Http\Controllers\offreSauvgarderController;
use App\Http\Controllers\chercherOffresController;
use App\Http\Controllers\mesEntretiensController;
use App\Http\Controllers\messageController;
use App\Http\Controllers\notificationController;
use App\Http\Controllers\parametreController;



Route::get('/', [dashboardController::class,'index'])->name('dashboard.index');

Route::get('/dashboard',[dashboardController::class,'index'])->name('dashboard.index');

Route::get('/profil',[profilController::class,'index'])->name('profil.index');

Route::get('/cv',[cvController::class,'index'])->name('cv.index');

Route::get('/mesCandidatures',[mesCandidaturesController::class,'index'])->name('mesCandidatures.index');

Route::get('/chercherOffres',[chercherOffresController::class,'index'])->name('chercherOffres.index');

Route::get('/offreSauvgarder',[offreSauvgarderController::class,'index'])->name('offreSauvgarder.index');

Route::get('/mesEntretiens',[mesEntretiensController::class,'index'])->name('mesEntretiens.index');

Route::get('/message',[messageController::class,'index'])->name('message.index');

Route::get('/notification',[notificationController::class,'index'])->name('notification.index');

Route::get('/parametre',[parametreController::class,'index'])->name('parametre.index');

