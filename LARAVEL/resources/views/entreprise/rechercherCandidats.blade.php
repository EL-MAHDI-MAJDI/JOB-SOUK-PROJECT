<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rechercher Candidats - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  @vite(['resources/css/StyleEntreprise/rechercherCandidats.css'])
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoEntreprise.side-menu activePage='7' :entreprise="$entreprise" />
  </div>

  <!-- Barre de navigation supérieure -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoEntreprise.navbar :entreprise="$entreprise"/>
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    {{-- Message compte non validé --}}
        @if($entreprise->status === 'pending')
    <div class="alert alert-warning text-center mb-4">
        <i class="bi bi-exclamation-triangle-fill"></i>
        Votre compte n'est pas encore validé.
        <u style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#pendingModal">
            Cliquez ici pour plus de détails
        </u>.
    </div>
    <x-compoEntreprise.compteDesactive/>
        @endif
    <div class="container-fluid">
      <!-- En-tête -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Rechercher des Candidats</h2>
          <p class="text-muted mb-0">Trouvez les meilleurs talents pour votre entreprise</p>
        </div>
      </div>
      
      <!-- Barre de recherche -->
      <div class="dashboard-card p-4 mb-4">
        <form action="{{ route('entreprise.rechercherCandidats', $entreprise) }}" method="GET">
          <div class="row g-3">
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                <input type="text" name="keywords" class="form-control" placeholder="Mots-clés (compétences, poste, etc.)" value="{{ request('keywords') }}">
              </div>
            </div>
            <div class="col-md-3">
              <select name="location" class="form-select">
                <option value="Localisation" {{ request('location') == 'Localisation' ? 'selected' : '' }}>Localisation</option>
                <option value="Casablanca" {{ request('location') == 'Casablanca' ? 'selected' : '' }}>Casablanca</option>
                <option value="Rabat" {{ request('location') == 'Rabat' ? 'selected' : '' }}>Rabat</option>
                <option value="Marrakech" {{ request('location') == 'Marrakech' ? 'selected' : '' }}>Marrakech</option>
                <option value="Remote" {{ request('location') == 'Remote' ? 'selected' : '' }}>Remote</option>
              </select>
            </div>
            <div class="col-md-3">
              <select name="experience" class="form-select">
                <option value="Expérience" {{ request('experience') == 'Expérience' ? 'selected' : '' }}>Expérience</option>
                <option value="Débutant" {{ request('experience') == 'Débutant' ? 'selected' : '' }}>Débutant</option>
                <option value="1-3 ans" {{ request('experience') == '1-3 ans' ? 'selected' : '' }}>1-3 ans</option>
                <option value="3-5 ans" {{ request('experience') == '3-5 ans' ? 'selected' : '' }}>3-5 ans</option>
                <option value="5+ ans" {{ request('experience') == '5+ ans' ? 'selected' : '' }}>5+ ans</option>
              </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 text-end">
              <button type="submit" class="btn btn-primary">Rechercher</button>
            </div>
          </div>
        </form>
      </div>
      
      <!-- Résultats -->
      <div class="dashboard-card p-4 mb-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="fw-bold mb-0">{{ $candidats->total() }} candidats trouvés</h4>
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
          @forelse($candidats as $candidat)
          <div class="list-group-item list-group-item-action border-0 px-0 py-3">
            <div class="row align-items-center">
              <div class="col-auto">
                <img src="{{ asset('storage/' . $candidat->photoProfile) }}" alt="Profile" class="rounded-circle" width="80" height="80">
              </div>
              <div class="col">
                <h5 class="fw-bold mb-1">{{ $candidat->prenom }} {{ $candidat->nom }}</h5>
                <p class="text-muted mb-2"><i class="bi bi-briefcase me-2"></i>{{ $candidat->titre_professionnel }}</p>
                <div class="mb-2">
                  @foreach($candidat->competences as $competence)
                    <span class="badge bg-primary-light text-primary me-2">{{ $competence->nom }}</span>
                  @endforeach
                </div>
                <div class="d-flex align-items-center">
                  <span class="me-3"><i class="bi bi-geo-alt me-1"></i> {{ $candidat->ville }}</span>
                  @if($candidat->experiences->count() > 0)
                    <span class="me-3"><i class="bi bi-award me-1"></i> {{ $candidat->experiences->count() }} ans d'expérience</span>
                  @endif
                  @if($candidat->formations->count() > 0)
                    <span><i class="bi bi-mortarboard me-1"></i> {{ $candidat->formations->first()->diplome }}</span>
                  @endif
                </div>
              </div>
              <div class="col-auto text-end">
                <a href="mailto:{{ $candidat->email }}" class="btn btn-outline-primary me-2"><i class="bi bi-envelope"></i> Contacter</a>
                <a href="{{ route('entreprise.rechercherCandidats.voirProfil', ['entreprise' => $entreprise->id, 'candidat' => $candidat->id]) }}" class="btn btn-outline-danger"><i class="bi bi-eye-fill"></i> Voir le profil</a>
              </div>
            </div>
          </div>
          @empty
          <div class="text-center py-4">
            <p class="text-muted">Aucun candidat trouvé</p>
          </div>
          @endforelse
          
          <!-- Pagination -->
          <nav class="mt-4">
            {{ $candidats->links() }}
          </nav>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/js/entrepriseJs/rechercherCandidats.js'])
</body>
</html>