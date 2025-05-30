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
        <x-compoEntreprise.side-menu activePage='3' :entreprise="$entreprise" />
  </div>

  <!-- Barre de navigation supérieure -->
  <nav class="top-navbar navbar navbar-expand">
        <x-compoEntreprise.navbar :entreprise="$entreprise"/>
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container-fluid">
      
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

      <!-- Afficher message "Offre d'emploi créée avec succès." -->
      @include('partials.flashbag')

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
          @if(!$offres->isEmpty())
            <div class="d-flex">
              <div class="input-group me-2" style="width: 250px;">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control" placeholder="Rechercher...">
              </div>
              <button class="btn btn-outline-secondary">
                <i class="bi bi-sort-down"></i> Trier
              </button>
            </div>
          @endif
        </div>


        @if($offres->isEmpty())
            <div class="text-center text-muted py-5">
              <i class="bi bi-briefcase fs-2 mb-2"></i><br>
              <span>Aucune offre d'emploi trouvée.</span>
            </div>
        @else
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead>
                <tr>
                  <th>Poste</th>
                  <th>Candidats</th>
                  <th>Localisation</th>
                  <th>Type</th>
                  <th>Statut</th>
                  <th>Date limite de candidature</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                @foreach($offres as $offre)
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div>
                        <h6 class="fw-bold mb-0">{{$offre->intitule_offre_emploi}}</h6>
                        <small class="text-muted">TechnoSoft Solutions</small>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge bg-primary bg-opacity-10 text-primary">24 candidats</span>
                  </td>
                  <td>{{$offre->localisation}}</td>
                  <td>{{$offre->type_contrat}}</td>
                  <td><span class="badge bg-success bg-opacity-10 text-success">Active</span></td>
                  <td>{{$offre->date_limite_candidature}}</td>
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
                @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">
              {{ $offres->links('pagination::bootstrap-4') }}
            </div>
          </div>
        @endif
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
          <form method="POST" action="{{ route('entreprise.offresEmploi.store', $entreprise) }}">
            @csrf
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="jobTitle" class="form-label">Intitulé du poste*</label>
                <input type="text" class="form-control @error('intitule_offre_emploi') is-invalid @enderror" id="jobTitle" name="intitule_offre_emploi" placeholder="Ex: Développeur Full Stack" required value="{{ old('intitule_offre_emploi') }}">
                @error('intitule_offre_emploi')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="jobType" class="form-label">Type de contrat*</label>
                <select class="form-select @error('type_contrat') is-invalid @enderror" id="jobType" name="type_contrat" required>
                  <option value="" disabled {{ old('type_contrat') ? '' : 'selected' }}>Sélectionner</option>
                  <option value="CDI" {{ old('type_contrat') == 'CDI' ? 'selected' : '' }}>CDI</option>
                  <option value="CDD" {{ old('type_contrat') == 'CDD' ? 'selected' : '' }}>CDD</option>
                  <option value="Freelance" {{ old('type_contrat') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                  <option value="Stage" {{ old('type_contrat') == 'Stage' ? 'selected' : '' }}>Stage</option>
                  <option value="Alternance" {{ old('type_contrat') == 'Alternance' ? 'selected' : '' }}>Alternance</option>
                </select>
                @error('type_contrat')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="salaryRange" class="form-label">Salaire (optionnel)</label>
                <input type="text" class="form-control @error('salaire_offre_emploi') is-invalid @enderror" id="salaryRange" name="salaire_offre_emploi" placeholder="Ex: 15 000 - 20 000 MAD" value="{{ old('salaire_offre_emploi') }}">
                @error('salaire_offre_emploi')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="experienceLevel" class="form-label">Niveau d'expérience*</label>
                <select class="form-select @error('niveau_experience_demander') is-invalid @enderror" id="experienceLevel" name="niveau_experience_demander" required>
                  <option value="" disabled {{ old('niveau_experience_demander') ? '' : 'selected' }}>Sélectionner</option>
                  <option value="Débutant (0-2 ans)" {{ old('niveau_experience_demander') == 'Débutant (0-2 ans)' ? 'selected' : '' }}>Débutant (0-2 ans)</option>
                  <option value="Intermédiaire (2-5 ans)" {{ old('niveau_experience_demander') == 'Intermédiaire (2-5 ans)' ? 'selected' : '' }}>Intermédiaire (2-5 ans)</option>
                  <option value="Confirmé (5-10 ans)" {{ old('niveau_experience_demander') == 'Confirmé (5-10 ans)' ? 'selected' : '' }}>Confirmé (5-10 ans)</option>
                  <option value="Senior (+10 ans)" {{ old('niveau_experience_demander') == 'Senior (+10 ans)' ? 'selected' : '' }}>Senior (+10 ans)</option>
                </select>
                @error('niveau_experience_demander')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="mb-3">
              <label for="jobDescription" class="form-label">Description du poste*</label>
              <textarea class="form-control @error('description_offre_emploi') is-invalid @enderror" id="jobDescription" name="description_offre_emploi" rows="5" placeholder="Décrivez en détail les missions et responsabilités du poste..." required>{{ old('description_offre_emploi') }}</textarea>
              @error('description_offre_emploi')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="jobRequirements" class="form-label">Compétences requises*</label>
              <textarea class="form-control @error('competences_requises') is-invalid @enderror" id="jobRequirements" name="competences_requises" rows="3" placeholder="Listez les compétences et qualifications nécessaires..." required>{{ old('competences_requises') }}</textarea>
              <div class="form-text">Séparez les compétences par des virgules</div>
              @error('competences_requises')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="jobBenefits" class="form-label">Avantages (optionnel)</label>
              <textarea class="form-control @error('avantage_offre_emploi') is-invalid @enderror" id="jobBenefits" name="avantage_offre_emploi" rows="2" placeholder="Listez les avantages proposés...">{{ old('avantage_offre_emploi') }}</textarea>
              @error('avantage_offre_emploi')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="row mb-4">
              <div class="col-md-6">
                <label for="applicationDeadline" class="form-label">Date limite de candidature*</label>
                <input type="date" class="form-control @error('date_limite_candidature') is-invalid @enderror" id="applicationDeadline" name="date_limite_candidature" required value="{{ old('date_limite_candidature') }}">
                @error('date_limite_candidature')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="localisation" class="form-label">Localisation*</label>
                <input type="text" class="form-control @error('localisation') is-invalid @enderror" id="localisation" name="localisation" placeholder="Ex: Casablanca, Remote" required value="{{ old('localisation') }}">
                @error('localisation')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="border-top pt-3 mb-3">
              <h6 class="fw-bold">Informations supplémentaires</h6>
              <div class="row">
                <div class="col-md-6">
                  <label for="contactEmail" class="form-label">Email de contact (optionnel)</label>
                  <input type="email" class="form-control @error('email_contact') is-invalid @enderror" id="contactEmail" name="email_contact" placeholder="contact@entreprise.com" value="{{ old('email_contact') }}">
                  @error('email_contact')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="contactPhone" class="form-label">Téléphone (optionnel)</label>
                  <input type="tel" class="form-control @error('telephone_contact') is-invalid @enderror" id="contactPhone" name="telephone_contact" placeholder="06 12 34 56 78" value="{{ old('telephone_contact') }}">
                  @error('telephone_contact')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-primary">Publier l'offre</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/js/entrepriseJs/offresEmploi.js'])
</body>
</html>