<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\gestionOffresController;
use App\Http\Controllers\admin\annoncesController;
use App\Http\Controllers\admin\categoriesController;
use App\Http\Controllers\admin\gestionComptesController;
use App\Http\Controllers\admin\parametresController;
use App\Http\Controllers\admin\signalementsController;
use App\Http\Controllers\admin\administrateursController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [dashboardController::class,'index'])->name('dashboard');

    // Routes pour la gestion des offres
    Route::get('gestionOffres', [gestionOffresController::class,'index'])->name('gestionOffres');
    // Voir une offre
    Route::get('gestionOffres/{offre}', [gestionOffresController::class, 'show'])->name('gestionOffres.show');
    
    // Supprimer une offre
    Route::delete('gestionOffres/{offre}', [gestionOffresController::class,'destroy'])->name('gestionOffres.destroy');

    Route::get('annonces', [annoncesController::class,'index'])->name('annonces');

    // Routes des catégories - tout passe par la même vue
    Route::get('categories', [categoriesController::class,'show'])->name('categories');
    Route::get('categories/{categorie}', [categoriesController::class,'getCategory'])->name('categories.get');
    Route::post('categories/store', [categoriesController::class,'store'])->name('categories.store');
    Route::put('categories/update/{categorie}', [categoriesController::class,'update'])->name('categories.update');
    Route::delete('categories/delete/{categorie}', [categoriesController::class,'destroy'])->name('categories.delete');
    Route::get('categories/subcategories/{categorie}', [categoriesController::class,'getSousCategories'])->name('categories.sous-categories');
    Route::post('categories/subcategories/{categorie}', [categoriesController::class,'addSousCategorie'])->name('categories.sous-categories.add');

    Route::get('gestionComptes', [gestionComptesController::class,'index'])->name('gestionComptes');

    Route::get('parametres', [parametresController::class,'index'])->name('parametres');
        
    Route::get('signalements', [signalementsController::class,'index'])->name('signalements');

    Route::get('administrateurs', [administrateursController::class,'index'])->name('administrateurs');
    //gestion compte
    Route::post('/entreprise/{id}/activate', [gestionComptesController::class, 'activateEntreprise'])->name('entreprise.activate');
    Route::post('/entreprise/{id}/deactivate', [gestionComptesController::class, 'deactivateEntreprise'])->name('entreprise.deactivate');
    Route::post('/candidat/{id}/activate', [gestionComptesController::class, 'activateCandidat'])->name('candidat.activate');
    Route::post('/candidat/{id}/deactivate', [gestionComptesController::class, 'deactivateCandidat'])->name('candidat.deactivate');
    Route::delete('/admin/candidat/{id}/delete', [gestionComptesController::class, 'destroyCandidat'])->name('candidat.delete');
    Route::delete('/admin/entreprise/{id}/delete', [gestionComptesController::class, 'destroyEntreprise'])->name('entreprise.delete');
    
});

