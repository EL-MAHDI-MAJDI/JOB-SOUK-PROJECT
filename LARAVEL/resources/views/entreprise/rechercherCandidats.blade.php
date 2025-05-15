<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rechercher Candidats - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('storage/StyleEntreprise/rechercherCandidats.css') }}">
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoEntreprise.side-menu activePage='7' />
  </div>

  <!-- Barre de navigation supérieure -->
    <!-- Barre de navigation supérieure enrichie -->
    <nav class="top-navbar navbar navbar-expand">
     <x-compoEntreprise.navbar />
    </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- En-tête -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Rechercher des Candidats</h2>
          <p class="text-muted mb-0">Trouvez les meilleurs talents pour votre entreprise</p>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filtersModal">
          <i class="bi bi-funnel"></i> Filtres avancés
        </button>
      </div>
      
      <!-- Barre de recherche -->
      <div class="dashboard-card p-4 mb-4">
        <div class="row g-3">
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
              <input type="text" class="form-control" placeholder="Mots-clés (compétences, poste, etc.)">
            </div>
          </div>
          <div class="col-md-3">
            <select class="form-select">
              <option selected>Localisation</option>
              <option>Casablanca</option>
              <option>Rabat</option>
              <option>Marrakech</option>
              <option>Remote</option>
            </select>
          </div>
          <div class="col-md-3">
            <select class="form-select">
              <option selected>Expérience</option>
              <option>Débutant</option>
              <option>1-3 ans</option>
              <option>3-5 ans</option>
              <option>5+ ans</option>
            </select>
          </div>
        </div>
      </div>
      
      <!-- Résultats -->
      <div class="dashboard-card p-4 mb-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="fw-bold mb-0">127 candidats trouvés</h4>
          <div class="d-flex align-items-center">
            <span class="me-2">Trier par :</span>
            <select class="form-select form-select-sm w-auto">
              <option selected>Pertinence</option>
              <option>Expérience</option>
              <option>Dernière activité</option>
            </select>
          </div>
        </div>
        
        <!-- Liste des candidats -->
        <div class="list-group list-group-flush">
          <!-- Candidat 1 -->
          <div class="list-group-item list-group-item-action border-0 px-0 py-3">
            <div class="row align-items-center">
              <div class="col-auto">
                <img src="https://via.placeholder.com/80" alt="Profile" class="rounded-circle" width="80" height="80">
              </div>
              <div class="col">
                <h5 class="fw-bold mb-1">Youssef El Amrani</h5>
                <p class="text-muted mb-2"><i class="bi bi-briefcase me-2"></i>Développeur Full Stack chez TechnoSoft</p>
                <div class="mb-2">
                  <span class="badge bg-primary-light text-primary me-2">JavaScript</span>
                  <span class="badge bg-primary-light text-primary me-2">React</span>
                  <span class="badge bg-primary-light text-primary me-2">Node.js</span>
                </div>
                <div class="d-flex align-items-center">
                  <span class="me-3"><i class="bi bi-geo-alt me-1"></i> Casablanca</span>
                  <span class="me-3"><i class="bi bi-award me-1"></i> 5 ans d'expérience</span>
                  <span><i class="bi bi-mortarboard me-1"></i> Master en Informatique</span>
                </div>
              </div>
              <div class="col-auto text-end">
                <button class="btn btn-outline-primary me-2"><i class="bi bi-envelope"></i> Contacter</button>
                <button class="btn btn-primary"><i class="bi bi-eye"></i> Voir profil</button>
              </div>
            </div>
          </div>
          
          <!-- Candidat 2 -->
          <div class="list-group-item list-group-item-action border-0 px-0 py-3">
            <div class="row align-items-center">
              <div class="col-auto">
                <img src="https://via.placeholder.com/80" alt="Profile" class="rounded-circle" width="80" height="80">
              </div>
              <div class="col">
                <h5 class="fw-bold mb-1">Fatima Zahra Benali</h5>
                <p class="text-muted mb-2"><i class="bi bi-briefcase me-2"></i>UX/UI Designer chez DesignHub</p>
                <div class="mb-2">
                  <span class="badge bg-primary-light text-primary me-2">Figma</span>
                  <span class="badge bg-primary-light text-primary me-2">Adobe XD</span>
                  <span class="badge bg-primary-light text-primary me-2">User Research</span>
                </div>
                <div class="d-flex align-items-center">
                  <span class="me-3"><i class="bi bi-geo-alt me-1"></i> Rabat</span>
                  <span class="me-3"><i class="bi bi-award me-1"></i> 3 ans d'expérience</span>
                  <span><i class="bi bi-mortarboard me-1"></i> Licence en Design</span>
                </div>
              </div>
              <div class="col-auto text-end">
                <button class="btn btn-outline-primary me-2"><i class="bi bi-envelope"></i> Contacter</button>
                <button class="btn btn-primary"><i class="bi bi-eye"></i> Voir profil</button>
              </div>
            </div>
          </div>
          
          <!-- Candidat 3 -->
          <div class="list-group-item list-group-item-action border-0 px-0 py-3">
            <div class="row align-items-center">
              <div class="col-auto">
                <img src="https://via.placeholder.com/80" alt="Profile" class="rounded-circle" width="80" height="80">
              </div>
              <div class="col">
                <h5 class="fw-bold mb-1">Mehdi Kabbaj</h5>
                <p class="text-muted mb-2"><i class="bi bi-briefcase me-2"></i>Chef de Projet IT à Freelance</p>
                <div class="mb-2">
                  <span class="badge bg-primary-light text-primary me-2">Agile</span>
                  <span class="badge bg-primary-light text-primary me-2">Scrum</span>
                  <span class="badge bg-primary-light text-primary me-2">Jira</span>
                </div>
                <div class="d-flex align-items-center">
                  <span class="me-3"><i class="bi bi-geo-alt me-1"></i> Remote</span>
                  <span class="me-3"><i class="bi bi-award me-1"></i> 7 ans d'expérience</span>
                  <span><i class="bi bi-mortarboard me-1"></i> MBA en Management</span>
                </div>
              </div>
              <div class="col-auto text-end">
                <button class="btn btn-outline-primary me-2"><i class="bi bi-envelope"></i> Contacter</button>
                <button class="btn btn-primary"><i class="bi bi-eye"></i> Voir profil</button>
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
    </div>
  </div>

  <!-- Modal Filtres Avancés -->
  <div class="modal fade" id="filtersModal" tabindex="-1" aria-labelledby="filtersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="filtersModalLabel">Filtres Avancés</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="filter-section">
                <h5>Compétences</h5>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Ajouter une compétence">
                </div>
                <div class="skills-container">
                  <span class="skill-tag">JavaScript</span>
                  <span class="skill-tag">React</span>
                  <span class="skill-tag">Node.js</span>
                  <span class="skill-tag">Python</span>
                  <span class="skill-tag">Java</span>
                  <span class="skill-tag">SQL</span>
                  <span class="skill-tag">HTML/CSS</span>
                  <span class="skill-tag">Angular</span>
                  <span class="skill-tag">Vue.js</span>
                </div>
              </div>
              
              <div class="filter-section">
                <h5>Langues</h5>
                <select class="form-select mb-2">
                  <option selected>Choisir une langue</option>
                  <option>Français</option>
                  <option>Anglais</option>
                  <option>Arabe</option>
                  <option>Espagnol</option>
                  <option>Allemand</option>
                </select>
                <select class="form-select">
                  <option selected>Niveau</option>
                  <option>Débutant</option>
                  <option>Intermédiaire</option>
                  <option>Avancé</option>
                  <option>Bilingue</option>
                </select>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="filter-section">
                <h5>Salaire attendu</h5>
                <div class="salary-inputs">
                  <input type="number" class="form-control" placeholder="Minimum">
                  <span>à</span>
                  <input type="number" class="form-control" placeholder="Maximum">
                </div>
              </div>
              
              <div class="filter-section">
                <h5>Disponibilité</h5>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="immediate">
                  <label class="form-check-label" for="immediate">
                    Disponibilité immédiate
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remote">
                  <label class="form-check-label" for="remote">
                    Télétravail possible
                  </label>
                </div>
              </div>
              
              <div class="filter-section">
                <h5>Niveau d'éducation</h5>
                <select class="form-select">
                  <option selected>Tous les niveaux</option>
                  <option>Bac</option>
                  <option>Bac+2</option>
                  <option>Licence</option>
                  <option>Master</option>
                  <option>Doctorat</option>
                </select>
              </div>
              
              <div class="filter-section">
                <h5>Type de contrat recherché</h5>
                <select class="form-select">
                  <option selected>Tous les types</option>
                  <option>CDI</option>
                  <option>CDD</option>
                  <option>Freelance</option>
                  <option>Stage</option>
                  <option>Alternance</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary">Appliquer les filtres</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <SCript src="{{ asset('storage/entrepriseJs/rechercherCandidats.js') }}"></script>
</body>
</html>