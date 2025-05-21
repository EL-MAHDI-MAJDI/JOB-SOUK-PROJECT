<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signalements - Admin JobSouk</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  @vite(['resources/css/StyleAdmin/signalements.css'])
</head>
<body>
  <!-- Sidebar Menu -->
  <div class="side-menu">
    <x-compoAdmin.side-menu activePage='4' />
  </div>

  <!-- Top Navigation -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoAdmin.navbar />
  </nav>

  <!-- Main Content -->
  <div class="main-content">
    <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Gestion des Signalements</h2>
          <p class="text-muted mb-0">Examinez et traitez les signalements des utilisateurs</p>
        </div>
        <div class="d-flex gap-2">
          <!-- <button class="btn btn-outline-secondary" id="exportReportsBtn">
            <i class="bi bi-download me-1"></i> Exporter
          </button> -->
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
              <i class="bi bi-funnel me-1"></i> Filtres
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#" data-filter="all">Tous les signalements</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#" data-filter="new">Nouveaux</a></li>
              <li><a class="dropdown-item" href="#" data-filter="in-progress">En cours</a></li>
              <li><a class="dropdown-item" href="#" data-filter="resolved">Résolus</a></li>
              <li><a class="dropdown-item" href="#" data-filter="rejected">Rejetés</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Stats Cards -->
      <div class="row mb-4">
        <div class="col-md-3">
          <div class="dashboard-card p-3">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h6 class="mb-1">Nouveaux</h6>
                <h3 class="mb-0">12</h3>
              </div>
              <div class="bg-danger bg-opacity-10 p-3 rounded">
                <i class="bi bi-flag text-danger"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-card p-3">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h6 class="mb-1">En cours</h6>
                <h3 class="mb-0">8</h3>
              </div>
              <div class="bg-warning bg-opacity-10 p-3 rounded">
                <i class="bi bi-hourglass-split text-warning"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-card p-3">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h6 class="mb-1">Résolus</h6>
                <h3 class="mb-0">24</h3>
              </div>
              <div class="bg-success bg-opacity-10 p-3 rounded">
                <i class="bi bi-check-circle text-success"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-card p-3">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h6 class="mb-1">Rejetés</h6>
                <h3 class="mb-0">5</h3>
              </div>
              <div class="bg-secondary bg-opacity-10 p-3 rounded">
                <i class="bi bi-x-circle text-secondary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Reports List -->
      <div class="dashboard-card p-4">
        <div class="table-responsive">
          <table class="table table-hover align-middle" id="reportsTable">
            <thead>
              <tr>
                <th width="50px"></th>
                <th>Signalement</th>
                <th>Type</th>
                <th>Signalé par</th>
                <th>Date</th>
                <th>Statut</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Report 1 - New -->
              <tr class="report-card">
                <td>
                  <div class="bg-danger bg-opacity-10 p-2 rounded text-center">
                    <i class="bi bi-flag text-danger"></i>
                  </div>
                </td>
                <td>
                  <div class="fw-bold">Contenu inapproprié</div>
                  <div class="small text-muted">Offre #12345 - Développeur Full Stack</div>
                </td>
                <td>Offre d'emploi</td>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/30" alt="Profile" class="rounded-circle me-2" width="30" height="30">
                    <span>Youssef Benali</span>
                  </div>
                </td>
                <td>12/06/2023</td>
                <td><span class="badge bg-danger">Nouveau</span></td>
                <td class="text-end">
                  <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewReportModal"><i class="bi bi-eye me-2"></i>Voir détails</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-check-circle me-2"></i>Marquer comme résolu</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-hourglass-split me-2"></i>Marquer en cours</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-x-circle me-2"></i>Rejeter</a></li>
                    </ul>
                  </div>
                </td>
              </tr>

              <!-- Report 2 - In Progress -->
              <tr class="report-card in-progress">
                <td>
                  <div class="bg-warning bg-opacity-10 p-2 rounded text-center">
                    <i class="bi bi-hourglass-split text-warning"></i>
                  </div>
                </td>
                <td>
                  <div class="fw-bold">Profil frauduleux</div>
                  <div class="small text-muted">Utilisateur #456 - Société XYZ</div>
                </td>
                <td>Profil entreprise</td>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/30" alt="Profile" class="rounded-circle me-2" width="30" height="30">
                    <span>Leila Nassiri</span>
                  </div>
                </td>
                <td>10/06/2023</td>
                <td><span class="badge bg-warning">En cours</span></td>
                <td class="text-end">
                  <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewReportModal"><i class="bi bi-eye me-2"></i>Voir détails</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-check-circle me-2"></i>Marquer comme résolu</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-x-circle me-2"></i>Rejeter</a></li>
                    </ul>
                  </div>
                </td>
              </tr>

              <!-- Report 3 - Resolved -->
              <tr class="report-card resolved">
                <td>
                  <div class="bg-success bg-opacity-10 p-2 rounded text-center">
                    <i class="bi bi-check-circle text-success"></i>
                  </div>
                </td>
                <td>
                  <div class="fw-bold">Spam/Publicité</div>
                  <div class="small text-muted">Message #789</div>
                </td>
                <td>Message privé</td>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/30" alt="Profile" class="rounded-circle me-2" width="30" height="30">
                    <span>Karim Alami</span>
                  </div>
                </td>
                <td>08/06/2023</td>
                <td><span class="badge bg-success">Résolu</span></td>
                <td class="text-end">
                  <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewReportModal"><i class="bi bi-eye me-2"></i>Voir détails</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-hourglass-split me-2"></i>Marquer en cours</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-x-circle me-2"></i>Rejeter</a></li>
                    </ul>
                  </div>
                </td>
              </tr>

              <!-- Report 4 - Rejected -->
              <tr class="report-card rejected">
                <td>
                  <div class="bg-secondary bg-opacity-10 p-2 rounded text-center">
                    <i class="bi bi-x-circle text-secondary"></i>
                  </div>
                </td>
                <td>
                  <div class="fw-bold">Information erronée</div>
                  <div class="small text-muted">Offre #56789 - Designer UI/UX</div>
                </td>
                <td>Offre d'emploi</td>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/30" alt="Profile" class="rounded-circle me-2" width="30" height="30">
                    <span>Ahmed Ziri</span>
                  </div>
                </td>
                <td>05/06/2023</td>
                <td><span class="badge bg-secondary">Rejeté</span></td>
                <td class="text-end">
                  <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewReportModal"><i class="bi bi-eye me-2"></i>Voir détails</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-check-circle me-2"></i>Marquer comme résolu</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-hourglass-split me-2"></i>Marquer en cours</a></li>
                    </ul>
                  </div>
                </td>
              </tr>

              <!-- Report 5 - New -->
              <tr class="report-card">
                <td>
                  <div class="bg-danger bg-opacity-10 p-2 rounded text-center">
                    <i class="bi bi-flag text-danger"></i>
                  </div>
                </td>
                <td>
                  <div class="fw-bold">Comportement abusif</div>
                  <div class="small text-muted">Utilisateur #123 - John Doe</div>
                </td>
                <td>Utilisateur</td>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/30" alt="Profile" class="rounded-circle me-2" width="30" height="30">
                    <span>Sophie Martin</span>
                  </div>
                </td>
                <td>14/06/2023</td>
                <td><span class="badge bg-danger">Nouveau</span></td>
                <td class="text-end">
                  <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewReportModal"><i class="bi bi-eye me-2"></i>Voir détails</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-check-circle me-2"></i>Marquer comme résolu</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-hourglass-split me-2"></i>Marquer en cours</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-x-circle me-2"></i>Rejeter</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <nav class="mt-4">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">Précédent</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Suivant</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>

  <!-- View Report Modal -->
  <div class="modal fade" id="viewReportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Détails du signalement</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-4">
            <h6 class="fw-bold mb-3">Signalement #REP-12345</h6>
            <div class="row mb-3">
              <div class="col-md-6">
                <p class="mb-1"><strong>Type :</strong> Offre d'emploi</p>
                <p class="mb-1"><strong>Statut :</strong> <span class="badge bg-danger">Nouveau</span></p>
              </div>
              <div class="col-md-6">
                <p class="mb-1"><strong>Date :</strong> 12/06/2023</p>
                <p class="mb-1"><strong>Priorité :</strong> <span class="text-danger">Haute</span></p>
              </div>
            </div>
          </div>

          <div class="mb-4">
            <h6 class="fw-bold mb-3">Contenu signalé</h6>
            <div class="dashboard-card p-3 mb-3">
              <div class="d-flex align-items-center mb-2">
                <img src="https://via.placeholder.com/40" alt="Logo" class="rounded-circle me-3" width="40" height="40">
                <div>
                  <h5 class="mb-0">Développeur Full Stack</h5>
                  <p class="mb-0 text-muted">TechSolutions - Casablanca</p>
                </div>
              </div>
              <div class="mt-3">
                <p><strong>Description :</strong> Nous recherchons un développeur Full Stack expérimenté pour rejoindre notre équipe...</p>
                <p><strong>Salaire :</strong> 15 000 - 20 000 MAD</p>
              </div>
            </div>
            <p class="text-muted small">ID de l'offre : #12345 - Créée le 10/06/2023</p>
          </div>

          <div class="mb-4">
            <h6 class="fw-bold mb-3">Détails du signalement</h6>
            <div class="dashboard-card p-3">
              <div class="d-flex align-items-center mb-3">
                <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle me-3" width="40" height="40">
                <div>
                  <h6 class="mb-0">Youssef Benali</h6>
                  <p class="mb-0 text-muted">youssef.b@example.com</p>
                </div>
              </div>
              <div>
                <p><strong>Raison :</strong> Contenu inapproprié</p>
                <p><strong>Message :</strong></p>
                <div class="bg-light p-3 rounded">
                  <p class="mb-0">"Cette offre contient des termes discriminatoires basés sur l'âge et le genre, ce qui est contraire aux politiques de votre plateforme."</p>
                </div>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <h6 class="fw-bold mb-3">Actions</h6>
            <div class="row g-2">
              <div class="col-md-4">
                <button class="btn btn-success w-100">
                  <i class="bi bi-check-circle me-2"></i>Marquer comme résolu
                </button>
              </div>
              <div class="col-md-4">
                <button class="btn btn-warning w-100">
                  <i class="bi bi-hourglass-split me-2"></i>Marquer en cours
                </button>
              </div>
              <div class="col-md-4">
                <button class="btn btn-danger w-100">
                  <i class="bi bi-x-circle me-2"></i>Rejeter
                </button>
              </div>
            </div>
          </div>

          <div>
            <h6 class="fw-bold mb-3">Historique des actions</h6>
            <div class="timeline">
              <div class="timeline-item">
                <div class="timeline-point"></div>
                <div class="timeline-content">
                  <div class="d-flex justify-content-between">
                    <span class="fw-bold">Signalement créé</span>
                    <span class="text-muted small">12/06/2023 14:30</span>
                  </div>
                  <p class="small text-muted mb-0">Par Youssef Benali</p>
                </div>
              </div>
              <!-- Additional timeline items would go here -->
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="button" class="btn btn-primary">Enregistrer les modifications</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap & Custom JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite('resources/js/adminJs/signalements.js')
</body>
</html>