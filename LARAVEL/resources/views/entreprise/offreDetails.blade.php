<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Détails de l'offre - Job Souk</title>
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
      <!-- En-tête -->
      <!-- Afficher message d'erreur -->
      @include('partials.flashbag-error')
      <!-- Afficher message "Offre d'emploi modifiée avec succès." -->
      @include('partials.flashbag')
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Détails de l'offre</h2>
          <p class="text-muted mb-0">Toutes les informations sur cette offre d'emploi</p>
        </div>
        <a href="{{ route('entreprise.offresEmploi', $entreprise) }}" class="btn btn-outline-secondary">
          <i class="bi bi-arrow-left"></i> Retour à la liste
        </a>
      </div>
      <!-- Détails de l'offre -->
      <div class="dashboard-card p-4 mb-4">
        <h3 class="fw-bold mb-3">{{ $offre->intitule_offre_emploi }}</h3>
        <div class="mb-3">
          <span class="badge bg-primary me-2">{{ $offre->type_contrat }}</span>
          <span class="badge bg-secondary me-2">{{ $offre->localisation }}</span>
          <span class="badge bg-info me-2">{{ $offre->salaire_offre_emploi ?? 'Salaire non précisé' }}</span>
          <span class="badge bg-success me-2">{{ $offre->statut ?? 'Active' }}</span>
        </div>
        <div class="mb-3">
          <i class="bi bi-people me-2"></i>
          <strong>Nombre de candidatures :</strong> {{ $offre->candidatures_count ?? 0 }}
          <span class="mx-3"></span>
          <i class="bi bi-calendar-event me-2"></i>
          <strong>Date de publication :</strong> {{ $offre->created_at->format('Y-m-d') }}
          <span class="mx-3"></span>
          <i class="bi bi-clock me-2"></i>
          <strong>Date limite de candidature :</strong> {{ $offre->date_limite_candidature }}
          <span class="ms-3">
            @if($offre->status === 'active')
              <span class="badge bg-success">Active</span>
            @elseif($offre->status === 'desactive')
              <span class="badge bg-danger">Désactivée</span>
            @endif
          </span>
        </div>
        <hr>
        <h5 class="fw-bold mb-2">Description du poste</h5>
        <p>{{ $offre->description_offre_emploi ?? 'Non précisé' }}</p>
        <hr>
        <div class="row mb-3">
          <div class="col-md-6 mb-2">
            <h6 class="fw-bold"><i class="bi bi-briefcase me-2"></i> Type de contrat</h6>
            <p>{{ $offre->type_contrat ?? 'Non précisé' }}</p>
          </div>
          <div class="col-md-6 mb-2">
            <h6 class="fw-bold"><i class="bi bi-mortarboard me-2"></i> Niveau d'expérience</h6>
            <p>{{ $offre->niveau_experience_demander ?? 'Non précisé' }}</p>
          </div>
          <div class="col-md-6 mb-2">
            <h6 class="fw-bold"><i class="bi bi-currency-dollar me-2"></i>Salaire</h6>
            <p>{{$offre->salaire_offre_emploi ? $offre->salaire_offre_emploi." DH" : 'Non précisé' }}</p>
          </div>
          <div class="col-md-6 mb-2">
            <h6 class="fw-bold"><i class="bi bi-globe me-2"></i> Localisation</h6>
            <p>{{ $offre->localisation }}</p>
          </div>
        </div>
        <hr>
        <h5 class="fw-bold mb-2">Compétences requises</h5>
        <div class="mb-3">
          @if(!empty($offre->competences_requises))
            @foreach(explode(',', $offre->competences_requises) as $skill)
              <span class="badge bg-primary-light text-primary me-2 mb-2 fs-6">{{ trim($skill) }}</span>
            @endforeach
          @else
            <span class="text-muted">Non spécifiées</span>
          @endif
        </div>
        <hr>
        <h5 class="fw-bold mb-2">Avantages</h5>
        <div class="mb-3">
          @if(!empty($offre->avantage_offre_emploi))
            <ul>
              @foreach(explode("\n", $offre->avantage_offre_emploi) as $avantage)
                <li>{{ trim($avantage) }}</li>
              @endforeach
            </ul>
          @else
            <span class="text-muted">Non spécifiés</span>
          @endif
        </div>
        <hr>
        <div class="d-flex justify-content-end gap-2">
          <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editOfferModal">
          <i class="bi bi-pencil"></i> Modifier
          </button>
           <form action="{{ route('entreprise.offresEmploi.destroy', ['entreprise' => $entreprise, 'offre' => $offre]) }}" method="POST" > 
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">
              <i class="bi bi-trash"></i> Supprimer
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de modification de l'offre -->
   <x-compoEntreprise.modifier-offre-emploi :entreprise="$entreprise" :offre="$offre" />
  
  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/js/entrepriseJs/offresEmploi.js'])
</body>
</html>
