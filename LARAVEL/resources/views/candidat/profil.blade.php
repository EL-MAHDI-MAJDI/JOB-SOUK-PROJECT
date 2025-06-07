<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mon Profil - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --primary: #E74C3C;
      --primary-light: rgba(231, 76, 60, 0.1);
      --secondary: #2ECC71;
      --accent: #FFD700;
      --text-main: #36454F;
      --text-light: #ffffff;
      --background: #ffffff;
      --sidebar-width: 280px;
    }

    body {
      font-family: 'Inter', -apple-system, sans-serif;
      background-color: #f8fafc;
      color: var(--text-main);
      margin-left: var(--sidebar-width);
    }

    /* Barre latérale fixe */
    .side-menu {
      position: fixed;
      left: 0;
      top: 0;
      bottom: 0;
      width: var(--sidebar-width);
      background: var(--background);
      border-right: 1px solid #eee;
      overflow-y: auto;
      z-index: 1000;
    }

    .side-menu .nav-link:hover {
      background: var(--primary-light);
      color: var(--primary);
    }

    .side-menu .nav-link.active {
      background: var(--primary-light);
      color: var(--primary);
    }

    /* Contenu principal */
    .main-content {
      padding: 1.5rem;
      margin-left: 0;
    }

    /* Barre de navigation supérieure enrichie */
    .top-navbar {
      background: var(--background);
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      height: 70px;
      position: sticky;
      top: 0;
      z-index: 100;
      padding: 0 1.5rem;
    }

    .nav-search {
      width: 300px;
      border-radius: 20px;
      border: 1px solid #ddd;
      padding-left: 40px;
    }

    .nav-search-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #6c757d;
    }

    /* Cartes */
    .dashboard-card {
      background: var(--background);
      border-radius: 12px;
      border: none;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      transition: all 0.3s ease;
      height: 100%;
    }

    .dashboard-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    /* Styles spécifiques au profil */
    .profile-header {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      border-radius: 12px;
      color: white;
      padding: 2rem;
      position: relative;
      overflow: hidden;
    }

    .profile-avatar {
      width: 120px;
      height: 120px;
      border: 4px solid white;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .profile-section {
      background: white;
      border-radius: 12px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      padding: 1.5rem;
      margin-bottom: 1.5rem;
    }

    .profile-section-title {
      border-bottom: 1px solid #eee;
      padding-bottom: 0.75rem;
      margin-bottom: 1.5rem;
      font-weight: 600;
      color: var(--primary);
    }

    .skill-badge {
      background-color: var(--primary-light);
      color: var(--primary);
      padding: 0.5rem 1rem;
      border-radius: 50px;
      display: inline-flex;
      align-items: center;
      margin-right: 0.5rem;
      margin-bottom: 0.5rem;
      position: relative;
    }

    .skill-badge .delete-btn {
      margin-left: 5px;
      cursor: pointer;
      color: var(--primary);
      opacity: 0.7;
    }

    .skill-badge .delete-btn:hover {
      opacity: 1;
    }

    .skill-badge .btn-link {
      color: var(--primary);
      opacity: 0.7;
      text-decoration: none;
    }

    .skill-badge .btn-link:hover {
      opacity: 1;
    }

    .skill-badge .btn-link i {
      font-size: 0.875rem;
    }

    .language-level {
      height: 6px;
      border-radius: 3px;
      background-color: #eee;
      margin-top: 0.5rem;
    }

    .language-level-fill {
      height: 100%;
      border-radius: 3px;
      background: linear-gradient(to right, var(--primary), var(--secondary));
    }

    .edit-btn {
      position: absolute;
      top: 1rem;
      right: 1rem;
      background: rgba(255,255,255,0.2);
      border: none;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
    }

    .social-icon {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: var(--primary-light);
      color: var(--primary);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-right: 0.5rem;
    }

    .timeline-item {
      position: relative;
      padding-left: 30px;
      margin-bottom: 2rem;
    }

    .timeline-badge {
      position: absolute;
      left: 0;
      top: 0;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: var(--primary);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.75rem;
    }

    .timeline-content {
      padding-bottom: 1rem;
      border-bottom: 1px dashed #eee;
      position: relative;
    }

    .timeline-actions {
      position: absolute;
      top: 0;
      right: 0;
    }

    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
    }

    .btn-primary:hover {
      background-color: #c0392b;
      border-color: #c0392b;
    }

    .btn-outline-primary {
      color: var(--primary);
      border-color: var(--primary);
    }

    .btn-outline-primary:hover {
      background-color: var(--primary);
      border-color: var(--primary);
    }

    .modal-header {
      border-bottom: 1px solid #f0f0f0;
      padding: 1.5rem;
      background-color: var(--primary);
      color: white;
    }

    .modal-footer {
      border-top: 1px solid #f0f0f0;
      padding: 1rem 1.5rem;
    }

    .form-floating label {
      color: #6c757d;
    }

    .progress {
      background-color: var(--primary-light);
    }

    .progress-bar {
      background-color: var(--primary);
    }

    @media (max-width: 992px) {
      body {
        margin-left: 0;
      }
      
      .side-menu {
        transform: translateX(-100%);
        transition: transform 0.3s ease;
      }
      
      .side-menu.show {
        transform: translateX(0);
      }
      
      .nav-search {
        width: 200px;
      }
    }
    .p-3 {
        height: 47px;
    }

    /* Nouveaux styles pour les actions de photo */
    .photo-actions {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
      margin-top: 10px;
    }

    .photo-actions .btn {
      width: 120px;
      font-size: 14px;
      padding: 6px 12px;
    }

    .photo-actions .btn-outline-primary {
      background-color: rgba(255, 255, 255, 0.1);
      border-color: #fff;
      color: #fff;
    }

    .photo-actions .btn-outline-primary:hover {
      background-color: #fff;
      color: var(--primary);
    }

    .photo-actions .btn-outline-secondary {
      background-color: rgba(255, 255, 255, 0.1);
      border-color: #fff;
      color: #fff;
    }

    .photo-actions .btn-outline-secondary:hover {
      background-color: #fff;
      color: #6c757d;
    }
  </style>
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoCandidat.side-menu activePage=2 :candidat='$candidat' />
  </div>

  <!-- Barre de navigation supérieure enrichie -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoCandidat.navbar :candidat='$candidat' />
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    @if ($errors->any())
      <x-alert type="danger">
        <h5 class="alert-heading">Erreur de validation</h5>
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </x-alert>
    @endif
      <!-- Afficher message "votre modification a été faite avec succès" -->
    @include('partials.flashbag')
    <div class="container-fluid">
      <!-- En-tête -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Mon Profil</h2>
          {{-- <p class="text-muted mb-0" id="currentDate"></p> --}}
        </div>
        {{-- <div class="d-flex gap-2">
          <button class="btn btn-primary"><i class="bi bi-pencil me-2"></i>Modifier Profil</button>
        </div> --}}
      </div>
      
      <!-- Section Profil -->
      <div class="profile-header mb-4">
        <button class="edit-btn" data-bs-toggle="modal" data-bs-target="#editProfileModal">
          <i class="bi bi-pencil"></i>
        </button>
        <div class="row align-items-center">
          <div class="col-md-2 d-flex flex-column align-items-center">
            <form method="POST" enctype="multipart/form-data" action="{{ route('candidat.updateprofil', $candidat) }}">
              @csrf
              @method('PUT')
              <input type="hidden" name="action_type" value="photo">
              <div style="position:relative; display:inline-block; width:100%;">
                <img id="photoPreview" src="{{ $candidat->photoProfile ? asset('storage/'.$candidat->photoProfile) : asset('public/storage/photoProfile/profile.png') }}" alt="Photo de profil" class="profile-avatar rounded-circle mb-3 mb-md-0" style="object-fit:cover;">
                <!-- Formulaire pour changer la photo -->
                <form id="changePhotoForm" method="POST" enctype="multipart/form-data" action="{{ route('candidat.updateprofil', $candidat) }}" style="display:inline;">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="action_type" value="photo">
                  <input type="file" id="photoInput" name="photoProfile" accept=".png,.jpg,.jpeg" style="display:none;">
                  <div class="d-flex flex-column align-items-center gap-2 mt-2">
                    <button id="changePhotoBtn" class="btn btn-sm btn-primary" type="button">
                      <i class="bi bi-pencil me-1"></i> Changer
                    </button>
                    <button id="removePhotoBtn" class="btn btn-sm btn-danger" type="submit" name="remove_photo" value="1">
                      <i class="bi bi-trash me-1"></i> Supprimer
                    </button>
                  </div>
                  <div id="photoActionBtns" style="display:none; width:100%;" class="mt-2">
                    <div class="d-flex flex-column align-items-center gap-2">
                      <button id="savePhotoBtn" class="btn btn-sm btn-primary" type="submit">Enregistrer</button>
                      <button id="cancelPhotoBtn" class="btn btn-sm btn-secondary" type="button">Annuler</button>
                    </div>
                  </div>
                </form>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <h3 class="mb-1">{{ $candidat->prenom }} {{ $candidat->nom }}</h3>
            <p class="mb-2"><i class="bi bi-briefcase me-2"></i>{{ $candidat->titre_professionnel }}</p>
            <p class="mb-2"><i class="bi bi-geo-alt me-2"></i>{{ $candidat->ville }}, Maroc</p>
            <div class="d-flex mt-3">
              <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
              <a href="#" class="social-icon"><i class="bi bi-github"></i></a>
              <a href="#" class="social-icon"><i class="bi bi-twitter-x"></i></a>
              <a href="#" class="social-icon"><i class="bi bi-globe"></i></a>
            </div>
          </div>
          <div class="col-md-4 mt-3 mt-md-0">
            <div class="d-flex flex-column">
              <div class="d-flex justify-content-between mb-2">
                <span>Profil complété</span>
                <span>85%</span>
              </div>
              <div class="progress bg-white bg-opacity-25" style="height: 8px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="d-flex flex-wrap gap-2 mt-3">
              <span class="badge bg-white text-primary"><i class="bi bi-check-circle-fill me-1"></i>CV</span>
              <span class="badge bg-white text-primary"><i class="bi bi-check-circle-fill me-1"></i>Compétences</span>
              <span class="badge bg-white text-dark"><i class="bi bi-x-circle me-1"></i>Photo</span>
              <span class="badge bg-white text-dark"><i class="bi bi-x-circle me-1"></i>Expérience</span>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <!-- Colonne gauche -->
        <div class="col-lg-8">
          <!-- À propos -->
          <div class="profile-section">
            <h4 class="profile-section-title d-flex justify-content-between align-items-center">
              <span>À propos</span>
              <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editAboutModal">
                <i class="bi bi-pencil"></i>
              </button>
            </h4>
            <p id="aboutText">
                @if($candidat->apropos)
                    {{ $candidat->apropos->contenu }}
                @else
                    Aucune description ajoutée.
                @endif
            </p>
          </div>
          
          <!-- Expérience professionnelle -->
          <div class="profile-section">
            <h4 class="profile-section-title d-flex justify-content-between align-items-center">
              <span>Expérience professionnelle</span>
              <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addExperienceModal">
                <i class="bi bi-plus"></i> Ajouter
              </button>
            </h4>
            
            <div id="experiences-container">
              <!-- Les expériences seront ajoutées ici dynamiquement -->
              <div class="timeline-item">
                <div class="timeline-badge">
                  <i class="bi bi-briefcase"></i>
                </div>
                <div class="timeline-content">
                  <div class="timeline-actions">
                    <button class="btn btn-sm btn-outline-primary me-1" onclick="editExperience(0)"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger" onclick="deleteExperience(0)"><i class="bi bi-trash"></i></button>
                  </div>
                  <div class="d-flex justify-content-between">
                    <h5 class="mb-1">Développeur Full Stack Senior</h5>
                    <!-- <span class="badge bg-primary">Actuel</span> -->
                  </div>
                  <p class="mb-1 text-muted">TechSolutions Inc. - Casablanca</p>
                  <small class="text-muted">Janvier 2021 - Présent</small>
                  <p class="mt-2 mb-0">
                    - Conception et développement d'une plateforme SaaS pour la gestion des ressources humaines<br>
                    - Encadrement d'une équipe de 3 développeurs juniors<br>
                    - Optimisation des performances (réduction du temps de chargement de 40%)
                  </p>
                </div>
              </div>
              
              <div class="timeline-item">
                <div class="timeline-badge">
                  <i class="bi bi-briefcase"></i>
                </div>
                <div class="timeline-content">
                  <div class="timeline-actions">
                    <button class="btn btn-sm btn-outline-primary me-1" onclick="editExperience(1)"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger" onclick="deleteExperience(1)"><i class="bi bi-trash"></i></button>
                  </div>
                  <h5 class="mb-1">Développeur Frontend</h5>
                  <p class="mb-1 text-muted">WebVision - Rabat</p>
                  <small class="text-muted">Mars 2019 - Décembre 2020</small>
                  <p class="mt-2 mb-0">
                    - Développement d'interfaces utilisateur avec React et Redux<br>
                    - Collaboration avec les designers pour implémenter des maquettes Figma<br>
                    - Participation aux revues de code et amélioration des processus CI/CD
                  </p>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Formation -->
          <div class="profile-section">
            <h4 class="profile-section-title d-flex justify-content-between align-items-center">
              <span>Formation</span>
              <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addEducationModal">
                <i class="bi bi-plus"></i> Ajouter
              </button>
            </h4>
            
            <div id="educations-container">
              <!-- Les formations seront ajoutées ici dynamiquement -->
              <div class="timeline-item">
                <div class="timeline-badge">
                  <i class="bi bi-mortarboard"></i>
                </div>
                <div class="timeline-content">
                  <div class="timeline-actions">
                    <button class="btn btn-sm btn-outline-primary me-1" onclick="editEducation(0)"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger" onclick="deleteEducation(0)"><i class="bi bi-trash"></i></button>
                  </div>
                  <h5 class="mb-1">Master en Ingénierie Logicielle</h5>
                  <p class="mb-1 text-muted">Université Mohammed V - Rabat</p>
                  <small class="text-muted">2017 - 2019</small>
                  <p class="mt-2 mb-0">
                    Spécialisation en architectures distribuées et cloud computing. Projet de fin d'études sur 
                    l'optimisation des requêtes GraphQL dans les applications microservices.
                  </p>
                </div>
              </div>
              
              <div class="timeline-item">
                <div class="timeline-badge">
                  <i class="bi bi-mortarboard"></i>
                </div>
                <div class="timeline-content">
                  <div class="timeline-actions">
                    <button class="btn btn-sm btn-outline-primary me-1" onclick="editEducation(1)"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger" onclick="deleteEducation(1)"><i class="bi bi-trash"></i></button>
                  </div>
                  <h5 class="mb-1">Licence en Informatique</h5>
                  <p class="mb-1 text-muted">Université Hassan II - Casablanca</p>
                  <small class="text-muted">2014 - 2017</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Colonne droite -->
        <div class="col-lg-4">
          <!-- Compétences -->
          <div class="profile-section">
            <h4 class="profile-section-title d-flex justify-content-between align-items-center">
              <span>Compétences</span>
              <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addSkillModal">
                <i class="bi bi-plus"></i> Ajouter
              </button>
            </h4>
            
            <div id="skills-container">
              <div class="mb-3">
                <h6 class="mb-2">Techniques</h6>
                <div class="d-flex flex-wrap gap-2" id="technical-skills">
                  @foreach($candidat->competences->where('type', 'technical') as $comp)
                    <span class="skill-badge">
                      {{ $comp->nom }}
                      <button class="btn btn-sm btn-link p-0 ms-1" onclick="editSkill({{ $comp->id }}, '{{ $comp->nom }}', '{{ $comp->type }}', {{ $comp->niveau }})">
                        <i class="bi bi-pencil"></i>
                      </button>
                      <i class="bi bi-x delete-btn" onclick="deleteSkill({{ $comp->id }})"></i>
                    </span>
                  @endforeach
                </div>
              </div>
              <div class="mb-3">
                <h6 class="mb-2">Soft Skills</h6>
                <div class="d-flex flex-wrap gap-2" id="soft-skills">
                  @foreach($candidat->competences->where('type', 'soft') as $comp)
                    <span class="skill-badge">
                      {{ $comp->nom }}
                      <button class="btn btn-sm btn-link p-0 ms-1" onclick="editSkill({{ $comp->id }}, '{{ $comp->nom }}', '{{ $comp->type }}', {{ $comp->niveau }})">
                        <i class="bi bi-pencil"></i>
                      </button>
                      <i class="bi bi-x delete-btn" onclick="deleteSkill({{ $comp->id }})"></i>
                    </span>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          
          <!-- Langues -->
          <div class="profile-section">
            <h4 class="profile-section-title d-flex justify-content-between align-items-center">
              <span>Langues</span>
              <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addLanguageModal">
                <i class="bi bi-plus"></i> Ajouter
              </button>
            </h4>
            
            <div id="languages-container">
                @foreach($candidat->langues as $langue)
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>{{ $langue->nom }}</span>
                            <div>
                                <button class="btn btn-sm btn-outline-primary me-1" onclick="editLanguage({{ $langue->id }}, '{{ $langue->nom }}', '{{ $langue->niveau }}')">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteLanguage({{ $langue->id }})">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                        <small>{{ $langue->niveau }}</small>
                        @php
