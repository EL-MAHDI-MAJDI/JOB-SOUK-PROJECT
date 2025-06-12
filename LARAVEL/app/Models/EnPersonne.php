<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnPersonne extends Model
{
    protected $table = 'en_personnes';

    protected $fillable = [
        'entretien_id',
        'lieu',
    ];

    public $timestamps = true;
    
    public function entretien()
    {
        return $this->belongsTo(Entretien::class);
    }
}
