<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable = [
        'candidat_id',
        'fichier',
        'nom_fichier'
    ];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
}
