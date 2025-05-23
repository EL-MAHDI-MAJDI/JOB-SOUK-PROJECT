@props(['activePage'])
<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="{{ route('accueil') }}">
        <img src="{{ Vite::asset('resources/images/job souk.png') }}" alt="Logo de site web" width="35" height="35" class="me-2">
        <span class="fw-bold" style="color: #E74C3C;">Job Souk</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-center" >
          <li class="nav-item"><a class="nav-link {{ $activePage === '1' ? 'active' : '' }}" href="{{ route('accueil') }}"><i class="fa-solid fa-house"></i>Accueil</a></li>
          <li class="nav-item"><a class="nav-link {{ $activePage === '2' ? 'active' : '' }}" href="{{ route('offre') }}"><i class="fa-solid fa-briefcase"></i> Offres d'Emploi</a></li>
          <li class="nav-item"><a class="nav-link {{ $activePage === '3' ? 'active' : '' }}" href="{{ route('entreprises') }}"><i class="fa-solid fa-building"></i> Entreprises</a></li>
          <li class="nav-item"><a class="nav-link {{ $activePage === '4' ? 'active' : '' }}" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> Se connecter</a></li>
          <li class="nav-item"><a class="nav-link {{ $activePage === '5' ? 'active' : '' }}" href="{{ route('choixInscription') }}"><i class="fa-solid fa-user-plus"></i> S'inscrire</a></li>
        </ul>
      </div>
    </div>
  </nav>