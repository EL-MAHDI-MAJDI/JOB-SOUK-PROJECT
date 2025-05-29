<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messagerie - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  @vite(['resources/css/StyleEntreprise/messages.css'])
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoEntreprise.side-menu activePage='5' :entreprise="$entreprise" />
  </div>

  <!-- Barre de navigation supérieure -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoEntreprise.navbar :entreprise="$entreprise"/>
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="message-container">
      <!-- Colonne Contacts -->
      <div class="contact-list-container dashboard-card">
        <div class="search-container p-3 border-bottom">
          <div class="input-group">
            <span class="input-group-text bg-transparent"><i class="bi bi-search"></i></span>
            <input type="text" class="form-control border-start-0" placeholder="Rechercher un contact...">
            <button class="btn btn-primary d-flex align-items-center" type="button" id="newMessageBtn">
              <i class="bi bi-pencil-square me-2"></i> Nouveau
            </button>
          </div>
        </div>
        
        <div class="contacts-list">
          <div class="contact-item active">
            <div class="d-flex align-items-center p-3">
              <img src="https://via.placeholder.com/50" alt="Profil" class="rounded-circle me-3" width="50" height="50">
              <div class="flex-grow-1">
                <div class="d-flex justify-content-between">
                  <h6 class="fw-bold mb-1">Mohamed Amine</h6>
                  <small class="text-muted">10:30</small>
                </div>
                <p class="mb-0 text-truncate">Merci pour votre retour...</p>
              </div>
            </div>
          </div>
          
          <div class="contact-item unread">
            <div class="d-flex align-items-center p-3">
              <img src="https://via.placeholder.com/50" alt="Profil" class="rounded-circle me-3" width="50" height="50">
              <div class="flex-grow-1">
                <div class="d-flex justify-content-between">
                  <h6 class="fw-bold mb-1">Fatima Zahra</h6>
                  <small class="text-muted">Hier</small>
                </div>
                <p class="mb-0 text-truncate">Avez-vous reçu mon CV...</p>
                <span class="badge bg-primary rounded-pill">3</span>
              </div>
            </div>
          </div>
          
          <div class="contact-item">
            <div class="d-flex align-items-center p-3">
              <img src="https://via.placeholder.com/50" alt="Profil" class="rounded-circle me-3" width="50" height="50">
              <div class="flex-grow-1">
                <div class="d-flex justify-content-between">
                  <h6 class="fw-bold mb-1">Youssef Benali</h6>
                  <small class="text-muted">Lundi</small>
                </div>
                <p class="mb-0 text-truncate">Je suis disponible pour...</p>
              </div>
            </div>
          </div>
          
          <div class="contact-item">
            <div class="d-flex align-items-center p-3">
              <img src="https://via.placeholder.com/50" alt="Profil" class="rounded-circle me-3" width="50" height="50">
              <div class="flex-grow-1">
                <div class="d-flex justify-content-between">
                  <h6 class="fw-bold mb-1">Société XYZ</h6>
                  <small class="text-muted">12/05</small>
                </div>
                <p class="mb-0 text-truncate">Nous avons bien reçu...</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Colonne Chat -->
      <div class="chat-container dashboard-card">
        <div class="chat-header profile-header p-3 border-bottom">
          <div class="d-flex align-items-center">
            <div class="position-relative me-3">
              <img src="https://via.placeholder.com/80" alt="Profil" class="rounded-circle" width="80" height="80">
              <span class="online-status"></span>
            </div>
            
            <div class="flex-grow-1">
              <h4 class="fw-bold mb-1">Mohamed Amine</h4>
              <p class="text-muted mb-1">Candidat pour <strong>Développeur Full Stack</strong></p>
              
              <div class="d-flex flex-wrap mt-2">
                <span class="badge bg-light text-dark me-2 mb-2">
                  <i class="bi bi-geo-alt me-1"></i> Casablanca
                </span>
                <span class="badge bg-light text-dark me-2 mb-2">
                  <i class="bi bi-briefcase me-1"></i> 3 ans exp.
                </span>
                <span class="badge bg-light text-dark me-2 mb-2">
                  <i class="bi bi-star-fill text-warning me-1"></i> 4.8/5
                </span>
              </div>
            </div>
            
            <div class="d-flex flex-column">
              <button class="btn btn-outline-primary mb-2" id="callBtn">
                <i class="bi bi-telephone me-1"></i> Appeler
              </button>
              <button class="btn btn-outline-secondary" id="viewCvBtn">
                <i class="bi bi-file-earmark-text me-1"></i> CV
              </button>
            </div>
          </div>
        </div>
        
        <div class="messages-area">
          <div class="message received mb-3">
            <div class="message-content">
              <p>Bonjour, je vous remercie pour votre réponse positive concernant ma candidature.</p>
              <small class="text-muted">10:30</small>
            </div>
          </div>
          
          <div class="message sent mb-3">
            <div class="message-content">
              <p>Nous sommes ravis de votre intérêt. Pouvez-vous nous confirmer votre disponibilité pour un entretien jeudi à 14h ?</p>
              <small class="text-muted">10:35</small>
            </div>
          </div>
          
          <div class="message received mb-3">
            <div class="message-content">
              <p>Oui, je suis disponible jeudi à 14h. Dois-je préparer quelque chose en particulier pour cet entretien ?</p>
              <small class="text-muted">10:40</small>
            </div>
          </div>
          
          <div class="message sent mb-3">
            <div class="message-content">
              <p>Ce serait bien de préparer quelques exemples de projets sur lesquels vous avez travaillé, particulièrement en React et Node.js.</p>
              <small class="text-muted">10:42</small>
            </div>
          </div>
        </div>
        
        <div class="message-input-container border-top">
          <div class="input-group">
            <button class="btn btn-outline-secondary" type="button">
              <i class="bi bi-paperclip"></i>
            </button>
            <input type="text" class="form-control" id="messageInput" placeholder="Écrivez votre message...">
            <button class="btn btn-primary" type="button" id="sendBtn">
              <i class="bi bi-send"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Overlay pour mobile -->
  <div class="mobile-overlay"></div>

  <!-- Modal pour nouveau message -->
  <div class="modal-new-message" id="newMessageModal">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Nouveau message</h3>
        <button class="modal-close" id="closeModal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-search"></i></span>
          <input type="text" class="form-control" id="contactSearchInput" placeholder="Rechercher des contacts...">
        </div>
        <div class="search-results" id="searchResults">
          <!-- Les résultats de recherche apparaîtront ici -->
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/js/entrepriseJs/messages.js'])
</body>
</html>