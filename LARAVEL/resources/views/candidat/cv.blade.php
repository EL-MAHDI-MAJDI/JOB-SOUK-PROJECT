<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mon CV - Job Souk</title>
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

    /* Styles spécifiques à l'import de CV */
    .upload-container {
      background: white;
      border-radius: 12px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      padding: 2rem;
      margin-top: 2rem;
    }

    .upload-area {
      border: 2px dashed #ddd;
      border-radius: 8px;
      padding: 3rem;
      text-align: center;
      cursor: pointer;
      transition: all 0.3s;
      margin-bottom: 2rem;
    }

    .upload-area:hover {
      border-color: var(--primary);
      background-color: var(--primary-light);
    }

    .upload-icon {
      font-size: 3rem;
      color: var(--primary);
      margin-bottom: 1rem;
    }

    .file-info {
      display: flex;
      align-items: center;
      background-color: #f8f9fa;
      border-radius: 8px;
      padding: 1rem;
      margin-bottom: 1rem;
    }

    .file-icon {
      font-size: 1.5rem;
      margin-right: 1rem;
      color: var(--primary);
    }

    .file-details {
      flex-grow: 1;
    }

    .file-actions {
      margin-left: 1rem;
    }

    .btn-remove {
      color: #dc3545;
      background: none;
      border: none;
    }

    .btn-remove:hover {
      color: #c82333;
    }

    .parsing-results {
      margin-top: 2rem;
      padding: 1.5rem;
      background-color: #f8f9fa;
      border-radius: 8px;
    }

    .parsed-field {
      margin-bottom: 1rem;
    }

    .parsed-field label {
      font-weight: 500;
      margin-bottom: 0.5rem;
      display: block;
    }

    /* Historique des CV */
    .cv-history {
      margin-top: 3rem;
    }

    .cv-card {
      border: 1px solid #eee;
      border-radius: 8px;
      padding: 1.5rem;
      margin-bottom: 1rem;
      transition: all 0.3s;
    }

    .cv-card:hover {
      border-color: var(--primary);
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .cv-card .cv-title {
      font-weight: 600;
      margin-bottom: 0.5rem;
    }

    .cv-card .cv-date {
      font-size: 0.875rem;
      color: #6c757d;
    }

    .cv-card .cv-actions {
      margin-top: 1rem;
      display: flex;
      gap: 0.5rem;
    }

    .cv-card .cv-main {
      background-color: var(--primary-light);
      border-color: var(--primary);
    }

    /* Version mobile */
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
    <x-compoCandidat.side-menu activePage=3/>
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
          <h2 class="fw-bold mb-1">Importer mon CV</h2>
          <p class="text-muted mb-0">Téléchargez votre CV pour compléter automatiquement votre profil</p>
        </div>
      </div>
      
      <!-- Conteneur d'upload -->
      <div class="upload-container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div id="uploadArea" class="upload-area">
              <div class="upload-icon">
                <i class="bi bi-cloud-arrow-up"></i>
              </div>
              <h4>Glissez-déposez votre CV ici</h4>
              <p class="text-muted">ou cliquez pour sélectionner un fichier</p>
              <p class="small text-muted">Formats supportés: PDF, DOC, DOCX, TXT (max. 5MB)</p>
              <input type="file" id="fileInput" accept=".pdf,.doc,.docx,.txt" style="display: none;">
            </div>
            
            <div id="filePreview" style="display: none;">
              <div class="file-info">
                <div class="file-icon">
                  <i class="bi bi-file-earmark-text"></i>
                </div>
                <div class="file-details">
                  <h6 id="fileName">mon_cv.pdf</h6>
                  <small class="text-muted" id="fileSize">2.4 MB</small>
                </div>
                <div class="file-actions">
                  <button class="btn btn-remove" id="removeFile">
                    <i class="bi bi-trash"></i>
                  </button>
                </div>
              </div>
              
              <div class="d-flex justify-content-between">
                <button class="btn btn-outline-primary" id="parseBtn">
                  <i class="bi bi-magic me-2"></i>Extraire les informations
                </button>
                <button class="btn btn-primary" id="saveBtn" disabled>
                  <i class="bi bi-save me-2"></i>Enregistrer le CV
                </button>
              </div>
            </div>
            
            <div id="parsingResults" class="parsing-results" style="display: none;">
              <h5 class="mb-3">Informations extraites</h5>
              <p>Vérifiez et complétez les informations détectées depuis votre CV :</p>
              
              <div class="row">
                <div class="col-md-6">
                  <div class="parsed-field">
                    <label for="parsedName">Nom complet</label>
                    <input type="text" class="form-control" id="parsedName" value="Omar Mansouri">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="parsed-field">
                    <label for="parsedTitle">Titre professionnel</label>
                    <input type="text" class="form-control" id="parsedTitle" value="Développeur Full Stack">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="parsed-field">
                    <label for="parsedEmail">Email</label>
                    <input type="email" class="form-control" id="parsedEmail" value="contact@omarmansouri.com">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="parsed-field">
                    <label for="parsedPhone">Téléphone</label>
                    <input type="tel" class="form-control" id="parsedPhone" value="+212 6 12 34 56 78">
                  </div>
                </div>
                <div class="col-12">
                  <div class="parsed-field">
                    <label for="parsedSummary">Résumé professionnel</label>
                    <textarea class="form-control" id="parsedSummary" rows="3">Passionné par le développement web et les nouvelles technologies avec 5 ans d'expérience dans la création d'applications performantes.</textarea>
                  </div>
                </div>
              </div>
              
              <div class="mt-4">
                <h6>Expériences professionnelles détectées</h6>
                <ul class="list-group mt-2">
                  <li class="list-group-item">
                    <div class="d-flex justify-content-between">
                      <div>
                        <strong>Développeur Full Stack Senior</strong><br>
                        <small class="text-muted">TechSolutions Inc. - Janvier 2021 à Présent</small>
                      </div>
                      <div>
                        <input class="form-check-input" type="checkbox" checked>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="d-flex justify-content-between">
                      <div>
                        <strong>Développeur Frontend</strong><br>
                        <small class="text-muted">WebVision - Mars 2019 à Décembre 2020</small>
                      </div>
                      <div>
                        <input class="form-check-input" type="checkbox" checked>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              
              <div class="mt-4">
                <h6>Formations détectées</h6>
                <ul class="list-group mt-2">
                  <li class="list-group-item">
                    <div class="d-flex justify-content-between">
                      <div>
                        <strong>Master en Ingénierie Logicielle</strong><br>
                        <small class="text-muted">Université Mohammed V - 2017 à 2019</small>
                      </div>
                      <div>
                        <input class="form-check-input" type="checkbox" checked>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              
              <div class="mt-4">
                <h6>Compétences détectées</h6>
                <div class="d-flex flex-wrap gap-2 mt-2">
                  <span class="badge bg-primary">JavaScript</span>
                  <span class="badge bg-primary">React</span>
                  <span class="badge bg-primary">Node.js</span>
                  <span class="badge bg-primary">TypeScript</span>
                  <span class="badge bg-primary">MongoDB</span>
                </div>
              </div>
              
              <div class="d-flex justify-content-end mt-4">
                <button class="btn btn-primary" id="saveAllBtn">
                  <i class="bi bi-save me-2"></i>Enregistrer toutes les informations
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Historique des CV -->
      <div class="cv-history">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h3 class="fw-bold mb-0">Historique de mes CV</h3>
          <button class="btn btn-sm btn-outline-primary" id="addNewCv">
            <i class="bi bi-plus-circle me-1"></i>Ajouter un nouveau CV
          </button>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="cv-card cv-main">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h5 class="cv-title">CV Principal - Développeur Full Stack</h5>
                  <p class="cv-date">Dernière mise à jour: 15 mai 2024</p>
                </div>
                <span class="badge bg-primary">Principal</span>
              </div>
              <div class="cv-actions">
                <button class="btn btn-sm btn-outline-secondary">
                  <i class="bi bi-eye me-1"></i>Voir
                </button>
                <button class="btn btn-sm btn-outline-secondary">
                  <i class="bi bi-download me-1"></i>Télécharger
                </button>
                <button class="btn btn-sm btn-outline-danger">
                  <i class="bi bi-trash me-1"></i>Supprimer
                </button>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="cv-card">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h5 class="cv-title">CV Anglais - Software Engineer</h5>
                  <p class="cv-date">Dernière mise à jour: 10 mars 2024</p>
                </div>
              </div>
              <div class="cv-actions">
                <button class="btn btn-sm btn-outline-secondary">
                  <i class="bi bi-eye me-1"></i>Voir
                </button>
                <button class="btn btn-sm btn-outline-secondary">
                  <i class="bi bi-download me-1"></i>Télécharger
                </button>
                <button class="btn btn-sm btn-outline-danger">
                  <i class="bi bi-trash me-1"></i>Supprimer
                </button>
                <button class="btn btn-sm btn-outline-primary">
                  <i class="bi bi-star me-1"></i>Définir comme principal
                </button>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="cv-card">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h5 class="cv-title">CV Version Simple</h5>
                  <p class="cv-date">Dernière mise à jour: 5 janvier 2024</p>
                </div>
              </div>
              <div class="cv-actions">
                <button class="btn btn-sm btn-outline-secondary">
                  <i class="bi bi-eye me-1"></i>Voir
                </button>
                <button class="btn btn-sm btn-outline-secondary">
                  <i class="bi bi-download me-1"></i>Télécharger
                </button>
                <button class="btn btn-sm btn-outline-danger">
                  <i class="bi bi-trash me-1"></i>Supprimer
                </button>
                <button class="btn btn-sm btn-outline-primary">
                  <i class="bi bi-star me-1"></i>Définir comme principal
                </button>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="cv-card">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <h5 class="cv-title">Ancien CV - Version 2023</h5>
                  <p class="cv-date">Dernière mise à jour: 15 septembre 2023</p>
                </div>
              </div>
              <div class="cv-actions">
                <button class="btn btn-sm btn-outline-secondary">
                  <i class="bi bi-eye me-1"></i>Voir
                </button>
                <button class="btn btn-sm btn-outline-secondary">
                  <i class="bi bi-download me-1"></i>Télécharger
                </button>
                <button class="btn btn-sm btn-outline-danger">
                  <i class="bi bi-trash me-1"></i>Supprimer
                </button>
                <button class="btn btn-sm btn-outline-primary">
                  <i class="bi bi-star me-1"></i>Définir comme principal
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Toggle sidebar on mobile
    document.getElementById('menuToggle').addEventListener('click', function() {
      document.querySelector('.side-menu').classList.toggle('show');
    });

    // Gestion de l'upload de fichier
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('fileInput');
    const filePreview = document.getElementById('filePreview');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    const removeFile = document.getElementById('removeFile');
    const parseBtn = document.getElementById('parseBtn');
    const saveBtn = document.getElementById('saveBtn');
    const parsingResults = document.getElementById('parsingResults');
    const saveAllBtn = document.getElementById('saveAllBtn');
    const addNewCvBtn = document.getElementById('addNewCv');

    // Gestion du drag and drop
    uploadArea.addEventListener('dragover', (e) => {
      e.preventDefault();
      uploadArea.style.borderColor = 'var(--primary)';
      uploadArea.style.backgroundColor = 'var(--primary-light)';
    });

    uploadArea.addEventListener('dragleave', () => {
      uploadArea.style.borderColor = '#ddd';
      uploadArea.style.backgroundColor = 'transparent';
    });

    uploadArea.addEventListener('drop', (e) => {
      e.preventDefault();
      uploadArea.style.borderColor = '#ddd';
      uploadArea.style.backgroundColor = 'transparent';
      
      if (e.dataTransfer.files.length) {
        handleFile(e.dataTransfer.files[0]);
      }
    });

    // Gestion du clic pour sélectionner un fichier
    uploadArea.addEventListener('click', () => {
      fileInput.click();
    });

    fileInput.addEventListener('change', () => {
      if (fileInput.files.length) {
        handleFile(fileInput.files[0]);
      }
    });

    // Fonction pour gérer le fichier sélectionné
    function handleFile(file) {
      // Vérifier le type de fichier
      const validTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'text/plain'];
      const fileExtension = file.name.split('.').pop().toLowerCase();
      const validExtensions = ['pdf', 'doc', 'docx', 'txt'];
      
      if (!validTypes.includes(file.type) && !validExtensions.includes(fileExtension)) {
        alert('Format de fichier non supporté. Veuillez uploader un fichier PDF, DOC, DOCX ou TXT.');
        return;
      }
      
      // Vérifier la taille du fichier (max 5MB)
      if (file.size > 5 * 1024 * 1024) {
        alert('Le fichier est trop volumineux. Taille maximale: 5MB.');
        return;
      }
      
      // Afficher les informations du fichier
      fileName.textContent = file.name;
      fileSize.textContent = formatFileSize(file.size);
      filePreview.style.display = 'block';
      saveBtn.disabled = false;
    }

    // Formater la taille du fichier
    function formatFileSize(bytes) {
      if (bytes < 1024) return bytes + ' bytes';
      else if (bytes < 1048576) return (bytes / 1024).toFixed(1) + ' KB';
      else return (bytes / 1048576).toFixed(1) + ' MB';
    }

    // Supprimer le fichier sélectionné
    removeFile.addEventListener('click', () => {
      fileInput.value = '';
      filePreview.style.display = 'none';
      parsingResults.style.display = 'none';
    });

    // Bouton pour extraire les informations
    parseBtn.addEventListener('click', () => {
      // Simuler l'extraction des informations (en réalité, vous utiliseriez une API)
      parsingResults.style.display = 'block';
      
      // Défilement vers les résultats
      parsingResults.scrollIntoView({ behavior: 'smooth' });
    });

    // Enregistrer le CV (sans extraction)
    saveBtn.addEventListener('click', () => {
      alert('CV enregistré avec succès!');
      // Ici, vous enverriez le fichier au serveur
      
      // Simuler l'ajout à l'historique
      const cvHistory = document.querySelector('.cv-history .row');
      const newCvCard = `
        <div class="col-md-6">
          <div class="cv-card">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h5 class="cv-title">${fileInput.files[0].name}</h5>
                <p class="cv-date">Dernière mise à jour: ${new Date().toLocaleDateString('fr-FR')}</p>
              </div>
            </div>
            <div class="cv-actions">
              <button class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-eye me-1"></i>Voir
              </button>
              <button class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-download me-1"></i>Télécharger
              </button>
              <button class="btn btn-sm btn-outline-danger">
                <i class="bi bi-trash me-1"></i>Supprimer
              </button>
              <button class="btn btn-sm btn-outline-primary">
                <i class="bi bi-star me-1"></i>Définir comme principal
              </button>
            </div>
          </div>
        </div>
      `;
      cvHistory.insertAdjacentHTML('afterbegin', newCvCard);
      
      // Réinitialiser le formulaire
      fileInput.value = '';
      filePreview.style.display = 'none';
    });

    // Enregistrer toutes les informations extraites
    saveAllBtn.addEventListener('click', () => {
      alert('Toutes les informations ont été enregistrées dans votre profil!');
      // Ici, vous enverriez les données au serveur
    });

    // Bouton pour ajouter un nouveau CV
    addNewCvBtn.addEventListener('click', () => {
      document.getElementById('uploadArea').scrollIntoView({ behavior: 'smooth' });
      fileInput.click();
    });

    // Gestion des actions sur les CV de l'historique
    document.addEventListener('click', function(e) {
      // Définir comme CV principal
      if (e.target.closest('.btn-outline-primary') && e.target.closest('.cv-actions')) {
        const card = e.target.closest('.cv-card');
        // Retirer le badge "Principal" de tous les CV
        document.querySelectorAll('.cv-card').forEach(c => {
          c.classList.remove('cv-main');
          const badge = c.querySelector('.badge');
          if (badge) badge.remove();
        });
        
        // Ajouter le badge au CV sélectionné
        card.classList.add('cv-main');
        const titleDiv = card.querySelector('.d-flex.justify-content-between');
        if (titleDiv && !titleDiv.querySelector('.badge')) {
          titleDiv.insertAdjacentHTML('beforeend', '<span class="badge bg-primary">Principal</span>');
        }
        
        alert('Ce CV est maintenant défini comme votre CV principal');
      }
      
      // Supprimer un CV
      if (e.target.closest('.btn-outline-danger') && e.target.closest('.cv-actions')) {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce CV ?')) {
          const card = e.target.closest('.col-md-6');
          if (card) card.remove();
          alert('CV supprimé avec succès');
        }
      }
    });
  </script>
</body>
</html>