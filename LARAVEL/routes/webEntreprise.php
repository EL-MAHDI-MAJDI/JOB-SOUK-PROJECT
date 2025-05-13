<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\entreprise\dashboardController;
use App\Http\Controllers\entreprise\entretiensController;

route::get('/entreprise/dashboard', [dashboardController::class,'index'])->name('entreprise.dashboard');

route::get('/entreprise/entretiens', [entretiensController::class,'index'])->name('entreprise.entretiens');
