<div class="container-fluid">
      <button class="btn d-lg-none me-2" id="menuToggle" aria-label="Menu">
        <i class="bi bi-list"></i>
      </button>
      
      <!-- Barre de recherche -->
      <div class="position-relative">
        <i class="bi bi-search nav-search-icon"></i>
        <input type="text" class="form-control nav-search" placeholder="Rechercher des offres, entreprises...">
      </div>
      
      <div class="d-flex align-items-center ms-auto">
        <!-- Notifications -->
        <div class="dropdown me-3">
          <button class="btn position-relative" type="button" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end p-2" style="width: 300px;">
            <li class="mb-2">
              <a href="#" class="d-flex align-items-center p-2 rounded">
                <div class="bg-primary bg-opacity-10 p-2 rounded me-2">
                  <i class="bi bi-briefcase text-primary"></i>
                </div>
                <div>
                  <p class="mb-0 small fw-bold">Votre candidature a été examinée</p>
                  <p class="mb-0 small text-muted">MegaSoft - Il y a 1 heure</p>
                </div>
              </a>
            </li>
            <li class="mb-2">
              <a href="#" class="d-flex align-items-center p-2 rounded">
                <div class="bg-success bg-opacity-10 p-2 rounded me-2">
                  <i class="bi bi-calendar-event text-success"></i>
                </div>
                <div>
                  <p class="mb-0 small fw-bold">Entretien programmé</p>
                  <p class="mb-0 small text-muted">DataTech - Demain à 10:00</p>
                </div>
              </a>
            </li>
            <li>
              <a href="#" class="d-flex align-items-center p-2 rounded">
                <div class="bg-info bg-opacity-10 p-2 rounded me-2">
                  <i class="bi bi-chat-dots text-info"></i>
                </div>
                <div>
                  <p class="mb-0 small fw-bold">Nouveau message</p>
                  <p class="mb-0 small text-muted">RH de MarocDigital - Il y a 3 heures</p>
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
        
        <!-- Messages -->
        <!-- <div class="dropdown me-3">
          <button class="btn position-relative" type="button" data-bs-toggle="dropdown">
            <i class="bi bi-envelope"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">2</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end p-2" style="width: 300px;">
            <li class="mb-2">
              <a href="#" class="d-flex align-items-center p-2 rounded">
                <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                  <span>MT</span>
                </div>
                <div>
                  <p class="mb-0 small fw-bold">Meryem Tazi</p>
                  <p class="mb-0 small text-muted">Nous avons bien reçu votre candidature...</p>
                </div>
              </a>
            </li>
            <li class="mb-2">
              <a href="#" class="d-flex align-items-center p-2 rounded">
                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                  <span>KL</span>
                </div>
                <div>
                  <p class="mb-0 small fw-bold">Karim Lahlou</p>
                  <p class="mb-0 small text-muted">Votre profil a retenu notre attention...</p>
                </div>
              </a>
            </li>
            <li><hr class="dropdown-divider my-2">
              <a href="messages.html" class="d-flex align-items-center justify-content-center p-2 rounded btn btn-primary text-center">
                Tous les messages
              </a>
            </li>
          </ul>
        </div> -->
        
        <!-- Profil utilisateur -->
        <div class="dropdown">
          <button class="btn dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2" style="width: 36px; height: 36px;">
              <span>OM</span>
            </div>
            <span class="d-none d-md-inline">Omar Mansouri</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="profil.html"><i class="bi bi-person me-2"></i>Profil</a></li>
            <li><a class="dropdown-item" href="parametres.html"><i class="bi bi-gear me-2"></i>Paramètres</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('login')}}"><i class="bi bi-box-arrow-right me-2"></i>Déconnexion</a></li>
          </ul>
        </div>
      </div>
    </div>