<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mon Profil Entreprise - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  @vite(['resources/css/StyleEntreprise/monProfil.css'])
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoEntreprise.side-menu activePage='2' :entreprise="$entreprise" />
  </div>

  <!-- Barre de navigation supérieure enrichie -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoEntreprise.navbar :entreprise="$entreprise"/>
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
      </div>
      
      <!-- Section Profil -->
      <div class="dashboard-card p-4 mb-4 profile-header">
        <div class="row align-items-center">
          <div class="col-md-2 text-center position-relative">
            <div style="position:relative; display:inline-block;">
              <img id="logoPreview" src="{{asset('storage/'.$entreprise->logo)}}" alt="Logo entreprise" class="profile-picture rounded-circle mb-3" style="object-fit:cover;">
              <input type="file" id="logoInput" accept=".png,.jpg,.jpeg,.svg" style="display:none;">
              <button id="changeLogoBtn" class="btn btn-sm btn-outline-primary me-2" type="button">Changer</button>
              <button id="removeLogoBtn" class="btn btn-sm btn-outline-secondary" type="button">Supprimer</button>
            </div>
          </div>
          <div class="col-md-6">
            <h3 class="fw-bold mb-1">{{ $entreprise->nomEntreprise}}</h3>
            <p class="text-muted mb-2"><i class="bi bi-geo-alt me-2"></i>{{ $entreprise->ville}}, Maroc</p>
            <div class="mb-3">
              <span class="badge bg-primary me-2">{{$entreprise->SecteurActivite}}</span>
              <span class="badge bg-secondary">{{$entreprise->tailleEntreprise}} employés</span>
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
              <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editAproposModal"><i class="bi bi-pencil"></i> Modifier</button>
            </div>
            <p class="mb-4">___{{$entreprise->description}}</p>
            <div class="row">
              <div class="col-md-6 mb-3">
                <h6 class="fw-bold"><i class="bi bi-building me-2"></i> Secteur d'activité</h6>
                <p>{{$entreprise->SecteurActivite}}</p>
              </div>
              <div class="col-md-6 mb-3">
                <h6 class="fw-bold"><i class="bi bi-people me-2"></i> Taille de l'entreprise</h6>
                <p>{{$entreprise->tailleEntreprise}}</p>
              </div>
              <div class="col-md-6 mb-3">
                <h6 class="fw-bold"><i class="bi bi-calendar me-2"></i> Date de création</h6>
                <p>{{$entreprise->dateCreation}}</p>
              </div>
              <div class="col-md-6 mb-3">
                <h6 class="fw-bold"><i class="bi bi-globe me-2"></i> Site web</h6>
                <p><a href="{{$entreprise->siteWeb}}" target="_blank">{{$entreprise->siteWeb}}</a></p>
              </div>
            </div>
          </div>
          <!-- Modal Modification À propos -->
          <div class="modal fade" id="editAproposModal" tabindex="-1" aria-labelledby="editAproposModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <form method="POST" action="{{-- route('entreprise.updateApropos', $entreprise->id) --}}">
                @csrf
                @method('PUT')
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editAproposModalLabel">Modifier À propos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="descriptionEdit" class="form-label">Description</label>
                      <textarea class="form-control" id="descriptionEdit" name="description" rows="4">{{ $entreprise->description }}</textarea>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="secteurEdit" class="form-label">Secteur d'activité*</label>
                        <select class="form-select" id="secteurEdit" name="SecteurActivite" required>
                          <option value="">Sélectionnez un secteur</option>
                          <option value="Technologie" {{ $entreprise->SecteurActivite == 'Technologie' ? 'selected' : '' }}>Technologie</option>
                          <option value="Finance" {{ $entreprise->SecteurActivite == 'Finance' ? 'selected' : '' }}>Finance</option>
                          <option value="Santé" {{ $entreprise->SecteurActivite == 'Santé' ? 'selected' : '' }}>Santé</option>
                          <option value="Éducation" {{ $entreprise->SecteurActivite == 'Éducation' ? 'selected' : '' }}>Éducation</option>
                          <option value="Industrie" {{ $entreprise->SecteurActivite == 'Industrie' ? 'selected' : '' }}>Industrie</option>
                          <option value="Commerce" {{ $entreprise->SecteurActivite == 'Commerce' ? 'selected' : '' }}>Commerce</option>
                          <option value="autre" {{ !in_array($entreprise->SecteurActivite, ['Technologie','Finance','Santé','Éducation','Industrie','Commerce','']) ? 'selected' : '' }}>Autre</option>
                        </select>
                        <div id="autreSecteurContainerEdit" class="mt-2" style="display:none;">
                          <input type="text" class="form-control" id="autreSecteurEdit" placeholder="Veuillez préciser votre secteur d'activité" value="{{ !in_array($entreprise->SecteurActivite, ['Technologie','Finance','Santé','Éducation','Industrie','Commerce','']) ? $entreprise->SecteurActivite : '' }}">
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="tailleEdit" class="form-label">Taille de l'entreprise*</label>
                        <select class="form-select" id="tailleEdit" name="tailleEntreprise" required>
                          <option value="">Sélectionnez la taille</option>
                          <option value="1-10" {{ $entreprise->tailleEntreprise == '1-10' ? 'selected' : '' }}>1-10 employés</option>
                          <option value="11-50" {{ $entreprise->tailleEntreprise == '11-50' ? 'selected' : '' }}>11-50 employés</option>
                          <option value="51-200" {{ $entreprise->tailleEntreprise == '51-200' ? 'selected' : '' }}>51-200 employés</option>
                          <option value="201-500" {{ $entreprise->tailleEntreprise == '201-500' ? 'selected' : '' }}>201-500 employés</option>
                          <option value="501+" {{ $entreprise->tailleEntreprise == '501+' ? 'selected' : '' }}>Plus de 500 employés</option>
                        </select>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="dateCreationEdit" class="form-label">Date de création</label>
                        <input type="date" class="form-control" id="dateCreationEdit" name="dateCreation" value="{{ $entreprise->dateCreation }}">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="siteWebEdit" class="form-label">Site web</label>
                        <input type="url" class="form-control" id="siteWebEdit" name="siteWeb" value="{{ $entreprise->siteWeb }}">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                  </div>
                </div>
              </form>
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
              <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addSkillModal"><i class="bi bi-plus"></i> Ajouter</button>
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
          <!-- Modal Ajouter Compétence -->
          <div class="modal fade" id="addSkillModal" tabindex="-1" aria-labelledby="addSkillModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <form method="POST" action="#">
                @csrf
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addSkillModalLabel">Ajouter une compétence</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="newSkill" class="form-label">Compétence</label>
                      <input type="text" class="form-control" id="newSkill" name="competence" placeholder="Ex: Python, Scrum, etc.">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                  </div>
                </div>
              </form>
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
  @vite(['resources/js/entrepriseJs/monProfil.js'])
  <script>
    // Gestion du changement de logo sur la page profil entreprise
    const logoInput = document.getElementById('logoInput');
    const logoPreview = document.getElementById('logoPreview');
    const changeLogoBtn = document.getElementById('changeLogoBtn');
    const removeLogoBtn = document.getElementById('removeLogoBtn');

    // Ouvre le sélecteur de fichier quand on clique sur "Changer"
    changeLogoBtn.addEventListener('click', function() {
      logoInput.click();
    });

    // Affiche la prévisualisation du nouveau logo
    logoInput.addEventListener('change', function() {
      if (this.files && this.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          logoPreview.src = e.target.result;
        }
        reader.readAsDataURL(this.files[0]);
      }
    });

    // Supprime le logo (remet une image par défaut ou vide)
    removeLogoBtn.addEventListener('click', function() {
      logoInput.value = '';
      logoPreview.src = "{{ asset('storage/logoEntreprise/logo.png') }}";
    });

    // Gestion du champ "Autre" secteur dans le modal
    const secteurEdit = document.getElementById('secteurEdit');
    const autreSecteurContainerEdit = document.getElementById('autreSecteurContainerEdit');
    const autreSecteurEdit = document.getElementById('autreSecteurEdit');

    function updateSecteurEdit() {
      if (secteurEdit.value === 'autre') {
        autreSecteurContainerEdit.style.display = 'block';
        autreSecteurEdit.setAttribute('required', 'required');
        autreSecteurEdit.setAttribute('name', 'SecteurActivite');
        secteurEdit.removeAttribute('name');
      } else {
        autreSecteurContainerEdit.style.display = 'none';
        autreSecteurEdit.removeAttribute('required');
        autreSecteurEdit.removeAttribute('name');
        secteurEdit.setAttribute('name', 'SecteurActivite');
      }
    }

    secteurEdit && secteurEdit.addEventListener('change', updateSecteurEdit);
    document.addEventListener('DOMContentLoaded', function() {
      updateSecteurEdit();
    });
  </script>
</body>
</html>