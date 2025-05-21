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

    Route::get('gestionOffres', [gestionOffresController::class,'index'])->name('gestionOffres');

    Route::get('annonces', [annoncesController::class,'index'])->name('annonces');

    Route::get('categories', [categoriesController::class,'index'])->name('categories');

    Route::get('gestionComptes', [gestionComptesController::class,'index'])->name('gestionComptes');

    Route::get('parametres', [parametresController::class,'index'])->name('parametres');
        
    Route::get('signalements', [signalementsController::class,'index'])->name('signalements');

    Route::get('administrateurs', [administrateursController::class,'index'])->name('administrateurs');

});

