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
  <style>
    /* Styles pour le logo rond */
    .logo-container {
      display: flex;
      align-items: center;
      gap: 20px;
      margin-bottom: 15px;
    }
    
    .logo-wrapper {
      position: relative;
      width: 120px;
      height: 120px;
    }
    
    .logo-preview {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      overflow: hidden;
      border: 3px solid #e9ecef;
      display: flex;
      background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' d='M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21'/></svg>");
      background-repeat: no-repeat;
      background-position: center;
      background-size: 50%;
      align-items: center;
      justify-content: center;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .logo-preview img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: none;
    }
    
    .logo-upload-area {
      flex: 1;
    }
    
    .custom-file-upload {
      display: block;
      padding: 20px;
      border: 2px dashed #dee2e6;
      border-radius: 8px;
      text-align: center;
      cursor: pointer;
      transition: all 0.3s;
    }
    
    .custom-file-upload:hover {
      border-color: #0d6efd;
      background-color: #f8f9fa;
    }
    
    .custom-file-upload i {
      font-size: 24px;
      color: #6c757d;
      margin-bottom: 10px;
    }
    
    .remove-logo {
      position: absolute;
      top: -10px;
      right: -10px;
      width: 30px;
      height: 30px;
      background-color: #dc3545;
      color: white;
      border-radius: 50%;
      display: none; /* Caché par défaut */
      align-items: center;
      justify-content: center;
      cursor: pointer;
      z-index: 10;
      border: 2px solid white;
      box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .remove-logo:hover {
      background-color: #c82333;
    }
    
    .file-info {
      font-size: 12px;
      color: #6c757d;
      margin-top: 5px;
    }

    /* Style pour le champ secteur personnalisé */
    #autreSecteurContainer {
      display: none;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <x-compoIndex.navbar activePage='5'/>

  <div class="signup-container">
    <div class="container">
      <div class="signup-card">
        <h2>Inscription Entreprise</h2>
        <form method="POST" action="{{ Route('inscriptionEntreprise') }}" enctype="multipart/form-data" id="entrepriseForm">
          @csrf
          <div class="mb-3">
            <label for="nom-entreprise" class="form-label">Nom de l'entreprise*</label>
            <input type="text" class="form-control @error('nomEntreprise') is-invalid @enderror" id="nom-entreprise" name="nomEntreprise" value="{{ old('nomEntreprise') }}" required>
            @error('nomEntreprise')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="email" class="form-label">Email professionnel*</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="secteur" class="form-label">Secteur d'activité*</label>
            <select class="form-select @error('SecteurActivite') is-invalid @enderror" id="secteur" name="SecteurActivite" required>
              <option value="">Sélectionnez un secteur</option>
              <option value="technologie" {{ old('SecteurActivite') == 'technologie' ? 'selected' : '' }}>Technologie</option>
              <option value="finance" {{ old('SecteurActivite') == 'finance' ? 'selected' : '' }}>Finance</option>
              <option value="sante" {{ old('SecteurActivite') == 'sante' ? 'selected' : '' }}>Santé</option>
              <option value="education" {{ old('SecteurActivite') == 'education' ? 'selected' : '' }}>Éducation</option>
              <option value="industrie" {{ old('SecteurActivite') == 'industrie' ? 'selected' : '' }}>Industrie</option>
              <option value="commerce" {{ old('SecteurActivite') == 'commerce' ? 'selected' : '' }}>Commerce</option>
              <option value="autre" {{ old('SecteurActivite') == 'autre' ? 'selected' : '' }}>Autre</option>
            </select>
            @error('SecteurActivite')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div id="autreSecteurContainer" class="mt-2">
              <input type="text" class="form-control @error('autreSecteur') is-invalid @enderror" id="autreSecteur" name="autreSecteur" placeholder="Veuillez préciser votre secteur d'activité" value="{{ old('autreSecteur') }}">
              @error('autreSecteur')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="mb-3">
            <label for="taille" class="form-label">Taille de l'entreprise*</label>
            <select class="form-select @error('tailleEntreprise') is-invalid @enderror" id="taille" name="tailleEntreprise" required>
              <option value="">Sélectionnez la taille</option>
              <option value="1-10" {{ old('tailleEntreprise') == '1-10' ? 'selected' : '' }}>1-10 employés</option>
              <option value="11-50" {{ old('tailleEntreprise') == '11-50' ? 'selected' : '' }}>11-50 employés</option>
              <option value="51-200" {{ old('tailleEntreprise') == '51-200' ? 'selected' : '' }}>51-200 employés</option>
              <option value="201-500" {{ old('tailleEntreprise') == '201-500' ? 'selected' : '' }}>201-500 employés</option>
              <option value="501+" {{ old('tailleEntreprise') == '501+' ? 'selected' : '' }}>Plus de 500 employés</option>
            </select>
            @error('tailleEntreprise')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="site-web" class="form-label">Site web (optionnel)</label>
            <input type="url" class="form-control @error('siteWeb') is-invalid @enderror" id="site-web" name="siteWeb" placeholder="https://..." value="{{ old('siteWeb') }}">
            @error('siteWeb')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="ville" class="form-label">Ville*</label>
            <input type="text" class="form-control @error('ville') is-invalid @enderror" id="ville" name="ville" value="{{ old('ville') }}" >
            @error('ville')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="adresse" class="form-label">Adresse*</label>
            <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" value="{{ old('adresse') }}" >
            @error('adresse')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="dateCreation" class="form-label">Date de création*</label>
            <input type="date" class="form-control @error('dateCreation') is-invalid @enderror" name="dateCreation" id="dateCreation" value="{{ old('dateCreation') }}" >
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
            <label class="form-label">Logo de l'entreprise (optionnel)</label>
            <div class="logo-container">
              <div class="logo-wrapper">
                <div class="logo-preview">
                  <img id="logoPreview" src="" alt="Aperçu du logo">
                </div>
                <div class="remove-logo" id="removeLogo">
                  <i class="bi bi-x-lg"></i>
                </div>
              </div>
              <div class="logo-upload-area">
                <label for="logo" class="custom-file-upload">
                  <i class="bi bi-cloud-arrow-up"></i>
                  <div>Cliquez pour télécharger</div>
                  <div class="file-info">PNG, JPG ou SVG (Max 2MB)</div>
                </label>
                <input type="file" id="logo" name="logo" class="d-none @error('logo') is-invalid @enderror" accept=".png,.jpg,.jpeg,.svg">
                @error('logo')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          
          <div class="mb-3">
            <label for="phone" class="form-label">Téléphone*</label>
            <!-- Champ caché avec le numéro complet international -->
            <input type="hidden" id="fullPhone" name="phone">
            <!-- Champ visible stylé avec intl-tel-input -->
            <input type="tel" id="phone" name="telephone" class="form-control @error('phone') is-invalid @enderror" placeholder="6 12 34 56 78"  value="{{ old('phone') }}"/>
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="password" class="form-label">Mot de passe*</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="confirm-password" class="form-label">Confirmer le mot de passe*</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirm-password" name="password_confirmation" >
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input id="conditions" name="conditions" >
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  @vite(['resources/js/indexJs/numero-telephone.js'])
  <script>
    // Gestion du logo
    const logoInput = document.getElementById('logo');
    const logoPreview = document.getElementById('logoPreview');
    const removeLogo = document.getElementById('removeLogo');
    
    // Afficher la prévisualisation
    logoInput.addEventListener('change', function(e) {
      if (this.files && this.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
          logoPreview.src = e.target.result;
          logoPreview.style.display = 'block';
          removeLogo.style.display = 'flex';
        }
        
        reader.readAsDataURL(this.files[0]);
      }
    });
    
    // Supprimer le logo
    removeLogo.addEventListener('click', function(e) {
      e.stopPropagation();
      logoInput.value = '';
      logoPreview.src = '#';
      logoPreview.style.display = 'none';
      removeLogo.style.display = 'none';
    });

    // Gestion du champ "Autre" secteur
    const secteurSelect = document.getElementById('secteur');
    const autreSecteurContainer = document.getElementById('autreSecteurContainer');
    const autreSecteurInput = document.getElementById('autreSecteur');
    const entrepriseForm = document.getElementById('entrepriseForm');

    // Afficher/masquer le champ "Autre secteur"
    secteurSelect.addEventListener('change', function() {
      if (this.value === 'autre') {
        autreSecteurContainer.style.display = 'block';
        autreSecteurInput.setAttribute('required', 'required');
      } else {
        autreSecteurContainer.style.display = 'none';
        autreSecteurInput.removeAttribute('required');
      }
    });

    // Au chargement de la page, vérifier si "Autre" était déjà sélectionné
    document.addEventListener('DOMContentLoaded', function() {
      if (secteurSelect.value === 'autre') {
        autreSecteurContainer.style.display = 'block';
        autreSecteurInput.setAttribute('required', 'required');
      }
    });

    // Avant la soumission du formulaire
    entrepriseForm.addEventListener('submit', function(e) {
      if (secteurSelect.value === 'autre') {
        // Si "Autre" est sélectionné, copier la valeur du champ autreSecteur dans secteurSelect
        secteurSelect.value = autreSecteurInput.value;
      }
      
      // Le formulaire continue normalement sa soumission
    });
  </script>
</body>
</html>