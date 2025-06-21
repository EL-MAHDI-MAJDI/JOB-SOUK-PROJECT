<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Candidat - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --primary: #E74C3C;
      --primary-light: rgba(231, 76, 60, 0.1);
      --secondary: #2ECC71;
      --text-light: #ffffff;
      --text-main: #36454F;
    }

    /* Styles généraux */
body {
    background-color: #f8f9fa;
    font-family: 'Inter', sans-serif;
}

/* Contenu principal */
.main-content {
    padding: 30px; /* Ajustement du padding général */
    min-height: 100vh;
}

/* En-tête du profil */
.profile-header {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: var(--text-light);
    border-radius: 12px; /* Harmonisé avec profil.blade.php */
    padding: 30px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1); /* Ombre plus prononcée */
    position: relative;
    max-width: 960px; /* Largeur maximale pour le centrage */
    margin-left: auto;
    margin-right: auto;
}

.profile-avatar {
    width: 120px; /* Harmonisé avec profil.blade.php */
    height: 120px; /* Harmonisé avec profil.blade.php */
    object-fit: cover;
    border: 4px solid var(--text-light); /* Harmonisé avec profil.blade.php */
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

/* Sections du profil */
.profile-section {
    background-color: #fff;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 25px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05); /* Ombre plus subtile comme profil.blade.php */
}

.profile-section-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 20px;
    color: var(--primary); /* Couleur primaire pour les titres de section */
}

/* Timeline pour les expériences et formations */
.timeline-item {
    position: relative;
    padding-left: 45px;
    padding-bottom: 25px;
}

.timeline-item:last-child {
    padding-bottom: 0;
}

.timeline-badge {
    position: absolute;
    left: 0;
    top: 0;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background-color: var(--primary); /* Couleur primaire pour le badge */
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-light); /* Texte en blanc */
}

.timeline-content {
    position: relative;
}

.timeline-content::before {
    content: '';
    position: absolute;
    left: -45px;
    top: 0;
    bottom: -25px;
    width: 2px;
    background-color: #e9ecef;
}

.timeline-item:last-child .timeline-content::before {
    display: none;
}

/* Badges de compétences */
.badge {
    padding: 8px 12px;
    font-weight: 500;
    font-size: 0.875rem;
}

/* Niveaux de langue */
.language-level {
    height: 6px;
    background-color: #e9ecef;
    border-radius: 3px;
    margin-top: 5px;
}

.language-level-fill {
    height: 100%;
    background: linear-gradient(to right, var(--primary), var(--secondary)); /* Dégradé comme profil.blade.php */
    border-radius: 3px;
}

/* Style pour les badges de compétence pour correspondre à profil.blade.php */
.skill-badge {
    background-color: var(--primary-light);
    color: var(--primary);
}

/* Boutons */
.btn {
    padding: 8px 16px;
    font-weight: 500;
    border-radius: 8px;
}

.btn-primary {
    background-color: var(--primary);
    border-color: var(--primary);
}
.btn-primary:hover {
    background-color: #c0392b; /* Teinte plus foncée de var(--primary) */
    border-color: #c0392b;
}

.btn-outline-primary {
    color: var(--primary);
    border-color: var(--primary);
}

.btn-outline-primary:hover {
    background-color: var(--primary);
    color: var(--text-light);
}

/* Style spécifique pour le bouton "Voir CV" dans le header */
.profile-header .btn-outline-primary {
    color: var(--text-light);
    border-color: var(--text-light);
}
.profile-header .btn-outline-primary:hover {
    background-color: var(--text-light);
    color: var(--primary); /* Texte en couleur primaire sur fond blanc */
}
/* Icônes */
.bi {
    font-size: 1.1rem;
}
.timeline-badge .bi { /* S'assurer que les icônes dans la timeline sont blanches */
    color: var(--text-light);
}

/* Responsive */
@media (max-width: 991.98px) {
    .main-content {
    }
}

