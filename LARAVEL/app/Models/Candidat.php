<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Candidat extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    //relations APROPOS ET CANDIDAT
    public function apropos()
    {
        return $this->hasOne(Apropos::class);
    }
    //RELATIONS CANDIDAT ET COMPETENCES
    public function competences()
    {
        return $this->hasMany(Competence::class);
    }
    //RELATIONS CANDIDAT ET LANGUES
    public function langues()
    {
        return $this->hasMany(Langue::class);
    }
    //RELATIONS CANDIDAT ET EXPERIENCES
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
//RELATIONS CANDIDAT ET certifications
    public function certifications()
    {
        return $this->hasMany(Certification::class);
    }

    //RELATIONS CANDIDAT ET FORMATIONS
    public function formations()
    {
        return $this->hasMany(Formation::class);
    }

    //RELATIONS CANDIDAT ET CV
    public function cv()
    {
        return $this->hasOne(Cv::class);
    }

    protected $fillable = [
            'prenom',
            'nom',
            'email',
            'phone',
            'ville',
            'adresse',
            'titre_professionnel',
            'photoProfile',
            'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getPhotoProfileAttribute($value)
    {
        return $value ?? 'photoProfile/profile.png'; // Default logo path if not set
    }

    public function offresSauvegardees()
    {
        return $this->belongsToMany(OffreEmploi::class, 'offre_sauvegardes', 'candidat_id', 'offre_emploi_id');
    }

    public function candidature()
    {
        return $this->belongsToMany(
            OffreEmploi::class,           // Le modèle lié
            'candidatures',               // Nom de la table pivot (à adapter selon ton schéma)
            'candidat_id',                // Clé étrangère du candidat dans la table pivot
            'offre_emploi_id'             // Clé étrangère de l'offre dans la table pivot
            )->withPivot('messageCandidature', 'scoreEvaluation', 'commentairesEvaluation', 'statut') // Pour accéder au champ messageCandidature
            ->withTimestamps(); 
    }
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