$niveauxLangue = [
    'native' => 100,
    'fluent' => 90,
    'professional' => 80,
    'intermediate' => 60,
    'basic' => 40
];
@endphp

<div class="language-level">
    <div class="language-level-fill" style="width: {{ $niveauxLangue[$langue->niveau] ?? 40 }}%"></div>
</div>
                    </div>
                @endforeach
            </div>
          </div>
          
          <!-- Certifications -->
          <div class="profile-section">
            <h4 class="profile-section-title d-flex justify-content-between align-items-center">
              <span>Certifications</span>
              <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addCertificationModal">
                <i class="bi bi-plus"></i> Ajouter
              </button>
            </h4>
            
            <div id="certifications-container">
              <!-- Les certifications seront ajoutées ici dynamiquement -->
              <div class="mb-3">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <h6 class="mb-1">AWS Certified Developer</h6>
                    <small class="text-muted">Amazon Web Services - 2022</small>
                  </div>
                  <div>
                    <button class="btn btn-sm btn-outline-primary me-1" onclick="editCertification(0)"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger" onclick="deleteCertification(0)"><i class="bi bi-trash"></i></button>
                  </div>
                </div>
              </div>
              
              <div class="mb-3">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <h6 class="mb-1">React Advanced Concepts</h6>
                    <small class="text-muted">Frontend Masters - 2021</small>
                  </div>
                  <div>
                    <button class="btn btn-sm btn-outline-primary me-1" onclick="editCertification(1)"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger" onclick="deleteCertification(1)"><i class="bi bi-trash"></i></button>
                  </div>
                </div>
              </div>
              
              <div>
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <h6 class="mb-1">Node.js: Microservices Architecture</h6>
                    <small class="text-muted">Udemy - 2020</small>
                  </div>
                  <div>
                    <button class="btn btn-sm btn-outline-primary me-1" onclick="editCertification(2)"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger" onclick="deleteCertification(2)"><i class="bi bi-trash"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modals pour l'ajout et modification d'éléments -->

  <!-- Modal Édition Profil -->
  <div class="modal fade" id="editProfileModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier le profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="profileForm" method="POST" action="{{ route('candidat.updateprofil', $candidat) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="action_type" value="profile">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ $candidat->nom }}" required>
                        <label for="nom">Nom</label>
                        @error('nom')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ $candidat->prenom }}" required>
                        <label for="prenom">Prénom</label>
                        @error('prenom')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('titre_professionnel') is-invalid @enderror" id="titre_professionnel" name="titre_professionnel" value="{{ $candidat->titre_professionnel }}">
                        <label for="titre_professionnel">Titre professionnel</label>
                        @error('titre_professionnel')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                      
                        <input type="text" class="form-control @error('ville') is-invalid @enderror" id="ville" name="ville" value="{{ $candidat->ville }}">
                        <label for="ville">Ville</label>
                        @error('ville')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

  <!-- Modal Édition À propos -->
  <div class="modal fade" id="editAboutModal" tabindex="-1" aria-labelledby="editAboutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editAboutModalLabel">Modifier la section À propos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="aboutForm" action="{{ route('candidat.updateprofil', ['candidat' => $candidat->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="action_type" value="apropos">
            <div class="form-floating">
              <textarea 
                class="form-control @error('contenu') is-invalid @enderror" 
                id="aboutTextArea" 
                name="contenu"
                style="height: 200px"
                placeholder="Décrivez votre profil professionnel, vos objectifs et vos principales compétences..."
              >{{ old('contenu', $candidat->apropos ? $candidat->apropos->contenu : '') }}</textarea>
              @error('contenu')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              <label for="aboutTextArea">À propos de moi</label>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Ajout/Modification Expérience -->
  <div class="modal fade" id="addExperienceModal" tabindex="-1" aria-labelledby="addExperienceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addExperienceModalLabel">Ajouter une expérience professionnelle</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="experienceForm">
            <input type="hidden" id="experienceId">
            <div class="row g-3">
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="expJobTitle" placeholder="Titre du poste" required>
                  <label for="expJobTitle">Titre du poste</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="expCompanyName" placeholder="Nom de l'entreprise" required>
                  <label for="expCompanyName">Entreprise</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="expLocation" placeholder="Lieu" required>
                  <label for="expLocation">Lieu</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-floating">
                  <input type="month" class="form-control" id="expStartDate" placeholder="Date de début" required>
                  <label for="expStartDate">Date de début</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-floating">
                  <input type="month" class="form-control" id="expEndDate" placeholder="Date de fin">
                  <label for="expEndDate">Date de fin</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="expCurrentJob">
                  <label class="form-check-label" for="expCurrentJob">
                    J'occupe actuellement ce poste
                  </label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control" id="expDescription" style="height: 120px" placeholder="Description" required></textarea>
                  <label for="expDescription">Description</label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary" id="saveExperience">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Ajout/Modification Formation -->
  <div class="modal fade" id="addEducationModal" tabindex="-1" aria-labelledby="addEducationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addEducationModalLabel">Ajouter une formation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="educationForm">
            <input type="hidden" id="educationId">
            <div class="row g-3">
              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="eduDegree" placeholder="Diplôme" required>
                  <label for="eduDegree">Diplôme</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="eduSchool" placeholder="Établissement" required>
                  <label for="eduSchool">Établissement</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="month" class="form-control" id="eduStartDate" placeholder="Date de début" required>
                  <label for="eduStartDate">Date de début</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="month" class="form-control" id="eduEndDate" placeholder="Date de fin">
                  <label for="eduEndDate">Date de fin</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control" id="eduDescription" style="height: 100px" placeholder="Description"></textarea>
                  <label for="eduDescription">Description</label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary" id="saveEducation">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Ajout/Modification Compétence -->
