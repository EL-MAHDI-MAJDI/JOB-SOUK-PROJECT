<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entreprise extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nomEntreprise',
        'email',
        'SecteurActivite',
        'tailleEntreprise',
        'siteWeb',
        'ville',
        'adresse',
        'dateCreation',
        'description',
        'logo',
        'phone',
        'password',
        'status', // Ajouté ici
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

    public function getLogoAttribute($value)
    {
        return $value ?? 'logoEntreprise/logo.png'; // Default logo path if not set
    }

    //relation entre entreprise et ofre emploi
    public function offreEmplois()
    {
        return $this->hasMany(OffreEmploi::class);
    }
    //relation entre entreprise et competence recherchee
    public function competencesRecherchees()
    {
        return $this->hasMany(CompetenceRecherchee::class);
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
