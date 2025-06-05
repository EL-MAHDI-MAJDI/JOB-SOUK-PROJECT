<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Offres sauvegardées - Job Souk</title>
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

    /* Styles spécifiques aux offres sauvegardées */
    .job-card {
      border-left: 4px solid var(--primary);
      transition: all 0.3s ease;
      margin-bottom: 1.5rem;
    }

    .job-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .job-type {
      padding: 0.25rem 0.75rem;
      border-radius: 50px;
      font-size: 0.85rem;
      font-weight: 500;
    }

    .type-fulltime {
      background-color: #D4EDDA;
      color: #155724;
    }

    .type-parttime {
      background-color: #CCE5FF;
      color: #004085;
    }

    .type-internship {
      background-color: #FFF3CD;
      color: #856404;
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

    .save-btn {
      width: 40px;
      height: 40px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
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

    /* Badges de statut */
    .status-badge {
      padding: 0.35em 0.65em;
      border-radius: 50rem;
      font-size: 0.75em;
      font-weight: 700;
    }

    .status-badge.pending {
      background-color: #ffc107;
      color: #000;
    }

    .status-badge.interview {
      background-color: #17a2b8;
      color: #fff;
    }

    .status-badge.accepted {
      background-color: #28a745;
      color: #fff;
    }

    .status-badge.rejected {
      background-color: #dc3545;
      color: #fff;
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
        height: 47px;
    }
  </style>
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoCandidat.side-menu activePage=6 :candidat='$candidat'/>
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
          <h2 class="fw-bold mb-1">Offres sauvegardées</h2>
        </div>
        <div class="d-flex gap-2">
          <button class="btn btn-outline-primary"><i class="bi bi-filter me-2"></i>Filtrer</button>
          <button class="btn btn-primary"><i class="bi bi-search me-2"></i>Rechercher</button>
        </div>
      </div>

      <!-- Filtres -->
      <div class="filter-card mb-4">
        <div class="row g-3">
          <div class="col-md-3">
            <label class="form-label">Trier par</label>
            <select class="form-select">
              <option selected>Date d'ajout (plus récent)</option>
              <option>Date d'ajout (plus ancien)</option>
              <option>Date d'expiration</option>
              <option>Salaire (croissant)</option>
              <option>Salaire (décroissant)</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Type de contrat</label>
            <select class="form-select">
              <option selected>Tous les types</option>
              <option>Temps plein</option>
              <option>Temps partiel</option>
              <option>Stage</option>
              <option>Freelance</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Localisation</label>
            <select class="form-select">
              <option selected>Toutes les localisations</option>
              <option>Casablanca</option>
              <option>Rabat</option>
              <option>Marrakech</option>
              <option>Tanger</option>
              <option>Autre</option>
            </select>
          </div>
          <div class="col-md-3 d-flex align-items-end">
            <button class="btn btn-outline-danger w-100">
              <i class="bi bi-trash me-2"></i>Supprimer la sélection
            </button>
          </div>
        </div>
      </div>

      <!-- Liste des offres sauvegardées -->
      <div class="row">
        <div class="col-12">
          <!-- Offre 1 -->
          @if($offresSauvegardees->isEmpty())
            <div class="text-center text-muted py-5">
              <i class="bi bi-briefcase fs-1 mb-2"></i><br>
              <span>Aucune offre d'emploi trouvée.</span>
            </div>
          @else
            <!-- Offre  -->
            @foreach($offresSauvegardees as $offre)
            <div class="job-card card mb-3">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-md-1 text-center">
                    <img src="{{ asset('storage/' . $offre->entreprise->logo) }}" alt="Logo" class="company-logo">
                  </div>
                  <div class="col-md-7">
                    <h5 class="mb-1">{{$offre->intitule_offre_emploi}}</h5>
                    <p class="text-muted mb-2">{{$offre->entreprise->nomEntreprise}} - {{$offre->localisation}}</p>
                    <div class="d-flex flex-wrap gap-2">
                      <span class="job-type type-fulltime">{{$offre->type_contrat}}</span>
                      <span class="text-muted"><i class="bi bi-geo-alt me-1"></i>{{$offre->localisation}}</span>
                      @if($offre->salaire_offre_emploi) <span class="text-muted"><i class="bi bi-cash-coin me-1"></i>{{$offre->salaire_offre_emploi}} MAD/mois</span> @endif
                      <span class="text-muted"><i class="bi bi-clock me-1"></i>Publiée {{ $offre->created_at->diffForHumans() }}</span>
                      <span class="text-muted"><i class="bi bi-hourglass-bottom me-1"></i>Dernier délai {{$offre->date_limite_candidature}}</span>
                    </div>
                  </div>
                  <div class="col-md-4 text-end">
                    <button class="btn btn-primary me-2" title="Postuler">Postuler</button>
                    <!-- @php
                        $isSaved = in_array($offre->id, $offresSauvegardeesIds ?? []);
                    @endphp -->
                    <form method="POST" action="{{ route('candidat.chercherOffres.sauvegarder', ['candidat' => $candidat->id, 'offre' => $offre->id]) }}" style="display:inline;">
                        @csrf
                        <button type="submit"
                            class="btn save-btn btn-warning" {{-- $isSaved ? 'btn-warning' : 'btn-outline-secondary' --}}"
                            title="Sauvegarder" name="save">
                            <i class="bi bi-bookmark-fill" {{-- $isSaved ? 'bi-bookmark-fill' : 'bi-bookmark' --}}"></i>
                        </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            
            <!-- Pagination -->
            <!-- <div class="d-flex justify-content-center mt-3">
              {{-- $offresSauvegardees->links('pagination::bootstrap-4') --}}
            </div> -->
          @endif
          
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

    // Scroll to top
    document.getElementById("scrollTop").addEventListener("click", function() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    });

    // Toggle sidebar on mobile
    document.getElementById('menuToggle').addEventListener('click', function() {
      document.querySelector('.side-menu').classList.toggle('show');
    });

    // Gestion des boutons de sauvegarde
    document.querySelectorAll('.save-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        // Confirmation avant suppression
        if (confirm("Voulez-vous vraiment supprimer cette offre de vos sauvegardes ?")) {
          this.closest('.job-card').remove();
          // Mettre à jour le compteur (pour démonstration)
          const countElement = document.querySelector('.nav-link.active .badge');
          if (countElement) {
            const currentCount = parseInt(countElement.textContent);
            countElement.textContent = currentCount - 1;
          }
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
                Offre supprimée de vos sauvegardes
              </div>
            </div>
          `;
          document.body.appendChild(toast);
          setTimeout(() => toast.remove(), 3000);
        }
      });
    });

    // Sélection multiple pour suppression
    document.querySelector('.btn-outline-danger').addEventListener('click', function() {
      const selectedCards = document.querySelectorAll('.job-card .form-check-input:checked');
      if (selectedCards.length === 0) {
        alert("Veuillez sélectionner au moins une offre à supprimer");
        return;
      }
      
      if (confirm(`Voulez-vous vraiment supprimer ${selectedCards.length} offre(s) de vos sauvegardes ?`)) {
        selectedCards.forEach(card => {
          card.closest('.job-card').remove();
        });
        // Mettre à jour le compteur (pour démonstration)
        const countElement = document.querySelector('.nav-link.active .badge');
        if (countElement) {
          const currentCount = parseInt(countElement.textContent);
          countElement.textContent = currentCount - selectedCards.length;
        }
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
              ${selectedCards.length} offre(s) supprimée(s) de vos sauvegardes
            </div>
          </div>
        `;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
      }
    });
  </script>
</body>
</html>