<div class="modal fade" id="addSkillModal" tabindex="-1" aria-labelledby="addSkillModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSkillModalLabel">Ajouter une compétence</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="skillForm" action="{{ route('candidat.updateprofil',['candidat' => $candidat->id]) }}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" name="action_type" value="competence">
          <input type="hidden" name="competence_id" id="competenceId">
          <div class="row g-3">
            <div class="col-12">
              <div class="form-floating">
                <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                       id="skillName" name="nom" placeholder="Nom de la compétence" required>
                <label for="skillName">Compétence</label>
                @error('nom')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <select class="form-select @error('type') is-invalid @enderror" 
                        id="skillType" name="type" required>
                  <option value="">Sélectionnez un type</option>
                  <option value="technical">Technique</option>
                  <option value="soft">Soft Skill</option>
                </select>
                <label for="skillType">Type de compétence</label>
                @error('type')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <select class="form-select @error('niveau') is-invalid @enderror" 
                        id="skillLevel" name="niveau" required>
                  <option value="">Sélectionnez un niveau</option>
                  <option value="1">Débutant</option>
                  <option value="2">Intermédiaire</option>
                  <option value="3">Avancé</option>
                  <option value="4">Expert</option>
                </select>
                <label for="skillLevel">Niveau</label>
                @error('niveau')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

  <!-- Modal Ajout/Modification Langue -->
  <div class="modal fade" id="addLanguageModal" tabindex="-1" aria-labelledby="addLanguageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLanguageModalLabel">Ajouter une langue</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="languageForm" action="{{ route('candidat.updateprofil', ['candidat' => $candidat->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="action_type" value="langue">
                    <input type="hidden" name="langue_id" id="languageId">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                       id="langName" name="nom" placeholder="Langue" required>
                                <label for="langName">Langue</label>
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-select @error('niveau') is-invalid @enderror" 
                                        id="langLevel" name="niveau" required>
                                    <option value="">Sélectionnez un niveau</option>
                                    <option value="native">Langue maternelle</option>
                                    <option value="fluent">Courant</option>
                                    <option value="professional">Professionnel</option>
                                    <option value="intermediate">Intermédiaire</option>
                                    <option value="basic">Basique</option>
                                </select>
                                <label for="langLevel">Niveau</label>
                                @error('niveau')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>

  <!-- Modal Ajout/Modification Certification -->
  <div class="modal fade" id="addCertificationModal" tabindex="-1" aria-labelledby="addCertificationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCertificationModalLabel">Ajouter une certification</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="certificationForm">
            <input type="hidden" id="certificationId">
            <div class="row g-3">
              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="certName" placeholder="Nom de la certification" required>
                  <label for="certName">Certification</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="certOrg" placeholder="Organisation" required>
                  <label for="certOrg">Organisation</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <input type="month" class="form-control" id="certDate" placeholder="Date d'obtention" required>
                  <label for="certDate">Date d'obtention</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="certId" placeholder="ID de certification">
                  <label for="certId">ID de certification (optionnel)</label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary" id="saveCertification">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Ajouter après vos autres formulaires formulaire caché pour la suppression -->
