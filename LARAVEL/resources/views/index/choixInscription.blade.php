<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Choisir votre compte - JobFinder</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  @vite(['resources/css/StyleIndex/choixInscription.css'])
</head>
<body>
  
  <!-- Navbar -->
   <x-compoIndex.navbar activePage='5'/>

  <div class="choice-container">
    <div class="choice-wrapper">
      <div class="container">
        <div class="choice-card">
        <h2>Choisissez votre type de compte</h2>
        <div class="choice-options">
          <a href="{{ route('inscriptionCandidat') }}" class="choice-option">
            <i class="bi bi-person-fill"></i>
            <h3>Candidat</h3>
            <p>Vous cherchez un emploi ? Créez votre profil, postulez aux offres et suivez vos candidatures.</p>
          </a>
          <a href="{{ route('inscriptionEntreprise') }}" class="choice-option">
            <i class="bi bi-building"></i>
            <h3>Entreprise</h3>
            <p>Vous recrutez ? Publiez vos offres d'emploi et trouvez les meilleurs talents.</p>
          </a>
        </div>
      </div>
    </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
