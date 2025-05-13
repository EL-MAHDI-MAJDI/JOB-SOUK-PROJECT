<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mon Profil Entreprise - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/mon-profil.css">
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <div class="d-flex flex-column h-100">
      <!-- Logo -->
      <div class="p-3 border-bottom">
        <a class="navbar-brand d-flex align-items-center" href="../../CODE PROJECT/HTML/accueil.html">
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
            <a class="nav-link active d-flex align-items-center p-3 rounded" style="color: var(--secondary) ;" href="mon-profil.html">
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
            <a class="nav-link d-flex align-items-center p-3 rounded" href="notification.html">
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
          <h2 class="fw-bold mb-1">Mon Profil Entreprise</h2>
          <p class="text-muted mb-0">Gérez les informations de votre entreprise</p>
        </div>
        <button class="btn btn-primary">
          <i class="bi bi-pencil"></i> Modifier le profil
        </button>
      </div>
      
      <!-- Section Profil -->
      <div class="dashboard-card p-4 mb-4 profile-header">
        <div class="row align-items-center">
          <div class="col-md-2 text-center position-relative">
            <img src="https://via.placeholder.com/150" alt="Logo entreprise" class="profile-picture rounded-circle mb-3">
            <div class="edit-icon">
              <i class="bi bi-camera"></i>
            </div>
          </div>
          <div class="col-md-6">
            <h3 class="fw-bold mb-1">TechnoSoft Solutions</h3>
            <p class="text-muted mb-2"><i class="bi bi-geo-alt me-2"></i>Casablanca, Maroc</p>
            <div class="mb-3">
              <span class="badge bg-primary me-2">Informatique</span>
              <span class="badge bg-secondary">50-200 employés</span>
            </div>
            <div class="d-flex">
              <a href="#" class="social-icon"><i class="bi bi-globe"></i></a>
              <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
              <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
              <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info-card p-3 bg-white rounded">
              <h6 class="fw-bold mb-3">Statistiques du profil</h6>
              <div class="mb-2 d-flex justify-content-between">
                <span>Complétude</span>
                <span>85%</span>
              </div>
              <div class="progress mb-3">
                <div class="progress-bar bg-success" role="progressbar" style="width: 85%"></div>
              </div>
              <div class="d-flex justify-content-between small">
                <div class="text-center">
                  <div class="fw-bold">24</div>
                  <div>Offres</div>
                </div>
                <div class="text-center">
                  <div class="fw-bold">156</div>
                  <div>Candidats</div>
                </div>
                <div class="text-center">
                  <div class="fw-bold">4.8</div>
                  <div>Évaluation</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Sections du profil -->
      <div class="row">
        <div class="col-lg-8">
          <!-- A propos -->
          <div class="dashboard-card p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4 class="section-title fw-bold">À propos</h4>
              <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Modifier</button>
            </div>
            <p class="mb-4">TechnoSoft Solutions est une entreprise spécialisée dans le développement de solutions logicielles innovantes pour les entreprises. Fondée en 2010, nous avons accompagné plus de 200 clients dans leur transformation digitale.</p>
            
            <div class="row">
              <div class="col-md-6 mb-3">
                <h6 class="fw-bold"><i class="bi bi-building me-2"></i> Secteur d'activité</h6>
                <p>Technologie de l'information et services</p>
              </div>
              <div class="col-md-6 mb-3">
                <h6 class="fw-bold"><i class="bi bi-people me-2"></i> Taille de l'entreprise</h6>
                <p>150 employés</p>
              </div>
              <div class="col-md-6 mb-3">
                <h6 class="fw-bold"><i class="bi bi-calendar me-2"></i> Date de création</h6>
                <p>15 Mars 2010</p>
              </div>
              <div class="col-md-6 mb-3">
                <h6 class="fw-bold"><i class="bi bi-globe me-2"></i> Site web</h6>
                <p><a href="https://www.technosoft.ma" target="_blank">www.technosoft.ma</a></p>
              </div>
            </div>
          </div>
          
          <!-- Offres récentes -->
          <div class="dashboard-card p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4 class="section-title fw-bold">Nos offres récentes</h4>
              <a href="#" class="btn btn-sm btn-outline-primary">Voir toutes</a>
            </div>
            
            <div class="list-group list-group-flush">
              <a href="#" class="list-group-item list-group-item-action border-0 px-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="fw-bold mb-1">Développeur Full Stack</h6>
                    <p class="small text-muted mb-0"><i class="bi bi-geo-alt"></i> Casablanca • <i class="bi bi-clock"></i> Publiée il y a 2 jours</p>
                  </div>
                  <span class="badge bg-success bg-opacity-10 text-success">Active</span>
                </div>
              </a>
              
              <a href="#" class="list-group-item list-group-item-action border-0 px-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="fw-bold mb-1">Chef de Projet IT</h6>
                    <p class="small text-muted mb-0"><i class="bi bi-geo-alt"></i> Rabat • <i class="bi bi-clock"></i> Publiée il y a 1 semaine</p>
                  </div>
                  <span class="badge bg-success bg-opacity-10 text-success">Active</span>
                </div>
              </a>
              
              <a href="#" class="list-group-item list-group-item-action border-0 px-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="fw-bold mb-1">Designer UI/UX</h6>
                    <p class="small text-muted mb-0"><i class="bi bi-geo-alt"></i> Remote • <i class="bi bi-clock"></i> Publiée il y a 3 semaines</p>
                  </div>
                  <span class="badge bg-secondary bg-opacity-10 text-secondary">Clôturée</span>
                </div>
              </a>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4">
          <!-- Compétences recherchées -->
          <div class="dashboard-card p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4 class="section-title fw-bold">Compétences recherchées</h4>
              <button class="btn btn-sm btn-outline-primary"><i class="bi bi-plus"></i> Ajouter</button>
            </div>
            
            <div class="mb-3">
              <span class="badge-tag"><i class="bi bi-code-slash"></i> JavaScript</span>
              <span class="badge-tag"><i class="bi bi-code-square"></i> React</span>
              <span class="badge-tag"><i class="bi bi-database"></i> Node.js</span>
              <span class="badge-tag"><i class="bi bi-layers"></i> UX Design</span>
              <span class="badge-tag"><i class="bi bi-kanban"></i> Gestion de projet</span>
              <span class="badge-tag"><i class="bi bi-cloud"></i> AWS</span>
            </div>
          </div>
          
          <!-- Galerie -->
          <div class="dashboard-card p-4">
            <h4 class="section-title fw-bold mb-3" style="color: var(--primary);">Galerie</h4>
            
            <div class="row g-2">
              <div class="col-4">
                <img src="https://via.placeholder.com/100" alt="Photo entreprise" class="img-fluid rounded">
              </div>
              <div class="col-4">
                <img src="https://via.placeholder.com/100" alt="Photo entreprise" class="img-fluid rounded">
              </div>
              <div class="col-4">
                <img src="https://via.placeholder.com/100" alt="Photo entreprise" class="img-fluid rounded">
              </div>
              <div class="col-4">
                <img src="https://via.placeholder.com/100" alt="Photo entreprise" class="img-fluid rounded">
              </div>
              <div class="col-4">
                <img src="https://via.placeholder.com/100" alt="Photo entreprise" class="img-fluid rounded">
              </div>
              <div class="col-4">
                <img src="https://via.placeholder.com/100" alt="Photo entreprise" class="img-fluid rounded">
              </div>
            </div>
            
            <button class="btn btn-outline-primary w-100 mt-3">
              <i class="bi bi-images"></i> Voir plus de photos
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/mon-profil.js"></script>
</body>
</html>