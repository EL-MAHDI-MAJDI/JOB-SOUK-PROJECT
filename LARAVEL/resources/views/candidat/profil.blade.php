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
    }

    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
    }

    .btn-primary:hover {
      background-color: #c0392b;
      border-color: #c0392b;
    }

    .modal-header {
      border-bottom: 1px solid #f0f0f0;
      padding: 1.5rem;
    }

    .modal-footer {
      border-top: 1px solid #f0f0f0;
      padding: 1rem 1.5rem;
    }

    .form-floating label {
      color: #6c757d;
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
  </style>
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoCandidat.side-menu activePage=2/>
  </div>

  <!-- Barre de navigation supérieure enrichie -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoCandidat.navbar />
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- En-tête -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Mon Profil</h2>
          <!-- <p class="text-muted mb-0" id="currentDate"></p> -->
        </div>
        <div class="d-flex gap-2">
          <button class="btn btn-outline-primary"><i class="bi bi-download me-2"></i>Télécharger CV</button>
          <button class="btn btn-primary"><i class="bi bi-pencil me-2"></i>Modifier Profil</button>
        </div>
      </div>
      
      <!-- Section Profil -->
      <div class="profile-header mb-4">
        <button class="edit-btn">
          <i class="bi bi-pencil"></i>
        </button>
        <div class="row align-items-center">
          <div class="col-md-2 text-center text-md-start">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Photo de profil" class="profile-avatar rounded-circle mb-3 mb-md-0">
          </div>
          <div class="col-md-6">
            <h3 class="mb-1">Omar Mansouri</h3>
            <p class="mb-2"><i class="bi bi-briefcase me-2"></i>Développeur Full Stack</p>
            <p class="mb-2"><i class="bi bi-geo-alt me-2"></i>Casablanca, Maroc</p>
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
              <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
            </h4>
            <p>
              Développeur Full Stack passionné avec 5 ans d'expérience dans la création d'applications web performantes. 
              Spécialisé en JavaScript (React, Node.js) et architectures cloud. 
              J'aime résoudre des problèmes complexes et créer des solutions innovantes qui améliorent l'expérience utilisateur.
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
                  <div class="d-flex justify-content-between">
                    <h5 class="mb-1">Développeur Full Stack Senior</h5>
                    <span class="badge bg-primary">Actuel</span>
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
                  <!-- Compétences techniques seront ajoutées ici -->
                  <span class="skill-badge">JavaScript <i class="bi bi-check-circle ms-1"></i></span>
                  <span class="skill-badge">React <i class="bi bi-check-circle ms-1"></i></span>
                  <span class="skill-badge">Node.js <i class="bi bi-check-circle ms-1"></i></span>
                  <span class="skill-badge">TypeScript <i class="bi bi-check-circle ms-1"></i></span>
                  <span class="skill-badge">GraphQL <i class="bi bi-check-circle ms-1"></i></span>
                  <span class="skill-badge">MongoDB <i class="bi bi-check-circle ms-1"></i></span>
                  <span class="skill-badge">Docker <i class="bi bi-check-circle ms-1"></i></span>
                  <span class="skill-badge">AWS <i class="bi bi-check-circle ms-1"></i></span>
                </div>
              </div>
              
              <div class="mb-3">
                <h6 class="mb-2">Soft Skills</h6>
                <div class="d-flex flex-wrap gap-2" id="soft-skills">
                  <!-- Soft skills seront ajoutées ici -->
                  <span class="skill-badge">Leadership</span>
                  <span class="skill-badge">Communication</span>
                  <span class="skill-badge">Travail d'équipe</span>
                  <span class="skill-badge">Résolution de problèmes</span>
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
              <!-- Les langues seront ajoutées ici dynamiquement -->
              <div class="mb-3">
                <div class="d-flex justify-content-between">
                  <span>Arabe</span>
                  <small>Langue maternelle</small>
                </div>
                <div class="language-level">
                  <div class="language-level-fill" style="width: 100%"></div>
                </div>
              </div>
              
              <div class="mb-3">
                <div class="d-flex justify-content-between">
                  <span>Français</span>
                  <small>Courant</small>
                </div>
                <div class="language-level">
                  <div class="language-level-fill" style="width: 90%"></div>
                </div>
              </div>
              
              <div class="mb-3">
                <div class="d-flex justify-content-between">
                  <span>Anglais</span>
                  <small>Professionnel</small>
                </div>
                <div class="language-level">
                  <div class="language-level-fill" style="width: 80%"></div>
                </div>
              </div>
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
                <h6 class="mb-1">AWS Certified Developer</h6>
                <small class="text-muted">Amazon Web Services - 2022</small>
              </div>
              
              <div class="mb-3">
                <h6 class="mb-1">React Advanced Concepts</h6>
                <small class="text-muted">Frontend Masters - 2021</small>
              </div>
              
              <div>
                <h6 class="mb-1">Node.js: Microservices Architecture</h6>
                <small class="text-muted">Udemy - 2020</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modals pour l'ajout d'éléments -->

  <!-- Modal Ajout Expérience -->
  <div class="modal fade" id="addExperienceModal" tabindex="-1" aria-labelledby="addExperienceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addExperienceModalLabel">Ajouter une expérience professionnelle</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="experienceForm">
            <div class="row g-3">
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="jobTitle" placeholder="Titre du poste" required>
                  <label for="jobTitle">Titre du poste</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="companyName" placeholder="Nom de l'entreprise" required>
                  <label for="companyName">Entreprise</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="location" placeholder="Lieu" required>
                  <label for="location">Lieu</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-floating">
                  <input type="month" class="form-control" id="startDate" placeholder="Date de début" required>
                  <label for="startDate">Date de début</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-floating">
                  <input type="month" class="form-control" id="endDate" placeholder="Date de fin">
                  <label for="endDate">Date de fin</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="currentJob">
                  <label class="form-check-label" for="currentJob">
                    J'occupe actuellement ce poste
                  </label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control" id="jobDescription" style="height: 120px" placeholder="Description" required></textarea>
                  <label for="jobDescription">Description</label>
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

  <!-- Modal Ajout Formation -->
  <div class="modal fade" id="addEducationModal" tabindex="-1" aria-labelledby="addEducationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addEducationModalLabel">Ajouter une formation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="educationForm">
            <div class="row g-3">
              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="degree" placeholder="Diplôme" required>
                  <label for="degree">Diplôme</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="school" placeholder="Établissement" required>
                  <label for="school">Établissement</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="month" class="form-control" id="educationStartDate" placeholder="Date de début" required>
                  <label for="educationStartDate">Date de début</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="month" class="form-control" id="educationEndDate" placeholder="Date de fin">
                  <label for="educationEndDate">Date de fin</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control" id="educationDescription" style="height: 100px" placeholder="Description"></textarea>
                  <label for="educationDescription">Description</label>
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

  <!-- Modal Ajout Compétence -->
  <div class="modal fade" id="addSkillModal" tabindex="-1" aria-labelledby="addSkillModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addSkillModalLabel">Ajouter une compétence</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="skillForm">
            <div class="row g-3">
              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="skillName" placeholder="Nom de la compétence" required>
                  <label for="skillName">Compétence</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <select class="form-select" id="skillType" required>
                    <option value="technical">Technique</option>
                    <option value="soft">Soft Skill</option>
                  </select>
                  <label for="skillType">Type de compétence</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <select class="form-select" id="skillLevel" required>
                    <option value="1">Débutant</option>
                    <option value="2">Intermédiaire</option>
                    <option value="3">Avancé</option>
                    <option value="4">Expert</option>
                  </select>
                  <label for="skillLevel">Niveau</label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary" id="saveSkill">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Ajout Langue -->
  <div class="modal fade" id="addLanguageModal" tabindex="-1" aria-labelledby="addLanguageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addLanguageModalLabel">Ajouter une langue</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="languageForm">
            <div class="row g-3">
              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="languageName" placeholder="Langue" required>
                  <label for="languageName">Langue</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <select class="form-select" id="languageLevel" required>
                    <option value="native">Langue maternelle</option>
                    <option value="fluent">Courant</option>
                    <option value="professional">Professionnel</option>
                    <option value="intermediate">Intermédiaire</option>
                    <option value="basic">Basique</option>
                  </select>
                  <label for="languageLevel">Niveau</label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary" id="saveLanguage">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Ajout Certification -->
  <div class="modal fade" id="addCertificationModal" tabindex="-1" aria-labelledby="addCertificationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCertificationModalLabel">Ajouter une certification</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="certificationForm">
            <div class="row g-3">
              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="certificationName" placeholder="Nom de la certification" required>
                  <label for="certificationName">Certification</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="certificationOrg" placeholder="Organisation" required>
                  <label for="certificationOrg">Organisation</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <input type="month" class="form-control" id="certificationDate" placeholder="Date d'obtention" required>
                  <label for="certificationDate">Date d'obtention</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="certificationId" placeholder="ID de certification">
                  <label for="certificationId">ID de certification (optionnel)</label>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Fonctions pour gérer l'ajout dynamique d'éléments
    function addExperience(experience) {
      const container = document.getElementById('experiences-container');
      
      const experienceItem = document.createElement('div');
      experienceItem.className = 'timeline-item';
      
      const isCurrent = experience.endDate === '' || experience.currentJob;
      const endDateText = isCurrent ? 'Présent' : experience.endDate;
      
      experienceItem.innerHTML = `
        <div class="timeline-badge">
          <i class="bi bi-briefcase"></i>
        </div>
        <div class="timeline-content">
          <div class="d-flex justify-content-between">
            <h5 class="mb-1">${experience.jobTitle}</h5>
            ${isCurrent ? '<span class="badge bg-primary">Actuel</span>' : ''}
          </div>
          <p class="mb-1 text-muted">${experience.companyName} - ${experience.location}</p>
          <small class="text-muted">${experience.startDate} - ${endDateText}</small>
          <p class="mt-2 mb-0">${experience.jobDescription.replace(/\n/g, '<br>')}</p>
        </div>
      `;
      
      container.insertBefore(experienceItem, container.firstChild);
    }

    function addEducation(education) {
      const container = document.getElementById('educations-container');
      
      const educationItem = document.createElement('div');
      educationItem.className = 'timeline-item';
      
      educationItem.innerHTML = `
        <div class="timeline-badge">
          <i class="bi bi-mortarboard"></i>
        </div>
        <div class="timeline-content">
          <h5 class="mb-1">${education.degree}</h5>
          <p class="mb-1 text-muted">${education.school}</p>
          <small class="text-muted">${education.startDate} - ${education.endDate || 'Présent'}</small>
          ${education.description ? `<p class="mt-2 mb-0">${education.description.replace(/\n/g, '<br>')}</p>` : ''}
        </div>
      `;
      
      container.insertBefore(educationItem, container.firstChild);
    }

    function addSkill(skill) {
      const containerId = skill.type === 'technical' ? 'technical-skills' : 'soft-skills';
      const container = document.getElementById(containerId);
      
      const skillBadge = document.createElement('span');
      skillBadge.className = 'skill-badge';
      skillBadge.innerHTML = `${skill.name} <i class="bi bi-check-circle ms-1"></i>`;
      
      container.appendChild(skillBadge);
    }

    function addLanguage(language) {
      const container = document.getElementById('languages-container');
      
      const levelMap = {
        'native': {text: 'Langue maternelle', width: '100%'},
        'fluent': {text: 'Courant', width: '90%'},
        'professional': {text: 'Professionnel', width: '80%'},
        'intermediate': {text: 'Intermédiaire', width: '60%'},
        'basic': {text: 'Basique', width: '40%'}
      };
      
      const levelInfo = levelMap[language.level] || levelMap['basic'];
      
      const languageItem = document.createElement('div');
      languageItem.className = 'mb-3';
      languageItem.innerHTML = `
        <div class="d-flex justify-content-between">
          <span>${language.name}</span>
          <small>${levelInfo.text}</small>
        </div>
        <div class="language-level">
          <div class="language-level-fill" style="width: ${levelInfo.width}"></div>
        </div>
      `;
      
      container.insertBefore(languageItem, container.firstChild);
    }

    function addCertification(certification) {
      const container = document.getElementById('certifications-container');
      
      const certItem = document.createElement('div');
      certItem.className = 'mb-3';
      certItem.innerHTML = `
        <h6 class="mb-1">${certification.name}</h6>
        <small class="text-muted">${certification.organization} - ${certification.date}</small>
        ${certification.id ? `<small class="d-block text-muted">ID: ${certification.id}</small>` : ''}
      `;
      
      container.insertBefore(certItem, container.firstChild);
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

      // Gestion du menu mobile
      document.getElementById('menuToggle').addEventListener('click', function() {
        document.querySelector('.side-menu').classList.toggle('show');
      });

      // Gestion de l'ajout d'expérience
      document.getElementById('saveExperience').addEventListener('click', function() {
        const form = document.getElementById('experienceForm');
        if (form.checkValidity()) {
          const experience = {
            jobTitle: document.getElementById('jobTitle').value,
            companyName: document.getElementById('companyName').value,
            location: document.getElementById('location').value,
            startDate: document.getElementById('startDate').value,
            endDate: document.getElementById('endDate').value,
            currentJob: document.getElementById('currentJob').checked,
            jobDescription: document.getElementById('jobDescription').value
          };
          
          addExperience(experience);
          bootstrap.Modal.getInstance(document.getElementById('addExperienceModal')).hide();
          form.reset();
        } else {
          form.reportValidity();
        }
      });

      // Gestion de l'ajout de formation
      document.getElementById('saveEducation').addEventListener('click', function() {
        const form = document.getElementById('educationForm');
        if (form.checkValidity()) {
          const education = {
            degree: document.getElementById('degree').value,
            school: document.getElementById('school').value,
            startDate: document.getElementById('educationStartDate').value,
            endDate: document.getElementById('educationEndDate').value,
            description: document.getElementById('educationDescription').value
          };
          
          addEducation(education);
          bootstrap.Modal.getInstance(document.getElementById('addEducationModal')).hide();
          form.reset();
        } else {
          form.reportValidity();
        }
      });

      // Gestion de l'ajout de compétence
      document.getElementById('saveSkill').addEventListener('click', function() {
        const form = document.getElementById('skillForm');
        if (form.checkValidity()) {
          const skill = {
            name: document.getElementById('skillName').value,
            type: document.getElementById('skillType').value,
            level: document.getElementById('skillLevel').value
          };
          
          addSkill(skill);
          bootstrap.Modal.getInstance(document.getElementById('addSkillModal')).hide();
          form.reset();
        } else {
          form.reportValidity();
        }
      });

      // Gestion de l'ajout de langue
      document.getElementById('saveLanguage').addEventListener('click', function() {
        const form = document.getElementById('languageForm');
        if (form.checkValidity()) {
          const language = {
            name: document.getElementById('languageName').value,
            level: document.getElementById('languageLevel').value
          };
          
          addLanguage(language);
          bootstrap.Modal.getInstance(document.getElementById('addLanguageModal')).hide();
          form.reset();
        } else {
          form.reportValidity();
        }
      });

      // Gestion de l'ajout de certification
      document.getElementById('saveCertification').addEventListener('click', function() {
        const form = document.getElementById('certificationForm');
        if (form.checkValidity()) {
          const certification = {
            name: document.getElementById('certificationName').value,
            organization: document.getElementById('certificationOrg').value,
            date: document.getElementById('certificationDate').value,
            id: document.getElementById('certificationId').value
          };
          
          addCertification(certification);
          bootstrap.Modal.getInstance(document.getElementById('addCertificationModal')).hide();
          form.reset();
        } else {
          form.reportValidity();
        }
      });
    });
  </script>
</body>
</html>