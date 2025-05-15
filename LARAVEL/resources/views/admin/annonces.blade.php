<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Annonces - Admin JobSouk</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('storage/StyleAdmin/annonces.css') }}">

</head>
<body>
  <!-- Sidebar Menu -->
  <div class="side-menu">
    <x-compoAdmin.side-menu activePage='8' />
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
          <h2 class="fw-bold mb-1">Gestion des Annonces</h2>
          <p class="text-muted mb-0">Créez et gérez les annonces du site</p>
        </div>
        <div>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAnnouncementModal">
            <i class="bi bi-plus me-1"></i> Nouvelle annonce
          </button>
        </div>
      </div>

      <!-- Filters Card -->
      <div class="dashboard-card p-4 mb-4">
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label">Statut</label>
            <select class="form-select" id="statusFilter">
              <option value="all">Tous statuts</option>
              <option value="active">Actif</option>
              <option value="inactive">Inactif</option>
              <option value="scheduled">Planifié</option>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label">Type</label>
            <select class="form-select" id="typeFilter">
              <option value="all">Tous types</option>
              <option value="general">Générale</option>
              <option value="promotion">Promotion</option>
              <option value="alert">Alerte</option>
              <option value="update">Mise à jour</option>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label">Recherche</label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Titre, contenu..." id="searchInput">
              <button class="btn btn-outline-secondary" type="button" id="searchButton">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Announcements List -->
      <div class="row">
        <!-- Announcement 1 - Pinned -->
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="announcement-card dashboard-card p-4 pinned">
            <div class="d-flex justify-content-between align-items-start mb-3">
              <span class="badge bg-warning"><i class="bi bi-pin-angle-fill me-1"></i> Épinglé</span>
              <div class="dropdown">
                <button class="btn btn-sm" data-bs-toggle="dropdown">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editAnnouncementModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
                </ul>
              </div>
            </div>
            <h5 class="fw-bold mb-2">Nouvelle fonctionnalité : Messagerie instantanée</h5>
            <p class="text-muted small mb-3">Publié le 15/06/2023 - Jusqu'au 30/06/2023</p>
            <p class="mb-3">Nous avons le plaisir de vous annoncer le lancement de notre nouvelle messagerie instantanée entre recruteurs et candidats.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="badge bg-primary">Mise à jour</span>
              <span class="badge bg-success">Actif</span>
            </div>
          </div>
        </div>

        <!-- Announcement 2 - Important -->
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="announcement-card dashboard-card p-4 important">
            <div class="d-flex justify-content-between align-items-start mb-3">
              <span class="badge bg-danger"><i class="bi bi-exclamation-triangle-fill me-1"></i> Important</span>
              <div class="dropdown">
                <button class="btn btn-sm" data-bs-toggle="dropdown">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editAnnouncementModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
                </ul>
              </div>
            </div>
            <h5 class="fw-bold mb-2">Maintenance planifiée</h5>
            <p class="text-muted small mb-3">Publié le 10/06/2023 - Jusqu'au 12/06/2023</p>
            <p class="mb-3">Une maintenance est prévue le 12 juin entre 2h et 5h du matin. Le service pourrait être indisponible pendant cette période.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="badge bg-secondary">Alerte</span>
              <span class="badge bg-success">Actif</span>
            </div>
          </div>
        </div>

        <!-- Announcement 3 - With Image -->
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="announcement-card dashboard-card p-4">
            <div class="dropdown float-end">
              <button class="btn btn-sm" data-bs-toggle="dropdown">
                <i class="bi bi-three-dots-vertical"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editAnnouncementModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
              </ul>
            </div>
            <img src="../../image/job souk.png" alt="Promotion" class="announcement-image w-100 mb-3">
            <h5 class="fw-bold mb-2">Offre spéciale pour les entreprises</h5>
            <p class="text-muted small mb-3">Publié le 05/06/2023 - Jusqu'au 20/06/2023</p>
            <p class="mb-3">Profitez de 20% de réduction sur tous nos forfaits entreprise jusqu'au 20 juin.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="badge bg-warning">Promotion</span>
              <span class="badge bg-success">Actif</span>
            </div>
          </div>
        </div>

        <!-- Announcement 4 - Scheduled -->
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="announcement-card dashboard-card p-4">
            <div class="dropdown float-end">
              <button class="btn btn-sm" data-bs-toggle="dropdown">
                <i class="bi bi-three-dots-vertical"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editAnnouncementModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
              </ul>
            </div>
            <h5 class="fw-bold mb-2">Nouveau design en approche</h5>
            <p class="text-muted small mb-3">Publié le 01/06/2023 - Jusqu'au 30/06/2023</p>
            <p class="mb-3">Découvrez notre nouveau design plus moderne et intuitif à partir du 25 juin.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="badge bg-info">Générale</span>
              <span class="badge bg-secondary">Planifié</span>
            </div>
          </div>
        </div>

        <!-- Announcement 5 - Inactive -->
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="announcement-card dashboard-card p-4">
            <div class="dropdown float-end">
              <button class="btn btn-sm" data-bs-toggle="dropdown">
                <i class="bi bi-three-dots-vertical"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editAnnouncementModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-success" href="#"><i class="bi bi-check-circle me-2"></i>Activer</a></li>
                <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
              </ul>
            </div>
            <h5 class="fw-bold mb-2">Concours de CV</h5>
            <p class="text-muted small mb-3">Publié le 20/05/2023 - Jusqu'au 31/05/2023</p>
            <p class="mb-3">Participez à notre concours du meilleur CV et gagnez un accompagnement personnalisé.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="badge bg-success">Promotion</span>
              <span class="badge bg-danger">Inactif</span>
            </div>
          </div>
        </div>

        <!-- Announcement 6 - General -->
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="announcement-card dashboard-card p-4">
            <div class="dropdown float-end">
              <button class="btn btn-sm" data-bs-toggle="dropdown">
                <i class="bi bi-three-dots-vertical"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editAnnouncementModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
              </ul>
            </div>
            <h5 class="fw-bold mb-2">Nouvelles catégories disponibles</h5>
            <p class="text-muted small mb-3">Publié le 15/05/2023 - Jusqu'au 30/06/2023</p>
            <p class="mb-3">Nous avons ajouté 5 nouvelles catégories d'emploi pour mieux classer vos offres.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="badge bg-info">Générale</span>
              <span class="badge bg-success">Actif</span>
            </div>
          </div>
        </div>
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

  <!-- Add Announcement Modal -->
  <div class="modal fade" id="addAnnouncementModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Créer une nouvelle annonce</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="announcementForm">
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Titre</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Type</label>
                <select class="form-select" required>
                  <option value="">Sélectionner un type...</option>
                  <option value="general">Générale</option>
                  <option value="promotion">Promotion</option>
                  <option value="alert">Alerte</option>
                  <option value="update">Mise à jour</option>
                </select>
              </div>
            </div>
            
            <div class="mb-3">
              <label class="form-label">Contenu</label>
              <textarea class="form-control" rows="5" required></textarea>
            </div>
            
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Date de publication</label>
                <input type="datetime-local" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Date d'expiration</label>
                <input type="datetime-local" class="form-control">
              </div>
            </div>
            
            <div class="mb-3">
              <label class="form-label">Image (optionnel)</label>
              <input type="file" class="form-control" accept="image/*">
            </div>
            
            <div class="mb-3">
              <label class="form-label">Options</label>
              <div class="border p-3 rounded">
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="isPinned">
                  <label class="form-check-label" for="isPinned">Épingler cette annonce</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="isImportant">
                  <label class="form-check-label" for="isImportant">Marquer comme important</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="sendNotification" checked>
                  <label class="form-check-label" for="sendNotification">Envoyer une notification aux utilisateurs</label>
                </div>
              </div>
            </div>
            
            <div class="mb-3">
              <label class="form-label">Public cible</label>
              <div class="border p-3 rounded">
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="targetAll" checked>
                  <label class="form-check-label" for="targetAll">Tous les utilisateurs</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="targetCandidates">
                  <label class="form-check-label" for="targetCandidates">Candidats seulement</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="targetEmployers">
                  <label class="form-check-label" for="targetEmployers">Employeurs seulement</label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary" form="announcementForm">Publier l'annonce</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Announcement Modal -->
  <div class="modal fade" id="editAnnouncementModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modifier l'annonce</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editAnnouncementForm">
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Titre</label>
                <input type="text" class="form-control" value="Nouvelle fonctionnalité : Messagerie instantanée" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Type</label>
                <select class="form-select" required>
                  <option value="update" selected>Mise à jour</option>
                  <option value="general">Générale</option>
                  <option value="promotion">Promotion</option>
                  <option value="alert">Alerte</option>
                </select>
              </div>
            </div>
            
            <div class="mb-3">
              <label class="form-label">Contenu</label>
              <textarea class="form-control" rows="5" required>Nous avons le plaisir de vous annoncer le lancement de notre nouvelle messagerie instantanée entre recruteurs et candidats.</textarea>
            </div>
            
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Date de publication</label>
                <input type="datetime-local" class="form-control" value="2023-06-15T00:00" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Date d'expiration</label>
                <input type="datetime-local" class="form-control" value="2023-06-30T23:59">
              </div>
            </div>
            
            <div class="mb-3">
              <label class="form-label">Image (optionnel)</label>
              <input type="file" class="form-control" accept="image/*">
              <div class="form-text">Laissez vide pour conserver l'image actuelle</div>
            </div>
            
            <div class="mb-3">
              <label class="form-label">Options</label>
              <div class="border p-3 rounded">
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="editIsPinned" checked>
                  <label class="form-check-label" for="editIsPinned">Épingler cette annonce</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="editIsImportant">
                  <label class="form-check-label" for="editIsImportant">Marquer comme important</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="editSendNotification">
                  <label class="form-check-label" for="editSendNotification">Envoyer une notification aux utilisateurs</label>
                </div>
              </div>
            </div>
            
            <div class="mb-3">
              <label class="form-label">Statut</label>
              <select class="form-select" required>
                <option value="active" selected>Actif</option>
                <option value="inactive">Inactif</option>
                <option value="scheduled">Planifié</option>
              </select>
            </div>
            
            <div class="mb-3">
              <label class="form-label">Public cible</label>
              <div class="border p-3 rounded">
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="editTargetAll" checked>
                  <label class="form-check-label" for="editTargetAll">Tous les utilisateurs</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="editTargetCandidates">
                  <label class="form-check-label" for="editTargetCandidates">Candidats seulement</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="editTargetEmployers">
                  <label class="form-check-label" for="editTargetEmployers">Employeurs seulement</label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary" form="editAnnouncementForm">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap & Custom JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('storage/adminJs/annonces.js') }}"></script>
</body>
</html>