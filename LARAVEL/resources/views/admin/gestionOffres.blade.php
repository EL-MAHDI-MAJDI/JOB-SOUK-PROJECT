<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Offres - Admin JobSouk</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  @vite(['resources/css/StyleAdmin/gestionOffres.css'])

</head>
<body>
  <!-- Sidebar Menu -->
  <div class="side-menu">
    <x-compoAdmin.side-menu activePage='3' />
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
          <h2 class="fw-bold mb-1">Gestion des Offres</h2>
          <p class="text-muted mb-0">Gérez toutes les offres d'emploi de la plateforme</p>
        </div>
        <div class="d-flex gap-2">
          <!-- <button class="btn btn-outline-secondary" id="exportOffersBtn">
            <i class="bi bi-download me-1"></i> Exporter
          </button> -->
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOfferModal">
            <i class="bi bi-plus me-1"></i> Ajouter une offre
          </button>
        </div>
      </div>

      <!-- Filters Card -->
      <div class="dashboard-card p-4 mb-4">
        <div class="row g-3">
          <div class="col-md-3">
            <label class="form-label">Statut</label>
            <select class="form-select" id="statusFilter">
              <option value="all">Tous les statuts</option>
              <option value="active">Actives</option>
              <option value="pending">En attente</option>
              <option value="expired">Expirées</option>
              <option value="draft">Brouillons</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Type</label>
            <select class="form-select" id="typeFilter">
              <option value="all">Tous les types</option>
              <option value="full-time">Temps plein</option>
              <option value="part-time">Temps partiel</option>
              <option value="remote">Télétravail</option>
              <option value="internship">Stage</option>
              <option value="freelance">Freelance</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Catégorie</label>
            <select class="form-select" id="categoryFilter">
              <option value="all">Toutes catégories</option>
              <option value="it">Informatique</option>
              <option value="marketing">Marketing</option>
              <option value="finance">Finance</option>
              <option value="hr">Ressources Humaines</option>
              <option value="design">Design</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Recherche</label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Titre, entreprise..." id="searchInput">
              <button class="btn btn-outline-secondary" type="button" id="searchButton">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Offers Table -->
      <div class="dashboard-card p-4">
        <div class="table-responsive">
          <table class="table table-hover align-middle" id="offersTable">
            <thead>
              <tr>
                <th width="50px"></th>
                <th>Offre</th>
                <th>Entreprise</th>
                <th>Type</th>
                <th>Postulations</th>
                <th>Date expiration</th>
                <th>Statut</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Offer 1 -->
              <tr>
                <td>
                  <img src="https://via.placeholder.com/40" alt="Company Logo" class="rounded-circle" width="40" height="40">
                </td>
                <td>
                  <div class="job-title">Développeur Full Stack</div>
                  <div class="job-type"><i class="bi bi-geo-alt"></i> Casablanca</div>
                </td>
                <td>
                  <div class="company-name">TechSolutions</div>
                </td>
                <td>Temps plein</td>
                <td>
                  <span class="badge bg-primary rounded-pill">24</span>
                </td>
                <td>15/06/2023</td>
                <td><span class="badge bg-success">Active</span></td>
                <td class="text-end">
                  <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
                    </ul>
                  </div>
                </td>
              </tr>

              <!-- Offer 2 -->
              <tr>
                <td>
                  <img src="https://via.placeholder.com/40" alt="Company Logo" class="rounded-circle" width="40" height="40">
                </td>
                <td>
                  <div class="job-title">Designer UI/UX</div>
                  <div class="job-type"><i class="bi bi-geo-alt"></i> Rabat</div>
                </td>
                <td>
                  <div class="company-name">Creative Studio</div>
                </td>
                <td>Temps partiel</td>
                <td>
                  <span class="badge bg-primary rounded-pill">18</span>
                </td>
                <td>10/06/2023</td>
                <td><span class="badge bg-success">Active</span></td>
                <td class="text-end">
                  <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
                    </ul>
                  </div>
                </td>
              </tr>

              <!-- Offer 3 -->
              <tr>
                <td>
                  <img src="https://via.placeholder.com/40" alt="Company Logo" class="rounded-circle" width="40" height="40">
                </td>
                <td>
                  <div class="job-title">Chef de Projet Marketing</div>
                  <div class="job-type"><i class="bi bi-geo-alt"></i> Marrakech</div>
                </td>
                <td>
                  <div class="company-name">MarketPro</div>
                </td>
                <td>Temps plein</td>
                <td>
                  <span class="badge bg-primary rounded-pill">32</span>
                </td>
                <td>05/06/2023</td>
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
                      <li><a class="dropdown-item text-success" href="#"><i class="bi bi-check-circle me-2"></i>Approuver</a></li>
                    </ul>
                  </div>
                </td>
              </tr>

              <!-- Offer 4 -->
              <tr>
                <td>
                  <img src="https://via.placeholder.com/40" alt="Company Logo" class="rounded-circle" width="40" height="40">
                </td>
                <td>
                  <div class="job-title">Analyste Financier</div>
                  <div class="job-type"><i class="bi bi-geo-alt"></i> Casablanca</div>
                </td>
                <td>
                  <div class="company-name">Finance Group</div>
                </td>
                <td>Temps plein</td>
                <td>
                  <span class="badge bg-primary rounded-pill">12</span>
                </td>
                <td>20/05/2023</td>
                <td><span class="badge bg-danger">Expirée</span></td>
                <td class="text-end">
                  <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-success" href="#"><i class="bi bi-arrow-repeat me-2"></i>Renouveler</a></li>
                    </ul>
                  </div>
                </td>
              </tr>

              <!-- Offer 5 -->
              <tr>
                <td>
                  <img src="https://via.placeholder.com/40" alt="Company Logo" class="rounded-circle" width="40" height="40">
                </td>
                <td>
                  <div class="job-title">Développeur Mobile</div>
                  <div class="job-type"><i class="bi bi-geo-alt"></i> Télétravail</div>
                </td>
                <td>
                  <div class="company-name">AppInnovation</div>
                </td>
                <td>Freelance</td>
                <td>
                  <span class="badge bg-primary rounded-pill">8</span>
                </td>
                <td>30/06/2023</td>
                <td><span class="badge bg-secondary">Brouillon</span></td>
                <td class="text-end">
                  <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-success" href="#"><i class="bi bi-check-circle me-2"></i>Publier</a></li>
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

  <!-- Add Offer Modal -->
  <div class="modal fade" id="addOfferModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ajouter une nouvelle offre</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="offerForm">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Titre de l'offre</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Entreprise</label>
                <select class="form-select" required>
                  <option value="">Sélectionner une entreprise</option>
                  <option value="1">TechSolutions</option>
                  <option value="2">Creative Studio</option>
                  <option value="3">MarketPro</option>
                  <option value="4">Finance Group</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Type de contrat</label>
                <select class="form-select" required>
                  <option value="">Sélectionner...</option>
                  <option value="full-time">Temps plein</option>
                  <option value="part-time">Temps partiel</option>
                  <option value="remote">Télétravail</option>
                  <option value="internship">Stage</option>
                  <option value="freelance">Freelance</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Catégorie</label>
                <select class="form-select" required>
                  <option value="">Sélectionner...</option>
                  <option value="it">Informatique</option>
                  <option value="marketing">Marketing</option>
                  <option value="finance">Finance</option>
                  <option value="hr">Ressources Humaines</option>
                  <option value="design">Design</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Localisation</label>
                <input type="text" class="form-control" placeholder="Ville ou 'Télétravail'">
              </div>
              <div class="col-md-6">
                <label class="form-label">Salaire (optionnel)</label>
                <input type="text" class="form-control" placeholder="Ex: 10 000 - 15 000 MAD">
              </div>
              <div class="col-12">
                <label class="form-label">Description</label>
                <textarea class="form-control" rows="5" required></textarea>
              </div>
              <div class="col-12">
                <label class="form-label">Exigences</label>
                <textarea class="form-control" rows="5" required></textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label">Date d'expiration</label>
                <input type="date" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Statut</label>
                <select class="form-select" required>
                  <option value="active">Active</option>
                  <option value="pending">En attente</option>
                  <option value="draft">Brouillon</option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary" form="offerForm">Publier l'offre</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap & Custom JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/js/adminJs/gestion-offres.js'])
</body>
</html>