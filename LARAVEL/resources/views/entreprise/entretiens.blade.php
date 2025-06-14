<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Entretiens - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  @vite(['resources/css/StyleEntreprise/entretiens.css'])
</head>
<body>
  @php
    use Carbon\Carbon;
  @endphp
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoEntreprise.side-menu activePage='6' :entreprise="$entreprise" />
  </div>

  <!-- Barre de navigation supérieure -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoEntreprise.navbar :entreprise="$entreprise"/>
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- afficher les messages flash -->
      @include('partials.flashbag')
      <!-- afficher les messages d'erreurs -->
      @include('partials.flashbag-error')
      <!-- En-tête -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Gestion des Entretiens</h2>
          <p class="text-muted mb-0">Planifiez et suivez vos entretiens avec les candidats</p>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newInterviewModal">
          <i class="bi bi-plus-lg"></i> Nouvel entretien
        </button>
      </div>
      
      <!-- Filtres et recherche -->
      <div class="dashboard-card p-4 mb-4">
        <div class="row g-3">
          <div class="col-md-3">
            <label class="form-label">Statut</label>
            <select class="form-select">
              <option selected>Tous les statuts</option>
              <option>Planifié</option>
              <option>Confirmé</option>
              <option>Terminé</option>
              <option>Annulé</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Date</label>
            <select class="form-select">
              <option selected>Toutes les dates</option>
              <option>Aujourd'hui</option>
              <option>Cette semaine</option>
              <option>Ce mois</option>
              <option>Personnalisé</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Type</label>
            <select class="form-select">
              <option selected>Tous les types</option>
              <option>En personne</option>
              <option>Visioconférence</option>
              <option>Téléphonique</option>
            </select>
          </div>
          <div class="col-md-3 d-flex align-items-end">
            <button class="btn btn-outline-secondary w-100">
              <i class="bi bi-funnel"></i> Filtrer
            </button>
          </div>
        </div>
      </div>
      
      <!-- Statistiques rapides -->
      <div class="row mb-4">
        <div class="col-md-3">
          <div class="dashboard-card p-3 text-center">
            <h5 class="fw-bold mb-1">24</h5>
            <p class="text-muted mb-0">Planifiés</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-card p-3 text-center">
            <h5 class="fw-bold mb-1">18</h5>
            <p class="text-muted mb-0">Confirmés</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-card p-3 text-center">
            <h5 class="fw-bold mb-1">12</h5>
            <p class="text-muted mb-0">Terminés</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-card p-3 text-center">
            <h5 class="fw-bold mb-1">3</h5>
            <p class="text-muted mb-0">Annulés</p>
          </div>
        </div>
      </div>
      <!-- Liste des entretiens -->
      <div class="dashboard-card p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="section-title fw-bold">Entretiens à venir</h4>
        </div>
        @if ($entretiensAll->where('statut', 'En attente')->isEmpty() && $entretiensAll->where('statut', 'Confirme')->isEmpty())
          <div class="text-center text-muted py-4">
            <i class="bi bi-calendar-check display-1 mb-3"></i>
            <p>Aucun entretien à venir</p>
          </div>
        @else
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead>
                <tr>
                  <th>Candidat</th>
                  <th>Poste</th>
                  <th>Type</th>
                  <th>Date & Heure</th>
                  <th>Statut</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($entretiensAll as $entretien)
                  @if ($entretien->statut == 'En attente' || $entretien->statut == 'Confirmé')
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <img src="{{ asset('storage/' . $entretien->candidature->candidat->photoProfile) }}" alt="Profile" class="rounded-circle me-2" width="40" height="40">
                        <div>
                          <h6 class="mb-0 fw-bold">{{ $entretien->candidature->candidat->nom }} {{ $entretien->candidature->candidat->prenom }}</h6>
                          <small class="text-muted">{{ $entretien->candidature->candidat->email }}</small>
                        </div>
                      </div>
                    </td>
                    <td>{{ $entretien->candidature->offreEmploi->intitule_offre_emploi }}</td>
                    @if ($entretien->type_entretien == 'visio')
                      <td><span class="badge bg-primary bg-opacity-10 text-primary"><i class="bi bi-camera-video"></i> Visio</span></td>
                    @elseif ($entretien->type_entretien == 'telephone')
                      <td><span class="badge bg-info bg-opacity-10 text-info"><i class="bi bi-telephone"></i> Téléphone</span></td>
                    @else
                      <td><span class="badge bg-secondary bg-opacity-10 text-secondary"><i class="bi bi-person"></i> En personne</span></td>
                    @endif
                    <td>
                      <div>{{ \Carbon\Carbon::parse($entretien->date_entretien)->format('d M Y') }}</div>
                      <small class="text-muted">{{ \Carbon\Carbon::parse($entretien->date_entretien)->format('H:i') }} - {{ \Carbon\Carbon::parse($entretien->date_entretien)->addMinutes(30)->format('H:i') }}</small>
                    </td>
                    <td><span class="badge bg-success bg-opacity-10 text-success">
                      @if ($entretien->statut == 'En attente')
                        <i class="bi bi-hourglass-split"></i> En attente
                      @elseif ($entretien->statut == 'Confirmé')
                        <i class="bi bi-check-circle"></i> Confirmé
                      @elseif ($entretien->statut == 'Terminé')
                        <i class="bi bi-check2-circle"></i> Terminé
                      @endif
                    </span></td>
                    <td>
                      <button class="btn btn-sm btn-outline-primary me-1" title="Détails">
                        <i class="bi bi-eye"></i>
                      </button>
                      <button class="btn btn-sm btn-outline-secondary me-1" title="Modifier">
                        <i class="bi bi-pencil"></i>
                      </button>
                      <button class="btn btn-sm btn-outline-danger" title="Annuler">
                        <i class="bi bi-x-circle"></i>
                      </button>
                    </td>
                  </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        @endif
      </div>
      <!-- Entretiens passés -->
      <div class="dashboard-card p-4 mt-4">
        <h4 class="section-title fw-bold mb-3">Entretiens passés</h4>
        @if ($entretiensAll->where('statut', 'Terminé')->isEmpty())
          <div class="text-center text-muted py-4">
            <i class="bi bi-calendar-check display-1 mb-3"></i>
            <p>Aucun entretien passé pour le moment</p>
          </div>
        @else
          <div class="accordion" id="pastInterviewsAccordion">
            @foreach ($entretiensAll as $entretien)
              @if ($entretien->statut == 'Terminé')
                <div class="accordion-item border-0 mb-2">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $entretien->id }}">
                      <div class="d-flex align-items-center">
                        <img src="{{ asset('storage/' . $entretien->candidature->candidat->photoProfile) }}" alt="Profile" class="rounded-circle me-2" width="40" height="40">
                        <div>
                          <h6 class="mb-0 fw-bold">{{ $entretien->candidature->candidat->nom }} {{ $entretien->candidature->candidat->prenom }}</h6>
                          <small class="text-muted">{{$entretien->candidature->offreEmploi->intitule_offre_emploi}} • {{ \Carbon\Carbon::parse($entretien->date_entretien)->format('d M Y') }}</small>
                        </div>
                      </div>
                    </button>
                  </h2>
                  <div id="collapse{{ $entretien->id }}" class="accordion-collapse collapse" data-bs-parent="#pastInterviewsAccordion">
                    <div class="accordion-body pt-0">
                      <div class="row">
                        <div class="col-md-6">
                          <h6 class="fw-bold">Détails de l'entretien</h6>
                          <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-calendar me-2"></i> {{ \Carbon\Carbon::parse($entretien->date_entretien)->format('d M Y') }}, {{ $entretien->heure_debut }} - {{ $entretien->heure_fin }}</li>
                            <li class="mb-2"><i class="bi bi-person me-2"></i> Avec: {{ $entretien->participant }}</li>
                          </ul>
                        </div>
                        <div class="col-md-6">
                          <div>
                            <span class="fw-bold me-2">Statut:</span>
                            <span class="badge bg-primary">{{ $entretien->candidature->statut }}</span>
                          </div>
                        </div>
                      </div>
                      <div class="mt-3">
                        <button class="btn btn-sm btn-outline-primary me-2">
                          <i class="bi bi-file-earmark-text"></i> Voir les notes complètes
                        </button>
                        <button class="btn btn-sm btn-outline-secondary">
                          <i class="bi bi-arrow-repeat"></i> Reprogrammer
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              @endif
            @endforeach
          </div>
        @endif
      </div>
      <!-- Modal Nouvel Entretien -->
      <div class="modal fade" id="newInterviewModal" tabindex="-1" aria-labelledby="newInterviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fw-bold" id="newInterviewModalLabel">Planifier un nouvel entretien</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('entreprise.entretiens.store', $entreprise->id) }}">
                @csrf
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="offre_id" class="form-label">Poste concerné*</label>
                    <select class="form-select @error('offre_id') is-invalid @enderror" id="offre_id" name="offre_id" required>
                      <option value="" selected disabled>Sélectionner un poste</option>
                      @foreach($offres as $offre)
                        <option value="{{ $offre->id }}" {{ old('offre_id') == $offre->id ? 'selected' : '' }}>{{ $offre->intitule_offre_emploi }}</option>
                      @endforeach
                    </select>
                    @error('offre_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label for="candidat_id" class="form-label">Candidature*</label>
                    <select class="form-select @error('candidat_id') is-invalid @enderror" id="candidat_id" name="candidat_id" required disabled>
                      <option value="" selected disabled>Sélectionner d'abord un poste</option>
                    </select>
                    @error('candidat_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="interviewDate" class="form-label">Date*</label>
                    <input type="date" class="form-control @error('date_entretien') is-invalid @enderror" id="interviewDate" name="date_entretien" required value="{{ old('date') }}">
                    @error('date_entretien')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-3">
                    <label for="startTime" class="form-label">Heure de début*</label>
                    <input type="time" class="form-control @error('heure_debut') is-invalid @enderror" id="startTime" name="heure_debut" required value="{{ old('heure_debut') }}">
                    @error('heure_debut')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-3">
                    <label for="endTime" class="form-label">Heure de fin</label>
                    <input type="time" class="form-control @error('heure_fin') is-invalid @enderror" id="endTime" name="heure_fin" required value="{{ old('heure_fin') }}">
                    @error('heure_fin')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label class="form-label">Type d'entretien*</label>
                    <div class="d-flex gap-3">
                      <div class="form-check">
                        <input class="form-check-input @error('type') is-invalid @enderror" type="radio" name="type" id="typeVideo" value="Visioconference" {{ old('type', 'Visioconference') == 'Visioconference' ? 'checked' : '' }}>
                        <label class="form-check-label" for="typeVideo">
                          <i class="bi bi-camera-video"></i> Visioconférence
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="typeInPerson" value="EnPersonne" {{ old('type') == 'EnPersonne' ? 'checked' : '' }}>
                        <label class="form-check-label" for="typeInPerson">
                          <i class="bi bi-person"></i> En personne
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="typePhone" value="Telephonique" {{ old('type') == 'Telephonique' ? 'checked' : '' }}>
                        <label class="form-check-label" for="typePhone">
                          <i class="bi bi-telephone"></i> Téléphonique
                        </label>
                      </div>
                    </div>
                    @error('type')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label for="participants" class="form-label">Participant*</label>
                    <select class="form-select @error('participant') is-invalid @enderror" id="participants" name="participant">
                      <option value="Responsable RH" {{ old('participant') == 'Responsable RH' ? 'selected' : '' }}>Responsable RH</option>
                      <option value="Tech Lead" {{ old('participant') == 'Tech Lead' ? 'selected' : '' }}>Tech Lead</option>
                      <option value="Manager" {{ old('participant') == 'Manager' ? 'selected' : '' }}>Manager</option>
                      <option value="CEO" {{ old('participant') == 'CEO' ? 'selected' : '' }}>CEO</option>
                    </select>
                    @error('participant')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="mb-3 d-none" id="phoneDetails">
                  <label for="numero_telephone" class="form-label">Numéro de téléphone*</label>
                  <input type="tel" class="form-control @error('numero_telephone') is-invalid @enderror" id="numero_telephone" name="numero_telephone" placeholder="+212 6XX XXX XXX" value="{{ old('numero_telephone') }}">
                  @error('numero_telephone')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3" id="videoConferenceDetails">
                  <label for="lien_reunion" class="form-label">Lien de la réunion*</label>
                  <input type="url" class="form-control @error('lien') is-invalid @enderror" id="lien_reunion" name="lien" placeholder="https://zoom.us/j/123456789" value="{{ old('lien_reunion') }}">
                  @error('lien')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3 d-none" id="locationDetails">
                  <label for="lieu" class="form-label">Lieu*</label>
                  <input type="text" class="form-control @error('lieu') is-invalid @enderror" id="lieu" name="lieu" placeholder="Adresse complète" value="{{ old('lieu') }}">
                  @error('lieu')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="notes" class="form-label">Notes supplémentaires</label>
                  <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="3" placeholder="Points à aborder, informations importantes...">{{ old('notes') }}</textarea>
                  @error('notes')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                {{-- <div class="form-check mb-4">
                  <input class="form-check-input @error('envoyer_invitation') is-invalid @enderror" type="checkbox" id="sendInvitation" name="envoyer_invitation" value="1" {{ old('envoyer_invitation', '1') == '1' ? 'checked' : '' }}>
                  <label class="form-check-label" for="sendInvitation">
                    Envoyer une invitation par email au candidat
                  </label>
                  @error('envoyer_invitation')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div> --}}
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                  <button type="submit" class="btn btn-primary">Planifier l'entretien</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      @vite(['resources/js/entrepriseJs/entretiens.js'])
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          // Récupérer les éléments du DOM
          const offreSelect = document.getElementById('offre_id');
          const candidatureSelect = document.getElementById('candidat_id');
          
          // Stocker toutes les candidatures pour pouvoir filtrer
          const candidatures = [
            @foreach($candidatures as $candidature)
              {
                id: {{ $candidature->candidat->id }},
                offreId: {{ $candidature->offreEmploi->id }},
                candidatNom: "{{ $candidature->candidat->nom }} {{ $candidature->candidat->prenom }}",
                posteNom: "{{ $candidature->offreEmploi->intitule_offre_emploi }}"
              },
            @endforeach
          ];
          
          // Fonction pour mettre à jour les options du select de candidatures
          function updateCandidatureOptions(offreId) {
            // Vider le select
            candidatureSelect.innerHTML = '';
            
            // Filtrer les candidatures pour l'offre sélectionnée
            const filteredCandidatures = candidatures.filter(c => c.offreId == offreId);
            
            // Si aucune candidature trouvée
            if (filteredCandidatures.length === 0) {
              const option = document.createElement('option');
              option.disabled = true;
              option.selected = true;
              option.textContent = 'Aucune candidature pour ce poste';
              candidatureSelect.appendChild(option);
              candidatureSelect.disabled = true;
              return;
            }
            
            // Ajouter l'option par défaut
            const defaultOption = document.createElement('option');
            defaultOption.disabled = true;
            defaultOption.selected = true;
            defaultOption.value = '';
            defaultOption.textContent = 'Sélectionner une candidature';
            candidatureSelect.appendChild(defaultOption);
            
            // Ajouter les options filtrées
            filteredCandidatures.forEach(candidature => {
              const option = document.createElement('option');
              option.value = candidature.id;
              option.textContent = `${candidature.candidatNom} - ${candidature.posteNom}`;
              candidatureSelect.appendChild(option);
            });
            
            // Activer le select
            candidatureSelect.disabled = false;
          }
          
          // Écouter les changements sur le select de poste
          offreSelect.addEventListener('change', function() {
            const selectedOffreId = this.value;
            if (selectedOffreId) {
              updateCandidatureOptions(selectedOffreId);
            } else {
              // Réinitialiser et désactiver le select de candidatures
              candidatureSelect.innerHTML = '<option value="" selected disabled>Sélectionner d\'abord un poste</option>';
              candidatureSelect.disabled = true;
            }
          });
        });
      </script>
    </body>
  </html>