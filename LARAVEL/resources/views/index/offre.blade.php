<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Accueil - Job souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
   @vite(['resources/css/StyleIndex/offre.css'])
</head>
<body>
  <!-- Navbar -->
   <x-compoIndex.navbar activePage='2'/>

  <section class="hero">
    <div class="container">
      <h1>Trouvez le job de vos rêves</h1>
      <p class="lead">Recherchez parmi des milliers d'offres d'emploi au Maroc</p>
      <form class="row g-2 justify-content-center mt-4">
        <div class="col-md-4">
          <input type="text" class="form-control" placeholder="Poste, mot-clé, entreprise">
        </div>
        <div class="col-md-3">
          <div style="position: relative;">
            <input type="text" class="form-control" id="ville" placeholder="Ville ou région" onkeyup="afficherSuggestioons(this.value)"/>
          <div id="suggestions-ville"></div>
        </div>
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-search w-100">Rechercher</button>
        </div>
      </form>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      <h2 class="mb-4 text-center">Offres récentes</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="job-card">
            <h5>Développeur Full Stack</h5>
            <p class="mb-1">TechCorp - Casablanca</p>
            <p class="text-muted">CDI - Temps plein</p>
            <a href="#" class="btn btn-outline-primary btn-sm">Voir plus</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="job-card">
            <h5>Analyste Data</h5>
            <p class="mb-1">DataPlus - Rabat</p>
            <p class="text-muted">Stage - 6 mois</p>
            <a href="#" class="btn btn-outline-primary btn-sm">Voir plus</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="job-card">
            <h5>Responsable Marketing</h5>
            <p class="mb-1">MarketPro - Marrakech</p>
            <p class="text-muted">CDI - Temps plein</p>
            <a href="#" class="btn btn-outline-primary btn-sm">Voir plus</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="job-card">
            <h5>Ingénieur Réseau</h5>
            <p class="mb-1">NetSolutions - Tanger</p>
            <p class="text-muted">CDI - Temps plein</p>
            <a href="#" class="btn btn-outline-primary btn-sm">Voir plus</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="job-card">
            <h5>Développeur Mobile</h5>
            <p class="mb-1">AppDev - Agadir</p>
            <p class="text-muted">Freelance</p>
            <a href="#" class="btn btn-outline-primary btn-sm">Voir plus</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="job-card">
            <h5>Chef de Projet IT</h5>
            <p class="mb-1">ITConsult - Oujda</p>
            <p class="text-muted">CDI - Temps plein</p>
            <a href="#" class="btn btn-outline-primary btn-sm">Voir plus</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="job-card">
            <h5>Développeur Frontend</h5>
            <p class="mb-1">WebDesign - Fès</p>
            <p class="text-muted">CDI - Temps plein</p>
            <a href="#" class="btn btn-outline-primary btn-sm">Voir plus</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="job-card">
            <h5>Administrateur Système</h5>
            <p class="mb-1">SysAdmin - Rabat</p>
            <p class="text-muted">CDI - Temps plein</p>
            <a href="#" class="btn btn-outline-primary btn-sm">Voir plus</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="job-card">
            <h5>Développeur Backend</h5>
            <p class="mb-1">CodeFactory - Marrakech</p>
            <p class="text-muted">CDI - Temps plein</p>
            <a href="#" class="btn btn-outline-primary btn-sm">Voir plus</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="job-card">
            <h5>Graphiste</h5>
            <p class="mb-1">DesignPro - Casablanca</p>
            <p class="text-muted">Freelance</p>
            <a href="#" class="btn btn-outline-primary btn-sm">Voir plus</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="job-card">
            <h5>Développeur Web</h5>
            <p class="mb-1">WebSolutions - Tanger</p>
            <p class="text-muted">CDI - Temps plein</p>
            <a href="#" class="btn btn-outline-primary btn-sm">Voir plus</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="job-card">
            <h5>UX/UI Designer</h5>
            <p class="mb-1">Creative Studio - Fès</p>
            <p class="text-muted">Freelance</p>
            <a href="#" class="btn btn-outline-primary btn-sm">Voir plus</a>
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
  <a href="offre.html" class="scroll-to-top" id="scrollToTop" aria-label="Retour en haut">
    <i class="bi bi-arrow-up"></i>
  </a>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/js/indexJs/script.js'])
</body>
</html>