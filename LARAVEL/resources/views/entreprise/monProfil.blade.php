<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
  <div class="main-content">
    <div class="container-fluid">
      <!-- En-tête -->
       {{-- Afficher les erreurs de validation --}}
      @if ($errors->any())
        <x-alert type="danger">
          <h5 class="alert-heading">Erreur de validation</h5>
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </x-alert>
      @endif
        <!-- Afficher message "votre modification a été faite avec succès" -->
      @include('partials.flashbag')

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
            <form method="POST" enctype="multipart/form-data" action="{{ route('entreprise.updateEntreprise', $entreprise) }}">
              @csrf
              @method('PUT')
              <input type="hidden" name="action_type" value="logo">
              <div style="position:relative; display:inline-block; width:100%;">
                <img id="logoPreview" src="{{asset('storage/'.$entreprise->logo)}}" alt="Logo entreprise" class="profile-picture rounded-circle mb-3" style="object-fit:cover;">
                <!-- Formulaire pour changer le logo -->
                <form id="changeLogoForm" method="POST" enctype="multipart/form-data" action="{{ route('entreprise.updateEntreprise', $entreprise) }}" style="display:inline;">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="action_type" value="logo">
                  <input type="file" id="logoInput" name="logo" accept=".png,.jpg,.jpeg,.svg" style="display:none;">
                  <div class="d-flex flex-column align-items-center">
                    <button id="changeLogoBtn" class="btn btn-sm btn-outline-primary mb-2" type="button" style="margin-left:auto;margin-right:auto;">
                      <i class="bi bi-pencil me-1"></i> Changer
                    </button>
                    <div id="logoActionBtns" style="display:none; width:100%; text-align:center;">
                      <button id="saveLogoBtn" class="btn btn-sm btn-primary mt-2 me-2" type="submit">Enregistrer</button>
                      <button id="cancelLogoBtn" class="btn btn-sm btn-secondary mt-2" type="button">Annuler</button>
                    </div>
                  </div>
                </form>
                <!-- Formulaire pour supprimer le logo -->
                <form id="removeLogoForm" method="POST" action="{{ route('entreprise.destroyLogo', $entreprise) }}" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="action_type" value="logo">
                  <button id="removeLogoBtn" class="btn btn-sm btn-outline-secondary" type="submit" name="remove_logo" value="1">
                    <i class="bi bi-trash me-1"></i> Supprimer
                  </button>
                </form>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <h3 class="fw-bold mb-1">{{ $entreprise->nomEntreprise}}</h3>
            <p class="text-muted mb-2"><i class="bi bi-geo-alt me-2"></i>{{ $entreprise->adresse}}</p>
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
            <p class="mb-4">{{$entreprise->description}}</p>
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
              <form method="POST" action="{{ route('entreprise.updateEntreprise', $entreprise) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="action_type" value="apropos">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editAproposModalLabel">Modifier À propos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="descriptionEdit" class="form-label">Description</label>
                      <textarea class="form-control @error('description') is-invalid @enderror" id="descriptionEdit" name="description" rows="4">{{ old('description', $entreprise->description ?? '') }}</textarea>
                      @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="secteurEdit" class="form-label">Secteur d'activité*</label>
                        <select class="form-select @error('SecteurActivite') is-invalid @enderror" id="secteurEdit" name="SecteurActivite" required>
                          <option value="">Sélectionnez un secteur</option>
                          <option value="Technologie" {{ old('SecteurActivite', $entreprise->SecteurActivite ?? '') == 'Technologie' ? 'selected' : '' }}>Technologie</option>
                          <option value="Finance" {{ old('SecteurActivite', $entreprise->SecteurActivite ?? '') == 'Finance' ? 'selected' : '' }}>Finance</option>
                          <option value="Santé" {{ old('SecteurActivite', $entreprise->SecteurActivite ?? '') == 'Santé' ? 'selected' : '' }}>Santé</option>
                          <option value="Éducation" {{ old('SecteurActivite', $entreprise->SecteurActivite ?? '') == 'Éducation' ? 'selected' : '' }}>Éducation</option>
                          <option value="Industrie" {{ old('SecteurActivite', $entreprise->SecteurActivite ?? '') == 'Industrie' ? 'selected' : '' }}>Industrie</option>
                          <option value="Commerce" {{ old('SecteurActivite', $entreprise->SecteurActivite ?? '') == 'Commerce' ? 'selected' : '' }}>Commerce</option>
                          <option value="autre" {{ !in_array(old('SecteurActivite', $entreprise->SecteurActivite ?? ''), ['Technologie','Finance','Santé','Éducation','Industrie','Commerce','']) ? 'selected' : '' }}>Autre</option>
                        </select>
                        @error('SecteurActivite')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div id="autreSecteurContainerEdit" class="mt-2" style="display:none;">
                          <input type="text" class="form-control @error('SecteurActivite') is-invalid @enderror" id="autreSecteurEdit" placeholder="Veuillez préciser votre secteur d'activité" value="{{ !in_array(old('SecteurActivite', $entreprise->SecteurActivite ?? ''), ['Technologie','Finance','Santé','Éducation','Industrie','Commerce','']) ? old('SecteurActivite', $entreprise->SecteurActivite ?? '') : '' }}">
                          @error('SecteurActivite')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="tailleEdit" class="form-label">Taille de l'entreprise*</label>
                        <select class="form-select @error('tailleEntreprise') is-invalid @enderror" id="tailleEdit" name="tailleEntreprise" required>
                          <option value="">Sélectionnez la taille</option>
                          <option value="1-10" {{ old('tailleEntreprise', $entreprise->tailleEntreprise ?? '') == '1-10' ? 'selected' : '' }}>1-10 employés</option>
                          <option value="11-50" {{ old('tailleEntreprise', $entreprise->tailleEntreprise ?? '') == '11-50' ? 'selected' : '' }}>11-50 employés</option>
                          <option value="51-200" {{ old('tailleEntreprise', $entreprise->tailleEntreprise ?? '') == '51-200' ? 'selected' : '' }}>51-200 employés</option>
                          <option value="201-500" {{ old('tailleEntreprise', $entreprise->tailleEntreprise ?? '') == '201-500' ? 'selected' : '' }}>201-500 employés</option>
                          <option value="501+" {{ old('tailleEntreprise', $entreprise->tailleEntreprise ?? '') == '501+' ? 'selected' : '' }}>Plus de 500 employés</option>
                        </select>
                        @error('tailleEntreprise')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="dateCreationEdit" class="form-label">Date de création</label>
                        <input type="date" class="form-control @error('dateCreation') is-invalid @enderror" id="dateCreationEdit" name="dateCreation" value="{{ old('dateCreation', $entreprise->dateCreation ?? '') }}">
                        @error('dateCreation')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="siteWebEdit" class="form-label">Site web</label>
                        <input type="url" class="form-control @error('siteWeb') is-invalid @enderror" id="siteWebEdit" name="siteWeb" value="{{ old('siteWeb', $entreprise->siteWeb ?? '') }}">
                        @error('siteWeb')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
              <a href="{{ route('entreprise.offresEmploi', $entreprise) }}" class="btn btn-sm btn-outline-primary">Voir toutes</a>
            </div>
    
    <div class="list-group list-group-flush">
        @forelse($offresRecentes as $offre)
            <a href="{{ route('entreprise.offresEmploi', ['entreprise' => $entreprise, 'offre' => $offre]) }}" class="list-group-item list-group-item-action border-0 px-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fw-bold mb-1">{{ $offre->intitule_offre_emploi }}</h6>
                        <p class="small text-muted mb-0">
                            <i class="bi bi-geo-alt"></i> {{ $offre->localisation }} • 
                            <i class="bi bi-clock"></i> Publiée {{ $offre->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <span class="badge 
                        @if($offre->status === 'active') bg-success bg-opacity-10 text-success
                        @elseif($offre->status === 'desactive') bg-danger bg-opacity-10 text-danger
                        @endif">
                        {{ $offre->status === 'active' ? 'Active' : ($offre->status === 'desactive' ? 'Désactivée' : ucfirst($offre->status)) }}
                    </span>
                </div>
            </a>
        @empty
            <div class="text-center text-muted py-4">
                <i class="bi bi-file-earmark-text fs-4 mb-2"></i>
                <p class="mb-0">Aucune offre publiée</p>
                <small>Commencez à publier des offres d'emploi</small>
            </div>
        @endforelse
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
            
            <div class="mb-3" id="competencesList">
              @if($entreprise->competencesRecherchees->count() > 0)
              @foreach($entreprise->competencesRecherchees as $competence)
                <div class="badge-tag d-inline-flex align-items-center me-2 mb-2" id="competence-{{ $competence->id }}">
                    {{ $competence->nom }}
                  <div class="ms-2">
                    <button class="btn btn-sm btn-link text-primary p-0 me-1" onclick="editCompetence({{ $competence->id }}, '{{ $competence->nom }}')">
                      <i class="bi bi-pencil"></i>
                    </button>
                    <form method="POST" action="{{ route('entreprise.updateEntreprise', $entreprise) }}" class="d-inline" 
                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette compétence ?');">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="action_type" value="competence_delete">
                        <input type="hidden" name="competence_id" value="{{ $competence->id }}">
                        <button type="submit" class="btn btn-sm btn-link text-danger p-0">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                  </div>
                </div>
              @endforeach
              @else
                <div class="text-center text-muted">
                  <i class="bi bi-code-square fs-4 mb-2"></i>
                  <p class="mb-0">Aucune compétence ajoutée</p>
                  <small>Cliquez sur "Ajouter" pour commencer</small>
                </div>
              @endif
            </div>
          </div>

          <!-- Candidats récents -->
          <div class="dashboard-card p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4 class="section-title fw-bold" style="color:red">Candidats récents</h4>
              <a href="{{ route('entreprise.evaluerCandidat', $entreprise) }}" class="btn btn-sm btn-outline-primary">
                {{-- <i class="bi bi-arrow-right"></i> --}}Voir tous
              </a>
            </div>
            
            <div class="list-group list-group-flush">
              @if($candidats_recents->isEmpty())
                <div class="text-center text-muted py-4">
                  <i class="bi bi-people display-4 mb-3"></i>
                  <p class="mb-0">Aucun candidat récent à afficher</p>
                  <small>Les candidats apparaîtront ici</small>
                </div>
              @else
                @foreach($candidats_recents as $candidature)
                  <a href="{{ route('entreprise.evaluerCandidat', [$entreprise, $candidature->offreEmploi, $candidature->candidat]) }}" class="list-group-item list-group-item-action border-0 px-0 py-3">
                    <div class="d-flex align-items-center">
                      @if($candidature->candidat->photoProfile)
                        <img src="{{ asset('storage/' . $candidature->candidat->photoProfile) }}" alt="Profile" class="rounded-circle me-3" width="40" height="40" style="object-fit: cover;">
                      @else
                        <img src="{{ asset('storage/app/public/photo/jxxP2SOoFJOu2KMzWNfnvVKlv8CfBUTU84soKqL8.jpg') }}" alt="Profile par défaut" class="rounded-circle me-3" width="40" height="40" style="object-fit: cover;">
                      @endif
                      <div>
                        <h6 class="fw-bold mb-1">{{ $candidature->candidat->nom }}</h6>
                        <p class="small text-muted mb-0">{{ $candidature->offreEmploi->intitule_offre_emploi }} • {{ $candidature->created_at->diffForHumans() }}</p>
                      </div>
                      <span class="badge bg-{{ $candidature->statut == 'En attente' ? 'success' : ($candidature->statut == 'Évaluation terminée' ? 'warning' : 'info') }} bg-opacity-10 text-{{ $candidature->statut == 'En attente' ? 'success' : ($candidature->statut == 'Évaluation terminée' ? 'warning' : 'info') }} ms-auto">
                        {{ $candidature->statut }}
                      </span>
                    </div>
                  </a>
                @endforeach
              @endif
            </div>
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
    const saveLogoBtn = document.getElementById('saveLogoBtn');
    const cancelLogoBtn = document.getElementById('cancelLogoBtn');
    const logoActionBtns = document.getElementById('logoActionBtns');
    let originalLogoSrc = logoPreview.src;

    // Ouvre le sélecteur de fichier quand on clique sur "Changer"
    changeLogoBtn.addEventListener('click', function() {
      logoInput.click();
    });

    // Affiche la prévisualisation du nouveau logo et affiche "Enregistrer" et "Annuler", cache "Supprimer"
    logoInput.addEventListener('change', function() {
      if (this.files && this.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          logoPreview.src = e.target.result;
          logoActionBtns.style.display = 'block';
          removeLogoBtn.style.display = 'none';
        }
        reader.readAsDataURL(this.files[0]);
      }
    });

    // Affiche/masque les boutons selon la sélection
    logoInput.addEventListener('input', function() {
      if (this.files.length) {
        logoActionBtns.style.display = 'block';
        removeLogoBtn.style.display = 'none';
      } else {
        logoActionBtns.style.display = 'none';
        removeLogoBtn.style.display = 'inline-block';
        logoPreview.src = originalLogoSrc;
      }
    });

    // Annuler le changement de logo
    cancelLogoBtn.addEventListener('click', function() {
      logoInput.value = '';
      logoPreview.src = originalLogoSrc;
      logoActionBtns.style.display = 'none';
      removeLogoBtn.style.display = 'inline-block';
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

    // Gestion des compétences recherchées
    function editCompetence(id, nom) {
      const modal = new bootstrap.Modal(document.getElementById('editSkillModal'));
      const form = document.getElementById('editCompetenceForm');
      const input = document.getElementById('editSkill');
      const competenceIdInput = document.getElementById('editCompetenceId');
      
      input.value = nom;
      competenceIdInput.value = id;
      modal.show();
    }

    function deleteCompetence(id) {
      if (confirm('Êtes-vous sûr de vouloir supprimer cette compétence ?')) {
        const formData = new FormData();
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);
        formData.append('_method', 'PUT');
        formData.append('action_type', 'competence_delete');
        formData.append('competence_id', id);

        fetch(`{{ route('entreprise.updateEntreprise', $entreprise) }}`, {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
          },
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            document.getElementById(`competence-${id}`).remove();
          } else {
            alert('Une erreur est survenue lors de la suppression.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Une erreur est survenue lors de la suppression.');
        });
      }
    }

    // Gestion du formulaire d'ajout de compétence
    document.getElementById('addCompetenceForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const formData = new FormData(this);

      fetch(this.action, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          'Accept': 'application/json'
        },
        body: formData
      })
      .then(response => {
        if (!response.ok) {
          throw new Error('Erreur réseau');
        }
        return response.json();
      })
      .then(data => {
        if (data.success) {
          const competencesList = document.getElementById('competencesList');
          const newCompetence = document.createElement('div');
          newCompetence.className = 'badge-tag d-inline-flex align-items-center me-2 mb-2';
          newCompetence.id = `competence-${data.competence.id}`;
          newCompetence.innerHTML = `
            <i class="bi bi-code-slash me-1"></i> ${data.competence.nom}
            <div class="ms-2">
              <button class="btn btn-sm btn-link text-primary p-0 me-1" onclick="editCompetence(${data.competence.id}, '${data.competence.nom}')">
                <i class="bi bi-pencil"></i>
              </button>
              <form method="POST" action="{{ route('entreprise.updateEntreprise', $entreprise) }}" class="d-inline" 
    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette compétence ?');">
    @csrf
    @method('PUT')
    <input type="hidden" name="action_type" value="competence_delete">
    <input type="hidden" name="competence_id" value="${data.competence.id}">
    <button type="submit" class="btn btn-sm btn-link text-danger p-0">
        <i class="bi bi-trash"></i>
    </button>
</form>
            </div>
          `;
          competencesList.appendChild(newCompetence);
          
          // Fermer le modal et réinitialiser le formulaire
          const modal = bootstrap.Modal.getInstance(document.getElementById('addSkillModal'));
          modal.hide();
          this.reset();
        } else {
          alert('Une erreur est survenue lors de l\'ajout de la compétence.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Une erreur est survenue lors de l\'ajout de la compétence. Veuillez réessayer.');
      });
    });

    // Gestion du formulaire de modification de compétence
    document.getElementById('editCompetenceForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const formData = new FormData(this);

      fetch(this.action, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          'Accept': 'application/json'
        },
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          const competenceElement = document.getElementById(`competence-${data.competence.id}`);
          competenceElement.querySelector('i.bi-code-slash').nextSibling.textContent = ` ${data.competence.nom}`;
          
          // Fermer le modal
          const modal = bootstrap.Modal.getInstance(document.getElementById('editSkillModal'));
          modal.hide();
        } else {
          alert('Une erreur est survenue lors de la modification de la compétence.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Une erreur est survenue lors de la modification de la compétence.');
      });
    });
  </script>

  <!-- Modal Ajout Compétence -->
  <div class="modal fade" id="addSkillModal" tabindex="-1" aria-labelledby="addSkillModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addSkillModalLabel">Ajouter une compétence</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <form id="addCompetenceForm" method="POST" action="{{ route('entreprise.updateEntreprise', $entreprise) }}">
          @csrf
          @method('PUT')
          <input type="hidden" name="action_type" value="competence_add">
          <div class="modal-body">
            <div class="mb-3">
              <label for="nom" class="form-label">Nom de la compétence</label>
              <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Édition Compétence -->
  <div class="modal fade" id="editSkillModal" tabindex="-1" aria-labelledby="editSkillModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editSkillModalLabel">Modifier la compétence</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <form id="editCompetenceForm" method="POST" action="{{ route('entreprise.updateEntreprise', $entreprise) }}">
          @csrf
          @method('PUT')
          <input type="hidden" name="action_type" value="competence_update">
          <input type="hidden" name="competence_id" id="editCompetenceId">
          <div class="modal-body">
            <div class="mb-3">
              <label for="editSkill" class="form-label">Nom de la compétence</label>
              <input type="text" class="form-control" id="editSkill" name="nom" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>