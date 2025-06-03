<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paramètres - Job Souk</title>
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
      height: 100vh;
      overflow: hidden;
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
      padding: 1rem;
      margin-left: 0;
      height: calc(100vh - 70px);
      display: flex;
      flex-direction: column;
    }

    /* Barre de navigation supérieure */
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

    /* Container principal */
    .settings-container {
      height: 100%;
      background: white;
      border-radius: 12px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      overflow: hidden;
      display: flex;
    }

    /* Menu des paramètres */
    .settings-menu {
      width: 280px;
      border-right: 1px solid #eee;
      padding: 1rem 0;
    }

    .settings-menu .nav-link {
      padding: 0.75rem 1.5rem;
      color: var(--text-main);
      border-left: 3px solid transparent;
    }

    .settings-menu .nav-link:hover {
      background-color: #f8f9fa;
    }

    .settings-menu .nav-link.active {
      border-left: 3px solid var(--primary);
      background-color: var(--primary-light);
      color: var(--primary);
      font-weight: 500;
    }

    .settings-menu .nav-link i {
      width: 24px;
      text-align: center;
      margin-right: 0.75rem;
    }

    /* Contenu des paramètres */
    .settings-content {
      flex: 1;
      padding: 2rem;
      overflow-y: auto;
    }

    .settings-section {
      margin-bottom: 2.5rem;
    }

    .settings-section h2 {
      font-size: 1.5rem;
      margin-bottom: 1.5rem;
      padding-bottom: 0.75rem;
      border-bottom: 1px solid #eee;
    }

    .settings-card {
      background-color: #f8f9fa;
      border-radius: 8px;
      padding: 1.5rem;
      margin-bottom: 1.5rem;
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

      .settings-menu {
        width: 100%;
        border-right: none;
      }

      .settings-container {
        flex-direction: column;
      }
    }

    /* Styles pour les modales */
    .modal-content {
      border-radius: 12px;
      border: none;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    .modal-header {
      border-bottom: none;
      padding-bottom: 0;
    }

    .modal-footer {
      border-top: none;
    }

    .p-3 {
      height: 47px;
    }

    /* Avatar upload */
    .avatar-upload {
      position: relative;
      width: 120px;
      margin: 0 auto 1.5rem;
    }

    .avatar-upload .avatar-preview {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      background-color: #f8f9fa;
      border: 1px solid #eee;
      overflow: hidden;
    }

    .avatar-upload .avatar-preview img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .avatar-upload .btn-upload {
      position: absolute;
      bottom: 0;
      right: 0;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background-color: var(--primary);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      border: none;
      cursor: pointer;
    }

    /* Toggle switch */
    .form-check-input:checked {
      background-color: var(--primary);
      border-color: var(--primary);
    }
  </style>
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoCandidat.side-menu activePage=10 :candidat='$candidat' />
  </div>

  <!-- Barre de navigation supérieure -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoCandidat.navbar :candidat='$candidat' />
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
      @if ($errors->any())
        <x-alert type="danger">
          <h5 class="alert-heading">Erreur de validation</h5>
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </x-alert>
      @endif
        <!-- Afficher message "votre modification a été faite avec succès" -->
      @include('partials.flashbag')
    <div class="container-fluid h-100">
      <div class="settings-container h-100">
        <!-- Menu des paramètres -->
        <div class="settings-menu">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#compte" data-bs-toggle="tab">
                <i class="bi bi-person-circle"></i> Compte
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#securite" data-bs-toggle="tab">
                <i class="bi bi-shield-lock"></i> Sécurité
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#notifications" data-bs-toggle="tab">
                <i class="bi bi-bell"></i> Notifications
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#confidentialite" data-bs-toggle="tab">
                <i class="bi bi-eye"></i> Confidentialité
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#preferences" data-bs-toggle="tab">
                <i class="bi bi-sliders"></i> Préférences
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#aide" data-bs-toggle="tab">
                <i class="bi bi-question-circle"></i> Aide
              </a>
            </li>
          </ul>
        </div>

        <!-- Contenu des paramètres -->
        <div class="settings-content tab-content">
          <!-- Onglet Compte -->
          <div class="tab-pane fade show active" id="compte">
            <div class="settings-section">
              <h2>Informations du compte</h2>
              
              
              
              <form action="{{ route('candidat.updateparametre', $candidat->id) }}" method="POST" class="settings-card">
                @csrf
                @method('PUT')
                
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" value="{{old('nom',$candidat->nom)}}" name="nom">
                    @error('firstName')
                      <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" value="{{old('prenom',$candidat->prenom )}}" name="prenom">
                    @error('lastName')
                      <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                
                <div class="mb-3">
                  <label for="email" class="form-label">Adresse email</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{ old('email',$candidat->email) }}">
                  @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="phone" class="form-label">Téléphone</label>
                  <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone',$candidat->phone) }}" >
                  @error('phone')
                    <div class="text-danger mt-1">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="mb-3">
                  <label for="adresse" class="form-label">Adresse</label>
                  <input type="text" class="form-control" id="adresse" value="{{ old('adresse',$candidat->adresse) }}" name="adresse">
                  @error('address')
                    <div class="text-danger mt-1">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="row mb-3">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" class="form-control" id="ville" value="{{ old('ville',$candidat->ville) }}" name="ville">
                    @error('city')
                      <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="row mb-3">
                  <label for="titre_professionnel">Titre professionnel</label>
                  <input type="text" class="form-control" id="titre_professionnel" name="titre_professionnel" value="{{ old('titre_professionnel',$candidat->titre_professionnel) }}">
                        @error('titre_professionnel')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                  </div>

                
                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </div>
              </form>
            </div>
            
            <div class="settings-section">
              <h2>Préférences de compte</h2>
              
              <div class="settings-card">
                <div class="form-check form-switch mb-3">
                  <input class="form-check-input" type="checkbox" id="darkMode" checked>
                  <label class="form-check-label" for="darkMode">Mode sombre</label>
                </div>
                
                <div class="form-check form-switch mb-3">
                  <input class="form-check-input" type="checkbox" id="newsletter">
                  <label class="form-check-label" for="newsletter">Recevoir la newsletter</label>
                </div>
                
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="promotions" checked>
                  <label class="form-check-label" for="promotions">Recevoir les offres promotionnelles</label>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Onglet Sécurité -->
          <div class="tab-pane fade" id="securite">
            <div class="settings-section">
              <h2>Sécurité du compte</h2>
              
              <div class="settings-card">
                <h5 class="mb-3">Mot de passe</h5>
                <p class="text-muted mb-3">Dernière modification il y a 3 mois</p>
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#passwordModal">
                  Modifier le mot de passe
                </button>
              </div>
              
              <div class="settings-card">
                <h5 class="mb-3">Authentification à deux facteurs</h5>
                <p class="text-muted mb-3">Actuellement désactivé</p>
                <button class="btn btn-outline-primary">
                  Activer l'authentification à deux facteurs
                </button>
              </div>
              
              <div class="settings-card">
                <h5 class="mb-3">Sessions actives</h5>
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <div>
                    <p class="mb-0 fw-bold">Chrome sur Windows</p>
                    <p class="mb-0 small text-muted">Casablanca, Maroc · Actif maintenant</p>
                  </div>
                  <button class="btn btn-sm btn-outline-danger">Déconnecter</button>
                </div>
                
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <p class="mb-0 fw-bold">Safari sur iPhone</p>
                    <p class="mb-0 small text-muted">Rabat, Maroc · Il y a 2 heures</p>
                  </div>
                  <button class="btn btn-sm btn-outline-danger">Déconnecter</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Onglet Notifications -->
          <div class="tab-pane fade" id="notifications">
            <div class="settings-section">
              <h2>Préférences de notification</h2>
              
              <div class="settings-card">
                <h5 class="mb-3">Notifications par email</h5>
                
                <div class="form-check form-switch mb-3">
                  <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                  <label class="form-check-label" for="emailNotifications">Activer les notifications par email</label>
                </div>
                
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" id="emailNewJobs" checked>
                  <label class="form-check-label" for="emailNewJobs">Nouvelles offres correspondant à mon profil</label>
                </div>
                
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" id="emailApplicationStatus" checked>
                  <label class="form-check-label" for="emailApplicationStatus">Statut de mes candidatures</label>
                </div>
                
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" id="emailInterviews">
                  <label class="form-check-label" for="emailInterviews">Invitations à des entretiens</label>
                </div>
                
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="emailMessages" checked>
                  <label class="form-check-label" for="emailMessages">Nouveaux messages</label>
                </div>
              </div>
              
              <div class="settings-card">
                <h5 class="mb-3">Notifications push</h5>
                
                <div class="form-check form-switch mb-3">
                  <input class="form-check-input" type="checkbox" id="pushNotifications" checked>
                  <label class="form-check-label" for="pushNotifications">Activer les notifications push</label>
                </div>
                
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" id="pushImportant" checked>
                  <label class="form-check-label" for="pushImportant">Notifications importantes seulement</label>
                </div>
                
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="pushSound" checked>
                  <label class="form-check-label" for="pushSound">Son de notification</label>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Onglet Confidentialité -->
          <div class="tab-pane fade" id="confidentialite">
            <div class="settings-section">
              <h2>Paramètres de confidentialité</h2>
              
              <div class="settings-card">
                <h5 class="mb-3">Visibilité du profil</h5>
                
                <div class="form-check mb-3">
                  <input class="form-check-input" type="radio" name="profileVisibility" id="visibilityPublic" checked>
                  <label class="form-check-label" for="visibilityPublic">
                    Public - Mon profil peut être vu par tous les recruteurs
                  </label>
                </div>
                
                <div class="form-check mb-3">
                  <input class="form-check-input" type="radio" name="profileVisibility" id="visibilityPrivate">
                  <label class="form-check-label" for="visibilityPrivate">
                    Privé - Mon profil n'est visible que pour les recruteurs auxquels j'ai postulé
                  </label>
                </div>
              </div>
              
              <div class="settings-card">
                <h5 class="mb-3">Partage de données</h5>
                
                <div class="form-check form-switch mb-3">
                  <input class="form-check-input" type="checkbox" id="shareData" checked>
                  <label class="form-check-label" for="shareData">
                    Autoriser le partage de mes données avec des partenaires de confiance pour des opportunités pertinentes
                  </label>
                </div>
                
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="analyticsData" checked>
                  <label class="form-check-label" for="analyticsData">
                    Partager des données anonymes pour améliorer Job Souk
                  </label>
                </div>
              </div>
              
              <div class="settings-card">
                <h5 class="mb-3">Suppression de compte</h5>
                <p class="text-muted mb-3">
                  La suppression de votre compte est permanente et supprimera toutes vos données.
                  Cette action ne peut pas être annulée.
                </p>
                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                  Supprimer mon compte
                </button>
              </div>
            </div>
          </div>
          
          <!-- Onglet Préférences -->
          <div class="tab-pane fade" id="preferences">
            <div class="settings-section">
              <h2>Préférences générales</h2>
              
              <div class="settings-card">
                <h5 class="mb-3">Langue</h5>
                <select class="form-select mb-3">
                  <option selected>Français</option>
                  <option>Anglais</option>
                  <option>Arabe</option>
                </select>
                
                <h5 class="mb-3">Région</h5>
                <select class="form-select">
                  <option selected>Maroc</option>
                  <option>France</option>
                  <option>Canada</option>
                  <option>Autre</option>
                </select>
              </div>
              
              <div class="settings-card">
                <h5 class="mb-3">Préférences d'emploi</h5>
                
                <div class="mb-3">
                  <label class="form-label">Type d'emploi préféré</label>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="fullTime" checked>
                    <label class="form-check-label" for="fullTime">Temps plein</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="partTime">
                    <label class="form-check-label" for="partTime">Temps partiel</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="freelance">
                    <label class="form-check-label" for="freelance">Freelance</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="internship">
                    <label class="form-check-label" for="internship">Stage</label>
                  </div>
                </div>
                
                <div class="mb-3">
                  <label class="form-label">Mode de travail préféré</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="workMode" id="onSite" checked>
                    <label class="form-check-label" for="onSite">Sur site</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="workMode" id="remote">
                    <label class="form-check-label" for="remote">Télétravail</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="workMode" id="hybrid">
                    <label class="form-check-label" for="hybrid">Hybride</label>
                  </div>
                </div>
                
                <div class="text-end">
                  <button type="button" class="btn btn-primary">Enregistrer</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Onglet Aide -->
          <div class="tab-pane fade" id="aide">
            <div class="settings-section">
              <h2>Aide et support</h2>
              
              <div class="settings-card">
                <h5 class="mb-3">Centre d'aide</h5>
                <p class="text-muted mb-3">
                  Consultez notre centre d'aide pour trouver des réponses à vos questions.
                </p>
                <button class="btn btn-outline-primary">
                  Visiter le centre d'aide
                </button>
              </div>
              
              <div class="settings-card">
                <h5 class="mb-3">Contactez-nous</h5>
                <p class="text-muted mb-3">
                  Vous avez une question ou besoin d'aide ? Notre équipe est là pour vous aider.
                </p>
                <button class="btn btn-outline-primary me-2">
                  <i class="bi bi-envelope me-1"></i> Envoyer un email
                </button>
                <button class="btn btn-outline-primary">
                  <i class="bi bi-chat-dots me-1"></i> Chat en direct
                </button>
              </div>
              
              <div class="settings-card">
                <h5 class="mb-3">À propos de Job Souk</h5>
                <p class="text-muted mb-1">
                  <strong>Version :</strong> 2.4.1
                </p>
                <p class="text-muted mb-1">
                  <strong>Dernière mise à jour :</strong> 15 mai 2023
                </p>
                <p class="text-muted mb-3">
                  <strong>Conditions d'utilisation :</strong> En utilisant Job Souk, vous acceptez nos conditions d'utilisation.
                </p>
                <button class="btn btn-outline-primary me-2">
                  Conditions d'utilisation
                </button>
                <button class="btn btn-outline-primary">
                  Politique de confidentialité
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modales/Popups -->

  <!-- Modal: Changer l'avatar -->
  <div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="avatarModalLabel">Changer la photo de profil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="text-center mb-4">
            <div class="avatar-preview mx-auto mb-3" style="width: 150px; height: 150px;">
              <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Avatar" class="w-100 h-100">
            </div>
            <input type="file" class="form-control d-none" id="avatarUpload">
            <button class="btn btn-outline-primary me-2" onclick="document.getElementById('avatarUpload').click()">
              <i class="bi bi-upload me-1"></i>Choisir une image
            </button>
            <button class="btn btn-outline-danger">
              <i class="bi bi-trash me-1"></i>Supprimer
            </button>
          </div>
          <p class="small text-muted text-center">
            Taille maximale : 5MB. Formats supportés : JPG, PNG.
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal: Changer le mot de passe -->
  <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="passwordModalLabel">Changer le mot de passe</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="currentPassword" class="form-label">Mot de passe actuel</label>
              <input type="password" class="form-control" id="currentPassword">
            </div>
            <div class="mb-3">
              <label for="newPassword" class="form-label">Nouveau mot de passe</label>
              <input type="password" class="form-control" id="newPassword">
              <div class="form-text">Le mot de passe doit contenir au moins 8 caractères.</div>
            </div>
            <div class="mb-3">
              <label for="confirmPassword" class="form-label">Confirmer le nouveau mot de passe</label>
              <input type="password" class="form-control" id="confirmPassword">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal: Supprimer le compte -->
  <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold text-danger" id="deleteAccountModalLabel">Supprimer votre compte</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="fw-bold">Êtes-vous sûr de vouloir supprimer votre compte ?</p>
          <p class="text-muted">
            Cette action est irréversible. Toutes vos données, y compris votre profil, 
            vos candidatures et vos messages, seront définitivement supprimées.
          </p>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="confirmDelete">
            <label class="form-check-label" for="confirmDelete">
              Je comprends que cette action ne peut pas être annulée
            </label>
          </div>
          <div class="mb-3">
            <label for="deleteReason" class="form-label">Raison de la suppression (facultatif)</label>
            <select class="form-select" id="deleteReason">
              <option selected>Sélectionnez une raison</option>
              <option>Je ne trouve pas d'emploi</option>
              <option>Je ne suis pas satisfait du service</option>
              <option>J'ai trouvé un emploi</option>
              <option>Autre</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-danger" disabled id="deleteAccountBtn">Supprimer définitivement</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Toggle sidebar on mobile
    document.getElementById('menuToggle').addEventListener('click', function() {
      document.querySelector('.side-menu').classList.toggle('show');
    });

    // Activer le bouton de suppression uniquement si la case est cochée
    document.getElementById('confirmDelete').addEventListener('change', function() {
      document.getElementById('deleteAccountBtn').disabled = !this.checked;
    });

    // Initialiser les onglets
    var triggerTabList = [].slice.call(document.querySelectorAll('.settings-menu a'))
    triggerTabList.forEach(function (triggerEl) {
      var tabTrigger = new bootstrap.Tab(triggerEl)
      
      triggerEl.addEventListener('click', function (event) {
        event.preventDefault()
        tabTrigger.show()
      })
    })

    // Empêcher le défilement de la page
    document.body.style.overflow = 'hidden';
  </script>
</body>
</html>