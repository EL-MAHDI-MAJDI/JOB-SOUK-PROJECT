<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'candidat_id',
        'nom',
        'organisation',
        'date_obtention',
        'code_certifications_international',
    ];

    protected $casts = [
        'date_obtention' => 'date',
    ];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
}
