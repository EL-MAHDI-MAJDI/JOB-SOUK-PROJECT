<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notifications - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" as="style">
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

    /* Style pour les notifications */
    .notification-item {
      position: relative;
      padding: 1rem 1.5rem;
      border-bottom: 1px solid #f0f0f0;
      transition: all 0.2s ease;
    }

    .notification-item:hover {
      background-color: #f9f9f9;
    }

    .notification-item.unread {
      background-color: var(--primary-light);
    }

    .notification-time {
      font-size: 0.75rem;
      color: #6c757d;
    }

    .notification-icon {
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      margin-right: 1rem;
      flex-shrink: 0;
    }

    .notification-icon.application {
      background-color: rgba(52, 152, 219, 0.1);
      color: #3498db;
    }

    .notification-icon.interview {
      background-color: rgba(46, 204, 113, 0.1);
      color: var(--secondary);
    }

    .notification-icon.message {
      background-color: rgba(155, 89, 182, 0.1);
      color: #9b59b6;
    }

    .notification-icon.alert {
      background-color: rgba(231, 76, 60, 0.1);
      color: var(--primary);
    }

    .notification-dot {
      position: absolute;
      top: 1.5rem;
      right: 1.5rem;
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background-color: var(--primary);
    }

    /* Filtres */
    .filter-badge {
      padding: 0.5rem 1rem;
      border-radius: 20px;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .filter-badge:hover, .filter-badge.active {
      background-color: var(--primary);
      color: white;
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

    /* Bouton scroll to top */
    #scrollTop {
      position: fixed;
      bottom: 30px;
      right: 30px;
      display: none;
      z-index: 1050;
    }
    
    .p-3 {
      height: 47px;
    }
  </style>
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoCandidat.side-menu activePage=9/>
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
          <h2 class="fw-bold mb-1">Notifications</h2>
          <p class="text-muted mb-0">Gérez toutes vos alertes et activités récentes</p>
        </div>
        <div class="d-flex gap-2">
          <button class="btn btn-outline-primary" id="markAllRead">
            <i class="bi bi-check-all me-2"></i>Tout marquer comme lu
          </button>
          <button class="btn btn-outline-danger" id="deleteAll">
            <i class="bi bi-trash me-2"></i>Tout supprimer
          </button>
        </div>
      </div>
      
      <!-- Filtres -->
      <div class="d-flex flex-wrap gap-2 mb-4">
        <span class="filter-badge active" data-filter="all">Toutes</span>
        <span class="filter-badge" data-filter="unread">Non lues</span>
        <span class="filter-badge" data-filter="application">Candidatures</span>
        <span class="filter-badge" data-filter="interview">Entretiens</span>
        <span class="filter-badge" data-filter="message">Messages</span>
        <span class="filter-badge" data-filter="alert">Alertes</span>
      </div>
      
      <!-- Liste des notifications -->
      <div class="dashboard-card p-0">
        <!-- Notification 1 - Non lue -->
        <div class="notification-item unread" data-type="application">
          <div class="d-flex align-items-start">
            <div class="notification-icon application">
              <i class="bi bi-briefcase"></i>
            </div>
            <div class="flex-grow-1">
              <h6 class="fw-bold mb-1">Votre candidature a été examinée</h6>
              <p class="mb-2">MegaSoft a examiné votre candidature pour le poste de Développeur Full Stack</p>
              <span class="notification-time"><i class="bi bi-clock me-1"></i>Il y a 1 heure</span>
            </div>
            <div class="notification-dot"></div>
          </div>
        </div>
        
        <!-- Notification 2 - Non lue -->
        <div class="notification-item unread" data-type="interview">
          <div class="d-flex align-items-start">
            <div class="notification-icon interview">
              <i class="bi bi-calendar-event"></i>
            </div>
            <div class="flex-grow-1">
              <h6 class="fw-bold mb-1">Entretien programmé</h6>
              <p class="mb-2">DataTech a programmé un entretien pour le poste d'Ingénieur Frontend React</p>
              <span class="notification-time"><i class="bi bi-clock me-1"></i>Il y a 3 heures</span>
            </div>
            <div class="notification-dot"></div>
          </div>
        </div>
        
        <!-- Notification 3 - Lue -->
        <div class="notification-item" data-type="message">
          <div class="d-flex align-items-start">
            <div class="notification-icon message">
              <i class="bi bi-chat-dots"></i>
            </div>
            <div class="flex-grow-1">
              <h6 class="fw-bold mb-1">Nouveau message</h6>
              <p class="mb-2">Vous avez reçu un nouveau message de la part de Karim Lahlou (Tech Lead)</p>
              <span class="notification-time"><i class="bi bi-clock me-1"></i>Il y a 5 heures</span>
            </div>
          </div>
        </div>
        
        <!-- Notification 4 - Lue -->
        <div class="notification-item" data-type="application">
          <div class="d-flex align-items-start">
            <div class="notification-icon application">
              <i class="bi bi-briefcase"></i>
            </div>
            <div class="flex-grow-1">
              <h6 class="fw-bold mb-1">Candidature acceptée</h6>
              <p class="mb-2">MarocDigital a accepté votre candidature pour le poste de Développeur Backend Node.js</p>
              <span class="notification-time"><i class="bi bi-clock me-1"></i>Hier, 14:30</span>
            </div>
          </div>
        </div>
        
        <!-- Notification 5 - Lue -->
        <div class="notification-item" data-type="alert">
          <div class="d-flex align-items-start">
            <div class="notification-icon alert">
              <i class="bi bi-exclamation-triangle"></i>
            </div>
            <div class="flex-grow-1">
              <h6 class="fw-bold mb-1">Alerte d'emploi</h6>
              <p class="mb-2">Nouvelle offre correspondant à votre profil : Développeur Mobile Flutter chez AppWave</p>
              <span class="notification-time"><i class="bi bi-clock me-1"></i>Hier, 10:15</span>
            </div>
          </div>
        </div>
        
        <!-- Notification 6 - Lue -->
        <div class="notification-item" data-type="interview">
          <div class="d-flex align-items-start">
            <div class="notification-icon interview">
              <i class="bi bi-calendar-check"></i>
            </div>
            <div class="flex-grow-1">
              <h6 class="fw-bold mb-1">Rappel d'entretien</h6>
              <p class="mb-2">N'oubliez pas votre entretien avec MegaSoft demain à 10:00</p>
              <span class="notification-time"><i class="bi bi-clock me-1"></i>Avant-hier, 18:00</span>
            </div>
          </div>
        </div>
        
        <!-- Notification 7 - Lue -->
        <div class="notification-item" data-type="message">
          <div class="d-flex align-items-start">
            <div class="notification-icon message">
              <i class="bi bi-chat-left-text"></i>
            </div>
            <div class="flex-grow-1">
              <h6 class="fw-bold mb-1">Message du recruteur</h6>
              <p class="mb-2">Meryem Tazi vous a envoyé des détails sur le processus de recrutement</p>
              <span class="notification-time"><i class="bi bi-clock me-1"></i>Avant-hier, 12:45</span>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Pagination -->
      <nav aria-label="Page navigation" class="mt-4">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précédent</a>
          </li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Suivant</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>

  <!-- Bouton scroll to top -->
  <button id="scrollTop" class="btn btn-danger">
    <i class="bi bi-arrow-up"></i>
  </button>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Afficher/masquer le bouton de retour en haut
    window.onscroll = function() {
      const scrollBtn = document.getElementById("scrollTop");
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollBtn.style.display = "block";
      } else {
        scrollBtn.style.display = "none";
      }
    };

    // Scroll to top
    document.getElementById("scrollTop").addEventListener("click", function() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    });

    // Toggle sidebar on mobile
    document.getElementById('menuToggle').addEventListener('click', function() {
      document.querySelector('.side-menu').classList.toggle('show');
    });

    // Filtrer les notifications
    document.querySelectorAll('.filter-badge').forEach(badge => {
      badge.addEventListener('click', function() {
        // Retirer la classe active de tous les badges
        document.querySelectorAll('.filter-badge').forEach(b => b.classList.remove('active'));
        
        // Ajouter la classe active au badge cliqué
        this.classList.add('active');
        
        const filter = this.getAttribute('data-filter');
        const notifications = document.querySelectorAll('.notification-item');
        
        notifications.forEach(notification => {
          if (filter === 'all') {
            notification.style.display = 'block';
          } else if (filter === 'unread') {
            if (notification.classList.contains('unread')) {
              notification.style.display = 'block';
            } else {
              notification.style.display = 'none';
            }
          } else {
            if (notification.getAttribute('data-type') === filter) {
              notification.style.display = 'block';
            } else {
              notification.style.display = 'none';
            }
          }
        });
      });
    });

    // Marquer toutes les notifications comme lues
    document.getElementById('markAllRead').addEventListener('click', function() {
      document.querySelectorAll('.notification-item.unread').forEach(notification => {
        notification.classList.remove('unread');
        const dot = notification.querySelector('.notification-dot');
        if (dot) dot.remove();
      });
      
      // Mettre à jour le compteur dans la navbar
      document.querySelectorAll('.badge.bg-danger').forEach(badge => {
        badge.textContent = '0';
      });
      
      // Mettre à jour le compteur dans le menu latéral
      document.querySelector('.side-menu .badge.rounded-pill').textContent = '0';
    });

    // Supprimer toutes les notifications
    document.getElementById('deleteAll').addEventListener('click', function() {
      if (confirm('Voulez-vous vraiment supprimer toutes vos notifications ? Cette action est irréversible.')) {
        document.querySelectorAll('.notification-item').forEach(notification => {
          notification.remove();
        });
        
        // Mettre à jour le compteur dans la navbar
        document.querySelectorAll('.badge.bg-danger').forEach(badge => {
          badge.textContent = '0';
        });
        
        // Mettre à jour le compteur dans le menu latéral
        document.querySelector('.side-menu .badge.rounded-pill').textContent = '0';
        
        // Afficher un message quand il n'y a pas de notifications
        const card = document.querySelector('.dashboard-card');
        card.innerHTML = '<div class="text-center p-5"><i class="bi bi-bell-slash display-4 text-muted mb-3"></i><h5 class="text-muted">Aucune notification</h5></div>';
      }
    });

    // Marquer une notification comme lue lorsqu'on clique dessus
    document.querySelectorAll('.notification-item').forEach(notification => {
      notification.addEventListener('click', function() {
        if (this.classList.contains('unread')) {
          this.classList.remove('unread');
          const dot = this.querySelector('.notification-dot');
          if (dot) dot.remove();
          
          // Mettre à jour le compteur
          const unreadCount = document.querySelectorAll('.notification-item.unread').length;
          document.querySelectorAll('.badge.bg-danger').forEach(badge => {
            badge.textContent = unreadCount;
          });
          
          // Mettre à jour le compteur dans le menu latéral
          document.querySelector('.side-menu .badge.rounded-pill').textContent = unreadCount;
        }
      });
    });
  </script>
</body>
</html>