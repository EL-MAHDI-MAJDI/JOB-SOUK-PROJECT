<div class="container-fluid">
      <button class="btn d-lg-none me-2" id="menuToggle" aria-label="Menu">
        <i class="bi bi-list"></i>
      </button>
      
      <!-- Barre de recherche -->
      <div class="position-relative">
        <i class="bi bi-search nav-search-icon"></i>
        <input type="text" class="form-control nav-search" placeholder="Rechercher des comptes, offres...">
      </div>
      
      <div class="d-flex align-items-center ms-auto">
        <!-- Notifications -->
        <div class="dropdown me-3">
          <button class="btn position-relative" type="button" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">5</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end p-2" style="width: 300px;">
            <li class="mb-2">
              <a href="#" class="d-flex align-items-center p-2 rounded">
                <div class="bg-danger bg-opacity-10 p-2 rounded me-2">
                  <i class="bi bi-flag text-danger"></i>
                </div>
                <div>
                  <p class="mb-0 small fw-bold">Nouveau signalement</p>
                  <p class="mb-0 small text-muted">Offre #12345</p>
                </div>
              </a>
            </li>
            <li class="mb-2">
              <a href="#" class="d-flex align-items-center p-2 rounded">
                <div class="bg-warning bg-opacity-10 p-2 rounded me-2">
                  <i class="bi bi-building text-warning"></i>
                </div>
                <div>
                  <p class="mb-0 small fw-bold">Entreprise à valider</p>
                  <p class="mb-0 small text-muted">Société XYZ</p>
                </div>
              </a>
            </li>
            <li>
              <a href="#" class="d-flex align-items-center p-2 rounded">
                <div class="bg-primary bg-opacity-10 p-2 rounded me-2">
                  <i class="bi bi-person-plus text-primary"></i>
                </div>
                <div>
                  <p class="mb-0 small fw-bold">Nouveaux utilisateurs</p>
                  <p class="mb-0 small text-muted">12 aujourd'hui</p>
                </div>
              </a>
            </li>
            <li><hr class="dropdown-divider my-2">
              <a href="notification.html" class="d-flex align-items-center justify-content-center p-2 rounded btn btn-primary text-center">
                Toutes les notifications
              </a>
            </li>
          </ul>
        </div>
        
        <!-- Profil admin -->
        <div class="dropdown">
          <button class="btn dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
            <img src="https://via.placeholder.com/32" alt="Profile" class="rounded-circle me-2" width="32" height="32">
            <span class="d-none d-md-inline">Admin</span>
            <!-- <span class="badge badge-admin ms-2">Admin</span> -->
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="administrateurs.html"><i class="bi bi-person me-2"></i>Profil</a></li>
            <li><a class="dropdown-item" href="parametres.html"><i class="bi bi-gear me-2"></i>Paramètres</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('logout')}}"><i class="bi bi-box-arrow-right me-2"></i>Déconnexion</a></li>
          </ul>
        </div>
      </div>
    </div>