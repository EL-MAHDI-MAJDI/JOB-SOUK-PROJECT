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
  <style>
    /* Style pour le champ photo centré */
    .photo-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 2rem;
    }

    .photo-upload-container {
      text-align: center;
      margin-bottom: 1rem;
    }

    .photo-preview-container {
      position: relative;
      margin-bottom: 1rem;
    }

    .photo-preview {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #e9ecef;
      display: none;
    }

    .photo-upload-btn {
      position: relative;
      cursor: pointer;
      padding: 0.5rem 1.5rem;
      background-color: #f8f9fa;
      border: 1px dashed #ced4da;
      border-radius: 0.375rem;
      transition: all 0.2s;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
    }

    .photo-upload-btn:hover {
      background-color: #e9ecef;
    }

    .photo-upload-input {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      opacity: 0;
      cursor: pointer;
    }

    .photo-actions {
      display: flex;
      gap: 0.5rem;
      justify-content: center;
    }

    .photo-change-btn,
    .photo-remove-btn {
      padding: 0.25rem 0.75rem;
      font-size: 0.875rem;
      border-radius: 0.25rem;
    }

    .photo-change-btn {
      background-color: #0d6efd;
      color: white;
      border: none;
    }

    .photo-remove-btn {
      background-color: #dc3545;
      color: white;
      border: none;
    }

    .photo-change-btn:hover,
    .photo-remove-btn:hover {
      opacity: 0.8;
    }

    .hidden {
      display: none !important;
    }
  </style>
  @vite(['resources/css/StyleIndex/inscriptionCandidat.css'])
</head>
<body>
  <!-- Navbar -->
  <x-compoIndex.navbar activePage='5'/>

  <div class="signup-container">
    <div class="container">
      <div class="signup-card">
        <h2>Inscription Candidat</h2>
        <form method="POST" action="{{ Route('inscriptionCandidat') }}" enctype="multipart/form-data">
          @csrf
          
          <!-- Section Photo Centrée -->
          <div class="photo-section">
            <div class="photo-preview-container">
              <img id="photoPreview" class="photo-preview" alt="Photo de profil">
            </div>
            
            <div class="photo-upload-container">
              <div id="initialUpload" class="photo-upload-btn">
                <i class="bi bi-camera-fill"></i>
                <span>Ajoutez votre photo de profil</span>
                <input type="file" name="photoProfile" id="photoInput" class="photo-upload-input @error('photoProfile') is-invalid @enderror " accept="image/*">
              </div>
              <div id="photoActions" class="photo-actions hidden">
                <button type="button" id="photoChangeBtn" class="photo-change-btn">
                  <i class="bi bi-arrow-repeat"></i> Changer
                </button>
                <button type="button" id="photoRemoveBtn" class="photo-remove-btn">
                  <i class="bi bi-trash"></i> Supprimer
                </button>
              </div>
              @error('photoProfile')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
          </div>
          

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="prenom" class="form-label">Prénom*</label>
              <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror" id="prenom" value="{{ old('prenom') }}" required>
              @error('prenom')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="nom" class="form-label">Nom*</label>
              <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" value="{{ old('nom') }}" required>
              @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <!-- Autres champs du formulaire... -->
          <div class="mb-3">
            <label for="email" class="form-label">Email*</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="phone" class="form-label">Téléphone*</label>
            <!-- Champ caché avec le numéro complet international -->
            <input type="hidden" id="fullPhone" name="phone" class="@error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
            <input type="hidden" name="testPhone">
            <!-- Champ visible stylé avec intl-tel-input -->
            <input type="tel" id="phone" name="telephone" class="form-control" placeholder="6 12 34 56 78" value="{{ old('telephone') }}" required/>
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="ville" class="form-label">Ville*</label>
            <input type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" id="ville" value="{{ old('ville') }}" required>
            @error('ville')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="adresse" class="form-label">Adresse*</label>
            <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" id="adresse" value="{{ old('adresse') }}" required>
            @error('adresse')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="titre" class="form-label">Titre professionnel (optionnel)</label>
            <input type="text" class="form-control @error('titre_professionnel') is-invalid @enderror" id="titre" name="titre_professionnel" placeholder="Ex: Développeur Web Full Stack" value="{{ old('titre_professionnel') }}">
            @error('titre_professionnel')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="password" class="form-label">Mot de passe*</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="confirm-password" class="form-label">Confirmer le mot de passe*</label>
            <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="confirm-password" required>
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          {{-- <div class="mb-3 form-check">
            <input type="checkbox" name="conditions" class="form-check-input" id="conditions">
            <label class="form-check-label" for="conditions">
              J'accepte les conditions d'utilisation et la politique de confidentialité
            </label>
          </div> --}}
          
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
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const photoInput = document.getElementById('photoInput');
      const photoPreview = document.getElementById('photoPreview');
      const initialUpload = document.getElementById('initialUpload');
      const photoActions = document.getElementById('photoActions');
      const photoChangeBtn = document.getElementById('photoChangeBtn');
      const photoRemoveBtn = document.getElementById('photoRemoveBtn');

      // Gestion du changement de photo
      photoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
          // Vérification de la taille (2MB max)
          if (file.size > 2 * 1024 * 1024) {
            alert('La photo ne doit pas dépasser 2MB');
            return;
          }
          
          // Vérification du type de fichier
          if (!file.type.match('image.*')) {
            alert('Veuillez sélectionner une image valide');
            return;
          }
          
          const reader = new FileReader();
          reader.onload = function(event) {
            photoPreview.src = event.target.result;
            photoPreview.style.display = 'block';
            initialUpload.classList.add('hidden');
            photoActions.classList.remove('hidden');
          }
          reader.readAsDataURL(file);
        }
      });

      // Bouton Changer
      photoChangeBtn.addEventListener('click', function() {
        photoInput.click();
      });

      // Bouton Supprimer
      photoRemoveBtn.addEventListener('click', function() {
        photoInput.value = '';
        photoPreview.src = '';
        photoPreview.style.display = 'none';
        initialUpload.classList.remove('hidden');
        photoActions.classList.add('hidden');
      });
    });
  </script>
  @vite(['resources/js/indexJs/numero-telephone.js'])
</body>
</html>