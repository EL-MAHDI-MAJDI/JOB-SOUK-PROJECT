<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paramètres - Admin JobSouk</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('storage/StyleAdmin/parametres.css') }}">
</head>
<body>
  <!-- Sidebar Menu -->
  <div class="side-menu">
    <x-compoAdmin.side-menu activePage='7' />
  </div>

  <!-- Top Navigation -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoAdmin.navbar />
  </nav>

  <!-- Main Content -->
  <div class="main-content">
    <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Paramètres du système</h2>
          <p class="text-muted mb-0">Configurez les paramètres de la plateforme</p>
        </div>
        <div>
          <button class="btn btn-primary" id="saveSettingsBtn">
            <i class="bi bi-save me-1"></i> Enregistrer les modifications
          </button>
        </div>
      </div>

      <div class="row">
        <!-- Settings Navigation -->
        <div class="col-lg-3">
          <div class="dashboard-card p-3 mb-4">
            <ul class="nav flex-column settings-nav">
              <li class="nav-item">
                <a class="nav-link active" href="#general" data-bs-toggle="tab">
                  <i class="bi bi-gear me-2"></i> Général
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#notifications" data-bs-toggle="tab">
                  <i class="bi bi-bell me-2"></i> Notifications
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#email" data-bs-toggle="tab">
                  <i class="bi bi-envelope me-2"></i> Email
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#security" data-bs-toggle="tab">
                  <i class="bi bi-shield-lock me-2"></i> Sécurité
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#payment" data-bs-toggle="tab">
                  <i class="bi bi-credit-card me-2"></i> Paiements
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#seo" data-bs-toggle="tab">
                  <i class="bi bi-search me-2"></i> SEO
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#maintenance" data-bs-toggle="tab">
                  <i class="bi bi-tools me-2"></i> Maintenance
                </a>
              </li>
            </ul>
          </div>
        </div>

        <!-- Settings Content -->
        <div class="col-lg-9">
          <div class="tab-content">
            <!-- General Settings -->
            <div class="tab-pane fade show active" id="general">
              <div class="dashboard-card p-4 mb-4">
                <h5 class="mb-4"><i class="bi bi-gear me-2"></i> Paramètres généraux</h5>
                <form>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label">Nom de la plateforme</label>
                      <input type="text" class="form-control" value="JobSouk">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">URL de la plateforme</label>
                      <input type="url" class="form-control" value="https://www.jobsouk.com">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Fuseau horaire</label>
                      <select class="form-select">
                        <option value="Africa/Casablanca" selected>Casablanca (UTC+1)</option>
                        <option value="Europe/Paris">Paris (UTC+2)</option>
                        <option value="America/New_York">New York (UTC-4)</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Langue par défaut</label>
                      <select class="form-select">
                        <option value="fr" selected>Français</option>
                        <option value="ar">العربية</option>
                        <option value="en">English</option>
                      </select>
                    </div>
                    <div class="col-12">
                      <label class="form-label">Description de la plateforme</label>
                      <textarea class="form-control" rows="3">La plateforme leader pour trouver des emplois au Maroc</textarea>
                    </div>
                    <div class="col-12">
                      <label class="form-label">Logo</label>
                      <div class="d-flex align-items-center">
                        <img src="../../image/job souk.png" alt="Logo" width="80" height="80" class="rounded me-3">
                        <div>
                          <input type="file" class="form-control">
                          <div class="form-text">Taille recommandée : 200x200 pixels</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- Notification Settings -->
            <div class="tab-pane fade" id="notifications">
              <div class="dashboard-card p-4 mb-4">
                <h5 class="mb-4"><i class="bi bi-bell me-2"></i> Paramètres de notifications</h5>
                <form>
                  <div class="mb-4">
                    <h6 class="mb-3">Notifications système</h6>
                    <div class="form-check form-switch mb-3">
                      <input class="form-check-input" type="checkbox" id="notifNewUsers" checked>
                      <label class="form-check-label" for="notifNewUsers">Nouveaux utilisateurs</label>
                    </div>
                    <div class="form-check form-switch mb-3">
                      <input class="form-check-input" type="checkbox" id="notifNewOffers" checked>
                      <label class="form-check-label" for="notifNewOffers">Nouvelles offres d'emploi</label>
                    </div>
                    <div class="form-check form-switch mb-3">
                      <input class="form-check-input" type="checkbox" id="notifReports" checked>
                      <label class="form-check-label" for="notifReports">Signalements</label>
                    </div>
                  </div>
                  
                  <div class="mb-4">
                    <h6 class="mb-3">Notifications par email</h6>
                    <div class="form-check form-switch mb-3">
                      <input class="form-check-input" type="checkbox" id="emailNotifDaily" checked>
                      <label class="form-check-label" for="emailNotifDaily">Résumé quotidien</label>
                    </div>
                    <div class="form-check form-switch mb-3">
                      <input class="form-check-input" type="checkbox" id="emailNotifWeekly">
                      <label class="form-check-label" for="emailNotifWeekly">Résumé hebdomadaire</label>
                    </div>
                  </div>
                  
                  <div>
                    <h6 class="mb-3">Adresses email de notification</h6>
                    <div class="mb-3">
                      <label class="form-label">Email principal</label>
                      <input type="email" class="form-control" value="contact@jobsouk.com">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Emails secondaires (séparés par des virgules)</label>
                      <textarea class="form-control" rows="3">admin@jobsouk.com, support@jobsouk.com</textarea>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- Email Settings -->
            <div class="tab-pane fade" id="email">
              <div class="dashboard-card p-4 mb-4">
                <h5 class="mb-4"><i class="bi bi-envelope me-2"></i> Paramètres email</h5>
                <form>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label">Méthode d'envoi</label>
                      <select class="form-select">
                        <option value="smtp" selected>SMTP</option>
                        <option value="mailgun">Mailgun</option>
                        <option value="sendgrid">SendGrid</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Email de l'expéditeur</label>
                      <input type="email" class="form-control" value="no-reply@jobsouk.com">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Nom de l'expéditeur</label>
                      <input type="text" class="form-control" value="JobSouk">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Serveur SMTP</label>
                      <input type="text" class="form-control" value="smtp.jobsouk.com">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Port SMTP</label>
                      <input type="number" class="form-control" value="587">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Chiffrement</label>
                      <select class="form-select">
                        <option value="tls" selected>TLS</option>
                        <option value="ssl">SSL</option>
                        <option value="none">Aucun</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Nom d'utilisateur SMTP</label>
                      <input type="text" class="form-control" value="no-reply@jobsouk.com">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Mot de passe SMTP</label>
                      <input type="password" class="form-control" value="********">
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- Security Settings -->
            <div class="tab-pane fade" id="security">
              <div class="dashboard-card p-4 mb-4">
                <h5 class="mb-4"><i class="bi bi-shield-lock me-2"></i> Paramètres de sécurité</h5>
                <form>
                  <div class="mb-4">
                    <h6 class="mb-3">Authentification</h6>
                    <div class="form-check form-switch mb-3">
                      <input class="form-check-input" type="checkbox" id="auth2FA" checked>
                      <label class="form-check-label" for="auth2FA">Activer l'authentification à deux facteurs pour les administrateurs</label>
                    </div>
                    <div class="form-check form-switch mb-3">
                      <input class="form-check-input" type="checkbox" id="authCaptcha">
                      <label class="form-check-label" for="authCaptcha">Activer reCAPTCHA pour les connexions</label>
                    </div>
                  </div>
                  
                  <div class="mb-4">
                    <h6 class="mb-3">Politique de mot de passe</h6>
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="checkbox" id="passLength" checked>
                      <label class="form-check-label" for="passLength">Minimum 8 caractères</label>
                    </div>
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="checkbox" id="passComplexity" checked>
                      <label class="form-check-label" for="passComplexity">Exiger des caractères spéciaux</label>
                    </div>
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="checkbox" id="passExpiration">
                      <label class="form-check-label" for="passExpiration">Expiration après 90 jours</label>
                    </div>
                  </div>
                  
                  <div>
                    <h6 class="mb-3">Sécurité avancée</h6>
                    <div class="mb-3">
                      <label class="form-label">Limite de tentatives de connexion</label>
                      <input type="number" class="form-control" value="5">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Délai de blocage (minutes)</label>
                      <input type="number" class="form-control" value="30">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">IPs bannies</label>
                      <textarea class="form-control" rows="3" placeholder="Entrez une IP par ligne"></textarea>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- Payment Settings -->
            <div class="tab-pane fade" id="payment">
              <div class="dashboard-card p-4 mb-4">
                <h5 class="mb-4"><i class="bi bi-credit-card me-2"></i> Paramètres de paiement</h5>
                <form>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label">Devise par défaut</label>
                      <select class="form-select">
                        <option value="MAD" selected>MAD - Dirham marocain</option>
                        <option value="EUR">EUR - Euro</option>
                        <option value="USD">USD - Dollar américain</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Mode de paiement</label>
                      <select class="form-select">
                        <option value="both" selected>Activer tous les modes</option>
                        <option value="online">Paiements en ligne seulement</option>
                        <option value="manual">Paiements manuels seulement</option>
                      </select>
                    </div>
                    <div class="col-12">
                      <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="paymentTestMode">
                        <label class="form-check-label" for="paymentTestMode">Activer le mode test</label>
                      </div>
                    </div>
                  </div>
                  
                  <div class="mt-4">
                    <h6 class="mb-3">Passerelles de paiement</h6>
                    <div class="mb-4">
                      <label class="form-label">Cmi</label>
                      <div class="row g-3">
                        <div class="col-md-6">
                          <label class="form-label">Clé marchand</label>
                          <input type="text" class="form-control" placeholder="Entrez votre clé marchand">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Mot de passe marchand</label>
                          <input type="password" class="form-control" placeholder="Entrez votre mot de passe">
                        </div>
                      </div>
                    </div>
                    
                    <div class="mb-4">
                      <label class="form-label">PayPal</label>
                      <div class="row g-3">
                        <div class="col-md-6">
                          <label class="form-label">Client ID</label>
                          <input type="text" class="form-control" placeholder="Entrez votre Client ID">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Secret</label>
                          <input type="password" class="form-control" placeholder="Entrez votre Secret">
                        </div>
                        <div class="col-12">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="paypalSandbox" checked>
                            <label class="form-check-label" for="paypalSandbox">Utiliser le sandbox PayPal</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- SEO Settings -->
            <div class="tab-pane fade" id="seo">
              <div class="dashboard-card p-4 mb-4">
                <h5 class="mb-4"><i class="bi bi-search me-2"></i> Paramètres SEO</h5>
                <form>
                  <div class="mb-4">
                    <label class="form-label">Meta Title</label>
                    <input type="text" class="form-control" value="JobSouk - Plateforme d'emploi au Maroc">
                  </div>
                  <div class="mb-4">
                    <label class="form-label">Meta Description</label>
                    <textarea class="form-control" rows="3">Trouvez votre emploi idéal ou recrutez les meilleurs talents sur JobSouk, la plateforme leader d'emploi au Maroc.</textarea>
                  </div>
                  <div class="mb-4">
                    <label class="form-label">Mots-clés (séparés par des virgules)</label>
                    <textarea class="form-control" rows="3">emploi, travail, maroc, recrutement, offres d'emploi, carrière</textarea>
                  </div>
                  <div class="mb-4">
                    <label class="form-label">Google Analytics ID</label>
                    <input type="text" class="form-control" placeholder="UA-XXXXX-Y">
                  </div>
                  <div class="mb-4">
                    <label class="form-label">Scripts personnalisés (head)</label>
                    <textarea class="form-control" rows="3" placeholder="Entrez vos scripts à inclure dans le &lt;head&gt;"></textarea>
                  </div>
                  <div class="mb-4">
                    <label class="form-label">Scripts personnalisés (body)</label>
                    <textarea class="form-control" rows="3" placeholder="Entrez vos scripts à inclure avant &lt;/body&gt;"></textarea>
                  </div>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="seoFriendlyUrls" checked>
                    <label class="form-check-label" for="seoFriendlyUrls">URLs optimisées pour le SEO</label>
                  </div>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="seoSitemap" checked>
                    <label class="form-check-label" for="seoSitemap">Générer automatiquement le sitemap</label>
                  </div>
                </form>
              </div>
            </div>

            <!-- Maintenance Settings -->
            <div class="tab-pane fade" id="maintenance">
              <div class="dashboard-card p-4 mb-4">
                <h5 class="mb-4"><i class="bi bi-tools me-2"></i> Mode maintenance</h5>
                <form>
                  <div class="alert alert-warning">
                    <i class="bi bi-exclamation-triangle me-2"></i> Le mode maintenance restreint l'accès à la plateforme aux administrateurs seulement.
                  </div>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="maintenanceMode">
                    <label class="form-check-label" for="maintenanceMode">Activer le mode maintenance</label>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Message de maintenance</label>
                    <textarea class="form-control" rows="3">Nous effectuons actuellement des travaux de maintenance. La plateforme sera de nouveau disponible sous peu. Merci pour votre patience.</textarea>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">IPs autorisées (séparées par des virgules)</label>
                    <textarea class="form-control" rows="3" placeholder="Entrez les IPs qui peuvent accéder au site en mode maintenance"></textarea>
                  </div>
                  
                  <div class="mt-4">
                    <h6 class="mb-3">Outils système</h6>
                    <div class="mb-3">
                      <button class="btn btn-outline-danger me-2">
                        <i class="bi bi-trash me-1"></i> Vider le cache
                      </button>
                      <button class="btn btn-outline-secondary me-2">
                        <i class="bi bi-arrow-repeat me-1"></i> Reconstruire les index
                      </button>
                      <button class="btn btn-outline-primary">
                        <i class="bi bi-database me-1"></i> Sauvegarde
                      </button>
                    </div>
                    <div class="alert alert-info">
                      <i class="bi bi-info-circle me-2"></i> Dernière sauvegarde: 12/06/2023 02:30
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap & Custom JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('storage/adminJs/parametres.js') }}"></script>
</body>
</html>