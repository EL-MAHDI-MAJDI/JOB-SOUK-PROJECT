<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Évaluer Candidats - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" as="style">
  @vite(['resources/css/StyleEntreprise/evaluercandidat.css'])
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoEntreprise.side-menu activePage='4' :entreprise="$entreprise"/>
  </div>

  <!-- Barre de navigation supérieure enrichie -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoEntreprise.navbar :entreprise="$entreprise"/>
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- Affichage des messages success -->
      @include('partials.flashbag')
      <!-- Affichage des messages d'erreur -->
      @include('partials.flashbag-error')
      <!-- En-tête -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Évaluer Candidats</h2>
          <p class="text-muted mb-0">Examinez et évaluez les candidatures pour vos offres d'emploi</p>
        </div>
        {{-- <div class="d-flex gap-2">
          <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
            <i class="bi bi-funnel me-1"></i> Filtrer
          </button>
        </div> --}}
      </div>

      <!-- Modal pour les filtres -->
      <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="filterModalLabel">Filtrer les candidatures</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="posteFilter" class="form-label">Poste</label>
                <select class="form-select" id="posteFilter">
                  <option value="">Tous les postes</option>
                  <option value="frontend">Développeur Front-end</option>
                  <option value="backend">Développeur Back-end</option>
                  <option value="designer">Designer UI/UX</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="statusFilter" class="form-label">Statut</label>
                <select class="form-select" id="statusFilter">
                  <option value="">Tous les statuts</option>
                  <option value="En attente">En attente</option>
                  <option value="Évaluation terminée">Évaluation terminée</option>
                  <option value="Entretien prévu">Entretien prévu</option>
                  <option value="Entretien terminé">Entretien terminé</option>
                  <option value="Accepté">Accepté</option>
                  <option value="Refusé">Refusé</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="experienceFilter" class="form-label">Années d'expérience</label>
                <input type="range" class="form-range" id="experienceFilter" min="0" max="10" value="0">
                <span id="experienceValue">0+ années</span>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="button" class="btn btn-primary">Appliquer</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Offre  -->
    @if($offres->isEmpty())
      <div class="d-flex flex-column align-items-center justify-content-center py-5">
        <i class="bi bi-briefcase display-3 text-secondary mb-3"></i>
        <h4 class="fw-semibold mb-1">Aucune offre trouvée</h4>
        <p class="text-muted text-center mb-0">Vous n'avez pas encore publié d'offres d'emploi.</p>
      </div>
    @else
      @foreach($offres as $offre)
        <!-- Liste des offres avec candidats -->
        <div class="dashboard-card p-4">
            @php
              $collapseId = 'offer' . $offre->id;
            @endphp
            <div class="offer-card mb-4">
              <div class="offer-header" data-bs-toggle="collapse" href="#{{$collapseId}}" aria-expanded="false">
                <h5>{{$offre->intitule_offre_emploi}}</h5>
                <span class="badge badge-candidate-count rounded-pill">{{ $offre->candidats->count() }} candidat{{ $offre->candidats->count() > 1 ? 's' : '' }}</span>
              </div>
              <div class="collapse show" id="{{ $collapseId }}">
                @if($offre->candidats->isEmpty())
                  <div class="text-center my-4">
                    <i class="bi bi-person-x fs-2 text-secondary"></i>
                    <h6 class="mt-2">Aucun candidat pour cette offre</h6>
                    <p class="text-muted">Attendez que des candidats postulent à cette offre.</p>
                  </div>
                @else
                <div class="table-responsive">
                  <table class="table candidate-table">
                    <thead>
                      <tr>
                        <th>Candidat</th>
                        <th>Expérience</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($offre->candidats as $candidat)
                          <tr class="candidate-row">
                            <td>
                              <div class="candidate-info">
                                <img src="{{ asset('storage/' . $candidat->photoProfile) }}" alt="Profile" class="candidate-img">
                                <div>
                                  <div class="fw-bold">{{$candidat->prenom.' '.$candidat->nom}}</div>
                                  <small class="text-muted">{{$candidat->email}}</small>
                                </div>
                              </div>
                            </td>
                            <td>3 ans</td>
                            <td><span class="status-badge status-new">{{ $candidat->pivot->statut }}</span></td>
                            <td>{{ $candidat->pivot->created_at->format('d/m/Y') }}</td>
                            <td>
                              <div class="d-flex gap-2">
                                <a href="{{ Storage::url($candidat->pivot->fichier) }}" class="btn btn-sm btn-outline-primary">Voir CV</a>
                                <!-- Remplacer le bouton modal par un bouton qui affiche le formulaire -->
                                @if($candidat->pivot->statut === 'En attente')
                                  <button class="btn btn-sm btn-outline-success" type="button" onclick="toggleEvalForm({{ $offre->id }}, {{ $candidat->id }})">Évaluer</button>
                                @endif
                              </div>
                            </td>
                          </tr>
                          <!-- Formulaire d'évaluation caché par défaut -->
                          <tr id="eval-form-row-{{ $offre->id }}-{{ $candidat->id }}" style="display:none;">
                            <td colspan="5">
                              <form method="POST" action="{{ route('entreprise.evaluerCandidat.update', ['entreprise' => $entreprise->id, 'offre' => $offre->id, 'candidat' => $candidat->id]) }}">                            
                                @csrf
                                <div class="row g-3 align-items-end">
                                  <div class="col-md-4">
                                    <label class="form-label">Candidat</label>
                                    <input type="text" class="form-control" readonly value="{{ $candidat->prenom.' '.$candidat->nom }}">
                                  </div>
                                  <div class="col-md-4">
                                    <label class="form-label">Poste</label>
                                    <input type="text" class="form-control" readonly value="{{ $offre->intitule_offre_emploi }}">
                                  </div>
                                  <div class="col-md-4">
                                    <label class="form-label">Score (1-5)</label>
                                    <input type="number" class="form-control" name="scoreEvaluation" min="1" max="5" required>
                                  </div>
                                  <div class="col-md-10 mt-2">
                                    <label class="form-label">Commentaires</label>
                                    <textarea class="form-control" name="commentairesEvaluation" rows="2" placeholder="Ajoutez vos commentaires sur la candidature"></textarea>
                                  </div>
                                  <div class="col-md-2 mt-2 d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    <button type="button" class="btn btn-secondary" onclick="toggleEvalForm({{ $offre->id }}, {{ $candidat->id }})">Annuler</button>
                                  </div>
                                </div>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                @endif
              </div>
            </div>
          </div>
          <!-- Fin du formulaire d'évaluation -->
      @endforeach
    @endif
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/js/entrepriseJs/evaluerCandidat.js'])
  <script>
    function toggleEvalForm(offerId, candidatId) {
      const row = document.getElementById(`eval-form-row-${offerId}-${candidatId}`);
      if (row.style.display === 'none') {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    }
  </script>
</body>
</html>