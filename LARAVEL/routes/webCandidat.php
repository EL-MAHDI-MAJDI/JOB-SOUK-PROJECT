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


Route::prefix('candidat/{candidat}')->name('candidat.')->group(function () {
   
    Route::get('dashboard',[dashboardController::class,'show'])
    ->where('candidat','\d+')
    ->name('dashboard');

    //modifier Profil
    Route::get('profil', [profilController::class,'show'])
    ->where('candidat','\d+')
    ->name('profil');
    Route::put('profil', [profilController::class,'update'])
    ->where('candidat','\d+')
    ->name('updateprofil');
    Route::delete('profil', [profilController::class,'destroyLogo'])
    ->where('candidat','\d+')
    ->name('destroyLogo');
    
    //Route CV
    Route::get('cv',[cvController::class,'show'])
    ->where('candidat','\d+')
    ->name('cv');
    Route::post('cv', [cvController::class, 'store'])
    ->name('cv.store')
    ->where('candidat','\d+');
    Route::delete('cv', [cvController::class, 'destroy'])
    ->name('cv.destroy')
    ->where('candidat','\d+');

    Route::get('mesCandidatures',[mesCandidaturesController::class,'show'])
    ->where('candidat','\d+')
    ->name('mesCandidatures');
    //route pour afficher les détails d'une candidature
    Route::get('candidatures/{candidature}/details', [mesCandidaturesController::class, 'showDetails'])
    ->where(['candidature' => '\d+']) // La contrainte pour 'candidat' est héritée du groupe
    ->name('candidature.details'); // Sera préfixé par 'candidat.' pour devenir 'candidat.candidature.details'


    Route::get('chercherOffres',[chercherOffresController::class,'show'])
    ->where('candidat','\d+')
    ->name('chercherOffres');
    Route::post('chercherOffres/{offre}', [chercherOffresController::class,'sauvegarder'])
    ->where(['offre' => '\d+']) // La contrainte pour 'candidat' est héritée
    ->name('chercherOffres.sauvegarder');

    Route::get('chercherOffres/{offre}', [chercherOffresController::class, 'detail'])
    ->name('offreDetails');
    Route::post('chercherOffres/{offre}/postuler', [mesCandidaturesController::class, 'postuler'])
    ->where(['offre' => '\d+']) // La contrainte pour 'candidat' est héritée
    ->name('postuler');

    Route::get('offreSauvgarder',[offreSauvgarderController::class,'show'])
    ->where('candidat','\d+')
    ->name('offreSauvgarder');
    Route::delete('offreSauvgarder/{offre}', [offreSauvgarderController::class, 'destroy'])
    ->where('offre', '\d+') // La contrainte pour 'candidat' est héritée du groupe
    ->name('offreSauvgarder.destroy');
    Route::delete('offreSauvgarder', [offreSauvgarderController::class, 'destroyMultiple'])
    // ->where('candidat', '\d+') // La contrainte pour 'candidat' est héritée du groupe
    ->name('offreSauvgarder.destroyMultiple');
    Route::delete('offreSauvgarderAll', [offreSauvgarderController::class, 'destroyAll']) // Nouvelle route
    ->name('offreSauvgarder.destroyAll');


    Route::get('mesEntretiens',[mesEntretiensController::class,'show'])
    ->where('candidat','\d+')
    ->name('mesEntretiens');

    Route::get('message',[messageController::class,'show'])
    ->where('candidat','\d+')
    ->name('message');

    Route::get('notification',[notificationController::class,'show'])
    ->where('candidat','\d+')
    ->name('notification');

    //modifier parametre
    Route::get('parametre', [parametreController::class,'show'])
    ->where('candidat','\d+')
    ->name('parametre');
    Route::put('parametre', [parametreController::class,'update'])
    ->where('candidat','\d+')
    ->name('updateparametre');
});
