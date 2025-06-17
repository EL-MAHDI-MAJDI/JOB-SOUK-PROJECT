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
  @vite(['resources/css/StyleAdmin/gestionComptes.css'])

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
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              {{-- Candidats uniquement --}}
              @foreach($users as $user)
                <tr>
                  <td>
                    <img src="{{ asset('storage/' . $user->photoProfile) }}" alt="Profile" class="rounded-circle" width="40" height="40">
                  </td>
                  <td>
                    <div class="fw-bold">{{ $user->prenom }} {{ $user->nom }}</div>
                    <div class="small text-muted">Candidat</div>
                  </td>
                  <td>
                    <span class="badge bg-success">Candidat</span>
                  </td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->created_at->format('d/m/Y') }}</td>
                  <td>
                    <span class="badge 
                      @if($user->status == 'active') bg-success
                      @elseif($user->status == 'pending') bg-warning
                      @elseif($user->status == 'suspended') bg-danger
                      @else bg-secondary @endif">
                      {{ ucfirst($user->status) }}
                    </span>
                  </td>
                  <td class="text-center">
                    @if($user->status === 'active')
                      <form method="POST" action="{{ route('admin.candidat.deactivate', $user->id) }}" style="display:inline;">
                        @csrf
                        <button class="btn btn-warning btn-sm" type="submit">
                          <i class="bi bi-x-circle"></i> Désactiver
                        </button>
                      </form>
                    @else
                      <form method="POST" action="{{ route('admin.candidat.activate', $user->id) }}" style="display:inline;">
                        @csrf
                        <button class="btn btn-success btn-sm" type="submit">
                          <i class="bi bi-check-circle"></i> Activer
                        </button>
                      </form>
                    @endif
                  </td>
                </tr>
              @endforeach

              {{-- Entreprises --}}
              @foreach($companies as $company)
                <tr>
                  <td>
                    @if($company->logo)
                      <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="40" height="40" class="rounded-circle">
                    @else
                      <img src="{{ asset('images/default-logo.png') }}" alt="Logo" width="40" height="40" class="rounded-circle">
                    @endif
                  </td>
                  <td>
                    <div class="fw-bold">{{ $company->nomEntreprise }}</div>
                    <div class="small text-muted">{{ $company->SecteurActivite }}</div>
                  </td>
                  <td><span class="badge bg-primary">Entreprise</span></td>
                  <td>{{ $company->email }}</td>
                  <td>{{ $company->created_at->format('d/m/Y') }}</td>
                  <td>
                    <span class="badge 
                      @if($company->status == 'active') bg-success
                      @else bg-warning
                      @endif">
                      {{ ucfirst($company->status) }}
                    </span>
                  </td>
                  <td class="text-center">
                    @if($company->status === 'active')
                      <form method="POST" action="{{ route('admin.entreprise.deactivate', $company->id) }}" style="display:inline;">
                        @csrf
                        <button class="btn btn-warning btn-sm" type="submit">
                          <i class="bi bi-x-circle"></i> Désactiver
                        </button>
                      </form>
                    @elseif($company->status === 'pending')
                      <form method="POST" action="{{ route('admin.entreprise.activate', $company->id) }}" style="display:inline;">
                        @csrf
                        <button class="btn btn-success btn-sm" type="submit">
                          <i class="bi bi-check-circle"></i> Activer
                        </button>
                      </form>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
          {{ $companies->links() }}
        </div>
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
  @vite(['resources/js/adminJs/gestion-comptes.js'])
</body>
</html>