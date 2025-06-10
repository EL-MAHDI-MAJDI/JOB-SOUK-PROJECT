<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Entreprises - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  @vite(['resources/css/StyleIndex/entreprises.css'])
</head>
<body>
  <!-- Navbar -->
   <x-compoIndex.navbar activePage='3'/>

  <section class="hero-small">
    <div class="container">
      <h1>Découvrez les entreprises qui recrutent</h1>
      <p class="lead">Explorez les profils des meilleures entreprises du Maroc et leurs opportunités</p>
      <form class="row g-2 justify-content-center mt-4">
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="Nom de l'entreprise ou secteur d'activité">
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-search w-100">Rechercher</button>
        </div>
      </form>
    </div>
  </section>

  <!-- Section filtres -->
  <section class="py-4 bg-light">
    <div class="container">
      <div class="row g-2">
        <div class="col-md-3">
          <select class="form-select">
            <option selected>Secteur d'activité</option>
            <option>Informatique & Télécoms</option>
            <option>Banque & Finance</option>
            <option>Industrie</option>
            <option>Distribution & Commerce</option>
            <option>Santé</option>
            <option>BTP & Construction</option>
          </select>
        </div>
        <div class="col-md-3">
          <select class="form-select">
            <option selected>Taille de l'entreprise</option>
            <option>Startup (1-10 employés)</option>
            <option>PME (11-250 employés)</option>
            <option>Grande entreprise (251-5000 employés)</option>
            <option>Très grande entreprise (5000+ employés)</option>
          </select>
        </div>
        <div class="col-md-3">
          <select class="form-select">
            <option selected>Ville</option>
            <option>Casablanca</option>
            <option>Rabat</option>
            <option>Marrakech</option>
            <option>Tanger</option>
            <option>Fès</option>
            <option>Agadir</option>
          </select>
        </div>
        <div class="col-md-3">
          <button class="btn btn-primary w-100">Filtrer</button>
        </div>
      </div>
    </div>
  </section>

  <!-- Section entreprises mises en avant -->
  {{-- <section class="py-5">
    <div class="container">
      <h2 class="mb-4">Entreprises en vedette</h2>
      <div class="row g-4">
        <!-- Entreprise 1 -->
        <div class="col-md-4">
          <div class="company-card">
            <div class="company-header">
              <div class="company-logo-container">
                <div class="company-logo-placeholder bg-light d-flex align-items-center justify-content-center">
                  <span class="fw-bold" style="color: var(--primary);">TECH</span>
                </div>
              </div>
              <div class="company-rating">
                <span class="badge bg-success">4.8 <i class="bi bi-star-fill"></i></span>
              </div>
            </div>
            <div class="company-body">
              <h4>TechCorp Maroc</h4>
              <p class="text-muted"><i class="bi bi-geo-alt"></i> Casablanca</p>
              <p class="text-muted mb-3"><i class="bi bi-briefcase"></i> Informatique & Télécoms</p>
              <p class="company-description">Leader dans le développement de solutions informatiques innovantes avec plus de 500 employés au Maroc.</p>
              <div class="d-flex justify-content-between align-items-center mt-3">
                <span class="badge bg-primary">7 offres actives</span>
                <a href="#" class="btn btn-outline-primary btn-sm">Voir le profil</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Entreprise 2 -->
        <div class="col-md-4">
          <div class="company-card">
            <div class="company-header">
              <div class="company-logo-container">
                <div class="company-logo-placeholder bg-light d-flex align-items-center justify-content-center">
                  <span class="fw-bold" style="color: var(--secondary);">BANK</span>
                </div>
              </div>
              <div class="company-rating">
                <span class="badge bg-success">4.6 <i class="bi bi-star-fill"></i></span>
              </div>
            </div>
            <div class="company-body">
              <h4>Banque Nationale</h4>
              <p class="text-muted"><i class="bi bi-geo-alt"></i> Rabat</p>
              <p class="text-muted mb-3"><i class="bi bi-briefcase"></i> Banque & Finance</p>
              <p class="company-description">Institution financière de premier plan offrant des services bancaires complets aux particuliers et entreprises.</p>
              <div class="d-flex justify-content-between align-items-center mt-3">
                <span class="badge bg-primary">12 offres actives</span>
                <a href="#" class="btn btn-outline-primary btn-sm">Voir le profil</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Entreprise 3 -->
        <div class="col-md-4">
          <div class="company-card">
            <div class="company-header">
              <div class="company-logo-container">
                <div class="company-logo-placeholder bg-light d-flex align-items-center justify-content-center">
                  <span class="fw-bold" style="color: var(--accent);">AUTO</span>
                </div>
              </div>
              <div class="company-rating">
                <span class="badge bg-success">4.5 <i class="bi bi-star-fill"></i></span>
              </div>
            </div>
            <div class="company-body">
              <h4>AutoMotive Industries</h4>
              <p class="text-muted"><i class="bi bi-geo-alt"></i> Tanger</p>
              <p class="text-muted mb-3"><i class="bi bi-briefcase"></i> Industrie Automobile</p>
              <p class="company-description">Fabricant de composants automobiles de haute qualité avec une présence internationale.</p>
              <div class="d-flex justify-content-between align-items-center mt-3">
                <span class="badge bg-primary">9 offres actives</span>
                <a href="#" class="btn btn-outline-primary btn-sm">Voir le profil</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

  <!-- Section liste des entreprises -->
  <section class="py-5">
    <div class="container">
      <h2 class="section-title">Entreprises partenaires</h2>
      <div class="row g-4">
        @forelse($entreprises as $entreprise)
        <div class="col-md-4">
          <div class="company-card">
            <div class="company-logo">
              <img src="{{ asset('storage/' . $entreprise->logo) }}" alt="{{ $entreprise->nomEntreprise }}" class="img-fluid">
            </div>
            <div class="company-info">
              <h5>{{ $entreprise->nomEntreprise }}</h5>
              <p class="text-muted mb-2">{{ $entreprise->SecteurActivite }}</p>
              <div class="company-stats">
                <span class="stat-item">
                  <i class="bi bi-geo-alt"></i>{{ $entreprise->ville }}
                </span>
                <span class="stat-item">
                  <i class="bi bi-people"></i>{{ $entreprise->tailleEntreprise }}
                </span>
                <span class="stat-item">
                  <i class="bi bi-briefcase"></i>{{ $entreprise->offre_emplois_count }} offres
                </span>
              </div>
              <a href="{{ route('loginShow') }}" class="btn btn-outline-primary">
                Voir le profil <i class="bi bi-arrow-right ms-2"></i>
              </a>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12 text-center">
          <div class="text-muted py-5">
            <i class="bi bi-building fs-1 mb-2"></i><br>
            <span>Aucune entreprise disponible pour le moment.</span>
          </div>
        </div>
        @endforelse
      </div>
      
      @if($entreprises->hasPages())
      <div class="d-flex justify-content-center mt-4">
        {{ $entreprises->links('pagination::bootstrap-4') }}
      </div>
      @endif
    </div>
  </section>

  <!-- Section Rejoindre en tant qu'entreprise -->
  <section class="py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h2>Vous êtes une entreprise qui recrute ?</h2>
          <p class="lead">Rejoignez Job Souk et trouvez les talents qu'il vous faut</p>
          <ul class="feature-list">
            <li><i class="bi bi-check-circle-fill text-success"></i> Accédez à une base de CV qualifiés</li>
            <li><i class="bi bi-check-circle-fill text-success"></i> Publiez vos offres d'emploi</li>
            <li><i class="bi bi-check-circle-fill text-success"></i> Gagnez en visibilité auprès des candidats</li>
            <li><i class="bi bi-check-circle-fill text-success"></i> Suivez vos recrutements facilement</li>
          </ul>
          <div class="mt-4">
            <a href="{{ route('inscriptionEntreprise') }}" class="btn btn-primary">Créer un compte entreprise</a>
            <a href="{{ route('accueil') }}" class="btn btn-outline-primary ms-2">En savoir plus</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="bg-light p-4 rounded-3 text-center">
            <i class="bi bi-building text-primary" style="font-size: 5rem;"></i>
            <h4 class="mt-3">Nos services pour les entreprises</h4>
            <div class="row mt-4">
              <div class="col-6 mb-3">
                <div class="card h-100">
                  <div class="card-body text-center">
                    <i class="bi bi-megaphone mb-2" style="font-size: 2rem; color: var(--primary);"></i>
                    <h6>Diffusion d'offres</h6>
                  </div>
                </div>
              </div>
              <div class="col-6 mb-3">
                <div class="card h-100">
                  <div class="card-body text-center">
                    <i class="bi bi-people mb-2" style="font-size: 2rem; color: var(--primary);"></i>
                    <h6>Recherche de CV</h6>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="card h-100">
                  <div class="card-body text-center">
                    <i class="bi bi-graph-up mb-2" style="font-size: 2rem; color: var(--primary);"></i>
                    <h6>Statistiques</h6>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="card h-100">
                  <div class="card-body text-center">
                    <i class="bi bi-star mb-2" style="font-size: 2rem; color: var(--primary);"></i>
                    <h6>Profil premium</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="mt-5 pt-5 pb-4" style="background-color: #E74C3C; color: white;">
    <div class="container">
      <div class="row">
  
        <div class="col-md-4 mb-4">
          <h5>Job Souk</h5>
          <p>Job Souk est une plateforme marocaine dédiée à la mise en relation entre recruteurs et talents. Trouvez votre prochain défi professionnel dès aujourd'hui.</p>
        </div>
  
        <div class="col-md-4 mb-4">
          <h5>Liens rapides</h5>
          <ul class="list-unstyled">
            <li><a href="{{ route('accueil') }}" class="text-white text-decoration-none">Accueil</a></li>
            <li><a href="{{ route('offre') }}" class="text-white text-decoration-none">Offres d'Emploi</a></li>
            <li><a href="{{ route('entreprises') }}" class="text-white text-decoration-none">Entreprises</a></li>
            <li><a href="{{ route('loginShow') }}" class="text-white text-decoration-none">Se connecter</a></li>
            <li><a href="{{ route('choixInscription') }}" class="text-white text-decoration-none">Créer un compte</a></li>
          </ul>
        </div>
  
        <div class="col-md-4 mb-4">
          <h5>Contact</h5>
          <p><i class="bi bi-geo-alt"></i> Fes, Maroc</p>
          <p><i class="bi bi-envelope"></i> contact@jobfinder.ma</p>
          <p><i class="bi bi-telephone"></i> +212 6 00 00 00 00</p>
          <div class="mt-3">
            <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
            <a href="#" class="text-white me-3"><i class="bi bi-linkedin"></i></a>
            <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
          </div>
        </div>
  
      </div>
  
      <hr class="border-light" />
      <div class="text-center">
        <small>&copy; 2025 JobFinder. Tous droits réservés. | <a href="#" class="text-white text-decoration-underline">Mentions légales</a> | <a href="#" class="text-white text-decoration-underline">Politique de confidentialité</a></small>
      </div>
    </div>
  </footer>
    <!-- Bouton retour en haut -->
    <a href="Entreprises.html" class="scroll-to-top" id="scrollToTop" aria-label="Retour en haut">
      <i class="bi bi-arrow-up"></i>
    </a>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/js/indexJs/script.js'])
</body>
</html>

<style>
  .company-card {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    height: 100%;
    overflow: hidden;
  }

  .company-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
  }

  .company-logo {
    height: 180px;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    border-bottom: 1px solid #eee;
  }

  .company-logo img {
    max-height: 100%;
    max-width: 100%;
    object-fit: contain;
  }

  .company-info {
    padding: 20px;
  }

  .company-info h5 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 10px;
    font-size: 1.2rem;
  }

  .company-info .text-muted {
    font-size: 0.9rem;
  }

  .company-info .btn {
    width: 100%;
    margin-top: 15px;
    padding: 8px 20px;
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
  }

  .company-info .btn:hover {
    transform: translateY(-2px);
  }

  .company-stats {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin: 15px 0;
  }

  .stat-item {
    background: #f8f9fa;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    color: #6c757d;
  }

  .stat-item i {
    margin-right: 5px;
    color: var(--primary);
  }

  .section-title {
    position: relative;
    margin-bottom: 40px;
    text-align: center;
  }

  .section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: var(--primary);
    border-radius: 2px;
  }
</style>