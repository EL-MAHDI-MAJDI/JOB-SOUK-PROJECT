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

    /* Nouveaux styles pour la version simplifiée */
    .current-cv-container {
      background: white;
      border-radius: 12px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      padding: 2rem;
      margin-top: 2rem;
    }

    .no-cv-message {
      text-align: center;
      padding: 2rem;
      color: #6c757d;
    }

    .cv-preview {
      border: 1px solid #eee;
      border-radius: 8px;
      padding: 1.5rem;
      margin-bottom: 1rem;
    }

    .cv-preview h5 {
      font-weight: 600;
      margin-bottom: 0.5rem;
    }

    .cv-preview .cv-date {
      font-size: 0.875rem;
      color: #6c757d;
      margin-bottom: 1rem;
    }

    .cv-actions {
      display: flex;
      gap: 0.5rem;
    }
  </style>
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoCandidat.side-menu activePage=3 :candidat='$candidat'/>
  </div>

  <!-- Barre de navigation supérieure enrichie -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoCandidat.navbar :candidat='$candidat'/>
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
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
          <h2 class="fw-bold mb-1">Mon CV</h2>
          <p class="text-muted mb-0">Téléchargez votre CV pour compléter votre profil</p>
        </div>
      </div>
      
      <!-- Conteneur d'upload -->
      <div class="upload-container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <form action="{{ route('candidat.cv.store', $candidat) }}" method="POST" enctype="multipart/form-data" id="cvForm">
                @csrf
                <div class="upload-area" id="uploadArea">
                    <i class="bi bi-cloud-upload upload-icon"></i>
                    <h4>Glissez-déposez votre CV ici</h4>
                    <p class="text-muted">ou cliquez pour sélectionner un fichier</p>
                    <p class="small text-muted">Formats supportés: PDF, DOC, DOCX (max. 5MB)</p>
                    <input type="file" name="cv_file" id="cv_file" accept=".pdf,.doc,.docx" style="display: none;">
                </div>

                <div id="filePreview" style="display: none;">
                    <div class="file-info">
                        <div class="file-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <div class="file-details">
                            <h6 id="fileName"></h6>
                            <small class="text-muted" id="fileSize"></small>
                        </div>
                        <div class="file-actions">
                            <button type="button" class="btn btn-remove" id="removeFile">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-2"></i>Enregistrer le CV
                        </button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>

      <!-- CV actuel -->
      <div class="current-cv-container">
        <h3 class="fw-bold mb-4">Mon CV actuel</h3>
        
        <div id="currentCv">
          @if($candidat->cv)
              <div class="cv-preview">
                  <div class="d-flex justify-content-between align-items-start">
                      <div>
                          <h5>{{ $candidat->cv->nom_fichier }}</h5>
                          <p class="cv-date">Téléchargé le: {{ $candidat->cv->created_at->format('d/m/Y') }}</p>
                      </div>
                  </div>
                  <div class="cv-actions">
                      <a href="{{ Storage::url($candidat->cv->fichier) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                          <i class="bi bi-eye me-1"></i>Voir
                      </a>
                      {{-- <a href="{{ Storage::url($candidat->cv->fichier) }}" download class="btn btn-sm btn-outline-secondary">
                          <i class="bi bi-download me-1"></i>Télécharger
                      </a> --}}
                      <form action="{{ route('candidat.cv.destroy', $candidat) }}" method="POST" class="d-inline" 
                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre CV ?');">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-outline-danger">
                              <i class="bi bi-trash me-1"></i>Supprimer
                          </button>
                      </form>
                  </div>
              </div>
          @else
              <div class="no-cv-message">
                  <i class="bi bi-file-earmark-text" style="font-size: 3rem; color: #6c757d; margin-bottom: 1rem;"></i>
                  <h4>Aucun CV enregistré</h4>
                  <p class="text-muted">Vous n'avez pas encore téléchargé de CV. Ajoutez votre CV pour compléter votre profil.</p>
              </div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Variables globales
    let currentCvFile = null;

    // Toggle sidebar on mobile
    document.getElementById('menuToggle').addEventListener('click', function() {
      document.querySelector('.side-menu').classList.toggle('show');
    });

    // Gestion de l'upload de fichier
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('cv_file');
    const filePreview = document.getElementById('filePreview');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    const removeFile = document.getElementById('removeFile');

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
        const validTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        const fileExtension = file.name.split('.').pop().toLowerCase();
        const validExtensions = ['pdf', 'doc', 'docx'];
        
        if (!validTypes.includes(file.type) && !validExtensions.includes(fileExtension)) {
            alert('Format de fichier non supporté. Veuillez uploader un fichier PDF, DOC ou DOCX.');
            return;
        }
        
        if (file.size > 5 * 1024 * 1024) {
            alert('Le fichier est trop volumineux. Taille maximale: 5MB.');
            return;
        }
        
        fileName.textContent = file.name;
        fileSize.textContent = formatFileSize(file.size);
        filePreview.style.display = 'block';
        uploadArea.style.display = 'none';
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
        uploadArea.style.display = 'block';
    });
  </script>
</body>
</html>