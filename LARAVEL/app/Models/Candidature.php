<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    protected $fillable = ['candidat_id','offre_emploi_id','statut','commentairesEvaluation','scoreEvaluation','messageCandidature' ];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
    public function offreEmploi()
    {
        return $this->belongsTo(OffreEmploi::class);
    }
}
