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
    protected $casts= [
        'date_entretien' => 'datetime',
        'heure_debut' => 'datetime',
        'heure_fin' => 'datetime',
    ];

    public function candidature()
    {
        return $this->belongsTo(Candidature::class);
    }
    public function enPersonnes()
    {
        return $this->hasOne(EnPersonne::class);
    }
    public function telephoniques()
    {
        return $this->hasOne(Telephonique::class);
    }
    public function visioconferences()
    {
        return $this->hasOne(Visioconference::class);
    }
}
