<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Inscription Entreprise - JobFinder</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  @vite(['resources/css/StyleIndex/inscriptionEntreprise.css'])
</head>
<body>
  <!-- Navbar -->
   <x-compoIndex.navbar activePage='5'/>

  <div class="signup-container">
    <div class="container">
      <div class="signup-card">
        <h2>Inscription Entreprise</h2>
        <form method="POST" action="{{ Route('inscriptionEntreprise') }}">
          @csrf
          <div class="mb-3">
            <label for="nom-entreprise" class="form-label">Nom de l'entreprise*</label>
            <input type="text" class="form-control @error('nomEntreprise') is-invalid @enderror" id="nom-entreprise" name="nomEntreprise" value="{{ old('nomEntreprise') }}">
            @error('nomEntreprise')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email professionnel*</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="secteur" class="form-label">Secteur d'activité*</label>
            <select class="form-select @error('SecteurActivite') is-invalid @enderror" id="secteur" name="SecteurActivite">
              <option value="">Sélectionnez un secteur</option>
              <option value="technologie">Technologie</option>
              <option value="finance">Finance</option>
              <option value="sante">Santé</option>
              <option value="education">Éducation</option>
              <option value="industrie">Industrie</option>
              <option value="commerce">Commerce</option>
              <option value="autre">Autre</option>
            </select>
            @error('SecteurActivite')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="taille" class="form-label">Taille de l'entreprise*</label>
            <select class="form-select @error('tailleEntreprise') is-invalid @enderror" id="taille" name="tailleEntreprise">
              <option value="">Sélectionnez la taille</option>
              <option value="1-10">1-10 employés</option>
              <option value="11-50">11-50 employés</option>
              <option value="51-200">51-200 employés</option>
              <option value="201-500">201-500 employés</option>
              <option value="501+">Plus de 500 employés</option>
            </select>
            @error('tailleEntreprise')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="site-web" class="form-label">Site web  (optionnel)</label>
            <input type="url" class="form-control @error('siteWeb') is-invalid @enderror" id="site-web" name="siteWeb" placeholder="https://..." value="{{ old('siteWeb') }}">
            @error('siteWeb')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="ville" class="form-label">Ville*</label>
            <input type="text" class="form-control @error('ville') is-invalid @enderror" id="ville" name="ville" value="{{ old('ville') }}">
            @error('ville')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="adresse" class="form-label">Adresse*</label>
            <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" value="{{ old('adresse') }}">
            @error('adresse')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="dateCreation" class="form-label">Date de création*</label>
            <input type="date" class="form-control @error('dateCreation') is-invalid @enderror" name="dateCreation" id="dateCreation" value="{{ old('dateCreation') }}">
            @error('dateCreation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description de l'entreprise (optionnel)</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="4" name="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label d-block">Logo de l'entreprise (optionnel)</label>
            <label for="logo" class="custom-file-upload d-block">
              <i class="bi bi-cloud-arrow-up"></i>
              <div>Cliquez ou glissez votre logo ici</div>
              <div class="text-muted small">PNG, JPG ou SVG (Max 2MB)</div>
            </label>
            <input type="file" id="logo" name="logo" class="d-none @error('logo') is-invalid @enderror" accept=".png,.jpg,.jpeg,.svg" value="{{ old('logo') }}">
            @error('logo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Téléphone*</label>
            <!-- Champ caché avec le numéro complet international -->
            <input type="hidden" id="fullPhone" name="phone">
            <!-- Champ visible stylé avec intl-tel-input -->
            <input type="tel" id="phone" name="telephone" class="form-control @error('phone') is-invalid @enderror" placeholder="6 12 34 56 78" value="{{ old('telephone') }}"/>
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Mot de passe*</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="confirm-password" class="form-label">Confirmer le mot de passe*</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="confirm-password" name="password_confirmation">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="conditions">
            <label class="form-check-label" for="conditions">
              J'accepte les conditions d'utilisation et la politique de confidentialité
            </label>
          </div>
          <button type="submit" class="btn btn-primary">Créer mon compte entreprise</button>
          <div class="text-center mt-3">
            <a href="choix-inscription.html" class="text-decoration-none">
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
