<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mes Candidatures - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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

    /* Styles spécifiques aux candidatures */
    .application-container {
      background: white;
      border-radius: 12px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      padding: 2rem;
    }

    .application-card {
      border-left: 4px solid var(--primary);
      transition: all 0.3s ease;
      margin-bottom: 1.5rem;
    }

    .application-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .application-status {
      padding: 0.25rem 0.75rem;
      border-radius: 50px;
      font-size: 0.85rem;
      font-weight: 500;
    }

    .status-pending {
      background-color: #FFF3CD;
      color: #856404;
    }

    .status-reviewed {
      background-color: #CCE5FF;
      color: #004085;
    }

    .status-interview {
      background-color: #D4EDDA;
      color: #155724;
    }

    .status-rejected {
      background-color: #F8D7DA;
      color: #721C24;
    }

    .application-company-logo {
      width: 60px;
      height: 60px;
      object-fit: contain;
      border-radius: 8px;
      border: 1px solid #eee;
    }

    .application-details {
      border-top: 1px solid #eee;
      padding-top: 1rem;
      margin-top: 1rem;
    }

    /* Filtres */
    .filter-section {
      background: white;
      border-radius: 12px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      padding: 1.5rem;
      margin-bottom: 1.5rem;
    }

    .message-btn {
      position: relative; /* Nécessaire pour que z-index fonctionne correctement */
      z-index: 2;         /* Doit être supérieur au z-index du pseudo-élément de stretched-link (qui est 1) */
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

    /* Boutons */
    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
    }

    .btn-primary:hover {
      background-color: #c0392b;
      border-color: #c0392b;
    }

    .btn-outline-primary {
      color: var(--primary);
      border-color: var(--primary);
    }

    .btn-outline-primary:hover {
      background-color: var(--primary);
      color: white;
    }

    .p-3 {
        height: 47px;
    }
  </style>
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoCandidat.side-menu activePage=4 :candidat='$candidat' />
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
          <h2 class="fw-bold mb-1">Mes Candidatures</h2>
        </div>
      </div>
      
      <!-- Section de filtres -->
      <div class="filter-section">
        <div class="row g-3">
          <div class="col-md-3">
            <label for="statusFilter" class="form-label">Statut</label>
            <select class="form-select" id="statusFilter">
              <option value="all" selected>Tous les statuts</option>
              <option value="pending">En attente</option>
              <option value="reviewed">Examinée</option>
              <option value="interview">Entretien</option>
              <option value="rejected">Rejetée</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="dateFilter" class="form-label">Date</label>
            <select class="form-select" id="dateFilter">
              <option value="all" selected>Toutes les dates</option>
              <option value="today">Aujourd'hui</option>
              <option value="week">Cette semaine</option>
              <option value="month">Ce mois</option>
              <option value="older">Plus anciennes</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="typeFilter" class="form-label">Type</label>
            <select class="form-select" id="typeFilter">
              <option value="all" selected>Tous les types</option>
              <option value="fulltime">Temps plein</option>
              <option value="parttime">Temps partiel</option>
              <option value="internship">Stage</option>
              <option value="freelance">Freelance</option>
            </select>
          </div>
          <div class="col-md-3 d-flex align-items-end">
            <button class="btn btn-primary w-100">
              <i class="bi bi-funnel me-2"></i>Appliquer
            </button>
          </div>
        </div>
      </div>
      
      <!-- Conteneur des candidatures -->
      <div class="application-container">
        @if($candidatures->isEmpty())
          <div class="text-center py-5">
            <i class="bi bi-box-seam display-1 text-muted mb-3"></i>
            <h4 class="mb-3">Aucune candidature</h4>
            <p class="text-muted">Vous n'avez pas encore postulé à des offres d'emploi.</p>
          </div>
        @else
          <!-- Candidature  -->
        @foreach ($candidatures as $candidature)
            <div class="application-card card mb-3">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-md-1">
                <img src="{{ asset('storage/' . $candidature->offreEmploi->entreprise->logo) }}" alt="Logo entreprise" class="application-company-logo">
              </div>
              <div class="col-md-5">
                <h5 class="mb-1">{{$candidature->offreEmploi->intitule_offre_emploi}}</h5>
                <p class="text-muted mb-2">{{$candidature->offreEmploi->entreprise->nomEntreprise}} - {{$candidature->offreEmploi->localisation}}</p>
                <span class="application-status status-interview">{{$candidature->statut}}</span>
              </div>
              <div class="col-md-3">
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-calendar me-2"></i>
                  <span>Postulé le: {{ $candidature->created_at->format('d/m/Y') }}</span>
                </div>
                <div class="d-flex align-items-center">
                  <i class="bi bi-calendar-event me-2"></i>
                  <span>Entretien: 25/05/2023</span>
                </div>
              </div>
              <div class="col-md-3 text-end">
                <a href='{{ route("candidat.candidature.details", ["candidat" => $candidat->id, "candidature" => $candidature->id]) }}'
                   class="btn btn-outline-primary me-2 stretched-link"
                   title="Voir les détails de la candidature, de l'offre et le CV soumis">
                  <i class="bi bi-eye"></i>
                </a>
                <button class="btn btn-outline-secondary message-btn" title="Contacter l'entreprise">
                  <i class="bi bi-envelope"></i>
                </button>
              </div>
            </div>
            
            <div class="application-details">
              <div class="row">
                <div class="col-md-6">
                  <p><strong>Type:</strong> {{ $candidature->offreEmploi->type_contrat}}</p>
                  <p><strong>Salaire:</strong> {{ $candidature->offreEmploi->salaire_offre_emploi ? $candidature->offreEmploi->salaire_offre_emploi.' MAD/mois' : 'Non précisé' }}</p>
                </div>
                <div class="col-md-6">
                  <p><strong>Dernière mise à jour:</strong> 20/05/2023</p>
                  <p><strong>Contact :</strong> {{$candidature->offreEmploi->entreprise->email}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      @endif
      </div>
      
      <!-- Pagination -->
      <!-- <nav aria-label="Page navigation" class="mt-4">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précédent</a>
          </li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Suivant</a>
          </li>
        </ul>
      </nav> -->
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Ajouter la date actuelle
    const dateElement = document.getElementById('currentDate');
    if (dateElement) {
      const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      const today = new Date();
      dateElement.textContent = today.toLocaleDateString('fr-FR', options);
    }

    // Toggle sidebar on mobile
    document.getElementById('menuToggle').addEventListener('click', function() {
      document.querySelector('.side-menu').classList.toggle('show');
    });

    // Fonctionnalité de filtrage (exemple simple)
    document.getElementById('statusFilter').addEventListener('change', function() {
      const status = this.value;
      const applications = document.querySelectorAll('.application-card');
      
      applications.forEach(app => {
        if (status === 'all') {
          app.style.display = '';
        } else {
          const appStatus = app.querySelector('.application-status').classList;
          const shouldShow = 
            (status === 'pending' && appStatus.contains('status-pending')) ||
            (status === 'reviewed' && appStatus.contains('status-reviewed')) ||
            (status === 'interview' && appStatus.contains('status-interview')) ||
            (status === 'rejected' && appStatus.contains('status-rejected'));
          
          app.style.display = shouldShow ? '' : 'none';
        }
      });
    });
  </script>
</body>
</html>