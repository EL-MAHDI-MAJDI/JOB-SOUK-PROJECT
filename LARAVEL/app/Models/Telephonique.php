<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telephonique extends Model
{
    protected $table = 'telephoniques';

    protected $fillable = [
        'entretien_id',
        'numero_telephone',
    ];

    public $timestamps = true;

    public function entretien()
    {
        return $this->belongsTo(Entretien::class);
    }
}
