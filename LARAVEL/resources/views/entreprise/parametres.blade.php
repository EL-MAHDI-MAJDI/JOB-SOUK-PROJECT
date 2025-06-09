<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paramètres - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" as="style">
  @vite(['resources/css/StyleEntreprise/parametres.css'])
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoEntreprise.side-menu activePage='9' :entreprise="$entreprise" />
  </div>

  <!-- Barre de navigation supérieure enrichie -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoEntreprise.navbar :entreprise="$entreprise"/>
  </nav>
  
  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- Afficher les erreurs de validation -->
      @include('partials.flashbag-error')
      {{-- Afficher les messages de succès --}}
      @include('partials.flashbag')
      <!-- En-tête -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Paramètres</h2>
          <p class="text-muted mb-0">Gérez vos préférences et vos informations de compte</p>
        </div>
      </div>
      <div class="row">
        <!-- Colonne de navigation des paramètres -->
        <div class="col-lg-3">
          <div class="dashboard-card p-3">
            <div class="list-group list-group-flush">
              <a href="#account" class="list-group-item list-group-item-action active" data-bs-toggle="list">
                <i class="bi bi-person me-2"></i> Compte
              </a>
              <a href="#security" class="list-group-item list-group-item-action" data-bs-toggle="list">
                <i class="bi bi-shield-lock me-2"></i> Sécurité
              </a>
              <a href="#notifications" class="list-group-item list-group-item-action" data-bs-toggle="list">
                <i class="bi bi-bell me-2"></i> Notifications
              </a>
              <a href="#privacy" class="list-group-item list-group-item-action" data-bs-toggle="list">
                <i class="bi bi-lock me-2"></i> Confidentialité
              </a>
              <a href="#preferences" class="list-group-item list-group-item-action" data-bs-toggle="list">
                <i class="bi bi-sliders me-2"></i> Préférences
              </a>
              <a href="#billing" class="list-group-item list-group-item-action" data-bs-toggle="list">
                <i class="bi bi-credit-card me-2"></i> Facturation
              </a>
            </div>
          </div>
        </div>
        
        <!-- Contenu des paramètres -->
        <div class="col-lg-9">
          <div class="tab-content">
            <!-- Onglet Compte -->
            <div class="tab-pane fade show active" id="account">
              <div class="dashboard-card settings-card">
                <h3 class="settings-title"><i class="bi bi-person"></i> Informations du compte</h3>
                <form method="POST" action="{{ route('entreprise.parametres', $entreprise) }}">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="update" value="update_account">
                  <div class="mb-3">
                    <label for="company" class="form-label">Entreprise</label>
                    <input type="text" class="form-control @error('nomEntreprise') is-invalid @enderror" id="company" name="nomEntreprise" value="{{ old('nomEntreprise', $entreprise->nomEntreprise ?? '') }}">
                    @error('nomEntreprise')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $entreprise->email ?? '') }}">
                    @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" class="form-control @error('ville') is-invalid @enderror" id="ville" name="ville" value="{{ old('ville', $entreprise->ville ?? '') }}">
                    @error('ville')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="mb-3">
                    <label for="address" class="form-label">Adresse</label>
                    <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="address" name="adresse" value="{{ old('adresse', $entreprise->adresse ?? '') }}">
                    @error('adresse')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>  

                  <div class="mb-3">
                    <label for="phone" class="form-label">Téléphone</label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $entreprise->phone ?? '') }}">
                    @error('phone')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="text-end">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                  </div>
                </form>
              </div>
            </div>
            
            <!-- Onglet Sécurité -->
            <div class="tab-pane fade" id="security">
              <div class="dashboard-card settings-card">
                <h3 class="settings-title"><i class="bi bi-shield-lock"></i> Sécurité du compte</h3>
                <div class="security-item">
                  <div class="security-badge bg-primary bg-opacity-10 text-primary">
                    <i class="bi bi-key fs-5"></i>
                  </div>
                  <div class="flex-grow-1">
                    <h6 class="mb-1">Mot de passe</h6>
                    <!-- <p class="small text-muted mb-0">Dernière modification il y a 3 mois</p> -->
                  </div>
                  <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#passwordModal">Modifier</button>
                </div>
                
                <div class="security-item">
                  <div class="security-badge bg-success bg-opacity-10 text-success">
                    <i class="bi bi-phone fs-5"></i>
                  </div>
                  <div class="flex-grow-1">
                    <h6 class="mb-1">Authentification à deux facteurs</h6>
                    <p class="small text-muted mb-0">Actuellement désactivé</p>
                  </div>
                  <button class="btn btn-sm btn-outline-primary">Activer</button>
                </div>
                
                <div class="security-item">
                  <div class="security-badge bg-warning bg-opacity-10 text-warning">
                    <i class="bi bi-devices fs-5"></i>
                  </div>
                  <div class="flex-grow-1">
                    <h6 class="mb-1">Appareils connectés</h6>
                    <p class="small text-muted mb-0">2 appareils actifs</p>
                  </div>
                  <button class="btn btn-sm btn-outline-primary">Gérer</button>
                </div>
                
                <div class="security-item">
                  <div class="security-badge bg-danger bg-opacity-10 text-danger">
                    <i class="bi bi-exclamation-triangle fs-5"></i>
                  </div>
                  <div class="flex-grow-1">
                    <h6 class="mb-1">Désactiver le compte</h6>
                    <p class="small text-muted mb-0">Votre compte sera désactivé immédiatement</p>
                  </div>
                  <button class="btn btn-sm btn-outline-danger">Désactiver</button>
                </div>
              </div>
            </div>
            
            <!-- Onglet Notifications -->
            <div class="tab-pane fade" id="notifications">
              <div class="dashboard-card settings-card">
                <h3 class="settings-title"><i class="bi bi-bell"></i> Préférences de notification</h3>
                
                <h5 class="mt-4 mb-3">Email</h5>
                <div class="notification-item">
                  <div>
                    <h6 class="mb-1">Nouvelles candidatures</h6>
                    <p class="small text-muted mb-0">Recevoir un email pour chaque nouvelle candidature</p>
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="emailApplications" checked>
                  </div>
                </div>
                
                <div class="notification-item">
                  <div>
                    <h6 class="mb-1">Messages des candidats</h6>
                    <p class="small text-muted mb-0">Recevoir un email pour chaque nouveau message</p>
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="emailMessages" checked>
                  </div>
                </div>
                
                <div class="notification-item">
                  <div>
                    <h6 class="mb-1">Rappels d'entretien</h6>
                    <p class="small text-muted mb-0">Recevoir un rappel 24h avant chaque entretien</p>
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="emailInterviews" checked>
                  </div>
                </div>
                
                <h5 class="mt-4 mb-3">Notifications sur le site</h5>
                <div class="notification-item">
                  <div>
                    <h6 class="mb-1">Activité des candidats</h6>
                    <p class="small text-muted mb-0">Afficher les notifications pour les actions des candidats</p>
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="siteActivity" checked>
                  </div>
                </div>
                
                <div class="notification-item">
                  <div>
                    <h6 class="mb-1">Offres expirantes</h6>
                    <p class="small text-muted mb-0">Alerte pour les offres sur le point d'expirer</p>
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="siteExpiring" checked>
                  </div>
                </div>
                
                <div class="text-end mt-4">
                  <button type="button" class="btn btn-primary">Enregistrer les préférences</button>
                </div>
              </div>
            </div>
            
            <!-- Onglet Confidentialité -->
            <div class="tab-pane fade" id="privacy">
              <div class="dashboard-card settings-card">
                <h3 class="settings-title"><i class="bi bi-lock"></i> Confidentialité</h3>
                
                <div class="mb-4">
                  <h5 class="mb-3">Visibilité du profil</h5>
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="privacy" id="privacyPublic" checked>
                    <label class="form-check-label" for="privacyPublic">
                      Profil public - Visible par tous les utilisateurs
                    </label>
                  </div>
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="privacy" id="privacyLimited">
                    <label class="form-check-label" for="privacyLimited">
                      Limité - Visible uniquement par les candidats avec qui vous interagissez
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="privacy" id="privacyPrivate">
                    <label class="form-check-label" for="privacyPrivate">
                      Privé - Seules les informations essentielles sont visibles
                    </label>
                  </div>
                </div>
                
                <div class="mb-4">
                  <h5 class="mb-3">Partage de données</h5>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="dataAnalytics" checked>
                    <label class="form-check-label" for="dataAnalytics">
                      Partager des données anonymes pour améliorer Job Souk
                    </label>
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="dataMarketing">
                    <label class="form-check-label" for="dataMarketing">
                      Recevoir des offres promotionnelles et des mises à jour
                    </label>
                  </div>
                </div>
                
                <div class="text-end">
                  <button type="button" class="btn btn-primary">Mettre à jour les paramètres</button>
                </div>
              </div>
            </div>
            
            <!-- Onglet Préférences -->
            <div class="tab-pane fade" id="preferences">
              <div class="dashboard-card settings-card">
                <h3 class="settings-title"><i class="bi bi-sliders"></i> Préférences</h3>
                
                <div class="mb-4">
                  <h5 class="mb-3">Langue et région</h5>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="language" class="form-label">Langue</label>
                      <select class="form-select" id="language">
                        <option selected>Français</option>
                        <option>Arabe</option>
                        <option>Anglais</option>
                      </select>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="timezone" class="form-label">Fuseau horaire</label>
                      <select class="form-select" id="timezone">
                        <option selected>(UTC+00:00) Casablanca</option>
                        <option>(UTC+01:00) Paris</option>
                      </select>
                    </div>
                  </div>
                </div>
                
                <div class="mb-4">
                  <h5 class="mb-3">Apparence</h5>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="darkMode">
                    <label class="form-check-label" for="darkMode">
                      Mode sombre
                    </label>
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="density" checked>
                    <label class="form-check-label" for="density">
                      Interface compacte
                    </label>
                  </div>
                </div>
                
                <div class="text-end">
                  <button type="button" class="btn btn-primary">Appliquer les changements</button>
                </div>
              </div>
            </div>
            
            <!-- Onglet Facturation -->
            <div class="tab-pane fade" id="billing">
              <div class="dashboard-card settings-card">
                <h3 class="settings-title"><i class="bi bi-credit-card"></i> Facturation et abonnement</h3>
                
                <div class="alert alert-success">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <div>
                      <h5 class="mb-1">Abonnement Professionnel</h5>
                      <p class="mb-0">Renouvellement automatique le 15/06/2023</p>
                    </div>
                  </div>
                </div>
                
                <div class="row mb-4">
                  <div class="col-md-6">
                    <div class="p-3 border rounded">
                      <h5>Détails de l'abonnement</h5>
                      <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i> 10 offres d'emploi actives</li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i> Accès à la base de candidats</li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i> Statistiques avancées</li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i> Support prioritaire</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="p-3 border rounded">
                      <h5>Prochain paiement</h5>
                      <div class="d-flex justify-content-between mb-2">
                        <span>Abonnement mensuel</span>
                        <span>299 MAD</span>
                      </div>
                      <div class="d-flex justify-content-between mb-3">
                        <span>Taxes</span>
                        <span>0 MAD</span>
                      </div>
                      <div class="d-flex justify-content-between fw-bold">
                        <span>Total</span>
                        <span>299 MAD</span>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="mb-4">
                  <h5 class="mb-3">Méthode de paiement</h5>
                  <div class="d-flex align-items-center justify-content-between p-3 border rounded mb-3">
                    <div class="d-flex align-items-center">
                      <i class="bi bi-credit-card-2-front fs-4 me-3"></i>
                      <div>
                        <h6 class="mb-0">Carte Visa •••• 4242</h6>
                        <small class="text-muted">Expire le 04/2025</small>
                      </div>
                    </div>
                    <button class="btn btn-sm btn-outline-primary">Modifier</button>
                  </div>
                  <button class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-plus"></i> Ajouter une autre méthode
                  </button>
                </div>
                
                <div class="d-flex justify-content-between">
                  <button class="btn btn-outline-danger">Annuler l'abonnement</button>
                  <button class="btn btn-primary">Mettre à jour le plan</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Modification Mot de passe -->
  <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="passwordModalLabel">Modifier le mot de passe</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('entreprise.parametres', $entreprise) }}">
          @csrf
          @method('PUT')
          <input type="hidden" name="update" value="update_password">
          <div class="modal-body">
            <div class="mb-3">
              <label for="current_password" class="form-label">Mot de passe actuel</label>
              <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
              @error('current_password')
                      <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="new_password" class="form-label">Nouveau mot de passe</label>
              <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" required>
              @error('new_password')
                      <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="new_password_confirmation" class="form-label">Confirmer le nouveau mot de passe</label>
              <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" name="new_password_confirmation" required>
              @error('new_password_confirmation')
                      <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/js/entrepriseJs/parametres.js'])
  @vite(['resources/js/indexJs/numero-telephone.js'])
</body>
</html>