<form id="deleteSkillForm" action="{{ route('candidat.updateprofil', ['candidat' => $candidat->id]) }}" method="POST" style="display: none;">
    @csrf
    @method('PUT')
    <input type="hidden" name="action_type" value="delete_competence">
    <input type="hidden" name="competence_id" id="competenceIdInput">
</form>

<!-- Formulaire caché pour la suppression -->
<form id="deleteLanguageForm" action="{{ route('candidat.updateprofil', ['candidat' => $candidat->id]) }}" method="POST" style="display: none;">
    @csrf
    @method('PUT')
    <input type="hidden" name="action_type" value="delete_langue">
    <input type="hidden" name="langue_id" id="deleteLanguageId">
</form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Variables pour gérer l'édition
    let currentEditId = null;
    let currentEditType = null;

    // Fonction pour formater la date
    function formatDate(dateStr) {
      if (!dateStr) return "Présent";
      const date = new Date(dateStr);
      const options = { year: 'numeric', month: 'long' };
      return date.toLocaleDateString('fr-FR', options);
    }

    // Fonction pour formater la date en format YYYY-MM
    function formatDateForInput(dateStr) {
      if (!dateStr) return "";
      const date = new Date(dateStr);
      const year = date.getFullYear();
      const month = String(date.getMonth() + 1).padStart(2, '0');
      return `${year}-${month}`;
    }

    // Fonctions pour sauvegarder les données
    function saveProfile() {
      const form = document.getElementById('profileForm');
      profileData.name = document.getElementById('fullName').value;
      profileData.title = document.getElementById('jobTitle').value;
      profileData.location = document.getElementById('location').value;
      profileData.social.linkedin = document.querySelector('#profileForm .input-group:nth-child(1) input').value;
      profileData.social.github = document.querySelector('#profileForm .input-group:nth-child(2) input').value;
      profileData.social.twitter = document.querySelector('#profileForm .input-group:nth-child(3) input').value;
      profileData.social.website = document.querySelector('#profileForm .input-group:nth-child(4) input').value;
      
      // Mettre à jour l'affichage
      document.querySelector('.profile-header h3').textContent = profileData.name;
      document.querySelector('.profile-header p:nth-of-type(1)').innerHTML = `<i class="bi bi-briefcase me-2"></i>${profileData.title}`;
      document.querySelector('.profile-header p:nth-of-type(2)').innerHTML = `<i class="bi bi-geo-alt me-2"></i>${profileData.location}`;
      
      // Fermer le modal
      bootstrap.Modal.getInstance(document.getElementById('editProfileModal')).hide();
    }

    function saveAbout() {
      const aboutText = document.getElementById('aboutTextArea').value;
      profileData.about = aboutText;
      document.getElementById('aboutText').textContent = aboutText;
      bootstrap.Modal.getInstance(document.getElementById('editAboutModal')).hide();
    }

    // Fonctions pour gérer les expériences
    function addExperience(experience) {
      experience.id = profileData.experiences.length > 0 ? 
        Math.max(...profileData.experiences.map(e => e.id)) + 1 : 0;
      profileData.experiences.unshift(experience);
      renderExperiences();
    }

    function editExperience(id) {
      const experience = profileData.experiences.find(e => e.id === id);
      if (!experience) return;
      
      currentEditId = id;
      currentEditType = 'experience';
      
      document.getElementById('experienceId').value = id;
      document.getElementById('expJobTitle').value = experience.jobTitle;
      document.getElementById('expCompanyName').value = experience.companyName;
      document.getElementById('expLocation').value = experience.location;
      document.getElementById('expStartDate').value = formatDateForInput(experience.startDate);
      document.getElementById('expEndDate').value = formatDateForInput(experience.endDate);
      document.getElementById('expCurrentJob').checked = experience.current;
      document.getElementById('expDescription').value = experience.description;
      
      const modal = new bootstrap.Modal(document.getElementById('addExperienceModal'));
      modal.show();
    }

    function updateExperience(id, updatedExperience) {
      const index = profileData.experiences.findIndex(e => e.id === id);
      if (index !== -1) {
        profileData.experiences[index] = updatedExperience;
        renderExperiences();
      }
    }

    function deleteExperience(id) {
      if (confirm("Êtes-vous sûr de vouloir supprimer cette expérience ?")) {
        profileData.experiences = profileData.experiences.filter(e => e.id !== id);
        renderExperiences();
      }
    }

    function renderExperiences() {
      const container = document.getElementById('experiences-container');
      container.innerHTML = '';
      
      profileData.experiences.forEach(exp => {
        const isCurrent = exp.endDate === '' || exp.current;
        const endDateText = isCurrent ? 'Présent' : formatDate(exp.endDate);
        
        const expItem = document.createElement('div');
        expItem.className = 'timeline-item';
        expItem.innerHTML = `
          <div class="timeline-badge">
            <i class="bi bi-briefcase"></i>
          </div>
          <div class="timeline-content">
            <div class="timeline-actions">
              <button class="btn btn-sm btn-outline-primary me-1" onclick="editExperience(${exp.id})"><i class="bi bi-pencil"></i></button>
              <button class="btn btn-sm btn-outline-danger" onclick="deleteExperience(${exp.id})"><i class="bi bi-trash"></i></button>
            </div>
            <div class="d-flex justify-content-between">
              <h5 class="mb-1">${exp.jobTitle}</h5>
              
            </div>
            <p class="mb-1 text-muted">${exp.companyName} - ${exp.location}</p>
            <small class="text-muted">${formatDate(exp.startDate)} - ${endDateText}</small>
            <p class="mt-2 mb-0">${exp.description.replace(/\n/g, '<br>')}</p>
          </div>
        `;
        container.appendChild(expItem);
      });
    }

    // Fonctions pour gérer les formations
    function addEducation(education) {
      education.id = profileData.educations.length > 0 ? 
        Math.max(...profileData.educations.map(e => e.id)) + 1 : 0;
      profileData.educations.unshift(education);
      renderEducations();
    }

    function editEducation(id) {
      const education = profileData.educations.find(e => e.id === id);
      if (!education) return;
      
      currentEditId = id;
      currentEditType = 'education';
      
      document.getElementById('educationId').value = id;
      document.getElementById('eduDegree').value = education.degree;
      document.getElementById('eduSchool').value = education.school;
      document.getElementById('eduStartDate').value = formatDateForInput(education.startDate);
      document.getElementById('eduEndDate').value = formatDateForInput(education.endDate);
      document.getElementById('eduDescription').value = education.description;
      
      const modal = new bootstrap.Modal(document.getElementById('addEducationModal'));
      modal.show();
    }

    function updateEducation(id, updatedEducation) {
      const index = profileData.educations.findIndex(e => e.id === id);
      if (index !== -1) {
        profileData.educations[index] = updatedEducation;
        renderEducations();
      }
    }

    function deleteEducation(id) {
      if (confirm("Êtes-vous sûr de vouloir supprimer cette formation ?")) {
        profileData.educations = profileData.educations.filter(e => e.id !== id);
        renderEducations();
      }
    }

    function renderEducations() {
      const container = document.getElementById('educations-container');
      container.innerHTML = '';
      
      profileData.educations.forEach(edu => {
        const eduItem = document.createElement('div');
        eduItem.className = 'timeline-item';
        eduItem.innerHTML = `
          <div class="timeline-badge">
            <i class="bi bi-mortarboard"></i>
          </div>
          <div class="timeline-content">
            <div class="timeline-actions">
              <button class="btn btn-sm btn-outline-primary me-1" onclick="editEducation(${edu.id})"><i class="bi bi-pencil"></i></button>
              <button class="btn btn-sm btn-outline-danger" onclick="deleteEducation(${edu.id})"><i class="bi bi-trash"></i></button>
            </div>
            <h5 class="mb-1">${edu.degree}</h5>
            <p class="mb-1 text-muted">${edu.school} - ${edu.location}</p>
            <small class="text-muted">${formatDate(edu.startDate)} - ${edu.endDate ? formatDate(edu.endDate) : 'Présent'}</small>
            ${edu.description ? `<p class="mt-2 mb-0">${edu.description.replace(/\n/g, '<br>')}</p>` : ''}
          </div>
        `;
        container.appendChild(eduItem);
      });
    }

    // Fonctions pour gérer les compétences
    function addSkill(skill) {
      if (skill.type === 'technical') {
        if (!profileData.skills.technical.includes(skill.name)) {
          profileData.skills.technical.push(skill.name);
        }
      } else {
        if (!profileData.skills.soft.includes(skill.name)) {
          profileData.skills.soft.push(skill.name);
        }
      }
      renderSkills();
    }

    function editSkill(id, name, type, niveau) {
      // Mettre à jour les valeurs du formulaire
      document.getElementById('competenceId').value = id;
      document.getElementById('skillName').value = name;
      document.getElementById('skillType').value = type;
      document.getElementById('skillLevel').value = niveau;
      
      // Changer le titre du modal
      document.getElementById('addSkillModalLabel').textContent = 'Modifier la compétence';
      
      // Ouvrir le modal
      const modal = new bootstrap.Modal(document.getElementById('addSkillModal'));
      modal.show();
    }

    function updateSkill(oldName, newSkill) {
      if (newSkill.type === 'technical') {
        profileData.skills.technical = profileData.skills.technical.filter(s => s !== oldName);
        if (!profileData.skills.technical.includes(newSkill.name)) {
          profileData.skills.technical.push(newSkill.name);
        }
      } else {
        profileData.skills.soft = profileData.skills.soft.filter(s => s !== oldName);
        if (!profileData.skills.soft.includes(newSkill.name)) {
          profileData.skills.soft.push(newSkill.name);
        }
      }
      renderSkills();
    }

    function deleteSkill(name, type) {
      if (confirm(`Êtes-vous sûr de vouloir supprimer la compétence "${name}" ?`)) {
        if (type === 'technical') {
          profileData.skills.technical = profileData.skills.technical.filter(s => s !== name);
        } else {
          profileData.skills.soft = profileData.skills.soft.filter(s => s !== name);
        }
        renderSkills();
      }
    }

    function renderSkills() {
      const technicalContainer = document.getElementById('technical-skills');
      const softContainer = document.getElementById('soft-skills');
      
      technicalContainer.innerHTML = '';
      softContainer.innerHTML = '';
      
      profileData.skills.technical.forEach(skill => {
        const skillBadge = document.createElement('span');
        skillBadge.className = 'skill-badge';
        skillBadge.innerHTML = `${skill} <i class="bi bi-check-circle ms-1"></i><i class="bi bi-x delete-btn" onclick="deleteSkill('${skill}', 'technical')"></i>`;
        technicalContainer.appendChild(skillBadge);
      });
      
      profileData.skills.soft.forEach(skill => {
        const skillBadge = document.createElement('span');
        skillBadge.className = 'skill-badge';
        skillBadge.innerHTML = `${skill} <i class="bi bi-x delete-btn" onclick="deleteSkill('${skill}', 'soft')"></i>`;
        softContainer.appendChild(skillBadge);
      });
    }

    // Fonctions pour gérer les langues
    function addLanguage(language) {
      language.id = profileData.languages.length > 0 ? 
        Math.max(...profileData.languages.map(l => l.id)) + 1 : 0;
      profileData.languages.unshift(language);
      renderLanguages();
    }

    function editLanguage(id, nom, niveau) {
      document.getElementById('languageId').value = id;
      document.getElementById('langName').value = nom;
      document.getElementById('langLevel').value = niveau;
      document.getElementById('addLanguageModalLabel').textContent = 'Modifier la langue';
      const modal = new bootstrap.Modal(document.getElementById('addLanguageModal'));
      modal.show();
    }

    function updateLanguage(id, updatedLanguage) {
      const index = profileData.languages.findIndex(l => l.id === id);
      if (index !== -1) {
        profileData.languages[index] = updatedLanguage;
        renderLanguages();
      }
    }

    function deleteLanguage(id) {
      if (confirm("Êtes-vous sûr de vouloir supprimer cette langue ?")) {
        document.getElementById('deleteLanguageId').value = id;
        document.getElementById('deleteLanguageForm').submit();
      }
    }

    function renderLanguages() {
      const container = document.getElementById('languages-container');
      container.innerHTML = '';
      
      const niveauxLangue = {
    'native': 100,
    'fluent': 90,
    'professional': 80,
    'intermediate': 60,
    'basic': 40
};
      
      profileData.languages.forEach(lang => {
        const niveauPourcentage = niveauxLangue[lang.niveau] || 0;
        
        const langItem = document.createElement('div');
        langItem.className = 'mb-3';
        langItem.innerHTML = `
          <div class="d-flex justify-content-between align-items-center">
            <span>${lang.nom}</span>
            <div>
              <button class="btn btn-sm btn-outline-primary me-1" onclick="editLanguage(${lang.id})"><i class="bi bi-pencil"></i></button>
              <button class="btn btn-sm btn-outline-danger" onclick="deleteLanguage(${lang.id})">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </div>
          <small>${lang.niveau}</small>
          <div class="language-level">
            <div class="language-level-fill" style="width: ${niveauPourcentage}%"></div>
          </div>
        `;
        container.appendChild(langItem);
      });
    }

    // Fonctions pour gérer les certifications
    function addCertification(certification) {
      certification.id = profileData.certifications.length > 0 ? 
        Math.max(...profileData.certifications.map(c => c.id)) + 1 : 0;
      profileData.certifications.unshift(certification);
      renderCertifications();
    }

    function editCertification(id) {
      const certification = profileData.certifications.find(c => c.id === id);
      if (!certification) return;
      
      currentEditId = id;
      currentEditType = 'certification';
      
      document.getElementById('certificationId').value = id;
      document.getElementById('certName').value = certification.name;
      document.getElementById('certOrg').value = certification.organization;
      document.getElementById('certDate').value = formatDateForInput(certification.date);
      document.getElementById('certId').value = certification.certId || '';
      
      const modal = new bootstrap.Modal(document.getElementById('addCertificationModal'));
      modal.show();
    }

    function updateCertification(id, updatedCertification) {
      const index = profileData.certifications.findIndex(c => c.id === id);
      if (index !== -1) {
        profileData.certifications[index] = updatedCertification;
        renderCertifications();
      }
    }

    function deleteCertification(id) {
      if (confirm("Êtes-vous sûr de vouloir supprimer cette certification ?")) {
        profileData.certifications = profileData.certifications.filter(c => c.id !== id);
        renderCertifications();
      }
    }

    function renderCertifications() {
      const container = document.getElementById('certifications-container');
      container.innerHTML = '';
      
      profileData.certifications.forEach(cert => {
        const certItem = document.createElement('div');
        certItem.className = 'mb-3';
        certItem.innerHTML = `
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h6 class="mb-1">${cert.name}</h6>
              <small class="text-muted">${cert.organization} - ${formatDate(cert.date)}</small>
              ${cert.certId ? `<small class="d-block text-muted">ID: ${cert.certId}</small>` : ''}
            </div>
            <div>
              <button class="btn btn-sm btn-outline-primary me-1" onclick="editCertification(${cert.id})"><i class="bi bi-pencil"></i></button>
              <button class="btn btn-sm btn-outline-danger" onclick="deleteCertification(${cert.id})"><i class="bi bi-trash"></i></button>
            </div>
          </div>
        `;
        container.appendChild(certItem);
      });
    }

    // Gestion des événements
    document.addEventListener('DOMContentLoaded', function() {
      // Ajouter la date actuelle
      const dateElement = document.getElementById('currentDate');
      if (dateElement) {
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const today = new Date();
        dateElement.textContent = today.toLocaleDateString('fr-FR', options);
      }

      // Initialiser les données
      renderExperiences();
      renderEducations();
      renderSkills();
      renderLanguages();
      renderCertifications();

      // Gestion de l'ajout/modification d'expérience
      document.getElementById('saveExperience').addEventListener('click', function() {
        const form = document.getElementById('experienceForm');
        if (form.checkValidity()) {
          const experience = {
            id: parseInt(document.getElementById('experienceId').value),
            jobTitle: document.getElementById('expJobTitle').value,
            companyName: document.getElementById('expCompanyName').value,
            location: document.getElementById('expLocation').value,
            startDate: document.getElementById('expStartDate').value,
            endDate: document.getElementById('expCurrentJob').checked ? '' : document.getElementById('expEndDate').value,
            current: document.getElementById('expCurrentJob').checked,
            description: document.getElementById('expDescription').value
          };
          
          if (currentEditId !== null) {
            updateExperience(currentEditId, experience);
          } else {
            addExperience(experience);
          }
          
          bootstrap.Modal.getInstance(document.getElementById('addExperienceModal')).hide();
          form.reset();
          currentEditId = null;
          currentEditType = null;
        } else {
          form.reportValidity();
        }
      });

      // Gestion de l'ajout/modification de formation
      document.getElementById('saveEducation').addEventListener('click', function() {
        const form = document.getElementById('educationForm');
        if (form.checkValidity()) {
          const education = {
            id: parseInt(document.getElementById('educationId').value),
            degree: document.getElementById('eduDegree').value,
            school: document.getElementById('eduSchool').value,
            startDate: document.getElementById('eduStartDate').value,
            endDate: document.getElementById('eduEndDate').value,
            description: document.getElementById('eduDescription').value
          };
          
          if (currentEditId !== null) {
            updateEducation(currentEditId, education);
          } else {
            addEducation(education);
          }
          
          bootstrap.Modal.getInstance(document.getElementById('addEducationModal')).hide();
          form.reset();
          currentEditId = null;
          currentEditType = null;
        } else {
          form.reportValidity();
        }
      });

      // Gestion de l'ajout/modification de compétence
      document.getElementById('saveSkill').addEventListener('click', function() {
        const form = document.getElementById('skillForm');
        if (form.checkValidity()) {
          const skill = {
            name: document.getElementById('skillName').value,
            type: document.getElementById('skillType').value,
            level: document.getElementById('skillLevel').value
          };
          
          if (currentEditId !== null) {
            updateSkill(currentEditId, skill);
          } else {
            addSkill(skill);
          }
          
          bootstrap.Modal.getInstance(document.getElementById('addSkillModal')).hide();
          form.reset();
          currentEditId = null;
          currentEditType = null;
        } else {
          form.reportValidity();
        }
      });

      // Gestion de l'ajout/modification de langue
      document.getElementById('saveLanguage').addEventListener('click', function() {
        const form = document.getElementById('languageForm');
        if (form.checkValidity()) {
          const language = {
            id: parseInt(document.getElementById('languageId').value),
            name: document.getElementById('langName').value,
            level: document.getElementById('langLevel').value
          };
          
          if (currentEditId !== null) {
            updateLanguage(currentEditId, language);
          } else {
            addLanguage(language);
          }
          
          bootstrap.Modal.getInstance(document.getElementById('addLanguageModal')).hide();
          form.reset();
          currentEditId = null;
          currentEditType = null;
        } else {
          form.reportValidity();
        }
      });

      // Gestion de l'ajout/modification de certification
      document.getElementById('saveCertification').addEventListener('click', function() {
        const form = document.getElementById('certificationForm');
        if (form.checkValidity()) {
          const certification = {
            id: parseInt(document.getElementById('certificationId').value),
            name: document.getElementById('certName').value,
            organization: document.getElementById('certOrg').value,
            date: document.getElementById('certDate').value,
            certId: document.getElementById('certId').value
          };
          
          if (currentEditId !== null) {
            updateCertification(currentEditId, certification);
          } else {
            addCertification(certification);
          }
          
          bootstrap.Modal.getInstance(document.getElementById('addCertificationModal')).hide();
          form.reset();
          currentEditId = null;
          currentEditType = null;
        } else {
          form.reportValidity();
        }
      });

      // Réinitialiser les modals lorsqu'ils sont fermés
      document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('hidden.bs.modal', function() {
          const form = this.querySelector('form');
          if (form) form.reset();
          currentEditId = null;
          currentEditType = null;
        });
      });

      // Gestion du changement de photo de profil
      const photoInput = document.getElementById('photoInput');
      const photoPreview = document.getElementById('photoPreview');
      const changePhotoBtn = document.getElementById('changePhotoBtn');
      const removePhotoBtn = document.getElementById('removePhotoBtn');
      const savePhotoBtn = document.getElementById('savePhotoBtn');
      const cancelPhotoBtn = document.getElementById('cancelPhotoBtn');
      const photoActionBtns = document.getElementById("photoActionBtns");
      let originalPhotoSrc = photoPreview.src;

      // Ouvre le sélecteur de fichier quand on clique sur "Changer"
      changePhotoBtn.addEventListener('click', function() {
        photoInput.click();
      });

      // Affiche la prévisualisation de la nouvelle photo et affiche "Enregistrer" et "Annuler", cache "Supprimer"
      photoInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
          const reader = new FileReader();
          reader.onload = function(e) {
            photoPreview.src = e.target.result;
            photoActionBtns.style.display = 'block';
            removePhotoBtn.style.display = 'none';
          }
          reader.readAsDataURL(this.files[0]);
        }
      });

      // Affiche/masque les boutons selon la sélection
      photoInput.addEventListener('input', function() {
        if (this.files.length) {
          photoActionBtns.style.display = 'block';
          removePhotoBtn.style.display = 'none';
        } else {
          photoActionBtns.style.display = 'none';
          removePhotoBtn.style.display = 'inline-block';
          photoPreview.src = originalPhotoSrc;
        }
      });

      // Annuler le changement de photo
      cancelPhotoBtn.addEventListener('click', function() {
        photoInput.value = '';
        photoPreview.src = originalPhotoSrc;
        photoActionBtns.style.display = 'none';
        removePhotoBtn.style.display = 'inline-block';
      });
    });

    function deleteSkill(competenceId) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cette compétence ?')) {
            document.getElementById('competenceIdInput').value = competenceId;
            document.getElementById('deleteSkillForm').submit();
        }
    }

    function deleteLanguage(langueId) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cette langue ?')) {
            document.getElementById('deleteLanguageId').value = langueId;
            document.getElementById('deleteLanguageForm').submit();
        }
    }
  </script>
</body>
</html>