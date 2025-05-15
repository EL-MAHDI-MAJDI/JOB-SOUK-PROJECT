@props(['activePage'])
<div class="d-flex flex-column h-100">
      <!-- Logo -->
      <div class="p-3 border-bottom">
        <a class="navbar-brand d-flex align-items-center" href="dashbord.html">
            <img src="{{ asset('storage/job souk.png') }}" alt="Logo de site web" width="35" height="35" class="me-2">
            <span class="fw-bold" style="color: var(--primary);">Job Souk Admin</span>
        </a>
      </div>
      
      <!-- Navigation -->
      <div class="flex-grow-1 p-3">
        <ul class="nav flex-column">
          <li class="nav-item mb-2 active">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage=== '1' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
              <i class="bi bi-speedometer2 me-3"></i>Tableau de bord
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '2' ? 'active' : '' }}" href="{{ route('admin.gestionComptes') }}">
              <i class="bi bi-people me-3"></i> Gestion des comptes
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '3' ? 'active' : '' }}" href="{{ route('admin.gestionOffres') }}">
              <i class="bi bi-briefcase me-3"></i> Gestion des offres
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '4' ? 'active' : '' }}" href="{{ route('admin.signalements') }}">
              <i class="bi bi-flag me-3"></i> Signalements
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '5' ? 'active' : '' }}" href="{{ route('admin.categories') }}">
              <i class="bi bi-tags me-3"></i> Catégories
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '6' ? 'active' : '' }}" href="{{ route('admin.administrateurs') }}">
              <i class="bi bi-shield-lock me-3"></i> Administrateurs
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '7' ? 'active' : '' }}" href="{{ route('admin.parametres') }}">
              <i class="bi bi-gear me-3"></i> Paramètres
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '8' ? 'active' : '' }}" href="{{ route('admin.annonces') }}">
              <i class="bi bi-megaphone me-3"></i> Annonces
            </a>
          </li>
        </ul>
      </div>
      
      <!-- Déconnexion -->
      <div class="p-3 border-top">
        <a class="nav-link d-flex align-items-center p-3 rounded text-danger" href="../../CODE PROJECT/HTML/conexion.html">
          <i class="bi bi-box-arrow-right me-3"></i> Déconnexion
        </a>
      </div>
</div>