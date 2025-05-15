<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notifications - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" as="style"> 
  <link rel="stylesheet" href="{{ asset('storage/StyleEntreprise/notification.css') }}">
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoEntreprise.side-menu activePage='8' />
  </div>

  <!-- Barre de navigation supérieure enrichie -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoEntreprise.navbar />
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- En-tête -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Notifications</h2>
          <p class="text-muted mb-0">Toutes vos notifications en un seul endroit</p>
        </div>
        <div>
          <button class="btn btn-outline-secondary me-2">
            <i class="bi bi-check-all"></i> Tout marquer comme lu
          </button>
          <button class="btn btn-outline-danger">
            <i class="bi bi-trash"></i> Tout supprimer
          </button>
        </div>
      </div>
      
      <!-- Filtres -->
      <div class="dashboard-card p-3 mb-4">
        <div class="row">
          <div class="col-md-3 mb-2 mb-md-0">
            <select class="form-select">
              <option selected>Tous les types</option>
              <option>Candidatures</option>
              <option>Entretiens</option>
              <option>Messages</option>
              <option>Offres</option>
            </select>
          </div>
          <div class="col-md-3 mb-2 mb-md-0">
            <select class="form-select">
              <option selected>Tous les statuts</option>
              <option>Non lues</option>
              <option>Lues</option>
            </select>
          </div>
          <div class="col-md-3 mb-2 mb-md-0">
            <select class="form-select">
              <option selected>Toutes les dates</option>
              <option>Aujourd'hui</option>
              <option>Cette semaine</option>
              <option>Ce mois</option>
            </select>
          </div>
          <div class="col-md-3">
            <button class="btn btn-primary w-100">
              <i class="bi bi-funnel"></i> Filtrer
            </button>
          </div>
        </div>
      </div>
      
      <!-- Liste des notifications -->
      <div class="dashboard-card p-0">
        <!-- Notification non lue -->
        <div class="notification-item unread">
          <div class="d-flex justify-content-between align-items-start">
            <div class="d-flex">
              <div class="me-3">
                <div class="bg-primary bg-opacity-10 p-2 rounded">
                  <i class="bi bi-person-check text-primary"></i>
                </div>
              </div>
              <div>
                <h5 class="mb-1 fw-bold">Nouvelle candidature reçue</h5>
                <p class="mb-1">Youssef Benali a postulé pour le poste de Développeur Front-end</p>
                <span class="notification-time"><span class="notification-badge"></span>Il y a 2 heures</span>
              </div>
            </div>
            <div class="notification-actions">
              <button class="btn btn-sm btn-outline-secondary me-1" title="Marquer comme lu">
                <i class="bi bi-check"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger" title="Supprimer">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Notification non lue -->
        <div class="notification-item unread">
          <div class="d-flex justify-content-between align-items-start">
            <div class="d-flex">
              <div class="me-3">
                <div class="bg-success bg-opacity-10 p-2 rounded">
                  <i class="bi bi-calendar-event text-success"></i>
                </div>
              </div>
              <div>
                <h5 class="mb-1 fw-bold">Rappel d'entretien</h5>
                <p class="mb-1">Entretien avec Amina Zari prévu demain à 10h00 (en ligne)</p>
                <span class="notification-time"><span class="notification-badge"></span>Il y a 5 heures</span>
              </div>
            </div>
            <div class="notification-actions">
              <button class="btn btn-sm btn-outline-secondary me-1" title="Marquer comme lu">
                <i class="bi bi-check"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger" title="Supprimer">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Notification lue -->
        <div class="notification-item">
          <div class="d-flex justify-content-between align-items-start">
            <div class="d-flex">
              <div class="me-3">
                <div class="bg-info bg-opacity-10 p-2 rounded">
                  <i class="bi bi-envelope text-info"></i>
                </div>
              </div>
              <div>
                <h5 class="mb-1 fw-bold">Nouveau message</h5>
                <p class="mb-1">Vous avez reçu un message de la part de Société XYZ</p>
                <span class="notification-time">Hier, 14:30</span>
              </div>
            </div>
            <div class="notification-actions">
              <button class="btn btn-sm btn-outline-secondary me-1" title="Marquer comme non lu">
                <i class="bi bi-envelope"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger" title="Supprimer">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Notification lue -->
        <div class="notification-item">
          <div class="d-flex justify-content-between align-items-start">
            <div class="d-flex">
              <div class="me-3">
                <div class="bg-warning bg-opacity-10 p-2 rounded">
                  <i class="bi bi-briefcase text-warning"></i>
                </div>
              </div>
              <div>
                <h5 class="mb-1 fw-bold">Offre expirée</h5>
                <p class="mb-1">Votre offre pour "Développeur Back-end Senior" a expiré</p>
                <span class="notification-time">Hier, 09:15</span>
              </div>
            </div>
            <div class="notification-actions">
              <button class="btn btn-sm btn-outline-secondary me-1" title="Marquer comme non lu">
                <i class="bi bi-envelope"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger" title="Supprimer">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Notification lue -->
        <div class="notification-item">
          <div class="d-flex justify-content-between align-items-start">
            <div class="d-flex">
              <div class="me-3">
                <div class="bg-secondary bg-opacity-10 p-2 rounded">
                  <i class="bi bi-person-plus text-secondary"></i>
                </div>
              </div>
              <div>
                <h5 class="mb-1 fw-bold">Nouveau candidat intéressant</h5>
                <p class="mb-1">Leila Nassiri correspond à 92% avec votre recherche</p>
                <span class="notification-time">Lundi, 16:45</span>
              </div>
            </div>
            <div class="notification-actions">
              <button class="btn btn-sm btn-outline-secondary me-1" title="Marquer comme non lu">
                <i class="bi bi-envelope"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger" title="Supprimer">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Notification lue -->
        <div class="notification-item">
          <div class="d-flex justify-content-between align-items-start">
            <div class="d-flex">
              <div class="me-3">
                <div class="bg-danger bg-opacity-10 p-2 rounded">
                  <i class="bi bi-exclamation-triangle text-danger"></i>
                </div>
              </div>
              <div>
                <h5 class="mb-1 fw-bold">Action requise</h5>
                <p class="mb-1">Veuillez mettre à jour vos informations de paiement</p>
                <span class="notification-time">Lundi, 10:20</span>
              </div>
            </div>
            <div class="notification-actions">
              <button class="btn btn-sm btn-outline-secondary me-1" title="Marquer comme non lu">
                <i class="bi bi-envelope"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger" title="Supprimer">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Pagination -->
      <nav class="mt-4">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précédent</a>
          </li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Suivant</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('storage/entrepriseJs/notification.js') }}"></script>
</body>
</html>