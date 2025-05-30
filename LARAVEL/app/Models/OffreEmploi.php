<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class OffreEmploi extends Model
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'intitule_offre_emploi',
        'description_offre_emploi',
        'type_contrat',
        'salaire_offre_emploi',
        'niveau_experience_demander',
        'avantage_offre_emploi',
        'date_limite_candidature',
        'email_contact',
        'telephone_contact',
        'localisation',
        'competences_requises',
    ];
}
