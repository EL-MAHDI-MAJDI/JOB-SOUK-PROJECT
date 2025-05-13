<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notifications - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" as="style"> 
  <link rel="stylesheet" href="../css/notification.css">
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <div class="d-flex flex-column h-100">
      <!-- Logo -->
      <div class="p-3 border-bottom">
        <a class="navbar-brand d-flex align-items-center" href="dashboard.html">
            <img src="../../image/job souk.png" alt="Logo de site web" width="35" height="35" class="me-2">
            <span class="fw-bold" style="color: #E74C3C;">Job Souk</span>
        </a>
      </div>
      
      <!-- Navigation -->
      <div class="flex-grow-1 p-3">
        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded" href="dashboard.html">
              <i class="bi bi-speedometer2 me-3"></i>Tableau de bord
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded" href="mon-profil.html">
              <i class="bi bi-person me-3"></i> Mon profil
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded" href="offres-emploi.html">
              <i class="bi bi-briefcase me-3"></i> Offres d'emploi
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded" href="evaluer-candidat.html">
              <i class="bi bi-person-check me-3"></i> Évaluer Candidats
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded" href="messages.html">
              <i class="bi bi-envelope me-3"></i> Messages
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded" href="entretiens.html">
              <i class="bi bi-calendar me-3"></i> Entretiens
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded" href="rechercher-candidats.html">
              <i class="bi bi-search me-3"></i> Rechercher candidats
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link active d-flex align-items-center p-3 rounded" style="color: var(--secondary);" href="notification.html">
              <i class="bi bi-bell me-3"></i> Notifications
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded" href="parametres.html">
              <i class="bi bi-gear me-3"></i> Parametres
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Barre de navigation supérieure enrichie -->
  <nav class="top-navbar navbar navbar-expand">
    <div class="container-fluid">
      <button class="btn d-lg-none me-2" id="menuToggle" aria-label="Menu">
        <i class="bi bi-list"></i>
      </button>
      
      <!-- Barre de recherche -->
      <div class="position-relative">
        <i class="bi bi-search nav-search-icon"></i>
        <input type="text" class="form-control nav-search" placeholder="Rechercher des offres, candidats...">
      </div>
      
      <div class="d-flex align-items-center ms-auto">
        <!-- Menu rapide -->
        <!-- <div class="dropdown me-3">
          <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
            <i class="bi bi-lightning-charge me-1"></i> Actions rapides
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#"><i class="bi bi-plus-circle me-2"></i>Créer une offre</a></li>
            <li><a class="dropdown-item" href="rechercher-candidats.html"><i class="bi bi-search me-2"></i>Rechercher candidats</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-plus me-2"></i>Planifier entretien</a></li>
          </ul>
        </div> -->
        
        <!-- Notifications -->
        <div class="dropdown me-3">
          <button class="btn position-relative" type="button" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end p-2" style="width: 300px;">
            <li class="mb-2">
              <a href="#" class="d-flex align-items-center p-2 rounded">
                <div class="bg-primary bg-opacity-10 p-2 rounded me-2">
                  <i class="bi bi-person-check text-primary"></i>
                </div>
                <div>
                  <p class="mb-0 small fw-bold">Nouvelle candidature</p>
                  <p class="mb-0 small text-muted">Pour Développeur Front-end</p>
                </div>
              </a>
            </li>
            <li class="mb-2">
              <a href="#" class="d-flex align-items-center p-2 rounded">
                <div class="bg-success bg-opacity-10 p-2 rounded me-2">
                  <i class="bi bi-calendar-event text-success"></i>
                </div>
                <div>
                  <p class="mb-0 small fw-bold">Entretien demain</p>
                  <p class="mb-0 small text-muted">Avec Y. Benali à 14h</p>
                </div>
              </a>
            </li>
            <li>
              <a href="#" class="d-flex align-items-center p-2 rounded">
                <div class="bg-info bg-opacity-10 p-2 rounded me-2">
                  <i class="bi bi-envelope text-info"></i>
                </div>
                <div>
                  <p class="mb-0 small fw-bold">Message non lu</p>
                  <p class="mb-0 small text-muted">De Société XYZ</p>
                </div>
              </a>
            </li>
            <li><hr class="dropdown-divider my-2">
              <a href="notification.html" class="d-flex align-items-center justify-content-center p-2 rounded btn btn-primary text-center">
                Toutes les notifications
              </a>
            </li>
          </ul>
        </div>
        
        <!-- Profil utilisateur -->
        <div class="dropdown">
          <button class="btn dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
            <img src="https://via.placeholder.com/32" alt="Profile" class="rounded-circle me-2" width="32" height="32">
            <span class="d-none d-md-inline">Mon compte</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Paramètres</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i>Déconnexion</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- En-tête -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Notifications</h2>
          <p class="text-muted mb-0">Toutes vos notifications en un seul endroit</p>
        </div>
        <div>
          <button class="btn btn-outline-secondary me-2">
            <i class="bi bi-check-all"></i> Tout marquer comme lu
          </button>
          <button class="btn btn-outline-danger">
            <i class="bi bi-trash"></i> Tout supprimer
          </button>
        </div>
      </div>
      
      <!-- Filtres -->
      <div class="dashboard-card p-3 mb-4">
        <div class="row">
          <div class="col-md-3 mb-2 mb-md-0">
            <select class="form-select">
              <option selected>Tous les types</option>
              <option>Candidatures</option>
              <option>Entretiens</option>
              <option>Messages</option>
              <option>Offres</option>
            </select>
          </div>
          <div class="col-md-3 mb-2 mb-md-0">
            <select class="form-select">
              <option selected>Tous les statuts</option>
              <option>Non lues</option>
              <option>Lues</option>
            </select>
          </div>
          <div class="col-md-3 mb-2 mb-md-0">
            <select class="form-select">
              <option selected>Toutes les dates</option>
              <option>Aujourd'hui</option>
              <option>Cette semaine</option>
              <option>Ce mois</option>
            </select>
          </div>
          <div class="col-md-3">
            <button class="btn btn-primary w-100">
              <i class="bi bi-funnel"></i> Filtrer
            </button>
          </div>
        </div>
      </div>
      
      <!-- Liste des notifications -->
      <div class="dashboard-card p-0">
        <!-- Notification non lue -->
        <div class="notification-item unread">
          <div class="d-flex justify-content-between align-items-start">
            <div class="d-flex">
              <div class="me-3">
                <div class="bg-primary bg-opacity-10 p-2 rounded">
                  <i class="bi bi-person-check text-primary"></i>
                </div>
              </div>
              <div>
                <h5 class="mb-1 fw-bold">Nouvelle candidature reçue</h5>
                <p class="mb-1">Youssef Benali a postulé pour le poste de Développeur Front-end</p>
                <span class="notification-time"><span class="notification-badge"></span>Il y a 2 heures</span>
              </div>
            </div>
            <div class="notification-actions">
              <button class="btn btn-sm btn-outline-secondary me-1" title="Marquer comme lu">
                <i class="bi bi-check"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger" title="Supprimer">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Notification non lue -->
        <div class="notification-item unread">
          <div class="d-flex justify-content-between align-items-start">
            <div class="d-flex">
              <div class="me-3">
                <div class="bg-success bg-opacity-10 p-2 rounded">
                  <i class="bi bi-calendar-event text-success"></i>
                </div>
              </div>
              <div>
                <h5 class="mb-1 fw-bold">Rappel d'entretien</h5>
                <p class="mb-1">Entretien avec Amina Zari prévu demain à 10h00 (en ligne)</p>
                <span class="notification-time"><span class="notification-badge"></span>Il y a 5 heures</span>
              </div>
            </div>
            <div class="notification-actions">
              <button class="btn btn-sm btn-outline-secondary me-1" title="Marquer comme lu">
                <i class="bi bi-check"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger" title="Supprimer">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Notification lue -->
        <div class="notification-item">
          <div class="d-flex justify-content-between align-items-start">
            <div class="d-flex">
              <div class="me-3">
                <div class="bg-info bg-opacity-10 p-2 rounded">
                  <i class="bi bi-envelope text-info"></i>
                </div>
              </div>
              <div>
                <h5 class="mb-1 fw-bold">Nouveau message</h5>
                <p class="mb-1">Vous avez reçu un message de la part de Société XYZ</p>
                <span class="notification-time">Hier, 14:30</span>
              </div>
            </div>
            <div class="notification-actions">
              <button class="btn btn-sm btn-outline-secondary me-1" title="Marquer comme non lu">
                <i class="bi bi-envelope"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger" title="Supprimer">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Notification lue -->
        <div class="notification-item">
          <div class="d-flex justify-content-between align-items-start">
            <div class="d-flex">
              <div class="me-3">
                <div class="bg-warning bg-opacity-10 p-2 rounded">
                  <i class="bi bi-briefcase text-warning"></i>
                </div>
              </div>
              <div>
                <h5 class="mb-1 fw-bold">Offre expirée</h5>
                <p class="mb-1">Votre offre pour "Développeur Back-end Senior" a expiré</p>
                <span class="notification-time">Hier, 09:15</span>
              </div>
            </div>
            <div class="notification-actions">
              <button class="btn btn-sm btn-outline-secondary me-1" title="Marquer comme non lu">
                <i class="bi bi-envelope"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger" title="Supprimer">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Notification lue -->
        <div class="notification-item">
          <div class="d-flex justify-content-between align-items-start">
            <div class="d-flex">
              <div class="me-3">
                <div class="bg-secondary bg-opacity-10 p-2 rounded">
                  <i class="bi bi-person-plus text-secondary"></i>
                </div>
              </div>
              <div>
                <h5 class="mb-1 fw-bold">Nouveau candidat intéressant</h5>
                <p class="mb-1">Leila Nassiri correspond à 92% avec votre recherche</p>
                <span class="notification-time">Lundi, 16:45</span>
              </div>
            </div>
            <div class="notification-actions">
              <button class="btn btn-sm btn-outline-secondary me-1" title="Marquer comme non lu">
                <i class="bi bi-envelope"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger" title="Supprimer">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Notification lue -->
        <div class="notification-item">
          <div class="d-flex justify-content-between align-items-start">
            <div class="d-flex">
              <div class="me-3">
                <div class="bg-danger bg-opacity-10 p-2 rounded">
                  <i class="bi bi-exclamation-triangle text-danger"></i>
                </div>
              </div>
              <div>
                <h5 class="mb-1 fw-bold">Action requise</h5>
                <p class="mb-1">Veuillez mettre à jour vos informations de paiement</p>
                <span class="notification-time">Lundi, 10:20</span>
              </div>
            </div>
            <div class="notification-actions">
              <button class="btn btn-sm btn-outline-secondary me-1" title="Marquer comme non lu">
                <i class="bi bi-envelope"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger" title="Supprimer">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Pagination -->
      <nav class="mt-4">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précédent</a>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/notification.js"></script>
</body>
</html>