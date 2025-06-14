<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de bord Candidat - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" as="style">
  <style>
    :root {
      --primary: #E74C3C;
      --primary-light: rgba(231, 76, 60, 0.1);
      --secondary: #2ECC71;
      --accent: #FFD700;
      --text-main: #36454F;
      --text-light: #ffffff;
      --background: #ffffff;
      --sidebar-width: 280px;
    }

    body {
      font-family: 'Inter', -apple-system, sans-serif;
      background-color: #f8fafc;
      color: var(--text-main);
      margin-left: var(--sidebar-width);
    }

    /* Barre latérale fixe */
    .side-menu {
      position: fixed;
      left: 0;
      top: 0;
      bottom: 0;
      width: var(--sidebar-width);
      background: var(--background);
      border-right: 1px solid #eee;
      overflow-y: auto;
      z-index: 1000;
    }

    .side-menu .nav-link:hover {
      background: var(--primary-light);
      color: var(--primary);
    }

    .side-menu .nav-link.active {
      background: var(--primary-light);
      color: var(--primary);
    }

    /* Contenu principal */
    .main-content {
      padding: 1.5rem;
      margin-left: 0;
    }

    /* Barre de navigation supérieure enrichie */
    .top-navbar {
      background: var(--background);
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      height: 70px;
      position: sticky;
      top: 0;
      z-index: 100;
      padding: 0 1.5rem;
    }

    .nav-search {
      width: 300px;
      border-radius: 20px;
      border: 1px solid #ddd;
      padding-left: 40px;
    }

    .nav-search-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #6c757d;
    }

    /* Cartes */
    .dashboard-card {
      background: var(--background);
      border-radius: 12px;
      border: none;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      transition: all 0.3s ease;
      height: 100%;
    }

    .dashboard-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    /* Activité récente */
    .activity-item {
      position: relative;
      padding-left: 30px;
      margin-bottom: 1.5rem;
    }

    .activity-badge {
      width: 28px;
      height: 28px;
      position: absolute;
      left: -11px;
      top: 0;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--primary);
    }

    .activity-time {
      font-size: 0.75rem;
      color: #6c757d;
      margin-bottom: 0.25rem;
    }

    /* Badges de statut */
    .status-badge {
      padding: 0.35em 0.65em;
      border-radius: 50rem;
      font-size: 0.75em;
      font-weight: 700;
    }

    .status-badge.pending {
      background-color: #ffc107;
      color: #000;
    }

    .status-badge.interview {
      background-color: #17a2b8;
      color: #fff;
    }

    .status-badge.accepted {
      background-color: #28a745;
      color: #fff;
    }

    .status-badge.rejected {
      background-color: #dc3545;
      color: #fff;
    }

    /* Completion profile */
    .profile-completion {
      padding: 15px;
      border-radius: 10px;
      background: linear-gradient(to right, var(--primary), var(--secondary));
      color: white;
    }

    /* Version mobile */
    @media (max-width: 992px) {
      body {
        margin-left: 0;
      }
      
      .side-menu {
        transform: translateX(-100%);
        transition: transform 0.3s ease;
      }
      
      .side-menu.show {
        transform: translateX(0);
      }
      
      .nav-search {
        width: 200px;
      }
    }

    .activity-badge {
      background: none !important;
      width: auto !important;
      padding: 0 !important;
    }

    .activity-badge i {
      font-size: 1.3rem;
      transition: transform 0.2s;
    }

    .activity-badge i:hover {
      transform: scale(1.1);
    }

    /* Style pour les pop-ups */
    .modal-content {
      border-radius: 12px;
      border: none;
    }

    .modal-header {
      border-bottom: 1px solid #f0f0f0;
      padding: 1.5rem;
    }

    .modal-footer {
      border-top: 1px solid #f0f0f0;
      padding: 1rem 1.5rem;
    }

    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
    }

    .btn-primary:hover {
      background-color: #c0392b;
      border-color: #c0392b;
    }

    /* Bouton scroll to top */
    #scrollTop {
      position: fixed;
      bottom: 30px;
      right: 30px;
      display: none;
      z-index: 1050;
    }
    
    .p-3 {
      height: 47px;
    }
    
    /* Styles pour la timeline des entretiens */
    .timeline {
      position: relative;
      padding-left: 40px;
    }
    
    .timeline-item {
      position: relative;
      margin-bottom: 20px;
    }
    
    .timeline-badge {
      position: absolute;
      left: -40px;
      top: 0;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
    }
    
    .timeline-card {
      border-left: 3px solid transparent;
      transition: all 0.3s ease;
    }
    
    .timeline-card:hover {
      border-left-color: var(--primary);
      transform: translateX(5px);
    }
    
    /* Animation pour les nouveaux entretiens */
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.02); }
      100% { transform: scale(1); }
    }
    
    .new-interview {
      animation: pulse 1.5s infinite;
      box-shadow: 0 0 0 2px rgba(231, 76, 60, 0.3);
    }

    /* Ajout des styles pour les états vides */
    .empty-state {
      padding: 2rem 1rem;
      background-color: #f8f9fa;
      border-radius: 12px;
      transition: all 0.3s ease;
    }

    .empty-state:hover {
      background-color: #f0f2f5;
    }

    .empty-state i {
      display: block;
      margin: 0 auto;
      color: #adb5bd;
      transition: transform 0.3s ease;
    }

    .empty-state:hover i {
      transform: scale(1.1);
    }

    .empty-state h6 {
      font-weight: 600;
      margin-top: 1rem;
    }

    .empty-state p {
      max-width: 300px;
      margin: 0 auto;
    }

    .empty-state .btn {
      margin-top: 1rem;
      padding: 0.5rem 1.5rem;
      border-radius: 20px;
    }

    /* Styles pour les cartes d'offres */
    .hover-card {
      transition: all 0.3s ease;
      border: 1px solid rgba(0,0,0,0.1);
    }

    .hover-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important;
    }

    .company-logo {
      width: 50px;
      height: 50px;
      border-radius: 8px;
      overflow: hidden;
      background-color: #f8f9fa;
    }

    .company-logo img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .badge {
      font-weight: 500;
      padding: 0.5em 0.8em;
    }

    .btn-primary {
      padding: 0.5rem 1.2rem;
      border-radius: 6px;
      font-weight: 500;
    }

    .btn-primary:hover {
      transform: translateY(-1px);
    }
  </style>
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoCandidat.side-menu activePage=1 :candidat='$candidat' />
  </div>

  <!-- Barre de navigation supérieure enrichie -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoCandidat.navbar :candidat='$candidat' />
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container-fluid">

      <!-- Afficher message "Votre compte a été créé avec succès !" -->
      @include('partials.flashbag')

      <!-- En-tête -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Bienvenue, {{$candidat->prenom }} !</h2>
        </div>
        <!--<div class="d-flex gap-2">
          <button class="btn btn-outline-primary"><i class="bi bi-filter me-2"></i>Filtrer</button>
          <button class="btn btn-primary"><i class="bi bi-search me-2"></i>Rechercher</button>
        </div>-->
      </div>
      
      <!-- Statistiques principales -->
      <div class="row g-4 mb-4">
        <div class="col-md-3">
          <div class="dashboard-card p-4">
            <div class="d-flex align-items-center">
              <div class="me-3 p-3 rounded" style="background-color: rgba(231, 76, 60, 0.1);">
                <i class="bi bi-briefcase" style="color: var(--primary);"></i>
              </div>
              <div>
                <h6 class="text-muted mb-1">Candidatures</h6>
                <h3 class="fw-bold mb-0">{{ $stats['candidatures'] }}</h3>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="dashboard-card p-4">
            <div class="d-flex align-items-center">
              <div class="me-3 p-3 rounded" style="background-color: rgba(46, 204, 113, 0.1);">
                <i class="bi bi-calendar-event" style="color: var(--secondary);"></i>
              </div>
              <div>
                <h6 class="text-muted mb-1">Entretiens</h6>
                <h3 class="fw-bold mb-0">{{ $stats['entretiens'] }}</h3>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="dashboard-card p-4">
            <div class="d-flex align-items-center">
              <div class="me-3 p-3 rounded" style="background-color: rgba(255, 215, 0, 0.1);">
                <i class="bi bi-star" style="color: var(--accent);"></i>
              </div>
              <div>
                <h6 class="text-muted mb-1">Offres recommandées</h6>
                <h3 class="fw-bold mb-0">{{ $stats['offres_recommandees'] }}</h3>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="dashboard-card p-4">
            <div class="d-flex align-items-center">
              <div class="me-3 p-3 rounded" style="background-color: rgba(52, 152, 219, 0.1);">
                <i class="bi bi-eye" style="color: #3498db;"></i>
              </div>
              <div>
                <h6 class="text-muted mb-1">Vues de profil</h6>
                <h3 class="fw-bold mb-0">{{ $stats['vues_profil'] }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Completion profil -->
      {{-- <div class="profile-completion mb-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="mb-0">Complétez votre profil - 75%</h5>
          <a href="profil.html" class="btn btn-sm btn-light"><i class="bi bi-pencil me-1"></i>Compléter</a>
        </div>
        <div class="progress bg-white bg-opacity-25" style="height: 8px;">
          <div class="progress-bar bg-white" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex flex-wrap mt-3 gap-2">
          <span class="badge bg-white text-primary"><i class="bi bi-check-circle-fill me-1"></i>Informations personnelles</span>
          <span class="badge bg-white text-primary"><i class="bi bi-check-circle-fill me-1"></i>CV téléchargé</span>
          <span class="badge bg-white text-primary"><i class="bi bi-check-circle-fill me-1"></i>Compétences</span>
          <span class="badge bg-white text-dark"><i class="bi bi-x-circle me-1"></i>Photo de profil</span>
          <span class="badge bg-white text-dark"><i class="bi bi-x-circle me-1"></i>Projets</span>
        </div>
      </div> --}}
      
      <!-- Activité récente réorganisée -->
      <div class="row g-4">
        <!-- Mes candidatures récentes -->
        <div class="col-lg-6">
          <div class="dashboard-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="fw-bold mb-0">Mes candidatures récentes</h5>
              <a href="{{ route('candidat.mesCandidatures', ['candidat' => $candidat->id]) }}" class="btn btn-sm btn-outline-primary">Voir tout</a>
            </div>
            
            <div class="list-group list-group-flush">
              @forelse($candidatures_recentes as $candidature)
              {{-- Le lien externe <a> est retiré pour éviter le comportement de navigation par défaut si on clique ailleurs que sur le bouton "Détails" --}}
              <div class="list-group-item border-0 px-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    {{-- Correction des noms de propriétés pour l'offre d'emploi --}}
                    <h6 class="mb-1">{{ $candidature->offreEmploi->intitule_offre_emploi }}</h6>
                    <p class="text-muted mb-0 small">{{ $candidature->offreEmploi->entreprise->nomEntreprise }} - {{ $candidature->offreEmploi->localisation }}</p>
                  </div>
                  <span class="badge status-badge {{ strtolower(str_replace(' ', '', $candidature->statut)) }}">{{ $candidature->statut }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-2">
                  <small class="text-muted">Posté il y a {{ $candidature->created_at->diffForHumans() }}</small>
                  {{-- Mise à jour du lien "Détails" pour pointer vers les détails de l'offre --}}
                  <a href="{{ route('candidat.offreDetails', ['candidat' => $candidat->id, 'offre' => $candidature->offreEmploi->id]) }}" class="btn btn-sm btn-outline-primary">Détails</a>
                </div>
              </div>
              @empty
              <div class="dashboard-card p-4 text-center">
                <div class="empty-state">
                  <i class="bi bi-inbox text-muted mb-3" style="font-size: 3rem;"></i>
                  <h6 class="text-muted mb-2">Aucune candidature récente</h6>
                  <p class="text-muted small mb-3">Vous n'avez pas encore postulé à des offres d'emploi</p>
                  <a href="{{ route('candidat.chercherOffres', ['candidat' => $candidat->id]) }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-search me-1"></i> Découvrir des offres
                  </a>
                </div>
              </div>
              @endforelse
            </div>
          </div>
        </div>
        
        <!-- Entretiens à venir -->
        <div class="col-lg-6">
          <div class="dashboard-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="fw-bold mb-0">Entretiens à venir</h5>
              <a href="{{ route('candidat.mesEntretiens', ['candidat' => $candidat->id]) }}" class="btn btn-sm btn-outline-primary">Voir tout</a>
            </div>
            
            <div class="timeline">
              @forelse($entretiens as $entretien)
              <div class="timeline-item mb-4">
                <div class="timeline-badge bg-primary">
                  <i class="bi bi-calendar-check"></i>
                </div>
                <div class="timeline-card card border-0 shadow-sm">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                      <div>
                        <h6 class="mb-1 fw-bold">{{ $entretien->candidature->offreEmploi->entreprise->nomEntreprise ?? 'Entreprise non spécifiée' }} - {{ $entretien->candidature->offreEmploi->intitule_offre_emploi ?? 'Poste non spécifié' }}</h6>
                        <span class="badge bg-primary bg-opacity-10 text-primary small">{{ $entretien->type }}</span>
                      </div>
                      <div class="dropdown">
                        <button class="btn btn-sm btn-link text-muted p-0" type="button" data-bs-toggle="dropdown">
                          <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                          <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                          <li><a class="dropdown-item" href="#"><i class="bi bi-trash me-2"></i>Annuler</a></li>
                          <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-plus me-2"></i>Ajouter à calendrier</a></li>
                        </ul>
                      </div>
                    </div>
                    
                    <div class="d-flex flex-wrap gap-3 mt-3">
                      <div class="d-flex align-items-center">
                        <i class="bi bi-clock me-2 text-muted"></i>
                        <div>
                          <small class="text-muted d-block">Date</small>
                          <span>{{ $entretien->date_entretien->format('d/m/Y') }} - {{ $entretien->heure_debut->format('H:i') }} à {{ $entretien->heure_fin->format('H:i') }}</span>
                        </div>
                      </div>
                      
                      <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt me-2 text-muted"></i>
                        <div>
                          <small class="text-muted d-block">Lieu</small>
                          <span>
                            @if($entretien->type === 'En personne' && $entretien->enPersonnes)
                              {{ $entretien->enPersonnes->adresse_entretien ?? 'Lieu non spécifié' }}
                            @elseif($entretien->type === 'Téléphonique')
                              Téléphonique
                            @elseif($entretien->type === 'Visioconférence' && $entretien->visioconferences)
                              {{ $entretien->visioconferences->plateforme_visioconference ?? 'En ligne' }}
                            @else
                              {{ $entretien->lieu ?? 'Non spécifié' }}
                            @endif
                          </span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="d-flex flex-wrap gap-3 mt-3">
                      <div class="d-flex align-items-center">
                        <i class="bi bi-person me-2 text-muted"></i>
                        <div>
                          <small class="text-muted d-block">Interlocuteur</small>
                          <span>{{ $entretien->participant ?? 'Non spécifié' }}</span>
                        </div>
                      </div>
                      
                      @php
                        $lienEntretien = null;
                        if ($entretien->type === 'Visioconférence' && $entretien->visioconferences) {
                            $lienEntretien = $entretien->visioconferences->lien_visioconference;
                        } elseif ($entretien->lien) { // Fallback si lien est un attribut direct
                            $lienEntretien = $entretien->lien;
                        }
                      @endphp
                      @if($lienEntretien)
                      <div class="d-flex align-items-center">
                        <i class="bi bi-link-45deg me-2 text-muted"></i>
                        <div>
                          <small class="text-muted d-block">Lien</small>
                          <a href="{{ $lienEntretien }}" class="text-primary" target="_blank" title="{{ $lienEntretien }}">{{ \Illuminate\Support\Str::limit($lienEntretien, 30) }}</a>
                        </div>
                      </div>
                      @endif
                    </div>
                    
                    <div class="d-flex justify-content-end gap-2 mt-3 pt-2 border-top">
                      {{-- <button class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-journal-text me-1"></i> Préparation
                      </button> --}}
                      @if($entretien->type === 'Visioconférence' && $lienEntretien)
                      <a href="{{ $lienEntretien }}" target="_blank" class="btn btn-sm btn-primary">
                        <i class="bi bi-camera-video me-1"></i> Rejoindre
                      </a>
                      @else
                      <button class="btn btn-sm btn-outline-success">
                        <i class="bi bi-map me-1"></i> Itinéraire
                      </button>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              @empty
              <div class="dashboard-card p-4 text-center">
                <div class="empty-state">
                  <i class="bi bi-calendar-x text-muted mb-3" style="font-size: 3rem;"></i>
                  <h6 class="text-muted mb-2">Aucun entretien à venir</h6>
                  <p class="text-muted small mb-3">Vous n'avez pas d'entretiens programmés pour le moment</p>
                  <a href="{{ route('candidat.chercherOffres', ['candidat' => $candidat->id]) }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-search me-1"></i> Trouver des opportunités
                  </a>
                </div>
              </div>
              @endforelse
            </div>
          </div>
        </div>
        
        <!-- Offres recommandées -->
        <div class="col-12">
          <div class="dashboard-card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="fw-bold mb-0">Offres recommandées pour vous</h5>
              <a href="{{ route('candidat.chercherOffres', ['candidat' => $candidat->id]) }}" class="btn btn-sm btn-outline-primary">Voir plus</a>
            </div>
            
            <div class="row g-3">
              @forelse($offres_recommandees as $offre)
              <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100 hover-card">
                  <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                      <div class="company-logo me-3">
                        @if($offre->entreprise->logo)
                          <img src="{{ asset('storage/' . $offre->entreprise->logo) }}" alt="{{ $offre->entreprise->nomEntreprise }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                        @else
                          <div class="bg-primary text-white rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <span class="fw-bold">{{ substr($offre->entreprise->nomEntreprise, 0, 2) }}</span>
                          </div>
                        @endif
                      </div>
                      <div>
                        <h6 class="mb-0 text-truncate" style="max-width: 200px;">{{ $offre->intitule_offre_emploi }}</h6>
                        <small class="text-muted d-block">{{ $offre->entreprise->nomEntreprise }}</small>
                      </div>
                    </div>

                    <div class="mb-3">
                      <div class="d-flex align-items-center text-muted mb-2">
                        <i class="bi bi-geo-alt me-2"></i>
                        <small>{{ $offre->localisation }}</small>
                      </div>
                      <div class="d-flex justify-content-between align-items-center text-muted mb-2">
                        <div class="d-flex align-items-center">
                          <i class="bi bi-cash me-2"></i>
                          <small>{{ $offre->salaire_offre_emploi }} MAD</small>
                        </div>
                      </div>
                    </div>

                    <div class="mb-3">
                      <div class="d-flex flex-wrap gap-2">
                        @if($offre->competences_requises)
                          @foreach(explode(',', $offre->competences_requises) as $competence)
                            <span class="badge bg-light text-dark">{{ trim($competence) }}</span>
                          @endforeach
                        @else
                          <span class="badge bg-light text-dark">Non spécifié</span>
                        @endif
                      </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                      <span class="badge bg-primary bg-opacity-10 text-primary">{{ $offre->type_contrat }}</span>
                      <a href="{{ route('candidat.chercherOffres', ['candidat' => $candidat->id, 'offre' => $offre->id]) }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-arrow-right me-1"></i> Postuler
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              @empty
              <div class="col-12">
                <div class="dashboard-card p-4 text-center">
                  <div class="empty-state">
                    <i class="bi bi-briefcase text-muted mb-3" style="font-size: 3rem;"></i>
                    <h6 class="text-muted mb-2">Aucune offre recommandée</h6>
                    <p class="text-muted small mb-3">Nous n'avons pas encore d'offres correspondant à votre profil</p>
                    <a href="{{ route('candidat.chercherOffres', ['candidat' => $candidat->id]) }}" class="btn btn-sm btn-primary">
                      <i class="bi bi-search me-1"></i> Explorer toutes les offres
                    </a>
                  </div>
                </div>
              </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bouton scroll to top -->
  <button id="scrollTop" class="btn btn-danger">
    <i class="bi bi-arrow-up"></i>
  </button>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Afficher/masquer le bouton de retour en haut
    window.onscroll = function() {
      const scrollBtn = document.getElementById("scrollTop");
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollBtn.style.display = "block";
      } else {
        scrollBtn.style.display = "none";
      }
    };

    // Scroll to top
    document.getElementById("scrollTop").addEventListener("click", function() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    });

    // Ajouter la date actuelle
    const dateElement = document.getElementById('currentDate');
    if (dateElement) {
      const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      const today = new Date();
      dateElement.textContent = today.toLocaleDateString('fr-FR', options);
    }

    // Toggle sidebar on mobile
    document.getElementById('menuToggle').addEventListener('click', function() {
      document.querySelector('.side-menu').classList.toggle('show');
    });
  </script>
</body>
</html>