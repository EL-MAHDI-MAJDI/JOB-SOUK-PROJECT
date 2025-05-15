@props(['activePage'])
<div class="d-flex flex-column h-100">
      <!-- Logo -->
      <div class="p-3 border-bottom">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard.index') }}">
            <img src="{{ asset('storage/job souk.png') }}" alt="Logo de site web" width="35" height="35" class="me-2">
            <span class="fw-bold" style="color: #E74C3C;">Job Souk</span>
        </a>
      </div>
      
      <!-- Navigation -->
      <div class="flex-grow-1 p-3">
        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '1' ? 'active' : '' }}" href="{{ route('entreprise.dashboard') }}">
              <i class="bi bi-speedometer2 me-3 "></i>Tableau de bord
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '2' ? 'active' : '' }}" href="{{ route('entreprise.monProfil') }}">
              <i class="bi bi-person me-3"></i> Mon profil
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '3' ? 'active' : '' }}" href="{{ route('entreprise.offresEmploi') }}">
              <i class="bi bi-briefcase me-3"></i> Offres d'emploi
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '4' ? 'active' : '' }}" href="{{ route('entreprise.evaluerCandidat') }}">
              <i class="bi bi-person-check me-3"></i> Évaluer Candidats
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '5' ? 'active' : '' }}" href="{{ route('entreprise.messages') }}">
              <i class="bi bi-envelope me-3"></i> Messages
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '6' ? 'active' : '' }}" href="{{ route('entreprise.entretiens') }}">
              <i class="bi bi-calendar me-3"></i> Entretiens
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '7' ? 'active' : '' }}" href="{{ route('entreprise.rechercherCandidats') }}">
              <i class="bi bi-search me-3"></i> Rechercher candidats
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '8' ? 'active' : '' }}" href="{{ route('entreprise.notification') }}">
              <i class="bi bi-bell me-3"></i> Notifications
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '9' ? 'active' : '' }}" href="{{ route('entreprise.parametres') }}">
              <i class="bi bi-gear me-3"></i> Parametres
            </a>
          </li>
        </ul>
      </div>
    </div>