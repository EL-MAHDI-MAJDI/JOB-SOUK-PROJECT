
@props(['activePage'])
<div class="d-flex flex-column h-100">
      <!-- Logo -->
      <div class="p-3 border-bottom" style="height: auto;">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('candidat.dashboard')}}">
          <img src="{{ asset('storage/job souk.png') }}" alt="Logo de site web" width="35" height="35" class="me-2">
          <span class="fw-bold" style="color: #E74C3C;">Job Souk</span>
        </a>
      </div>
      
      <!-- Navigation -->
      <div class="flex-grow-1 p-3">
        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '1' ? 'active' : '' }}" href="{{ route('candidat.dashboard')}}">
              <i class="bi bi-speedometer2 me-3"></i>Tableau de bord
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '2' ? 'active' : '' }}" href="{{route('candidat.profil')}}">
              <i class="bi bi-person me-3"></i> Mon profil
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '3' ? 'active' : '' }}" href="{{route('candidat.cv')}}">
              <i class="bi bi-file-earmark-text me-3"></i> Mon CV
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '4' ? 'active' : '' }}" href="{{route('candidat.mesCandidatures')}}">
              <i class="bi bi-briefcase me-3"></i> Mes candidatures
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '5' ? 'active' : '' }}" href="{{route('candidat.chercherOffres')}}">
              <i class="bi bi-search me-3"></i> Rechercher des offres
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '6' ? 'active' : '' }}" href="{{route('candidat.offreSauvgarder')}}">
              <i class="bi bi-bookmark me-3"></i> Offres sauvegardées
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '7' ? 'active' : '' }}" href="{{route('candidat.mesEntretiens')}}">
              <i class="bi bi-calendar me-3"></i> Mes entretiens
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '8' ? 'active' : '' }}" href="{{route('candidat.message')}}">
              <i class="bi bi-envelope me-3"></i> Messages
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '9' ? 'active' : '' }}" href="{{route('candidat.notification')}}">
              <i class="bi bi-bell me-3"></i> Notifications
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link d-flex align-items-center p-3 rounded {{ $activePage === '10' ? 'active' : '' }}" href="{{route('candidat.parametre')}}">
              <i class="bi bi-gear me-3"></i> Paramètres
            </a>
          </li>
        </ul>
      </div>
      
      <!-- Déconnexion -->
      <!-- <div class="p-3 border-top">
        <a href="../../CODE PROJECT/HTML/login.html" class="btn btn-danger w-100 d-flex align-items-center justify-content-center">
          <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
        </a>
      </div> -->
    </div>