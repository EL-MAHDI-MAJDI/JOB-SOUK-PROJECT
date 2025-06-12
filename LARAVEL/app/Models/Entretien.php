<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    protected $fillable = [
        'candidature_id',
        'date_entretien',
        'heure_debut',
        'heure_fin',
        'participant',
        'notes',
        'type',
        'statut',
    ];

    public function candidature()
    {
        return $this->belongsTo(Candidature::class);
    }
    public function enPersonne()
    {
        return $this->hasOne(EnPersonne::class);
    }
    public function telephonique()
    {
        return $this->hasOne(Telephonique::class);
    }
    public function visioconference()
    {
        return $this->hasOne(Visioconference::class);
    }
}
