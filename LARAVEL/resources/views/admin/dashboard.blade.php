<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de bord Admin - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" as="style">
  @vite(['resources/css/StyleAdmin/dashboard.css'])
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoAdmin.side-menu activePage='1' />
  </div>

  <!-- Barre de navigation supérieure enrichie -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoAdmin.navbar />
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- En-tête -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Tableau de bord Administrateur</h2>
          <p class="text-muted mb-0">Aperçu global de la plateforme</p>
        </div>
        <!-- <div class="d-flex gap-2">
          <button class="btn btn-outline-secondary">
            <i class="bi bi-download me-1"></i> Exporter
          </button>
          <button class="btn btn-primary">
            <i class="bi bi-plus me-1"></i> Nouvelle action
          </button>
        </div> -->
      </div>
      
      <!-- Statistiques principales -->
      <div class="row g-4 mb-4">
        <div class="col-md-3">
          <div class="dashboard-card p-4">
            <div class="d-flex align-items-center">
              <div class="me-3 p-3 rounded" style="background-color: rgba(52, 152, 219, 0.1);">
                <i class="bi bi-people text-primary"></i>
              </div>
              <div>
                <h6 class="text-muted mb-1">Utilisateurs</h6>
                <h3 class="fw-bold mb-0">1,248</h3>
                <span class="text-success small"><i class="bi bi-arrow-up"></i> 12% ce mois</span>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="dashboard-card p-4">
            <div class="d-flex align-items-center">
              <div class="me-3 p-3 rounded" style="background-color: rgba(46, 204, 113, 0.1);">
                <i class="bi bi-building text-success"></i>
              </div>
              <div>
                <h6 class="text-muted mb-1">Entreprises</h6>
                <h3 class="fw-bold mb-0">356</h3>
                <span class="text-success small"><i class="bi bi-arrow-up"></i> 5% ce mois</span>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="dashboard-card p-4">
            <div class="d-flex align-items-center">
              <div class="me-3 p-3 rounded" style="background-color: rgba(155, 89, 182, 0.1);">
                <i class="bi bi-briefcase text-accent"></i>
              </div>
              <div>
                <h6 class="text-muted mb-1">Offres actives</h6>
                <h3 class="fw-bold mb-0">782</h3>
                <span class="text-danger small"><i class="bi bi-arrow-down"></i> 3% ce mois</span>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="dashboard-card p-4">
            <div class="d-flex align-items-center">
              <div class="me-3 p-3 rounded" style="background-color: rgba(231, 76, 60, 0.1);">
                <i class="bi bi-flag text-danger"></i>
              </div>
              <div>
                <h6 class="text-muted mb-1">Signalements</h6>
                <h3 class="fw-bold mb-0">24</h3>
                <span class="text-danger small"><i class="bi bi-arrow-up"></i> 20% ce mois</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Graphiques et activité -->
      {{-- <div class="row g-4 mb-4">
        <!-- Graphique des inscriptions -->
        <div class="col-lg-6">
          <div class="dashboard-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="fw-bold mb-0">Inscriptions récentes</h5>
              <div class="dropdown">
                <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                  Ce mois
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
                  <li><a class="dropdown-item" href="#">Cette semaine</a></li>
                  <li><a class="dropdown-item" href="#">Ce mois</a></li>
                  <li><a class="dropdown-item" href="#">Cette année</a></li>
                </ul>
              </div>
            </div>
            <div class="chart-container">
              <canvas id="inscriptionsChart"></canvas>
            </div>
          </div>
        </div>
        
        <!-- Graphique des offres -->
        <div class="col-lg-6">
          <div class="dashboard-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="fw-bold mb-0">Offres publiées</h5>
              <div class="dropdown">
                <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                  Ce mois
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
                  <li><a class="dropdown-item" href="#">Cette semaine</a></li>
                  <li><a class="dropdown-item" href="#">Ce mois</a></li>
                  <li><a class="dropdown-item" href="#">Cette année</a></li>
                </ul>
              </div>
            </div>
            <div class="chart-container">
              <canvas id="offresChart"></canvas>
            </div>
          </div>
        </div>
      </div> --}}
      
      <!-- Dernière activité et entreprises à valider -->
      <div class="row g-4">
        <!-- Activité récente -->
        <div class="col-lg-8">
          <div class="dashboard-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="fw-bold mb-0">Activité récente</h5>
            </div>
            
            <div class="activity-list">
              <!-- Item 1 -->
              <div class="activity-item">
                <div class="activity-badge">
                  <i class="bi bi-building text-primary"></i>
                </div>
                <div class="activity-content">
                  <div class="activity-time">Aujourd'hui, 10:24</div>
                  <h6 class="fw-bold mb-1">Nouvelle entreprise inscrite</h6>
                  <p class="mb-2">Société XYZ en attente de validation</p>
                  <div class="d-flex gap-2">
                    <a href="#" class="btn btn-sm btn-outline-primary">Voir profil</a>
                    <a href="#" class="btn btn-sm btn-success">Valider</a>
                  </div>
                </div>
              </div>
              
              <!-- Item 2 -->
              <div class="activity-item">
                <div class="activity-badge">
                  <i class="bi bi-flag text-danger"></i>
                </div>
                <div class="activity-content">
                  <div class="activity-time">Aujourd'hui, 09:15</div>
                  <h6 class="fw-bold mb-1">Offre signalée</h6>
                  <p class="mb-2">Offre #12345 par utilisateur U789</p>
                  <div class="d-flex gap-2">
                    <a href="#" class="btn btn-sm btn-outline-primary">Examiner</a>
                    <a href="#" class="btn btn-sm btn-outline-danger">Masquer</a>
                  </div>
                </div>
              </div>
              
              <!-- Item 3 -->
              <div class="activity-item">
                <div class="activity-badge">
                  <i class="bi bi-person-plus text-success"></i>
                </div>
                <div class="activity-content">
                  <div class="activity-time">Hier, 16:30</div>
                  <h6 class="fw-bold mb-1">20 nouveaux candidats</h6>
                  <p class="mb-2">Inscrits aujourd'hui</p>
                  <a href="#" class="btn btn-sm btn-outline-primary">Voir la liste</a>
                </div>
              </div>
              
              <!-- Item 4 -->
              <div class="activity-item">
                <div class="activity-badge">
                  <i class="bi bi-briefcase text-accent"></i>
                </div>
                <div class="activity-content">
                  <div class="activity-time">Hier, 14:12</div>
                  <h6 class="fw-bold mb-1">5 nouvelles offres</h6>
                  <p class="mb-2">Publiées par des entreprises vérifiées</p>
                  <a href="#" class="btn btn-sm btn-outline-primary">Vérifier</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Entreprises à valider -->
        <div class="col-lg-4">
          <div class="dashboard-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="fw-bold mb-0">Entreprises à valider</h5>
                <a href="{{ route('admin.gestionComptes') }}" class="btn btn-outline-primary btn-sm">Voir toutes</a>
            </div>
            
            <div class="list-group list-group-flush">
              @forelse($entreprises as $entreprise)
                <a href="{{ route('admin.gestionComptes') }}" class="list-group-item list-group-item-action border-0 px-0 py-3">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('storage/' . $entreprise->logo) }}" alt="Logo" class="rounded me-3" width="40" height="40">
                        <div>
                            <h6 class="fw-bold mb-1">{{ $entreprise->nomEntreprise ?? $entreprise->nom }}</h6>
                            <p class="small text-muted mb-0">
                                Inscrite {{ $entreprise->created_at->diffForHumans() }}
                            </p>
                        </div>
                        <span class="badge bg-warning bg-opacity-10 text-warning ms-auto">En attente</span>
                    </div>
                </a>
              @empty
                
                <div class="text-muted text-center py-3">
                  <i class="bi bi-building" style="font-size: 2rem;"></i><br>
                  Aucune entreprise à valider.</div>
              @endforelse
            </div>

            <div class="mt-3">
              {{-- <button class="btn btn-primary w-100">
                <i class="bi bi-check-circle me-1"></i> Valider tout
              </button> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  @vite('resources/js/adminJs/dashboard.js')
</body>
</html>