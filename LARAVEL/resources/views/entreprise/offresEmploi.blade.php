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
            <select class="form-select" name="status" id="statusFilter">
              <option value="" selected>Toutes les offres</option>
              <option value="active">Actives</option>
              <option value="passe">Clôturées</option>
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
            <h3 class="fw-bold mb-1" style="color: var(--primary);">{{ $stats['offres_actives'] }}</h3>
            <p class="text-muted mb-0">Offres actives</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-card p-3 text-center">
            <h3 class="fw-bold mb-1" style="color: var(--secondary);">{{ $stats['candidatures'] }}</h3>
            <p class="text-muted mb-0">Candidatures</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-card p-3 text-center">
            <h3 class="fw-bold mb-1" style="color: var(--accent);">{{ $stats['entretiens'] }}</h3>
            <p class="text-muted mb-0">Entretiens</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-card p-3 text-center">
            <h3 class="fw-bold mb-1" style="color: #3498db;">{{ $stats['offres_cloturees'] }}</h3>
            <p class="text-muted mb-0">Offres clôturées</p>
          </div>
        </div>
      </div>
      
      <!-- Liste des offres -->
      <div class="dashboard-card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="section-title fw-bold">Mes offres d'emploi</h4>
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
                  <th>Détails</th>
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
                  <td>
                    <span class="badge 
                      @if($offre->status === 'active') bg-success
                      @elseif($offre->status === 'desactive') bg-danger
                      @else bg-secondary @endif">
                      {{ $offre->status === 'active' ? 'Active' : ($offre->status === 'desactive' ? 'Désactivée' : ucfirst($offre->status)) }}
                    </span>
                  </td>
                  <td>{{$offre->date_limite_candidature}}</td>
                  <td>
                    <div class="dropdown">
                      <a class="dropdown-item" href="{{ route('entreprise.offresEmploi.details', ['entreprise' => $entreprise, 'offre' => $offre]) }}"><i class="bi bi-info-circle me-2 fs-5"></i></a>
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
  <x-compoEntreprise.ajouter-offre-emploi :entreprise="$entreprise" />

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/js/entrepriseJs/offresEmploi.js'])
</body>
</html>