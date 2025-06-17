<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mes entretiens - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" as="style">
  <style>
    :root {
      --primary: #E74C3C;
      --primary-light: rgba(231, 76, 60, 0.1);
      --secondary: #2ECC71;
      --accent: #FFD700;
      --text-main: #36454F;
      --text-light: #ffffff;
      --background: #ffffff;
      --sidebar-width: 280px;
    }

    body {
      font-family: 'Inter', -apple-system, sans-serif;
      background-color: #f8fafc;
      color: var(--text-main);
      margin-left: var(--sidebar-width);
    }

    /* Barre latérale fixe */
    .side-menu {
      position: fixed;
      left: 0;
      top: 0;
      bottom: 0;
      width: var(--sidebar-width);
      background: var(--background);
      border-right: 1px solid #eee;
      overflow-y: auto;
      z-index: 1000;
    }

    .side-menu .nav-link:hover {
      background: var(--primary-light);
      color: var(--primary);
    }

    .side-menu .nav-link.active {
      background: var(--primary-light);
      color: var(--primary);
    }

    /* Contenu principal */
    .main-content {
      padding: 1.5rem;
      margin-left: 0;
    }

    /* Barre de navigation supérieure enrichie */
    .top-navbar {
      background: var(--background);
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      height: 70px;
      position: sticky;
      top: 0;
      z-index: 100;
      padding: 0 1.5rem;
    }

    .nav-search {
      width: 300px;
      border-radius: 20px;
      border: 1px solid #ddd;
      padding-left: 40px;
    }

    .nav-search-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #6c757d;
    }

    /* Styles spécifiques aux entretiens */
    .interview-card {
      border-left: 4px solid var(--primary);
      transition: all 0.3s ease;
      margin-bottom: 1.5rem;
    }

    .interview-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .company-logo {
      width: 60px;
      height: 60px;
      object-fit: contain;
      border-radius: 8px;
      border: 1px solid #eee;
    }

    .filter-card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      padding: 1.5rem;
      margin-bottom: 1.5rem;
    }

    .status-badge {
      padding: 0.35em 0.65em;
      border-radius: 50rem;
      font-size: 0.75em;
      font-weight: 700;
    }

    .status-badge.scheduled {
      background-color: #17a2b8;
      color: #fff;
    }

    .status-badge.completed {
      background-color: #28a745;
      color: #fff;
    }

    .status-badge.canceled {
      background-color: #dc3545;
      color: #fff;
    }

    .status-badge.pending {
      background-color: #ffc107;
      color: #000;
    }

    .empty-state {
      text-align: center;
      padding: 4rem 0;
    }

    .empty-state-icon {
      font-size: 5rem;
      color: #dee2e6;
      margin-bottom: 1.5rem;
    }

    /* Bouton scroll to top */
    #scrollTop {
      position: fixed;
      bottom: 30px;
      right: 30px;
      display: none;
      z-index: 1050;
    }
    
    /* Version mobile */
    @media (max-width: 992px) {
      body {
        margin-left: 0;
      }
      
      .side-menu {
        transform: translateX(-100%);
        transition: transform 0.3s ease;
      }
      
      .side-menu.show {
        transform: translateX(0);
      }
      
      .nav-search {
        width: 200px;
      }
    }

    .p-3 {
      height: auto;
    }

    .interview-type {
      padding: 0.25rem 0.75rem;
      border-radius: 50px;
      font-size: 0.85rem;
      font-weight: 500;
    }

    .type-onsite {
      background-color: #D4EDDA;
      color: #155724;
    }

    .type-remote {
      background-color: #CCE5FF;
      color: #004085;
    }

    .type-phone {
      background-color: #FFF3CD;
      color: #856404;
    }

    /* Styles spécifiques aux modales */
    .modal-header {
      border-bottom: none;
      padding-bottom: 0;
    }
    
    .modal-footer {
      border-top: none;
    }
    
    .modal-content {
      border-radius: 12px;
      border: none;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    .modal-body {
      padding: 1.5rem;
    }
    
    .interview-details dt {
      font-weight: 500;
      color: var(--text-main);
    }
    
    .interview-details dd {
      margin-bottom: 1rem;
    }
    
    .feedback-rating {
      font-size: 1.5rem;
      color: #ffc107;
      cursor: pointer;
    }
    .p-3 {
        height: 47px;
    }
  </style>
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoCandidat.side-menu activePage=7 :candidat='$candidat' />
  </div>

  <!-- Barre de navigation supérieure enrichie -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoCandidat.navbar :candidat='$candidat' />
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- En-tête -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Mes entretiens</h2>
        </div>
      </div>

      <!-- Filtres -->
      <div class="filter-card mb-4">
        <div class="row g-3">
          <div class="col-md-3">
            <label class="form-label">Statut</label>
            <select class="form-select">
              <option selected>Tous les statuts</option>
              <option>Programmé</option>
              <option>Terminé</option>
              <option>Annulé</option>
              <option>En attente</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Type d'entretien</label>
            <select class="form-select">
              <option selected>Tous les types</option>
              <option>En personne</option>
              <option>À distance</option>
              <option>Téléphonique</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Date</label>
            <select class="form-select">
              <option selected>Toutes les dates</option>
              <option>Aujourd'hui</option>
              <option>Cette semaine</option>
              <option>Ce mois</option>
              <option>Passés</option>
              <option>Futurs</option>
            </select>
          </div>
          <div class="col-md-3 d-flex align-items-end">
            <button class="btn btn-outline-danger w-100">
              <i class="bi bi-trash me-2"></i>Supprimer la sélection
            </button>
          </div>
        </div>
      </div>

      <!-- Liste des entretiens -->
      <div class="row">
        <div class="col-12">
          @forelse($entretiens as $entretien)
          <div class="interview-card card mb-3">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-md-1 text-center">
                  <img src="{{ asset('storage/' . $entretien->candidature->offreEmploi->entreprise->logo) }}" alt="Logo" class="company-logo">
                </div>
                <div class="col-md-7">
                  <h5 class="mb-1">{{ $entretien->candidature->offreEmploi->intitule_offre_emploi }}</h5>
                  <p class="text-muted mb-2">{{ $entretien->candidature->offreEmploi->entreprise->nomEntreprise }}</p>
                  <div class="d-flex flex-wrap gap-2 align-items-center">
                    <span class="status-badge {{ $entretien->statut === 'En attente' ? 'pending' : 'scheduled' }}">
                      {{ $entretien->statut }}
                    </span>
                    @if($entretien->type === 'EnPersonne')
                      <span class="interview-type type-onsite">En personne</span>
                    @elseif($entretien->type === 'Telephonique')
                      <span class="interview-type type-phone">Téléphonique</span>
                    @else
                      <span class="interview-type type-remote">À distance</span>
                    @endif
                    <span class="text-muted"><i class="bi bi-calendar me-1"></i>{{ \Carbon\Carbon::parse($entretien->date_entretien)->format('d M Y') }} - {{ \Carbon\Carbon::parse($entretien->heure_debut)->format('H:i') }}</span>                    <span class="text-muted"><i class="bi bi-clock me-1"></i>Durée: {{ $entretien->heure_fin ? \Carbon\Carbon::parse($entretien->heure_debut)->diffInMinutes(\Carbon\Carbon::parse($entretien->heure_fin)) : '1h' }}min</span>
                    @if($entretien->type === 'EnPersonne')
                      <span class="text-muted"><i class="bi bi-geo-alt me-1"></i>{{ $entretien->enPersonnes->lieu ?? 'Lieu non spécifié' }}</span>
                    @elseif($entretien->type === 'Telephonique')
                      <span class="text-muted"><i class="bi bi-telephone me-1"></i>{{ $entretien->telephoniques->numero_telephone ?? 'Numéro non spécifié' }}</span>
                    @else
                      <span class="text-muted"><i class="bi bi-link-45deg me-1"></i>{{ $entretien->visioconferences->lien ?? 'Lien non spécifié' }}</span>
                    @endif
                  </div>
                </div>
                <div class="col-md-4 text-end">
                  <div class="d-flex justify-content-end gap-2">
                    @if($entretien->statut === 'En attente')
                    <form action="{{ route('candidat.mesEntretiens.confirm',["candidat" => $candidat->id, "entretien" => $entretien->id]) }}" method="POST" class="d-inline">
                      @csrf
                        <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir confirmer cet entretien ?')">
                          <i class="bi bi-calendar-check me-1"></i>Confirmer
                        </button>
                      </form>
                      @endif
                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#interviewDetailsModal" onclick="showInterviewDetails({
                      'titre': '{{ addslashes($entretien->candidature->offreEmploi->intitule_offre_emploi) }}',
                      'entreprise': '{{ addslashes($entretien->candidature->offreEmploi->entreprise->nomEntreprise) }}',
                      'date': '{{ \Carbon\Carbon::parse($entretien->date_entretien)->format('d M Y') }} - {{ \Carbon\Carbon::parse($entretien->heure_debut)->format('H:i') }} ({{ $entretien->heure_fin ? \Carbon\Carbon::parse($entretien->heure_debut)->diffInMinutes(\Carbon\Carbon::parse($entretien->heure_fin)) : '1h' }}min)',
                      'type': '{{ $entretien->type }}',
                      'statut': '{{ $entretien->statut }}',
                      'connexion': '{{ $entretien->type === 'EnPersonne' ? $entretien->enPersonnes->lieu : ($entretien->type === 'Telephonique' ? $entretien->telephoniques->numero_telephone : $entretien->visioconferences->lien) }}',
                      'participant': '{{ $entretien->participant }}',
                      'email': '{{ $entretien->candidature->offreEmploi->email_contact ?? ($entretien->candidature->offreEmploi->entreprise->email ?? 'Non spécifié') }}',
                      'phone': '{{ $entretien->candidature->offreEmploi->telephone_contact ?? ($entretien->candidature->offreEmploi->entreprise->phone ?? 'Non spécifié') }}',
                      'notes': '{{ $entretien->notes ?? 'Aucune note' }}'
                    })">
                      <i class="bi bi-info-circle me-1"></i>Détails
                    </button>
                    @if($entretien->statut === 'En attente')
                      <button class="btn btn-warning btn-sm" title="Attention" onclick="showWarningPopup()">
                        <i class="bi bi-exclamation-triangle me-1"></i>Attention
                      </button>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
          @empty
            <div class="empty-state text-center">
              <i class="bi bi-calendar3 text-muted empty-state-icon"></i>
              <h4 class="text-muted mb-3">Aucun entretien prévu</h4>
              <p class="text-muted">Vous n'avez pas d'entretiens prévus pour le moment.</p>
            </div>
          @endforelse
        </div>
      </div>
    </div>

    <!-- Modal: Détails de l'entretien -->
    <div class="modal fade" id="interviewDetailsModal" tabindex="-1" aria-labelledby="interviewDetailsModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title fw-bold" id="interviewDetailsModalLabel">Détails de l'entretien</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="text-center mb-4">
              <h4 id="modalTitre"></h4>
              <p class="text-muted" id="modalEntreprise"></p>
            </div>
            
            <dl class="interview-details">
              <dt>Date et heure</dt>
              <dd id="modalDate"></dd>
              
              <dt>Type</dt>
              <dd id="modalType"></dd>
              
              <dt>Statut</dt>
              <dd id="modalStatut"></dd>
              
              <dt>Méthode de connexion</dt>
              <dd id="modalConnexion"></dd>
              
              <dt>Participant</dt>
              <dd id="modalContact"></dd>
              
              <dt>Email</dt>
              <dd id="modalEmail"></dd>
              
              <dt>Téléphone</dt>
              <dd id="modalPhone"></dd>
              
              <dt>Notes supplémentaires</dt>
              <dd id="modalNotes"></dd>
            </dl>
          </div>
        </div>
      </div>
    </div>

    <!-- Pop-up d'avertissement -->
    <div class="modal fade" id="warningModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-warning"><i class="bi bi-exclamation-triangle me-2"></i>Attention</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p class="text-center mb-0">Si vous ne confirmez pas l'entretien 24 heures avant sa date prévue, celui-ci sera automatiquement annulé.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>

  <!-- Bouton scroll to top -->
  <button id="scrollTop" class="btn btn-danger">
    <i class="bi bi-arrow-up"></i>
  </button>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Afficher/masquer le bouton de retour en haut
    window.onscroll = function() {
      const scrollBtn = document.getElementById("scrollTop");
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollBtn.style.display = "block";
      } else {
        scrollBtn.style.display = "none";
      }
    };

    // Scroll vers le haut
    document.getElementById("scrollTop").addEventListener("click", function() {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });

    // Fonction pour afficher les détails de l'entretien
    function showInterviewDetails(details) {
      // Mettre à jour les éléments du modal avec les détails de l'entretien
      document.getElementById('modalTitre').textContent = details.titre;
      document.getElementById('modalEntreprise').textContent = details.entreprise;
      document.getElementById('modalDate').textContent = details.date;
      
      // Mettre à jour le type avec la classe appropriée
      const typeElement = document.createElement('span');
      typeElement.className = 'interview-type ' + (details.type === 'EnPersonne' ? 'type-onsite' : (details.type === 'Telephonique' ? 'type-phone' : 'type-remote'));
      typeElement.textContent = details.type === 'EnPersonne' ? 'En personne' : (details.type === 'Telephonique' ? 'Téléphonique' : 'À distance');
      document.getElementById('modalType').innerHTML = '';
      document.getElementById('modalType').appendChild(typeElement);
      
      // Mettre à jour le statut avec la classe appropriée
      const statutElement = document.createElement('span');
      statutElement.className = 'status-badge ' + (details.statut === 'En attente' ? 'pending' : 'scheduled');
      statutElement.textContent = details.statut;
      document.getElementById('modalStatut').innerHTML = '';
      document.getElementById('modalStatut').appendChild(statutElement);
      
      document.getElementById('modalConnexion').textContent = details.connexion;
      document.getElementById('modalContact').textContent = details.contact;
      document.getElementById('modalEmail').textContent = details.email;
      document.getElementById('modalPhone').textContent = details.phone;
      document.getElementById('modalNotes').textContent = details.notes;
      document.getElementById('modalContact').textContent = details.participant;
    }
    
    // Toggle sidebar on mobile
    document.getElementById('menuToggle').addEventListener('click', function() {
      document.querySelector('.side-menu').classList.toggle('show');
    });

    // Gestion des champs dynamiques dans le formulaire d'ajout
    document.getElementById('interviewType').addEventListener('change', function() {
      const type = this.value;
      document.getElementById('locationField').classList.add('d-none');
      document.getElementById('remoteField').classList.add('d-none');
      document.getElementById('phoneField').classList.add('d-none');
      
      if (type === 'En personne') {
        document.getElementById('locationField').classList.remove('d-none');
      } else if (type === 'À distance') {
        document.getElementById('remoteField').classList.remove('d-none');
      } else if (type === 'Téléphonique') {
        document.getElementById('phoneField').classList.remove('d-none');
      }
    });

    // Gestion des champs dynamiques dans le formulaire d'édition
    document.getElementById('editInterviewType').addEventListener('change', function() {
      const type = this.value;
      document.getElementById('editLocationField').classList.add('d-none');
      
      if (type === 'En personne') {
        document.getElementById('editLocationField').classList.remove('d-none');
      }
    });

    // Gestion du champ "Autre raison" dans l'annulation
    document.getElementById('cancelReason').addEventListener('change', function() {
      if (this.value === 'Autre raison') {
        document.getElementById('otherReasonField').classList.remove('d-none');
      } else {
        document.getElementById('otherReasonField').classList.add('d-none');
      }
    });

    // Système de notation par étoiles
    const stars = document.querySelectorAll('.feedback-rating i');
    stars.forEach((star, index) => {
      star.addEventListener('click', function() {
        stars.forEach((s, i) => {
          if (i <= index) {
            s.classList.add('bi-star-fill');
            s.classList.remove('bi-star');
          } else {
            s.classList.add('bi-star');
            s.classList.remove('bi-star-fill');
          }
        });
      });
    });

    // Gestion des boutons d'annulation
    document.querySelectorAll('.cancel-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        // Cette fonctionnalité est maintenant gérée par la modale Bootstrap
      });
    });

    // Sélection multiple pour suppression
    document.querySelector('.btn-outline-danger').addEventListener('click', function() {
      const selectedCards = document.querySelectorAll('.interview-card .form-check-input:checked');
      if (selectedCards.length === 0) {
        alert("Veuillez sélectionner au moins un entretien à supprimer");
        return;
      }
      
      if (confirm(`Voulez-vous vraiment supprimer ${selectedCards.length} entretien(s) ?`)) {
        selectedCards.forEach(card => {
          card.closest('.interview-card').remove();
        });
        // Afficher un message temporaire
        const toast = document.createElement('div');
        toast.className = 'position-fixed bottom-0 end-0 p-3';
        toast.innerHTML = `
          <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
              <strong class="me-auto">Succès</strong>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              ${selectedCards.length} entretien(s) supprimé(s)
            </div>
          </div>
        `;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
      }
    });
    // gestion attention
    function showWarningPopup() {
        var warningModal = new bootstrap.Modal(document.getElementById('warningModal'));
        warningModal.show();
      }
  </script>
</body>
</html>