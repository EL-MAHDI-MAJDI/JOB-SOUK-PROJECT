<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'candidat_id',
        'offre_emploi_id',
        'statut',
        'commentairesEvaluation',
        'scoreEvaluation',
        'messageCandidature',
        'fichier',        
        'nom_fichier'     
    ];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
    public function offreEmploi()
    {
        return $this->belongsTo(OffreEmploi::class);
    }
    public function entretiens()
    {
        return $this->hasOne(Entretien::class);
    }
    public function scopeEnAttente($query)
    {
        return $query->where('statut', 'En attente');
    }
}
