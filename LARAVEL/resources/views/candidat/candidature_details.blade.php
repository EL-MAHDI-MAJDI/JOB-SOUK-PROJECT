<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Détails de la Candidature - Job Souk</title>
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
      margin-left: 0; /* Sera ajusté par JS si la sidebar est toujours visible */
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

    .details-card {
      border-left: 4px solid var(--primary);
    }

    .company-logo-detail {
      width: 80px;
      height: 80px;
      object-fit: contain;
      border-radius: 8px;
      border: 1px solid #eee;
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
    }
    .p-3 {
        height: 47px;
    }
  </style>
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    {{-- Assurez-vous que activePage correspond à la page actuelle si nécessaire --}}
    <x-compoCandidat.side-menu activePage="4" :candidat='$candidat' />
  </div>

  <!-- Barre de navigation supérieure enrichie -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoCandidat.navbar :candidat='$candidat' />
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Détails de la Candidature</h2>
          <p class="text-muted">Consultez les informations relatives à votre candidature et à l'offre d'emploi.</p>
        </div>
        <a href="{{ route('candidat.mesCandidatures', $candidat) }}" class="btn btn-outline-secondary">
          <i class="bi bi-arrow-left me-2"></i>Retour à mes candidatures
        </a>
      </div>

      <div class="row g-4">
        <!-- Colonne Détails de l'offre -->
        <div class="col-lg-7">
          <div class="card details-card">
            <div class="card-header bg-light">
              <h5 class="mb-0">Détails de l'Offre d'Emploi</h5>
            </div>
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <img src="{{ asset('storage/' . $candidature->offreEmploi->entreprise->logo) }}" alt="Logo {{ $candidature->offreEmploi->entreprise->nomEntreprise }}" class="company-logo-detail me-3">
                <div>
                  <h4 class="mb-0">{{ $candidature->offreEmploi->intitule_offre_emploi }}</h4>
                  <p class="text-muted mb-0">{{ $candidature->offreEmploi->entreprise->nomEntreprise }} - {{ $candidature->offreEmploi->localisation }}</p>
                </div>
              </div>
              <p><strong>Type de contrat:</strong> {{ $candidature->offreEmploi->type_contrat }}</p>
              <p><strong>Description:</strong></p>
              <p style="white-space: pre-wrap;">{{ $candidature->offreEmploi->description_offre_emploi }}</p>
              <p><strong>Compétences requises:</strong> {{ $candidature->offreEmploi->competences_requises }}</p>
              <p><strong>Salaire:</strong> {{ $candidature->offreEmploi->salaire_offre_emploi ? $candidature->offreEmploi->salaire_offre_emploi . ' MAD/mois' : 'Non précisé' }}</p>
              <p><strong>Date limite de candidature:</strong> {{ \Carbon\Carbon::parse($candidature->offreEmploi->date_limite_candidature)->format('d/m/Y') }}</p>
            </div>
          </div>
        </div>

        <!-- Colonne Détails de la candidature -->
        <div class="col-lg-5">
          <div class="card details-card">
            <div class="card-header bg-light">
              <h5 class="mb-0">Votre Candidature</h5>
            </div>
            <div class="card-body">
              <p><strong>Statut:</strong> <span class="badge bg-primary">{{ $candidature->statut }}</span></p>
              <p><strong>Date de postulation:</strong> {{ $candidature->created_at->format('d/m/Y H:i') }}</p>
              @if($candidature->messageCandidature)
                <p><strong>Votre message:</strong></p>
                <p style="white-space: pre-wrap;">{{ $candidature->messageCandidature }}</p>
              @endif
              @if($candidature->fichier)
                <p><strong>CV soumis pour cette candidature:</strong></p>
                <a href="{{ Storage::url($candidature->fichier) }}" target="_blank" class="btn btn-success">
                  <i class="bi bi-file-earmark-arrow-down me-2"></i>Voir/Télécharger le CV ({{ $candidature->nom_fichier }})
                </a>
              @else
                <p class="text-muted">Aucun CV spécifique n'a été soumis avec cette candidature.</p>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Toggle sidebar on mobile
    // S'il y a un bouton avec id 'menuToggle' dans votre composant navbar
    const menuToggleButton = document.getElementById('menuToggle');
    if (menuToggleButton) {
        menuToggleButton.addEventListener('click', function() {
        document.querySelector('.side-menu').classList.toggle('show');
      });
    }
  </script>
</body>
</html>