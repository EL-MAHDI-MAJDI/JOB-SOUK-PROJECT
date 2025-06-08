<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetenceRecherchee extends Model
{
    protected $table = 'competence_recherchees';

    protected $fillable = [
        'nom',
        'entreprise_id'
    ];

    //relation entre competence recherchee et entreprise
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
}
