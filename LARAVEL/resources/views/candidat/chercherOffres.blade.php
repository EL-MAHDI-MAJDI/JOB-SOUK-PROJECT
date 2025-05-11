<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rechercher des offres - Job Souk</title>
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

    /* Styles spécifiques à la recherche */
    .search-hero {
      background: linear-gradient(135deg, var(--primary) 0%, #c0392b 100%);
      color: white;
      border-radius: 12px;
      padding: 2rem;
      margin-bottom: 2rem;
    }

    .job-card {
      border-left: 4px solid var(--primary);
      transition: all 0.3s ease;
      margin-bottom: 1.5rem;
    }

    .job-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .job-type {
      padding: 0.25rem 0.75rem;
      border-radius: 50px;
      font-size: 0.85rem;
      font-weight: 500;
    }

    .type-fulltime {
      background-color: #D4EDDA;
      color: #155724;
    }

    .type-parttime {
      background-color: #CCE5FF;
      color: #004085;
    }

    .type-internship {
      background-color: #FFF3CD;
      color: #856404;
    }

    .company-logo {
      width: 60px;
      height: 60px;
      object-fit: contain;
      border-radius: 8px;
      border: 1px solid #eee;
    }

    .filter-card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      padding: 1.5rem;
      margin-bottom: 1.5rem;
    }

    .save-btn {
      width: 40px;
      height: 40px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
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

    /* Bouton scroll to top */
    #scrollTop {
      position: fixed;
      bottom: 30px;
      right: 30px;
      display: none;
      z-index: 1050;
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
    .p-3 {
      height: 47px;
    }
  </style>
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoCandidat.side-menu activePage=5 />
  </div>

  <!-- Barre de navigation supérieure enrichie -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoCandidat.navbar />
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- Hero section -->
      <div class="search-hero">
        <h1 class="fw-bold mb-3">Trouvez le job de vos rêves</h1>
        <div class="row g-3">
          <div class="col-md-4">
            <input type="text" class="form-control" placeholder="Métier, mots-clés">
          </div>
          <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Lieu">
          </div>
          <div class="col-md-3">
            <select class="form-select">
              <option selected>Secteur d'activité</option>
              <option>Informatique</option>
              <option>Finance</option>
              <option>Santé</option>
              <option>Education</option>
            </select>
          </div>
          <div class="col-md-2">
            <button class="btn btn-light w-100">
              <i class="bi bi-search me-2"></i>Rechercher
            </button>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- Filtres -->
        <div class="col-md-3">
          <div class="filter-card">
            <h5 class="fw-bold mb-3">Filtrer les résultats</h5>
            
            <div class="mb-4">
              <h6 class="fw-bold mb-3">Type de contrat</h6>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="fulltime" checked>
                <label class="form-check-label" for="fulltime">
                  Temps plein
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="parttime" checked>
                <label class="form-check-label" for="parttime">
                  Temps partiel
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="internship" checked>
                <label class="form-check-label" for="internship">
                  Stage
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="freelance">
                <label class="form-check-label" for="freelance">
                  Freelance
                </label>
              </div>
            </div>
            
            <div class="mb-4">
              <h6 class="fw-bold mb-3">Salaire</h6>
              <select class="form-select mb-3">
                <option selected>Fourchette de salaire</option>
                <option>5,000 - 10,000 MAD</option>
                <option>10,000 - 15,000 MAD</option>
                <option>15,000 - 20,000 MAD</option>
                <option>20,000+ MAD</option>
              </select>
            </div>
            
            <div class="mb-4">
              <h6 class="fw-bold mb-3">Expérience</h6>
              <select class="form-select mb-3">
                <option selected>Niveau d'expérience</option>
                <option>Débutant</option>
                <option>1-3 ans</option>
                <option>3-5 ans</option>
                <option>5+ ans</option>
              </select>
            </div>
            
            <button class="btn btn-primary w-100">
              <i class="bi bi-funnel me-2"></i>Appliquer les filtres
            </button>
          </div>
        </div>
        
        <!-- Résultats -->
        <div class="col-md-9">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">124 offres disponibles</h5>
            <div>
              <span class="me-2">Trier par :</span>
              <select class="form-select d-inline-block w-auto">
                <option selected>Pertinence</option>
                <option>Date de publication</option>
                <option>Salaire (croissant)</option>
                <option>Salaire (décroissant)</option>
              </select>
            </div>
          </div>
          
          <!-- Offre 1 -->
          <div class="job-card card mb-3">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-md-1 text-center">
                  <img src="https://via.placeholder.com/60" alt="Logo" class="company-logo">
                </div>
                <div class="col-md-7">
                  <h5 class="mb-1">Développeur Full Stack Senior</h5>
                  <p class="text-muted mb-2">TechSolutions Inc. - Casablanca</p>
                  <div class="d-flex flex-wrap gap-2">
                    <span class="job-type type-fulltime">Temps plein</span>
                    <span class="text-muted"><i class="bi bi-geo-alt me-1"></i>Casablanca</span>
                    <span class="text-muted"><i class="bi bi-cash-coin me-1"></i>25,000 - 30,000 MAD/mois</span>
                    <span class="text-muted"><i class="bi bi-clock me-1"></i>Publiée il y a 2 jours</span>
                  </div>
                </div>
                <div class="col-md-4 text-end">
                  <button class="btn btn-primary me-2">Postuler</button>
                  <button class="btn btn-outline-secondary save-btn" title="Sauvegarder">
                    <i class="bi bi-bookmark"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Offre 2 -->
          <div class="job-card card mb-3">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-md-1 text-center">
                  <img src="https://via.placeholder.com/60" alt="Logo" class="company-logo">
                </div>
                <div class="col-md-7">
                  <h5 class="mb-1">Data Scientist</h5>
                  <p class="text-muted mb-2">AI Solutions - Rabat</p>
                  <div class="d-flex flex-wrap gap-2">
                    <span class="job-type type-fulltime">Temps plein</span>
                    <span class="text-muted"><i class="bi bi-geo-alt me-1"></i>Rabat</span>
                    <span class="text-muted"><i class="bi bi-cash-coin me-1"></i>22,000 - 28,000 MAD/mois</span>
                    <span class="text-muted"><i class="bi bi-clock me-1"></i>Publiée il y a 1 semaine</span>
                  </div>
                </div>
                <div class="col-md-4 text-end">
                  <button class="btn btn-primary me-2">Postuler</button>
                  <button class="btn btn-outline-secondary save-btn" title="Sauvegarder">
                    <i class="bi bi-bookmark"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Offre 3 -->
          <div class="job-card card mb-3">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-md-1 text-center">
                  <img src="https://via.placeholder.com/60" alt="Logo" class="company-logo">
                </div>
                <div class="col-md-7">
                  <h5 class="mb-1">Développeur Frontend React</h5>
                  <p class="text-muted mb-2">WebVision - Casablanca</p>
                  <div class="d-flex flex-wrap gap-2">
                    <span class="job-type type-parttime">Temps partiel</span>
                    <span class="text-muted"><i class="bi bi-geo-alt me-1"></i>Casablanca</span>
                    <span class="text-muted"><i class="bi bi-cash-coin me-1"></i>15,000 - 18,000 MAD/mois</span>
                    <span class="text-muted"><i class="bi bi-clock me-1"></i>Publiée il y a 3 jours</span>
                  </div>
                </div>
                <div class="col-md-4 text-end">
                  <button class="btn btn-primary me-2">Postuler</button>
                  <button class="btn btn-outline-secondary save-btn" title="Sauvegarder">
                    <i class="bi bi-bookmark"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Offre 4 -->
          <div class="job-card card mb-3">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-md-1 text-center">
                  <img src="https://via.placeholder.com/60" alt="Logo" class="company-logo">
                </div>
                <div class="col-md-7">
                  <h5 class="mb-1">Stagiaire en Développement</h5>
                  <p class="text-muted mb-2">DigitalLab - Rabat</p>
                  <div class="d-flex flex-wrap gap-2">
                    <span class="job-type type-internship">Stage</span>
                    <span class="text-muted"><i class="bi bi-geo-alt me-1"></i>Rabat</span>
                    <span class="text-muted"><i class="bi bi-cash-coin me-1"></i>3,000 - 5,000 MAD/mois</span>
                    <span class="text-muted"><i class="bi bi-clock me-1"></i>Publiée aujourd'hui</span>
                  </div>
                </div>
                <div class="col-md-4 text-end">
                  <button class="btn btn-primary me-2">Postuler</button>
                  <button class="btn btn-outline-secondary save-btn" title="Sauvegarder">
                    <i class="bi bi-bookmark"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Offre 5 -->
          <div class="job-card card mb-3">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-md-1 text-center">
                  <img src="https://via.placeholder.com/60" alt="Logo" class="company-logo">
                </div>
                <div class="col-md-7">
                  <h5 class="mb-1">Chef de Projet IT</h5>
                  <p class="text-muted mb-2">TechInnov - Casablanca</p>
                  <div class="d-flex flex-wrap gap-2">
                    <span class="job-type type-fulltime">Temps plein</span>
                    <span class="text-muted"><i class="bi bi-geo-alt me-1"></i>Casablanca</span>
                    <span class="text-muted"><i class="bi bi-cash-coin me-1"></i>30,000 - 35,000 MAD/mois</span>
                    <span class="text-muted"><i class="bi bi-clock me-1"></i>Publiée il y a 5 jours</span>
                  </div>
                </div>
                <div class="col-md-4 text-end">
                  <button class="btn btn-primary me-2">Postuler</button>
                  <button class="btn btn-outline-secondary save-btn" title="Sauvegarder">
                    <i class="bi bi-bookmark"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Pagination -->
          <nav aria-label="Page navigation" class="mt-4">
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

    // Toggle sidebar on mobile
    document.getElementById('menuToggle').addEventListener('click', function() {
      document.querySelector('.side-menu').classList.toggle('show');
    });

    // Sauvegarder une offre
    document.querySelectorAll('.save-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        this.classList.toggle('btn-outline-secondary');
        this.classList.toggle('btn-warning');
        const icon = this.querySelector('i');
        icon.classList.toggle('bi-bookmark');
        icon.classList.toggle('bi-bookmark-fill');
      });
    });

    // Filtres
    document.querySelectorAll('.form-check-input').forEach(checkbox => {
      checkbox.addEventListener('change', function() {
        console.log('Filtre appliqué:', this.id);
      });
    });
  </script>
</body>
</html>