<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    protected $fillable = [
        'nom',
        'type',
        'niveau',
        'candidat_id'
    ];

    protected $casts = [
        'niveau' => 'integer',
    ];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
}
