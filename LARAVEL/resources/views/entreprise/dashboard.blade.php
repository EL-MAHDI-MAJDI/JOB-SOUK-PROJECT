<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de bord - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" as="style">
   @vite(['resources/css/StyleEntreprise/dashboard.css'])
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoEntreprise.side-menu activePage='1' :entreprise="$entreprise" />
  </div>

  <!-- Barre de navigation supérieure enrichie -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoEntreprise.navbar :entreprise="$entreprise"/>
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container-fluid">
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

      <!-- Afficher message "Votre compte a été créé avec succès !" -->
      @include('partials.flashbag')
      
      <!-- En-tête -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Tableau de bord</h2>
          <p class="text-muted mb-0">Bienvenue {{$entreprise->nomEntreprise}}, voici votre activité récente</p>
        </div>
        <a class="btn btn-primary" href="{{ route('entreprise.offresEmploi', $entreprise) }}">
          <i class="bi bi-briefcase"></i> Mes offres d'emploi
        </a>
      </div>
      
      <!-- Statistiques principales -->
      <div class="row g-4 mb-4">
        <div class="col-md-3">
          <div class="dashboard-card p-4">
            <div class="d-flex align-items-center">
              <div class="me-3 p-3 rounded">
                <i class="bi bi-briefcase"></i>
              </div>
              <div>
                <h6 class="text-muted mb-1">Offres actives</h6>
                <h3 class="fw-bold mb-0">{{ $stats['offres_actives'] }}</h3>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="dashboard-card p-4">
            <div class="d-flex align-items-center">
              <div class="me-3 p-3 rounded">
                <i class="bi bi-people"></i>
              </div>
              <div>
                <h6 class="text-muted mb-1">Candidatures</h6>
                <h3 class="fw-bold mb-0">{{ $stats['candidatures'] }}</h3>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="dashboard-card p-4">
            <div class="d-flex align-items-center">
              <div class="me-3 p-3 rounded">
                <i class="bi bi-calendar-event"></i>
              </div>
              <div>
                <h6 class="text-muted mb-1">Entretiens</h6>
                <h3 class="fw-bold mb-0">{{ $stats['entretiens'] }}</h3>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="dashboard-card p-4">
            <div class="d-flex align-items-center">
              <div class="me-3 p-3 rounded">
                <i class="bi bi-check-circle"></i>
              </div>
              <div>
                <h6 class="text-muted mb-1">Embauches</h6>
                <h3 class="fw-bold mb-0">{{ $stats['embauches'] }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Activité récente réorganisée -->
      <div class="row g-4">
        <div class="col-lg-8">
          <div class="dashboard-card p-4 h-100">
            <h5 class="fw-bold mb-4">Activité récente</h5>
            
            <div class="activity-list">
              @if($activites->isEmpty())
                <div class="text-center text-muted py-4">
                  <i class="bi bi-inbox display-4 mb-3"></i>
                  <p class="mb-0">Aucune activité récente à afficher</p>
                </div>
              @else
                @foreach($activites as $activite)
                  <div class="activity-item">
                    <div class="activity-badge">
                      @if($activite['type'] == 'offre')
                        <i class="bi bi-briefcase"></i>
                      @elseif($activite['type'] == 'candidature')
                        <i class="bi bi-person-check"></i>
                      @elseif($activite['type'] == 'entretien')
                        <i class="bi bi-calendar-plus"></i>
                      @endif
                    </div>
                    <div class="activity-content">
                      <div class="activity-time">{{ $activite['date']->diffForHumans() }}</div>
                      <h6 class="fw-bold mb-1">{{ $activite['titre'] }}</h6>
                      <p class="mb-2">{{ $activite['description'] }}</p>
                      <a href="{{ $activite['lien'] }}" class="btn btn-sm btn-outline-primary">Voir détails</a>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
          </div>
        </div>
        
        <!-- Candidats récents -->
        <div class="col-lg-4">
          <div class="dashboard-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="fw-bold mb-0">Candidats récents</h5>
              <a href="{{ route('entreprise.evaluerCandidat', $entreprise) }}" class="small">Voir tous</a>
            </div>
            
            <div class="list-group list-group-flush">
              @if($candidats_recents->isEmpty())
                <div class="text-center text-muted py-4">
                  <i class="bi bi-people display-4 mb-3"></i>
                  <p class="mb-0">Aucun candidat récent à afficher</p>
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

  <!-- Modal Planifier Entretien -->
  <div class="modal fade" id="scheduleInterviewModal" tabindex="-1" aria-labelledby="scheduleInterviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="scheduleInterviewModalLabel">Planifier un entretien</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          <form id="scheduleInterviewForm">
            <div class="mb-3">
              <label for="candidateSelect" class="form-label">Candidat</label>
              <select class="form-select" id="candidateSelect">
                <option selected>Sélectionner un candidat</option>
                <option value="1">Karim El Mansouri</option>
                <option value="2">Youssef Benali</option>
                <option value="3">Leila Nassiri</option>
                <option value="4">Mehdi El Fassi</option>
                <option value="5">Fatima Zahra</option>
              </select>
            </div>
            
            <div class="mb-3">
              <label for="jobPositionSelect" class="form-label">Poste concerné</label>
              <select class="form-select" id="jobPositionSelect">
                <option selected>Sélectionner un poste</option>
                <option value="1">Développeur Front-end</option>
                <option value="2">Designer UI/UX</option>
                <option value="3">Chef de projet</option>
                <option value="4">Développeur Back-end</option>
                <option value="5">Marketing digital</option>
              </select>
            </div>
            
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="interviewDate" class="form-label">Date</label>
                <input type="date" class="form-control" id="interviewDate">
              </div>
              <div class="col-md-6">
                <label for="interviewTime" class="form-label">Heure</label>
                <input type="time" class="form-control" id="interviewTime">
              </div>
            </div>
            
            <div class="mb-3">
              <label for="interviewType" class="form-label">Type d'entretien</label>
              <select class="form-select" id="interviewType">
                <option value="online" selected>En ligne (visioconférence)</option>
                <option value="phone">Téléphonique</option>
                <option value="inperson">En personne</option>
              </select>
            </div>
            
            <div class="mb-3" id="locationField">
              <label for="interviewLocation" class="form-label">Lieu</label>
              <input type="text" class="form-control" id="interviewLocation" placeholder="Adresse du lieu d'entretien">
            </div>
            
            <div class="mb-3" id="linkField">
              <label for="interviewLink" class="form-label">Lien de visioconférence</label>
              <input type="text" class="form-control" id="interviewLink" placeholder="Lien Zoom, Google Meet, etc.">
            </div>
            
            <div class="mb-3">
              <label for="interviewDuration" class="form-label">Durée (minutes)</label>
              <select class="form-select" id="interviewDuration">
                <option value="15">15 minutes</option>
                <option value="30" selected>30 minutes</option>
                <option value="45">45 minutes</option>
                <option value="60">1 heure</option>
                <option value="90">1 heure 30 minutes</option>
                <option value="120">2 heures</option>
              </select>
            </div>
            
            <div class="mb-3">
              <label for="interviewParticipants" class="form-label">Participants internes</label>
              <input type="text" class="form-control" id="interviewParticipants" placeholder="Noms ou emails séparés par des virgules">
            </div>
            
            <div class="mb-3">
              <label for="interviewNotes" class="form-label">Notes supplémentaires</label>
              <textarea class="form-control" id="interviewNotes" rows="3" placeholder="Informations importantes pour l'entretien..."></textarea>
            </div>
            
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" id="sendReminder" checked>
              <label class="form-check-label" for="sendReminder">
                Envoyer un rappel 24h avant l'entretien
              </label>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary">Confirmer l'entretien</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/js/entreprise/dashboard.js'])
</body>
</html>