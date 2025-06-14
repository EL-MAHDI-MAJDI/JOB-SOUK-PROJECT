<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Détail de l'offre - Job Souk</title>
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
    .main-content {
      padding: 2rem 0;
      margin-left: 0;
    }

    .offre-header {
      background: linear-gradient(135deg, var(--primary) 0%, #c0392b 100%);
      color: white;
      border-radius: 18px 18px 0 0;
      padding: 2rem 2rem 1.5rem 2rem;
      text-align: center;
      position: relative;
    }
    .offre-logo {
      width: 90px;
      height: 90px;
      object-fit: contain;
      border-radius: 16px;
      background: #fff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.07);
      margin-bottom: 1rem;
      border: 2px solid #fff;
    }
    .offre-title {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }
    .offre-company {
      font-size: 1.1rem;
      font-weight: 500;
      margin-bottom: 0.5rem;
    }
    .offre-location {
      font-size: 1rem;
      color: #FFD700;
      margin-bottom: 0.5rem;
    }
    .offre-type {
      display: inline-block;
      background: #fff;
      color: var(--primary);
      border-radius: 50px;
      padding: 0.3rem 1.2rem;
      font-weight: 600;
      font-size: 1rem;
      margin-bottom: 0.5rem;
    }
    .offre-body {
      background: #fff;
      border-radius: 0 0 18px 18px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.06);
      padding: 2rem;
      margin-top: -1rem;
    }
    .offre-section-title {
      font-size: 1.1rem;
      font-weight: 600;
      margin-top: 1.5rem;
      margin-bottom: 0.7rem;
      color: var(--primary);
    }
    .offre-info-list {
      list-style: none;
      padding: 0;
      margin: 0 0 1rem 0;
    }
    .offre-info-list li {
      margin-bottom: 0.5rem;
      font-size: 1rem;
    }
    .entreprise-card {
      background: var(--primary-light);
      border-radius: 12px;
      padding: 1.5rem;
      margin-top: 2rem;
      box-shadow: 0 1px 6px rgba(0,0,0,0.04);
    }
    .entreprise-logo {
      width: 60px;
      height: 60px;
      object-fit: contain;
      border-radius: 10px;
      background: #fff;
      border: 1px solid #eee;
      margin-bottom: 0.5rem;
    }
    .btn-postuler {
      background: var(--primary);
      color: #fff;
      font-weight: 600;
      border-radius: 30px;
      padding: 0.75rem 2.5rem;
      font-size: 1.2rem;
      margin-top: 2rem;
      transition: background 0.7s;
    }
    .btn-postuler:hover {
      background:rgb(162, 49, 37);
      color: #fff;
    }
    @media (max-width: 992px) {
      body { margin-left: 0; }
      .side-menu { transform: translateX(-100%); transition: transform 0.3s; }
      .side-menu.show { transform: translateX(0); }
      .main-content { padding: 1rem 0.2rem; }
    }
    .p-3 {
      height: 47px;
    }
  </style>
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoCandidat.side-menu activePage=5 :candidat='$candidat' />
  </div>
  <!-- Barre de navigation supérieure -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoCandidat.navbar :candidat='$candidat' />
  </nav>
  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container">
      <!-- afficher les messages d'erreur -->
      @include('partials.flashbag-error')
      
      <div class="offre-header mb-0">
        <img src="{{ asset('storage/' . $offre->entreprise->logo) }}" alt="Logo entreprise" class="offre-logo shadow">
        <div class="offre-title">{{ $offre->intitule_offre_emploi }}</div>
        <div class="offre-company">{{ $offre->entreprise->nomEntreprise }}</div>
        <div class="offre-location"><i class="bi bi-geo-alt me-1"></i>{{ $offre->localisation }}</div>
        <div class="offre-type">{{ $offre->type_contrat }}</div>
      </div>
      <div class="offre-body">
        <div class="row">
          <div class="col-lg-8">
            <div class="offre-section-title"><i class="bi bi-info-circle me-1"></i>Description du poste</div>
            <div class="mb-3">{{ $offre->description_offre_emploi }}</div>
            <div class="offre-section-title"><i class="bi bi-list-check me-1"></i>Compétences requises</div>
            <ul class="offre-info-list">
              @foreach(explode(',', $offre->competences_requises) as $skill)
                <li><i class="bi bi-check-circle-fill text-success me-1"></i> {{ trim($skill) }}</li>
              @endforeach
            </ul>
            @if($offre->avantage_offre_emploi)
              <div class="offre-section-title"><i class="bi bi-gift me-1"></i>Avantages</div>
              <div class="mb-3">{{ $offre->avantage_offre_emploi }}</div>
            @endif
            <div class="offre-section-title"><i class="bi bi-cash-coin me-1"></i>Salaire & Expérience</div>
            <ul class="offre-info-list">
              <li><strong>Salaire :</strong> {{ $offre->salaire_offre_emploi ? $offre->salaire_offre_emploi.' MAD' : 'Non précisé' }}</li>
              <li><strong>Niveau d'expérience :</strong> {{ $offre->niveau_experience_demander }}</li>
              <li><strong>Date limite de candidature :</strong> {{ $offre->date_limite_candidature }}</li>
              <li><strong>Statut :</strong> 
                @if($offre->status === 'active')
                  <span class="badge bg-success">Active</span>
                @elseif($offre->status === 'desactive')
                  <span class="badge bg-danger">Désactivée</span>
                @endif
              </li>
              <li><strong>Publiée :</strong> {{ $offre->created_at }}</li>
            </ul>
            <div class="offre-section-title"><i class="bi bi-person-lines-fill me-1"></i>Informations de Contact</div>
            <div class="mb-3">
              @if(!empty($offre->email_contact))
                <p><i class="bi bi-envelope-fill me-2"></i><strong>Email :</strong> <a href="mailto:{{ $offre->email_contact }}">{{ $offre->email_contact }}</a></p>
              @else
                <p><i class="bi bi-envelope-fill me-2"></i><strong>Email :</strong> Non précisé</p>
              @endif
              @if(!empty($offre->telephone_contact))
                <p><i class="bi bi-telephone-fill me-2"></i><strong>Téléphone :</strong> {{ $offre->telephone_contact }}</p>
              @else
                <p><i class="bi bi-telephone-fill me-2"></i><strong>Téléphone :</strong> Non précisé</p>
              @endif
            </div>
            <!-- Bouton stylisé pour ouvrir le modal -->
            @if(!$candidat->cv)
              <button type="button" class="btn btn-postuler shadow" style="box-shadow:0 4px 16px rgba(231,76,60,0.15);" data-bs-toggle="modal" data-bs-target="#noCVModal">
                <i class="bi bi-send me-2"></i>Postuler à cette offre
              </button>
            @else
              <button type="button" class="btn btn-postuler shadow" style="box-shadow:0 4px 16px rgba(231,76,60,0.15);" data-bs-toggle="modal" data-bs-target="#confirmApplyModal">
                <i class="bi bi-send me-2"></i>Postuler à cette offre
              </button>
            @endif

            <!-- Modal d'information si pas de CV -->
            <div class="modal fade" id="noCVModal" tabindex="-1" aria-labelledby="noCVModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius:18px; border:0; box-shadow:0 8px 32px rgba(52,52,52,0.12);">
                  <div class="modal-header" style="background:linear-gradient(135deg,#e74c3c 0%,#c0392b 100%); color:#fff; border-radius:18px 18px 0 0;">
                    <h5 class="modal-title" id="noCVModalLabel"><i class="bi bi-exclamation-triangle"></i> CV requis</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                  </div>
                  <div class="modal-body">
                    <p>Vous devez d'abord déposer votre CV avant de pouvoir postuler à une offre.</p>
                    <a href="{{ route('candidat.cv', ['candidat' => $candidat->id]) }}" class="btn btn-primary mt-2">
                      Déposer mon CV
                    </a>
                  </div>
                  <div class="modal-footer" style="border-top:0;">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal de confirmation de candidature avec style personnalisé -->
            <div class="modal fade" id="confirmApplyModal" tabindex="-1" aria-labelledby="confirmApplyModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <form method="POST" action="{{ route('candidat.postuler',["candidat" => $candidat->id, "offre" => $offre->id]) }}">
                  @csrf
                  <div class="modal-content" style="border-radius:18px; border:0; box-shadow:0 8px 32px rgba(52,52,52,0.12);">
                    <div class="modal-header" style="background:linear-gradient(135deg,#e74c3c 0%,#c0392b 100%); color:#fff; border-radius:18px 18px 0 0;">
                      <h5 class="modal-title" id="confirmApplyModalLabel"><i class="bi bi-send"></i> Confirmer la candidature</h5>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                      <h5 class="mb-3">Êtes-vous sûr de vouloir postuler à cette offre ?</h5>
                      <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="toggleMessageField">
                        <label class="form-check-label" for="toggleMessageField">
                          Joindre un message personnalisé
                        </label>
                      </div>
                      <div class="mb-3" id="messageFieldContainer" style="display:none;">
                        <label for="message" class="form-label">Votre message <span class="text-muted">(optionnel)</span></label>
                        <textarea class="form-control" id="message" name="messageCandidature" rows="3" placeholder="Votre message..."></textarea>
                      </div>
                    </div>
                    <div class="modal-footer" style="border-top:0;">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg me-1"></i>Annuler</button>
                      <button type="submit" class="btn" style="background:#e74c3c; color:#fff;"><i class="bi bi-check2-circle me-1"></i>Confirmer la candidature</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="entreprise-card text-center">
              <img src="{{ asset('storage/' . $offre->entreprise->logo) }}" alt="Logo" class="entreprise-logo shadow-sm mb-2">
              <h5 class="mb-1">{{ $offre->entreprise->nomEntreprise }}</h5>
              <div class="mb-2 text-muted">{{ $offre->entreprise->SecteurActivite ?? 'Secteur non précisé' }}</div>
              <div class="mb-2"><i class="bi bi-geo-alt me-1"></i>{{ $offre->entreprise->adresse ?? 'Adresse non précisée' }}</div>
              <div class="mb-2"><i class="bi bi-envelope me-1"></i>{{ $offre->entreprise->email ?? 'Email non précisé' }}</div>
              <div class="mb-2"><i class="bi bi-globe me-1"></i><a href="{{ $offre->entreprise->siteWeb }}">{{ $offre->entreprise->siteWeb ?? 'Site web non précisé' }}</a></div>
              @if($offre->entreprise->description)
                <div class="mt-3 small text-muted">{{ $offre->entreprise->description }}</div>
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
    document.getElementById('menuToggle')?.addEventListener('click', function() {
        document.querySelector('.side-menu').classList.toggle('show');
    });

    // Afficher/cacher le champ message selon la case à cocher
    document.addEventListener('DOMContentLoaded', function() {
      var checkbox = document.getElementById('toggleMessageField');
      var messageField = document.getElementById('messageFieldContainer');
      if(checkbox) {
        checkbox.addEventListener('change', function() {
          messageField.style.display = this.checked ? 'block' : 'none';
        });
      }
    });
    </script>
</body>
</html>
