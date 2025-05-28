<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Offres d'emploi - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  @vite(['resources/css/StyleEntreprise/offres-emploi.css'])  
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
        <x-compoEntreprise.side-menu activePage='3' />
  </div>

  <!-- Barre de navigation supérieure -->
  <nav class="top-navbar navbar navbar-expand">
        <x-compoEntreprise.navbar />
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- En-tête -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Offres d'emploi</h2>
          <p class="text-muted mb-0">Gérez vos offres d'emploi publiées</p>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#publishOfferModal">
          <i class="bi bi-plus-lg"></i> Publier une offre
        </button>
      </div>
      
      <!-- Filtres -->
      <div class="dashboard-card p-4 mb-4">
        <div class="row g-3">
          <div class="col-md-3">
            <label class="form-label">Statut</label>
            <select class="form-select">
              <option selected>Toutes les offres</option>
              <option>Actives</option>
              <option>Clôturées</option>
              <option>Brouillons</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Localisation</label>
            <select class="form-select">
              <option selected>Toutes</option>
              <option>Casablanca</option>
              <option>Rabat</option>
              <option>Marrakech</option>
              <option>Remote</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Type de contrat</label>
            <select class="form-select">
              <option selected>Tous</option>
              <option>CDI</option>
              <option>CDD</option>
              <option>Freelance</option>
              <option>Stage</option>
            </select>
          </div>
          <div class="col-md-3 d-flex align-items-end">
            <button class="btn btn-outline-secondary w-100">
              <i class="bi bi-funnel"></i> Filtrer
            </button>
          </div>
        </div>
      </div>
      
      <!-- Statistiques -->
      <div class="row mb-4">
        <div class="col-md-3">
          <div class="dashboard-card p-3 text-center">
            <h3 class="fw-bold mb-1" style="color: var(--primary);">12</h3>
            <p class="text-muted mb-0">Offres actives</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-card p-3 text-center">
            <h3 class="fw-bold mb-1" style="color: var(--secondary);">156</h3>
            <p class="text-muted mb-0">Candidatures</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-card p-3 text-center">
            <h3 class="fw-bold mb-1" style="color: var(--accent);">24</h3>
            <p class="text-muted mb-0">Entretiens</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-card p-3 text-center">
            <h3 class="fw-bold mb-1" style="color: #3498db;">8</h3>
            <p class="text-muted mb-0">Offres clôturées</p>
          </div>
        </div>
      </div>
      
      <!-- Liste des offres -->
      <div class="dashboard-card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="section-title fw-bold">Vos offres d'emploi</h4>
          <div class="d-flex">
            <div class="input-group me-2" style="width: 250px;">
              <span class="input-group-text"><i class="bi bi-search"></i></span>
              <input type="text" class="form-control" placeholder="Rechercher...">
            </div>
            <button class="btn btn-outline-secondary">
              <i class="bi bi-sort-down"></i> Trier
            </button>
          </div>
        </div>
        
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead>
              <tr>
                <th>Poste</th>
                <th>Candidats</th>
                <th>Localisation</th>
                <th>Type</th>
                <th>Statut</th>
                <th>Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/40" alt="Logo" class="rounded-circle me-3" width="40" height="40">
                    <div>
                      <h6 class="fw-bold mb-0">Développeur Full Stack</h6>
                      <small class="text-muted">TechnoSoft Solutions</small>
                    </div>
                  </div>
                </td>
                <td>
                  <span class="badge bg-primary bg-opacity-10 text-primary">24 candidats</span>
                </td>
                <td>Casablanca</td>
                <td>CDI</td>
                <td><span class="badge bg-success bg-opacity-10 text-success">Active</span></td>
                <td>15/06/2023</td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-sm" type="button" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-people me-2"></i>Candidats</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
              
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/40" alt="Logo" class="rounded-circle me-3" width="40" height="40">
                    <div>
                      <h6 class="fw-bold mb-0">Chef de Projet IT</h6>
                      <small class="text-muted">TechnoSoft Solutions</small>
                    </div>
                  </div>
                </td>
                <td>
                  <span class="badge bg-primary bg-opacity-10 text-primary">18 candidats</span>
                </td>
                <td>Rabat</td>
                <td>CDI</td>
                <td><span class="badge bg-success bg-opacity-10 text-success">Active</span></td>
                <td>10/06/2023</td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-sm" type="button" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-people me-2"></i>Candidats</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
              
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/40" alt="Logo" class="rounded-circle me-3" width="40" height="40">
                    <div>
                      <h6 class="fw-bold mb-0">Designer UI/UX</h6>
                      <small class="text-muted">TechnoSoft Solutions</small>
                    </div>
                  </div>
                </td>
                <td>
                  <span class="badge bg-primary bg-opacity-10 text-primary">32 candidats</span>
                </td>
                <td>Remote</td>
                <td>CDD</td>
                <td><span class="badge bg-secondary bg-opacity-10 text-secondary">Clôturée</span></td>
                <td>25/05/2023</td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-sm" type="button" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-people me-2"></i>Candidats</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
              
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/40" alt="Logo" class="rounded-circle me-3" width="40" height="40">
                    <div>
                      <h6 class="fw-bold mb-0">Data Scientist</h6>
                      <small class="text-muted">TechnoSoft Solutions</small>
                    </div>
                  </div>
                </td>
                <td>
                  <span class="badge bg-primary bg-opacity-10 text-primary">12 candidats</span>
                </td>
                <td>Casablanca</td>
                <td>CDI</td>
                <td><span class="badge bg-warning bg-opacity-10 text-warning">Brouillon</span></td>
                <td>05/06/2023</td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-sm" type="button" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Voir</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-people me-2"></i>Candidats</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Publier une offre -->
  <div class="modal fade" id="publishOfferModal" tabindex="-1" aria-labelledby="publishOfferModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="publishOfferModalLabel">Publier une nouvelle offre d'emploi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="jobTitle" class="form-label">Intitulé du poste*</label>
                <input type="text" class="form-control" id="jobTitle" placeholder="Ex: Développeur Full Stack" required>
              </div>
              <div class="col-md-6">
                <label for="jobType" class="form-label">Type de contrat*</label>
                <select class="form-select" id="jobType" required>
                  <option value="" selected disabled>Sélectionner</option>
                  <option>CDI</option>
                  <option>CDD</option>
                  <option>Freelance</option>
                  <option>Stage</option>
                  <option>Alternance</option>
                </select>
              </div>
            </div>
            

            
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="salaryRange" class="form-label">Salaire (optionnel)</label>
                <input type="text" class="form-control" id="salaryRange" placeholder="Ex: 15 000 - 20 000 MAD">
              </div>
              <div class="col-md-6">
                <label for="experienceLevel" class="form-label">Niveau d'expérience*</label>
                <select class="form-select" id="experienceLevel" required>
                  <option value="" selected disabled>Sélectionner</option>
                  <option>Débutant (0-2 ans)</option>
                  <option>Intermédiaire (2-5 ans)</option>
                  <option>Confirmé (5-10 ans)</option>
                  <option>Senior (+10 ans)</option>
                </select>
              </div>
            </div>
            
            <div class="mb-3">
              <label for="jobDescription" class="form-label">Description du poste*</label>
              <textarea class="form-control" id="jobDescription" rows="5" placeholder="Décrivez en détail les missions et responsabilités du poste..." required></textarea>
            </div>
            
            <div class="mb-3">
              <label for="jobRequirements" class="form-label">Compétences requises*</label>
              <textarea class="form-control" id="jobRequirements" rows="3" placeholder="Listez les compétences et qualifications nécessaires..." required></textarea>
              <div class="form-text">Séparez les compétences par des virgules</div>
            </div>
            
            <div class="mb-3">
              <label for="jobBenefits" class="form-label">Avantages (optionnel)</label>
              <textarea class="form-control" id="jobBenefits" rows="2" placeholder="Listez les avantages proposés..."></textarea>
            </div>
            
            <div class="row mb-4">
              <div class="col-md-6">
                <label for="applicationDeadline" class="form-label">Date limite de candidature</label>
                <input type="date" class="form-control" id="applicationDeadline">
              </div>
              <div class="col-md-6">
                <label for="jobStatus" class="form-label">Statut de publication</label>
                <select class="form-select" id="jobStatus">
                  <option value="active" selected>Publier immédiatement</option>
                  <option value="draft">Enregistrer comme brouillon</option>
                </select>
              </div>
            </div>
            
            <div class="border-top pt-3 mb-3">
              <h6 class="fw-bold">Informations supplémentaires</h6>
              <div class="row">
                <div class="col-md-6">
                  <label for="contactEmail" class="form-label">Email de contact*</label>
                  <input type="email" class="form-control" id="contactEmail" placeholder="contact@entreprise.com" required>
                </div>
                <div class="col-md-6">
                  <label for="contactPhone" class="form-label">Téléphone (optionnel)</label>
                  <input type="tel" class="form-control" id="contactPhone" placeholder="06 12 34 56 78">
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary">Publier l'offre</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/js/entrepriseJs/offresEmploi.js'])
</body>
</html>