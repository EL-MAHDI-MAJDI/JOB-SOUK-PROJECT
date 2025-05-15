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



Route::get('/candidat/dashboard',[dashboardController::class,'index'])->name('candidat.dashboard');

Route::get('/candidat/profil',[profilController::class,'index'])->name('candidat.profil');

Route::get('/candidat/cv',[cvController::class,'index'])->name('candidat.cv');

Route::get('/candidat/mesCandidatures',[mesCandidaturesController::class,'index'])->name('candidat.mesCandidatures');

Route::get('/candidat/chercherOffres',[chercherOffresController::class,'index'])->name('candidat.chercherOffres');

Route::get('/candidat/offreSauvgarder',[offreSauvgarderController::class,'index'])->name('candidat.offreSauvgarder');

Route::get('/candidat/mesEntretiens',[mesEntretiensController::class,'index'])->name('candidat.mesEntretiens');

Route::get('/candidat/message',[messageController::class,'index'])->name('candidat.message');

Route::get('/candidat/notification',[notificationController::class,'index'])->name('candidat.notification');

Route::get('/candidat/parametre',[parametreController::class,'index'])->name('candidat.parametre');


