<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [
        'candidat_id',
        'diplome',
        'etablissement',
        'date_debut',
        'date_fin',
        'description',
    ];
    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

}
