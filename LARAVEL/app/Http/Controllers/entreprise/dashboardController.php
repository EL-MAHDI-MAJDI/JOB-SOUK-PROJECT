<?php

namespace App\Http\Controllers\entreprise;
use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function show(Entreprise $entreprise){
        //  $id=(int) $request->id;
        //  $entreprise=Entreprise::findOrFail($id);
        // dd($entreprise);
        return view('entreprise.dashboard',compact('entreprise'));
    }
}