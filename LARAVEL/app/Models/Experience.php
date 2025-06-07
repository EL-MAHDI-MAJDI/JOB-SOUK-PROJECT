<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'candidat_id',
        'titre_poste',
        'entreprise',
        'ville',
        'date_debut',
        'date_fin',
        'poste_actuel',
        'description'
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
        'poste_actuel' => 'boolean'
    ];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
}
