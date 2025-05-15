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


Route::get('/admin/dashboard', [dashboardController::class,'index'])->name('admin.dashboard');

Route::get('/admin/gestionOffres', [gestionOffresController::class,'index'])->name('admin.gestionOffres');

Route::get('/admin/annonces', [annoncesController::class,'index'])->name('admin.annonces');

Route::get('/admin/categories', [categoriesController::class,'index'])->name('admin.categories');

Route::get('/admin/gestionComptes', [gestionComptesController::class,'index'])->name('admin.gestionComptes');

Route::get('/admin/parametres', [parametresController::class,'index'])->name('admin.parametres');

Route::get('/admin/signalements', [signalementsController::class,'index'])->name('admin.signalements');

Route::get('/admin/administrateurs', [administrateursController::class,'index'])->name('admin.administrateurs');


