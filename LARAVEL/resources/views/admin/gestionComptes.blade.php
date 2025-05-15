<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Comptes - Admin JobSouk</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('storage/StyleAdmin/gestionComptes.css') }}">

</head>
<body>
  <!-- Sidebar Menu -->
  <div class="side-menu">
    <x-compoAdmin.side-menu activePage='2' />
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
          <h2 class="fw-bold mb-1">Gestion des Comptes</h2>
          <p class="text-muted mb-0">Gérez tous les utilisateurs de la plateforme</p>
        </div>
        <div class="d-flex gap-2">
          <!-- <button class="btn btn-outline-secondary" id="exportUsersBtn">
            <i class="bi bi-download me-1"></i> Exporter
          </button> -->
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
              <i class="bi bi-plus me-1"></i> Ajouter
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="bi bi-person-plus me-2"></i>Nouvel utilisateur
              </a></li>
              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addCompanyModal">
                <i class="bi bi-building-add me-2"></i>Nouvelle entreprise
              </a></li>
              
            </ul>
          </div>
        </div>
      </div>

      <!-- Filters Card -->
      <div class="dashboard-card p-4 mb-4">
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label">Type de compte</label>
            <select class="form-select" id="accountTypeFilter">
              <option value="all">Tous les comptes</option>
              <option value="candidate">Candidats</option>
              <option value="company">Entreprises</option>
              <option value="admin">Administrateurs</option>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label">Statut</label>
            <select class="form-select" id="statusFilter">
              <option value="all">Tous statuts</option>
              <option value="active">Actif</option>
              <option value="pending">En attente</option>
              <option value="suspended">Suspendu</option>
              <option value="banned">Banni</option>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label">Recherche</label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Nom, email..." id="searchInput">
              <button class="btn btn-outline-secondary" type="button" id="searchButton">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Users Table -->
      <div class="dashboard-card p-4">
        <div class="table-responsive">
          <table class="table table-hover align-middle" id="usersTable">
            <thead>
              <tr>
                <th width="50px"></th>
                <th>Utilisateur</th>
                <th>Type</th>
                <th>Email</th>
                <th>Inscription</th>
                <th>Statut</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Candidate 1 -->
              <tr>
                <td>
                  <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle" width="40" height="40">
                </td>
                <td>
                  <div class="fw-bold">Youssef Benali</div>
                  <div class="small text-muted">Développeur Front-end</div>
                </td>
                <td><span class="badge bg-success">Candidat</span></td>
                <td>youssef.b@example.com</td>
                <td>12/05/2023</td>
                <td><span class="badge bg-success">Actif</span></td>
                <td class="text-end">
                  <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-lock me-2"></i>Bloquer</a></li>
                    </ul>
                  </div>
                </td>
              </tr>

              <!-- Company 1 -->
              <tr>
                <td>
                  <img src="https://via.placeholder.com/40" alt="Logo" class="rounded-circle" width="40" height="40">
                </td>
                <td>
                  <div class="fw-bold">TechSolutions</div>
                  <div class="small text-muted">Informatique</div>
                </td>
                <td><span class="badge bg-primary">Entreprise</span></td>
                <td>contact@techsolutions.com</td>
                <td>28/04/2023</td>
                <td><span class="badge bg-warning">En attente</span></td>
                <td class="text-end">
                  <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-success" href="#"><i class="bi bi-check-circle me-2"></i>Valider</a></li>
                    </ul>
                  </div>
                </td>
              </tr>

              <!-- Admin 1 -->
              <tr>
                <td>
                  <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle" width="40" height="40">
                </td>
                <td>
                  <div class="fw-bold">Admin User</div>
                  <div class="small text-muted">Super Admin</div>
                </td>
                <td><span class="badge bg-purple">Administrateur</span></td>
                <td>admin@jobsouk.com</td>
                <td>15/01/2023</td>
                <td><span class="badge bg-success">Actif</span></td>
                <td class="text-end">
                  <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                    </ul>
                  </div>
                </td>
              </tr>

              <!-- Candidate 2 -->
              <tr>
                <td>
                  <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle" width="40" height="40">
                </td>
                <td>
                  <div class="fw-bold">Leila Nassiri</div>
                  <div class="small text-muted">Chef de projet</div>
                </td>
                <td><span class="badge bg-success">Candidat</span></td>
                <td>leila.n@example.com</td>
                <td>03/06/2023</td>
                <td><span class="badge bg-danger">Suspendu</span></td>
                <td class="text-end">
                  <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-success" href="#"><i class="bi bi-unlock me-2"></i>Activer</a></li>
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

  <!-- Add User Modal -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ajouter un nouvel utilisateur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="userForm">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Prénom</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Type de compte</label>
                <select class="form-select" required>
                  <option value="">Sélectionner...</option>
                  <option value="candidate">Candidat</option>
                  <option value="admin">Administrateur</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">Mot de passe</label>
                <input type="password" class="form-control" required>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary" form="userForm">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Company Modal -->
  <div class="modal fade" id="addCompanyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ajouter une nouvelle entreprise</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="companyForm">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Nom de l'entreprise</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Secteur d'activité</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Mot de passe</label>
                <input type="mot de passe" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Téléphone</label>
                <input type="tel" class="form-control">
              </div>
              <div class="col-12">
                <label class="form-label">Adresse</label>
                <textarea class="form-control" rows="2"></textarea>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary" form="companyForm">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap & Custom JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('storage/adminJs/gestion-comptes.js') }}"></script>
</body>
</html>