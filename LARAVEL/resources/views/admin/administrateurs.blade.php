<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrateurs - Admin JobSouk</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  @vite(['resources/css/StyleAdmin/administrateurs.css'])
</head>
<body>
  <!-- Sidebar Menu -->
  <div class="side-menu">
    <x-compoAdmin.side-menu activePage='6' />
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
          <h2 class="fw-bold mb-1">Gestion des Administrateurs</h2>
          <p class="text-muted mb-0">Gérez les accès et permissions des administrateurs</p>
        </div>
        <div>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminModal">
            <i class="bi bi-plus me-1"></i> Ajouter un administrateur
          </button>
        </div>
      </div>

      <!-- Filters Card -->
      <div class="dashboard-card p-4 mb-4">
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label">Rôle</label>
            <select class="form-select" id="roleFilter">
              <option value="all">Tous les rôles</option>
              <option value="super-admin">Super Admin</option>
              <option value="admin">Admin</option>
              <option value="moderator">Modérateur</option>
              <option value="support">Support</option>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label">Statut</label>
            <select class="form-select" id="statusFilter">
              <option value="all">Tous statuts</option>
              <option value="active">Actif</option>
              <option value="inactive">Inactif</option>
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

      <!-- Admins Table -->
      <div class="dashboard-card p-4">
        <div class="table-responsive">
          <table class="table table-hover align-middle" id="adminsTable">
            <thead>
              <tr>
                <th width="50px"></th>
                <th>Administrateur</th>
                <th>Rôle</th>
                <th>Email</th>
                <th>Dernière connexion</th>
                <th>Statut</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Admin 1 - Super Admin -->
              <tr>
                <td>
                  <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle" width="40" height="40">
                </td>
                <td>
                  <div class="fw-bold">Admin Principal</div>
                  <div class="small text-muted">Créé le 15/01/2023</div>
                </td>
                <td><span class="badge bg-purple">Super Admin</span></td>
                <td>admin@jobsouk.com</td>
                <td>Aujourd'hui, 09:45</td>
                <td><span class="badge bg-success">Actif</span></td>
                <td class="text-end">
                  <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                      <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editAdminModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                    </ul>
                  </div>
                </td>
              </tr>

              <!-- Admin 2 - Admin -->
              <tr>
                <td>
                  <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle" width="40" height="40">
                </td>
                <td>
                  <div class="fw-bold">Responsable Offres</div>
                  <div class="small text-muted">Créé le 20/02/2023</div>
                </td>
                <td><span class="badge bg-primary">Admin</span></td>
                <td>offres@jobsouk.com</td>
                <td>Hier, 16:30</td>
                <td><span class="badge bg-success">Actif</span></td>
                <td class="text-end">
                  <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                      <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editAdminModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-lock me-2"></i>Désactiver</a></li>
                    </ul>
                  </div>
                </td>
              </tr>

              <!-- Admin 3 - Moderator -->
              <tr>
                <td>
                  <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle" width="40" height="40">
                </td>
                <td>
                  <div class="fw-bold">Modérateur Content</div>
                  <div class="small text-muted">Créé le 05/03/2023</div>
                </td>
                <td><span class="badge bg-success">Modérateur</span></td>
                <td>moderation@jobsouk.com</td>
                <td>12/06/2023</td>
                <td><span class="badge bg-success">Actif</span></td>
                <td class="text-end">
                  <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                      <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editAdminModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-lock me-2"></i>Désactiver</a></li>
                    </ul>
                  </div>
                </td>
              </tr>

              <!-- Admin 4 - Support -->
              <tr>
                <td>
                  <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle" width="40" height="40">
                </td>
                <td>
                  <div class="fw-bold">Support Utilisateurs</div>
                  <div class="small text-muted">Créé le 18/04/2023</div>
                </td>
                <td><span class="badge bg-warning">Support</span></td>
                <td>support@jobsouk.com</td>
                <td>10/06/2023</td>
                <td><span class="badge bg-secondary">Inactif</span></td>
                <td class="text-end">
                  <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                      <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editAdminModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
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

  <!-- Add Admin Modal -->
  <div class="modal fade" id="addAdminModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ajouter un administrateur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="adminForm">
            <div class="mb-3">
              <label class="form-label">Nom complet</label>
              <input type="text" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Rôle</label>
              <select class="form-select" required>
                <option value="">Sélectionner un rôle...</option>
                <option value="super-admin">Super Admin</option>
                <option value="admin">Admin</option>
                <option value="moderator">Modérateur</option>
                <option value="support">Support</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Permissions</label>
              <div class="border p-3 rounded">
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="permUsers">
                  <label class="form-check-label" for="permUsers">Gestion des utilisateurs</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="permOffers">
                  <label class="form-check-label" for="permOffers">Gestion des offres</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="permReports">
                  <label class="form-check-label" for="permReports">Gestion des signalements</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="permSettings">
                  <label class="form-check-label" for="permSettings">Paramètres système</label>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Mot de passe</label>
              <input type="password" class="form-control" required>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="sendEmail">
              <label class="form-check-label" for="sendEmail">Envoyer les informations par email</label>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary" form="adminForm">Créer le compte</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Admin Modal -->
  <div class="modal fade" id="editAdminModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modifier l'administrateur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editAdminForm">
            <div class="mb-3">
              <label class="form-label">Nom complet</label>
              <input type="text" class="form-control" value="Responsable Offres" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" value="offres@jobsouk.com" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Rôle</label>
              <select class="form-select" required>
                <option value="admin" selected>Admin</option>
                <option value="super-admin">Super Admin</option>
                <option value="moderator">Modérateur</option>
                <option value="support">Support</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Permissions</label>
              <div class="border p-3 rounded">
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="editPermUsers" checked>
                  <label class="form-check-label" for="editPermUsers">Gestion des utilisateurs</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="editPermOffers" checked>
                  <label class="form-check-label" for="editPermOffers">Gestion des offres</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="editPermReports">
                  <label class="form-check-label" for="editPermReports">Gestion des signalements</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="editPermSettings">
                  <label class="form-check-label" for="editPermSettings">Paramètres système</label>
                </div>
              </div>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="editIsActive" checked>
              <label class="form-check-label" for="editIsActive">Compte actif</label>
            </div>
            <div class="alert alert-warning">
              <i class="bi bi-exclamation-triangle me-2"></i> Laisser vide pour ne pas modifier le mot de passe
            </div>
            <div class="mb-3">
              <label class="form-label">Nouveau mot de passe</label>
              <input type="password" class="form-control">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary" form="editAdminForm">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap & Custom JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/js/adminJs/administrateurs.js'])
</body>
</html>