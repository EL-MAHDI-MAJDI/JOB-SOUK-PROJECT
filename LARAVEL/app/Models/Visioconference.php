<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visioconference extends Model
{
    protected $table = 'visioconferences';

    protected $fillable = [
        'entretien_id',
        'lien',
    ];

    public $timestamps = true;

    public function entretien()
    {
        return $this->belongsTo(Entretien::class);
    }
}
