@props(['candidat'])
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
                <!-- Menu rapide -->
        <div class="dropdown me-3">
          <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
            <i class="bi bi-lightning-charge me-1"></i> Actions rapides
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="{{ route('candidat.mesCandidatures', $candidat) }}"><i class="bi bi-file-earmark-text me-2"></i>Mes candidatures</a></li>
            <li><a class="dropdown-item" href="{{ route('candidat.offreSauvgarder', $candidat) }}"><i class="bi bi-bookmark me-2"></i>Offres sauvegardées</a></li>
            <li><a class="dropdown-item" href="{{ route('candidat.profil', $candidat) }}#cv"><i class="bi bi-person-vcard me-2"></i>Gérer mon profil</a></li>
            <li><a class="dropdown-item" href="{{ route('candidat.cv', $candidat) }}"><i class="bi bi-file-earmark-person me-2"></i>Gérer mon cv</a></li>
          </ul>
        </div>
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
        
        <!-- Profil utilisateur -->
        <div class="dropdown">
          <button class="btn dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
            <img src="{{asset('storage/'.$candidat->photoProfile)}}" alt="Profile" class="rounded-circle me-2" width="32" height="32">
            <span class="d-none d-md-inline">{{$candidat->prenom}} {{$candidat->nom}}</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="{{ route('candidat.profil', $candidat) }}"><i class="bi bi-person me-2"></i>Profil</a></li>
            <li><a class="dropdown-item" href="{{ route('candidat.parametre', $candidat) }}"><i class="bi bi-gear me-2"></i>Paramètres</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('logout')}}"><i class="bi bi-box-arrow-right me-2"></i>Déconnexion</a></li>
          </ul>
        </div>
      </div>
    </div>