@media (max-width: 767.98px) {
    .main-content {
        padding: 20px 15px; /* Ajustement du padding pour les petits écrans */
    }
    .profile-header {
        padding: 20px;
    }
    .profile-section {
        padding: 20px;
    }
} 
   </style>
</head>
<body>
  
  <!-- Contenu principal -->
  <div class="main-content">
    {{-- Message compte non validé --}}
        @if($entreprise->status === 'pending')
    <div class="alert alert-warning text-center mb-4">
        <i class="bi bi-exclamation-triangle-fill"></i>
        Votre compte n'est pas encore validé.
        <u style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#pendingModal">
            Cliquez ici pour plus de détails
        </u>.
    </div>
    <x-compoEntreprise.compteDesactive/>
        @endif
    <div class="container-fluid">
      <!-- En-tête -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Profil du {{ $candidat->prenom }} {{ $candidat->nom }}</h2>
          {{-- <p class="text-muted mb-0">Consultez le profil détaillé du {{ $candidat->prenom }} {{ $candidat->nom }}</p> --}}
        </div>
        <div class="d-flex gap-2">
            <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">
                <i class="bi bi-arrow-left"></i> Retour
            </a>
        </div>
      </div>
      
      <!-- Section Profil -->
      <div class="profile-header mb-4">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-2 d-flex flex-column align-items-center">
            <img src="{{ $candidat->photoProfile ? asset('storage/'.$candidat->photoProfile) : asset('public/storage/photoProfile/profile.png') }}" 
                 alt="Photo de profil" 
                 class="profile-avatar rounded-circle mb-3 mb-md-0" 
                 style="width: 150px; height: 150px; object-fit: cover;">
          </div>
          <div class="col-md-6">
            <h3 class="mb-1" style="color: var(--text-light);">{{ $candidat->prenom }} {{ $candidat->nom }}</h3>
            <p class="mb-2" style="color: var(--text-light);"><i class="bi bi-briefcase me-2" style="color: var(--text-light);"></i>{{ $candidat->titre_professionnel }}</p>
            <p class="mb-2" style="color: var(--text-light);"><i class="bi bi-geo-alt me-2" style="color: var(--text-light);"></i>{{ $candidat->ville }}, Maroc</p>
            <div class="d-flex mt-3">
              <a href="mailto:{{ $candidat->email }}" class="btn btn-primary me-2">
                <i class="bi bi-envelope me-2"></i>Contacter
              </a>
            @if($candidat->cv)
                <a href="{{ Storage::url($candidat->cv->fichier) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                <i class="bi bi-file-earmark-text me-2"></i>Voir CV
                </a>
            @else
                <button class="btn btn-sm btn-outline-primary" disabled>
                    <i class="bi bi-file-earmark-text me-2"></i>CV non disponible
                </button>
            @endif
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <!-- Colonne gauche -->
        <div class="col-lg-8">
          <!-- À propos -->
          <div class="profile-section">
            <h4 class="profile-section-title">À propos</h4>
            @if($candidat->apropos && $candidat->apropos->contenu)
                <p>{{ $candidat->apropos->contenu }}</p>
            @else
                <div class="text-center py-4">
                    <i class="bi bi-person text-muted" style="font-size: 2rem;"></i>
                    <p class="text-muted mt-2">Aucune description disponible</p>
                </div>
            @endif
          </div>
          
          <!-- Expérience professionnelle -->
          <div class="profile-section">
            <h4 class="profile-section-title">Expérience professionnelle</h4>
            @if($candidat->experiences->count() > 0)
                @foreach ($candidat->experiences as $experience)
                <div class="timeline-item">
                    <div class="timeline-badge">
                        <i class="bi bi-briefcase"></i>
                    </div>
                    <div class="timeline-content">
                        <h5 class="mb-1">{{ $experience->titre_poste }}</h5>
                        <p class="mb-1 text-muted">{{ $experience->entreprise }} - {{ $experience->ville }}</p>
                        <small class="text-muted">
                            {{ $experience->date_debut->format('M Y') }} - 
                            {{ $experience->poste_actuel ? 'Présent' : $experience->date_fin->format('M Y') }}
                        </small>
                        @if($experience->description)
                            <p class="mt-2 mb-0">{{ $experience->description }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            @else
                <div class="text-center py-4">
                    <i class="bi bi-briefcase text-muted" style="font-size: 2rem;"></i>
                    <p class="text-muted mt-2">Aucune expérience professionnelle</p>
                </div>
            @endif
          </div>
          
          <!-- Formation -->
          <div class="profile-section">
            <h4 class="profile-section-title">Formation</h4>
            @if($candidat->formations->count() > 0)
                @foreach ($candidat->formations as $formation)
                <div class="timeline-item">
                    <div class="timeline-badge">
                        <i class="bi bi-mortarboard"></i>
                    </div>
                    <div class="timeline-content">
                        <h5 class="mb-1">{{ $formation->diplome }}</h5>
                        <p class="mb-1 text-muted">{{ $formation->etablissement }} - {{ $formation->ville }}</p>
                        <small class="text-muted">
                            {{ $formation->date_debut->format('M Y') }} - 
                            {{ $formation->date_fin ? $formation->date_fin->format('M Y') : 'Présent' }}
                        </small>
                        @if($formation->description)
                            <p class="mt-2 mb-0">{{ $formation->description }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            @else
                <div class="text-center py-4">
                    <i class="bi bi-mortarboard text-muted" style="font-size: 2rem;"></i>
                    <p class="text-muted mt-2">Aucune formation</p>
                </div>
            @endif
          </div>          
        </div>
        <!-- Colonne droite -->
        <div class="col-lg-4">
          <!-- Compétences -->
          <div class="profile-section">
            <h4 class="profile-section-title">Compétences</h4>
            @if($candidat->competences->count() > 0)
                <div class="d-flex flex-wrap gap-2">
                    @foreach($candidat->competences as $competence)
                        <span class="badge skill-badge">{{ $competence->nom }}</span>
                    @endforeach
                </div>
            @else
                <div class="text-center py-4">
                    <i class="bi bi-tools text-muted" style="font-size: 2rem;"></i>
                    <p class="text-muted mt-2">Aucune compétence</p>
                </div>
            @endif
          </div>

          <!-- Langues -->
          <div class="profile-section">
            <h4 class="profile-section-title">Langues</h4>
            @if($candidat->langues->count() > 0)
                @foreach($candidat->langues as $langue)
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>{{ $langue->nom }}</span>
                            <small>{{ ucfirst(strtolower($langue->niveau)) }}</small>
                        </div>
                        @php
                            $niveauxLangue = [
                                'Native' => 100,
                                'Fluent' => 90,
                                'Professional' => 80,
                                'Intermediate' => 60,
                                'Basic' => 40
                            ];
                        @endphp
                        <div class="language-level">
                            <div class="language-level-fill" style="width: {{ $niveauxLangue[$langue->niveau] ?? 40 }}%"></div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center py-4">
                    <i class="bi bi-translate text-muted" style="font-size: 2rem;"></i>
                    <p class="text-muted mt-2">Aucune langue</p>
                </div>
            @endif
          </div>

          <!-- Certifications -->
          <div class="profile-section">
            <h4 class="profile-section-title">Certifications</h4>
            @if($candidat->certifications->count() > 0)
                @foreach($candidat->certifications as $certification)
                    <div class="mb-3">
                        <h6 class="mb-1">{{ $certification->nom }}</h6>
                        <small class="text-muted">{{ $certification->organisation }} - {{ $certification->date_obtention->format('M Y') }}</small>
                        @if($certification->code_certifications_international)
                            <small class="d-block text-muted">ID: {{ $certification->code_certifications_international }}</small>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="text-center py-4">
                    <i class="bi bi-award text-muted" style="font-size: 2rem;"></i>
                    <p class="text-muted mt-2">Aucune certification</p>
                </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/js/entrepriseJs/voirProfilCandidat.js'])
</body>
</html>
