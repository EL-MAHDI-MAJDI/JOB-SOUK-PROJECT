<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Inscription Candidat - JobFinder</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  @vite(['resources/css/StyleIndex/inscriptionCandidat.css'])
</head>
<body>
  <!-- Navbar -->
   <x-compoIndex.navbar activePage='5'/>

  <div class="signup-container">
    <div class="container">
      <div class="signup-card">
        <h2>Inscription Candidat</h2>
        <form method="POST" action="{{ Route('inscriptionCandidat') }}">
          @csrf
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="prenom" class="form-label">Prénom</label>
              <input type="text" name="prenom" class="form-control" id="prenom" value="{{ old('prenom') }}">
              @error('prenom')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="nom" class="form-label">Nom</label>
              <input type="text" name="nom" class="form-control" id="nom" value="{{ old('nom') }}">
              @error('nom')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <!-- <div class="mb-3">
            <label for="tel" class="form-label">Téléphone</label>
            <input type="tel" class="form-control" id="tel" >
            <input type="tel" id="phone" placeholder="phone"/>
          </div> -->
          <div class="mb-3">
            <label for="phone" class="form-label">Téléphone</label>
            <!-- Champ caché avec le numéro complet international -->
            <!-- <input type="hidden" id="fullPhone" name="phone"> -->
            <!-- Champ visible stylé avec intl-tel-input -->
            <input type="tel" id="phone" name="phone" class="form-control" placeholder="6 12 34 56 78"  value="{{ old('phone') }}"/>
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" class="form-control" name="ville" id="ville" value="{{ old('ville') }}">
            @error('ville')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" name="adresse" id="adresse" value="{{ old('adresse') }}">
            @error('adresse')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="titre" class="form-label">Titre professionnel</label>
            <input type="text" class="form-control" id="titre" name="titre_professionnel" placeholder="Ex: Développeur Web Full Stack" value="{{ old('titre_professionnel') }}">
            @error('titre_professionnel')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label d-block">CV</label>
            <label for="cv" class="custom-file-upload d-block">
              <i class="bi bi-cloud-arrow-up"></i>
              <div>Cliquez ou glissez votre CV ici</div>
              <div class="text-muted small">PDF, DOC ou DOCX (Max 5MB)</div>
            </label>
            <input type="file" id="cv" name="url_cv" class="d-none" accept=".pdf,.doc,.docx" value="{{ old('url_cv') }}">
            @error('url_cv')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="password">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="confirm-password" class="form-label">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" class="form-control" id="confirm-password">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" name="conditions" class="form-check-input" id="conditions" >
            <label class="form-check-label" for="conditions">
              J'accepte les conditions d'utilisation et la politique de confidentialité
            </label>
          </div>
          <button class="btn btn-primary">Créer mon compte</button>
          <div class="text-center mt-3">
            <a href="{{ route('choixInscription')}}" class="text-decoration-none">
              <i class="bi bi-arrow-left"></i> Retour au choix du type de compte
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/js/indexJs/numero-telephone.js'])
</body>
</html>
