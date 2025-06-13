<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Accueil - Job souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  @vite(['resources/css/StyleIndex/accueil.css'])
</head>
<body>
  <!-- Navbar -->
   <x-compoIndex.navbar activePage='1'/>

<!-- Section Pourquoi nous choisir -->
<section class="py-5 bg-light">
    <div class="container">
      <h2 class="mb-4 text-center">Pourquoi choisir Job Souk?</h2>
      <div class="row g-4">
        <div class="col-md-4 text-center">
          <div class="why-card p-3">
            <i class="bi bi-search text-primary mb-3" style="font-size: 2.5rem;"></i>
            <h4>+10,000 offres</h4>
            <p>Des milliers d'offres d'emploi dans tous les secteurs au Maroc.</p>
          </div>
        </div>
        <div class="col-md-4 text-center">
          <div class="why-card p-3">
            <i class="bi bi-lightning-charge text-primary mb-3" style="font-size: 2.5rem;"></i>
            <h4>Processus rapide</h4>
            <p>Postulez en quelques clics et obtenez des réponses rapidement.</p>
          </div>
        </div>
        <div class="col-md-4 text-center">
          <div class="why-card p-3">
            <i class="bi bi-building text-primary mb-3" style="font-size: 2.5rem;"></i>
            <h4>Entreprises vérifiées</h4>
            <p>Nous vérifions toutes les entreprises qui publient sur notre plateforme.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Section catégories populaires -->
  <section class="py-5">
    <div class="container">
      <h2 class="section-title">Explorez les catégories populaires</h2>
      <div class="row g-4">
        @forelse($categoriesPopulaires as $categorie)
        <div class="col-md-3">
          <div class="category-card">
            <div class="category-icon">
              @switch($categorie->SecteurActivite)
                @case('Technologie')
                  <i class="bi bi-laptop"></i>
                  @break
                @case('Finance')
                  <i class="bi bi-cash-stack"></i>
                  @break
                @case('Santé')
                  <i class="bi bi-heart-pulse"></i>
                  @break
                @case('Industrie')
                  <i class="bi bi-building"></i>
                  @break
                @case('Transport & Logistique')
                  <i class="bi bi-truck"></i>
                  @break
                @case('Éducation')
                  <i class="bi bi-book"></i>
                  @break
                @case('Commerce')
                  <i class="bi bi-shop"></i>
                  @break
                @default
                  <i class="bi bi-briefcase"></i>
              @endswitch
            </div>
            <div class="category-info">
              <h5>{{ $categorie->SecteurActivite }}</h5>
              <p class="text-muted mb-0">{{ $categorie->total_entreprises }} entreprises</p>
            </div>
            <a href="{{ route('loginShow') }}" class="stretched-link"></a>
          </div>
        </div>
        @empty
        <div class="col-12 text-center">
          <div class="text-muted py-5">
            <i class="bi bi-grid fs-1 mb-2"></i><br>
            <span>Aucune catégorie disponible pour le moment.</span>
          </div>
        </div>
        @endforelse
      </div>
    </div>
  </section>
  
  <!-- Section Témoignages -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="mb-4 text-center">Ce que disent nos utilisateurs</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="testimonial-card p-4 bg-white rounded shadow-sm">
            <div class="d-flex align-items-center mb-3">
              <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                <span>SM</span>
              </div>
              <div>
                <h5 class="mb-0">Sarah Mansouri</h5>
                <p class="mb-0 text-muted small">Développeuse Web</p>
              </div>
            </div>
            <p class="mb-2">"Grâce à Job Souk, j'ai trouvé mon emploi idéal en seulement 2 semaines. Le processus était simple et efficace."</p>
            <div class="text-warning">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial-card p-4 bg-white rounded shadow-sm">
            <div class="d-flex align-items-center mb-3">
              <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                <span>YB</span>
              </div>
              <div>
                <h5 class="mb-0">Youssef Benali</h5>
                <p class="mb-0 text-muted small">Analyste Financier</p>
              </div>
            </div>
            <p class="mb-2">"Le site est très intuitif et les offres sont pertinentes. J'ai reçu plusieurs propositions qui correspondaient parfaitement à mon profil."</p>
            <div class="text-warning">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-half"></i>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial-card p-4 bg-white rounded shadow-sm">
            <div class="d-flex align-items-center mb-3">
              <div class="rounded-circle bg-accent text-dark d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background-color: var(--accent);">
                <span>LN</span>
              </div>
              <div>
                <h5 class="mb-0">Leila Nassiri</h5>
                <p class="mb-0 text-muted small">Chargée Marketing</p>
              </div>
            </div>
            <p class="mb-2">"Un grand merci à l'équipe de Job Souk! J'ai pu décrocher un entretien dans une grande entreprise grâce à votre plateforme."</p>
            <div class="text-warning">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Section Ils nous font confiance -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="section-title">Ils nous font confiance</h2>
      <div class="trusted-companies">
        <div class="row g-4 align-items-center justify-content-center">
          @forelse($entreprisesConfiance as $entreprise)
          <div class="col-6 col-md-4 col-lg-2">
            <div class="company-logo-card">
              @if($entreprise->logo)
              <img src="{{ asset('storage/' . $entreprise->logo) }}" alt="{{ $entreprise->nomEntreprise }}" class="img-fluid">
              @else
                @continue
              @endif
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
      </div>
    </div>
  </section>
  
  <!-- Section Guide & Conseils -->
  <section class="py-5">
    <div class="container">
      <h2 class="section-title">Guide & Conseils pour votre carrière</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="guide-card">
            <div class="guide-icon">
              <i class="bi bi-file-earmark-text"></i>
            </div>
            <h5>Rédiger un CV parfait</h5>
            <p class="text-muted">Apprenez à créer un CV qui se démarque et attire l'attention des recruteurs.</p>
            <a href="https://www.monster.fr/conseils-carriere/cv-lettre-motivation/rediger-cv/" target="_blank" class="guide-link">
              Lire l'article <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="col-md-4">
          <div class="guide-card">
            <div class="guide-icon">
              <i class="bi bi-chat-dots"></i>
            </div>
            <h5>Réussir son entretien</h5>
            <p class="text-muted">Découvrez les meilleures pratiques pour réussir vos entretiens d'embauche.</p>
            <a href="https://www.welcometothejungle.com/fr/articles/entretien-embauche-conseils" target="_blank" class="guide-link">
              Lire l'article <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="col-md-4">
          <div class="guide-card">
            <div class="guide-icon">
              <i class="bi bi-graph-up"></i>
            </div>
            <h5>Développer ses compétences</h5>
            <p class="text-muted">Les compétences les plus recherchées et comment les développer.</p>
            <a href="https://www.linkedin.com/business/talent/blog/talent-strategy/most-in-demand-skills" target="_blank" class="guide-link">
              Lire l'article <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="col-md-4">
          <div class="guide-card">
            <div class="guide-icon">
              <i class="bi bi-globe"></i>
            </div>
            <h5>Réseau professionnel</h5>
            <p class="text-muted">Comment construire et entretenir un réseau professionnel efficace.</p>
            <a href="https://www.linkedin.com/pulse/comment-construire-un-réseau-professionnel-efficace/" target="_blank" class="guide-link">
              Lire l'article <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="col-md-4">
          <div class="guide-card">
            <div class="guide-icon">
              <i class="bi bi-lightbulb"></i>
            </div>
            <h5>Négocier son salaire</h5>
            <p class="text-muted">Guide complet pour négocier efficacement votre rémunération.</p>
            <a href="https://www.welcometothejungle.com/fr/articles/negocier-salaire" target="_blank" class="guide-link">
              Lire l'article <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="col-md-4">
          <div class="guide-card">
            <div class="guide-icon">
              <i class="bi bi-person-workspace"></i>
            </div>
            <h5>Équilibre vie pro/perso</h5>
            <p class="text-muted">Conseils pour maintenir un bon équilibre entre vie professionnelle et personnelle.</p>
            <a href="https://www.monster.fr/conseils-carriere/equilibre-vie-professionnelle-personnelle/" target="_blank" class="guide-link">
              Lire l'article <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Section CTA (Call to Action) -->
  <section class="py-5" style="background: linear-gradient(to right, var(--primary), var(--secondary));">
    <div class="container text-center text-white">
      <h2 class="mb-3">Prêt à donner un nouvel élan à votre carrière?</h2>
      <p class="lead mb-4">Inscrivez-vous dès maintenant pour accéder à toutes les offres d'emploi</p>
      <div class="d-flex justify-content-center gap-3">
        <a href="{{ route('choixInscription') }}" class="btn btn-light btn-lg">Créer un compte</a>
        <a href="{{ route('accueil') }}" class="btn btn-outline-light btn-lg">En savoir plus</a>
      </div>
    </div>
  </section>

  <!-- Section statistiques -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-3">
          <div class="stat-card text-center">
            <div class="stat-icon">
              <i class="bi bi-briefcase"></i>
            </div>
            <h3 class="stat-number">{{ $stats['offres'] }}</h3>
            <p class="stat-label">Offres d'emploi</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="stat-card text-center">
            <div class="stat-icon">
              <i class="bi bi-building"></i>
            </div>
            <h3 class="stat-number">{{ $stats['entreprises'] }}</h3>
            <p class="stat-label">Entreprises</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="stat-card text-center">
            <div class="stat-icon">
              <i class="bi bi-people"></i>
            </div>
            <h3 class="stat-number">{{ $stats['candidats'] }}</h3>
            <p class="stat-label">Candidats</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="stat-card text-center">
            <div class="stat-icon">
              <i class="bi bi-grid"></i>
            </div>
            <h3 class="stat-number">{{ $stats['secteurs'] }}</h3>
            <p class="stat-label">Secteurs d'activité</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section offres récentes -->
  <section class="py-5">
    <div class="container">
      <h2 class="section-title">Offres récentes</h2>
      <div class="row g-4">
        @forelse($offresRecentes as $offre)
        <div class="col-md-4">
          <div class="job-card">
            <div class="job-header">
              <h5>{{ $offre->intitule_offre_emploi }}</h5>
              <span class="badge bg-primary">{{ $offre->type_contrat }}</span>
            </div>
            <div class="company-info">
              <img src="{{ asset('storage/' . $offre->entreprise->logo) }}" alt="{{ $offre->entreprise->nomEntreprise }}" class="company-logo">
              <div>
                <h6>{{ $offre->entreprise->nomEntreprise }}</h6>
                <p class="text-muted mb-0"><i class="bi bi-geo-alt"></i> {{ $offre->entreprise->ville }}</p>
              </div>
            </div>
            <div class="job-details">
              <span class="text-muted"><i class="bi bi-hourglass-bottom me-1"></i>Dernier délai {{$offre->date_limite_candidature}}</span>
              <span><i class="bi bi-clock"></i> {{ $offre->created_at->diffForHumans() }}</span>
            </div>
            <a href="{{ route('loginShow') }}" class="btn btn-outline-primary btn-sm w-100">Voir plus</a>
          </div>
        </div>
        @empty
        <div class="col-12 text-center">
          <div class="text-muted py-5">
            <i class="bi bi-briefcase fs-1 mb-2"></i><br>
            <span>Aucune offre d'emploi disponible pour le moment.</span>
          </div>
        </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- Section entreprises récentes -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="section-title">Entreprises récentes</h2>
      <div class="row g-4">
        @forelse($entreprisesRecentes as $entreprise)
        <div class="col-md-3">
          <div class="company-card-small">
            <div class="company-logo-small">
              <img src="{{ asset('storage/' . $entreprise->logo) }}" alt="{{ $entreprise->nomEntreprise }}" class="img-fluid">
            </div>
            <div class="company-info-small">
              <h6>{{ $entreprise->nomEntreprise }}</h6>
              <p class="text-muted mb-2"><i class="bi bi-geo-alt"></i> {{ $entreprise->ville }}</p>
              <p class="text-muted mb-3"><i class="bi bi-briefcase"></i> {{ $entreprise->SecteurActivite }}</p>
              <a href="{{ route('loginShow') }}" class="btn btn-outline-primary btn-sm w-100">{{ $entreprise->offre_emplois_count }} offres</a>
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
    </div>
  </section>

  <style>
    .stat-card {
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .stat-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .stat-icon {
      font-size: 2.5rem;
      color: var(--primary);
      margin-bottom: 15px;
    }

    .stat-number {
      font-size: 2rem;
      font-weight: 700;
      color: #2c3e50;
      margin-bottom: 5px;
    }

    .stat-label {
      color: #6c757d;
      font-size: 1.1rem;
      margin: 0;
    }

    .job-card {
      background: #fff;
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      height: 100%;
    }

    .job-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .job-header {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 15px;
    }

    .job-header h5 {
      margin: 0;
      font-size: 1.1rem;
      color: #2c3e50;
    }

    .company-info {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .company-logo {
      width: 50px;
      height: 50px;
      object-fit: contain;
      margin-right: 15px;
      background: #f8f9fa;
      padding: 5px;
      border-radius: 8px;
    }

    .job-details {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
      font-size: 0.9rem;
      color: #6c757d;
    }

    .company-card-small {
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      height: 100%;
    }

    .company-card-small:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .company-logo-small {
      height: 120px;
      background: #f8f9fa;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 15px;
    }

    .company-logo-small img {
      max-height: 100%;
      max-width: 100%;
      object-fit: contain;
    }

    .company-info-small {
      padding: 15px;
    }

    .company-info-small h6 {
      margin: 0 0 10px;
      color: #2c3e50;
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

    .category-card {
      background: #fff;
      border-radius: 15px;
      padding: 25px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      position: relative;
      height: 100%;
      text-align: center;
      cursor: pointer;
    }

    .category-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .category-icon {
      font-size: 2.5rem;
      color: var(--primary);
      margin-bottom: 15px;
    }

    .category-info h5 {
      color: #2c3e50;
      font-size: 1.1rem;
      margin-bottom: 5px;
    }

    .category-info p {
      font-size: 0.9rem;
    }

    .category-card::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 3px;
      background: var(--primary);
      transform: scaleX(0);
      transition: transform 0.3s ease;
    }

    .category-card:hover::after {
      transform: scaleX(1);
    }

    .trusted-companies {
      padding: 20px 0;
    }

    .company-logo-card {
      background: #fff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      aspect-ratio: 1;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .company-logo-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .company-logo-card img {
      max-width: 80%;
      max-height: 80%;
      object-fit: contain;
      transition: all 0.3s ease;
      filter: grayscale(100%);
    }

    .company-logo-card:hover img {
      filter: grayscale(0%);
    }

    .guide-card {
      background: #fff;
      border-radius: 15px;
      padding: 25px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      height: 100%;
    }

    .guide-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .guide-icon {
      font-size: 2rem;
      color: var(--primary);
      margin-bottom: 15px;
    }

    .guide-card h5 {
      color: #2c3e50;
      font-size: 1.2rem;
      margin-bottom: 10px;
    }

    .guide-card p {
      font-size: 0.95rem;
      margin-bottom: 20px;
    }

    .guide-link {
      color: var(--primary);
      text-decoration: none;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      transition: all 0.3s ease;
    }

    .guide-link i {
      margin-left: 5px;
      transition: transform 0.3s ease;
    }

    .guide-link:hover {
      color: var(--primary-dark);
    }

    .guide-link:hover i {
      transform: translateX(5px);
    }
  </style>

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
          <li><a href="accueil.html" class="text-white text-decoration-none">Accueil</a></li>
          <li><a href="offre.html" class="text-white text-decoration-none">Offres d'Emploi</a></li>
          <li><a href="Entreprises.html" class="text-white text-decoration-none">Entreprises</a></li>
          <li><a href="login.html" class="text-white text-decoration-none">Se connecter</a></li>
          <li><a href="choix-inscription.html" class="text-white text-decoration-none">Créer un compte</a></li>
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
  <a href="{{ route('accueil') }}" class="scroll-to-top" id="scrollToTop" aria-label="Retour en haut">
    <i class="bi bi-arrow-up"></i>
  </a>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('storage/indexJs/script.js') }}"></script>
  @vite(['resources/js/indexJs/script.js'])
</body>
</html>