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
        <div class="d-flex gap-2">
          <button class="btn btn-outline-primary"><i class="bi bi-filter me-2"></i>Filtrer</button>
          <button class="btn btn-primary"><i class="bi bi-search me-2"></i>Rechercher</button>
        </div>
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
                <h3 class="fw-bold mb-0">5</h3>
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
                <h3 class="fw-bold mb-0">2</h3>
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
                <h3 class="fw-bold mb-0">8</h3>
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
                <h3 class="fw-bold mb-0">12</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Completion profil -->
      <div class="profile-completion mb-4">
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
      </div>
      
      <!-- Activité récente réorganisée -->
      <div class="row g-4">
        <!-- Mes candidatures récentes -->
        <div class="col-lg-6">
          <div class="dashboard-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="fw-bold mb-0">Mes candidatures récentes</h5>
              <a href="mes-candidatures.html" class="btn btn-sm btn-outline-primary">Voir tout</a>
            </div>
            
            <div class="list-group list-group-flush">
              <a href="#" class="list-group-item list-group-item-action border-0 px-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="mb-1">Développeur Full Stack</h6>
                    <p class="text-muted mb-0 small">MegaSoft - Casablanca</p>
                  </div>
                  <span class="badge status-badge interview">Entretien</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-2">
                  <small class="text-muted">Posté il y a 5 jours</small>
                  <a href="#" class="btn btn-sm btn-outline-primary">Détails</a>
                </div>
              </a>
              
              <a href="#" class="list-group-item list-group-item-action border-0 px-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="mb-1">Ingénieur Frontend React</h6>
                    <p class="text-muted mb-0 small">DataTech - Rabat</p>
                  </div>
                  <span class="badge status-badge pending">En attente</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-2">
                  <small class="text-muted">Posté il y a 2 jours</small>
                  <a href="#" class="btn btn-sm btn-outline-primary">Détails</a>
                </div>
              </a>
              
              <a href="#" class="list-group-item list-group-item-action border-0 px-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="mb-1">Développeur Backend Node.js</h6>
                    <p class="text-muted mb-0 small">MarocDigital - Tanger</p>
                  </div>
                  <span class="badge status-badge accepted">Accepté</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-2">
                  <small class="text-muted">Posté il y a 7 jours</small>
                  <a href="#" class="btn btn-sm btn-outline-primary">Détails</a>
                </div>
              </a>
              
              <a href="#" class="list-group-item list-group-item-action border-0 px-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="mb-1">Développeur Mobile Flutter</h6>
                    <p class="text-muted mb-0 small">AppWave - Casablanca</p>
                  </div>
                  <span class="badge status-badge rejected">Refusé</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-2">
                  <small class="text-muted">Posté il y a 14 jours</small>
                  <a href="#" class="btn btn-sm btn-outline-primary">Détails</a>
                </div>
              </a>
            </div>
          </div>
        </div>
        
        <!-- Entretiens à venir - Version améliorée -->
        <div class="col-lg-6">
          <div class="dashboard-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="fw-bold mb-0">Entretiens à venir</h5>
              <a href="entretiens.html" class="btn btn-sm btn-outline-primary">Voir tout</a>
            </div>
            
            <div class="timeline">
              <!-- Entretien 1 - Mise en valeur -->
              <div class="timeline-item mb-4">
                <div class="timeline-badge bg-primary">
                  <i class="bi bi-calendar-check"></i>
                </div>
                <div class="timeline-card card border-0 shadow-sm">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                      <div>
                        <h6 class="mb-1 fw-bold">MegaSoft - Développeur Full Stack</h6>
                        <span class="badge bg-primary bg-opacity-10 text-primary small">Entretien technique</span>
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
                          <span>Demain - 10:00 à 11:30</span>
                        </div>
                      </div>
                      
                      <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt me-2 text-muted"></i>
                        <div>
                          <small class="text-muted d-block">Lieu</small>
                          <span>En ligne (Zoom)</span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="d-flex flex-wrap gap-3 mt-3">
                      <div class="d-flex align-items-center">
                        <i class="bi bi-person me-2 text-muted"></i>
                        <div>
                          <small class="text-muted d-block">Interlocuteur</small>
                          <span>Meryem Tazi (Responsable RH)</span>
                        </div>
                      </div>
                      
                      <div class="d-flex align-items-center">
                        <i class="bi bi-link-45deg me-2 text-muted"></i>
                        <div>
                          <small class="text-muted d-block">Lien</small>
                          <a href="#" class="text-primary">zoom.us/j/123456789</a>
                        </div>
                      </div>
                    </div>
                    
                    <div class="d-flex justify-content-end gap-2 mt-3 pt-2 border-top">
                      <button class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-journal-text me-1"></i> Préparation
                      </button>
                      <button class="btn btn-sm btn-primary">
                        <i class="bi bi-camera-video me-1"></i> Rejoindre
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Entretien 2 - Mise en valeur -->
              <div class="timeline-item">
                <div class="timeline-badge bg-success">
                  <i class="bi bi-building"></i>
                </div>
                <div class="timeline-card card border-0 shadow-sm">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                      <div>
                        <h6 class="mb-1 fw-bold">DataTech - Ingénieur Frontend React</h6>
                        <span class="badge bg-success bg-opacity-10 text-success small">Premier entretien</span>
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
                          <span>23/04 - 14:30 à 15:30</span>
                        </div>
                      </div>
                      
                      <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt me-2 text-muted"></i>
                        <div>
                          <small class="text-muted d-block">Lieu</small>
                          <span>Bureaux DataTech, Rabat</span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="d-flex flex-wrap gap-3 mt-3">
                      <div class="d-flex align-items-center">
                        <i class="bi bi-person me-2 text-muted"></i>
                        <div>
                          <small class="text-muted d-block">Interlocuteur</small>
                          <span>Karim Lahlou (Tech Lead)</span>
                        </div>
                      </div>
                      
                      <div class="d-flex align-items-center">
                        <i class="bi bi-telephone me-2 text-muted"></i>
                        <div>
                          <small class="text-muted d-block">Contact</small>
                          <span>+212 6 12 34 56 78</span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="d-flex justify-content-end gap-2 mt-3 pt-2 border-top">
                      <button class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-journal-text me-1"></i> Préparation
                      </button>
                      <button class="btn btn-sm btn-outline-success">
                        <i class="bi bi-map me-1"></i> Itinéraire
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Offres recommandées -->
        <div class="col-12">
          <div class="dashboard-card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="fw-bold mb-0">Offres recommandées pour vous</h5>
              <a href="offres-emploi.html" class="btn btn-sm btn-outline-primary">Voir plus</a>
            </div>
            
            <div class="row g-3">
              <div class="col-md-6 col-lg-4">
                <div class="card border h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                      <div class="bg-light rounded p-2 me-3">
                        <span class="fw-bold">TW</span>
                      </div>
                      <div>
                        <h6 class="mb-0">Développeur Full Stack</h6>
                        <small class="text-muted">TechWave - Casablanca</small>
                      </div>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mb-3">
                      <span class="badge bg-light text-dark">React</span>
                      <span class="badge bg-light text-dark">Node.js</span>
                      <span class="badge bg-light text-dark">MongoDB</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center small text-muted mb-3">
                      <span><i class="bi bi-cash me-1"></i>12 000 - 15 000 MAD</span>
                      <span><i class="bi bi-geo-alt me-1"></i>Casablanca</span>
                    </div>
                    <div class="d-flex justify-content-between">
                      <span class="badge bg-primary">CDI</span>
                      <a href="#" class="btn btn-sm btn-outline-primary">Postuler</a>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-md-6 col-lg-4">
                <div class="card border h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                      <div class="bg-light rounded p-2 me-3">
                        <span class="fw-bold">MD</span>
                      </div>
                      <div>
                        <h6 class="mb-0">Développeur Backend Node.js</h6>
                        <small class="text-muted">MarocDigital - Rabat</small>
                      </div>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mb-3">
                      <span class="badge bg-light text-dark">Node.js</span>
                      <span class="badge bg-light text-dark">Express</span>
                      <span class="badge bg-light text-dark">PostgreSQL</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center small text-muted mb-3">
                      <span><i class="bi bi-cash me-1"></i>10 000 - 14 000 MAD</span>
                      <span><i class="bi bi-geo-alt me-1"></i>Rabat</span>
                    </div>
                    <div class="d-flex justify-content-between">
                      <span class="badge bg-primary">CDI</span>
                      <a href="#" class="btn btn-sm btn-outline-primary">Postuler</a>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-md-6 col-lg-4">
                <div class="card border h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                      <div class="bg-light rounded p-2 me-3">
                        <span class="fw-bold">DT</span>
                      </div>
                      <div>
                        <h6 class="mb-0">Ingénieur Frontend React</h6>
                        <small class="text-muted">DataTech - Tanger</small>
                      </div>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mb-3">
                      <span class="badge bg-light text-dark">React</span>
                      <span class="badge bg-light text-dark">Redux</span>
                      <span class="badge bg-light text-dark">TypeScript</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center small text-muted mb-3">
                      <span><i class="bi bi-cash me-1"></i>11 000 - 14 000 MAD</span>
                      <span><i class="bi bi-geo-alt me-1"></i>Tanger</span>
                    </div>
                    <div class="d-flex justify-content-between">
                      <span class="badge bg-primary">CDI</span>
                      <a href="#" class="btn btn-sm btn-outline-primary">Postuler</a>
                    </div>
                  </div>
                </div>
              </div>
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