<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'icone',
        'couleur',
        'is_active',
        'parent_id'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function parent()
    {
        return $this->belongsTo(Categorie::class, 'parent_id');
    }

    public function enfants()
    {
        return $this->hasMany(Categorie::class, 'parent_id');
    }
}

