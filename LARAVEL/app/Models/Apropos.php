<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apropos extends Model
{
    protected $fillable = ['contenu', 'candidat_id'];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
}
