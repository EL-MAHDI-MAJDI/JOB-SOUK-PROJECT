<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    protected $fillable = ['nom', 'niveau', 'candidat_id'];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
}
