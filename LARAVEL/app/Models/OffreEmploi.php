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
        'entreprise_id',
        'status', // Ajout du champ status
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function candidatures()
    {
        return $this->hasMany(Candidature::class, 'offre_emploi_id');
    }

    // Pour accéder directement aux candidats via la table pivot
    public function candidats()
    {
        return $this->belongsToMany(
            Candidat::class,
            'candidatures',
            'offre_emploi_id',
            'candidat_id'
        )->withPivot('messageCandidature', 'fichier', 'nom_fichier', 'scoreEvaluation', 'commentairesEvaluation', 'statut')
        ->withTimestamps();
    }
}
