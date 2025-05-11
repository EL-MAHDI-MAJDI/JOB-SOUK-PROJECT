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

