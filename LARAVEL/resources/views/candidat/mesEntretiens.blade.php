<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mes entretiens - Job Souk</title>
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

    /* Styles spécifiques aux entretiens */
    .interview-card {
      border-left: 4px solid var(--primary);
      transition: all 0.3s ease;
      margin-bottom: 1.5rem;
    }

    .interview-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .company-logo {
      width: 60px;
      height: 60px;
      object-fit: contain;
      border-radius: 8px;
      border: 1px solid #eee;
    }

    .filter-card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      padding: 1.5rem;
      margin-bottom: 1.5rem;
    }

    .status-badge {
      padding: 0.35em 0.65em;
      border-radius: 50rem;
      font-size: 0.75em;
      font-weight: 700;
    }

    .status-badge.scheduled {
      background-color: #17a2b8;
      color: #fff;
    }

    .status-badge.completed {
      background-color: #28a745;
      color: #fff;
    }

    .status-badge.canceled {
      background-color: #dc3545;
      color: #fff;
    }

    .status-badge.pending {
      background-color: #ffc107;
      color: #000;
    }

    .empty-state {
      text-align: center;
      padding: 4rem 0;
    }

    .empty-state-icon {
      font-size: 5rem;
      color: #dee2e6;
      margin-bottom: 1.5rem;
    }

    /* Bouton scroll to top */
    #scrollTop {
      position: fixed;
      bottom: 30px;
      right: 30px;
      display: none;
      z-index: 1050;
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
      height: auto;
    }

    .interview-type {
      padding: 0.25rem 0.75rem;
      border-radius: 50px;
      font-size: 0.85rem;
      font-weight: 500;
    }

    .type-onsite {
      background-color: #D4EDDA;
      color: #155724;
    }

    .type-remote {
      background-color: #CCE5FF;
      color: #004085;
    }

    .type-phone {
      background-color: #FFF3CD;
      color: #856404;
    }

    /* Styles spécifiques aux modales */
    .modal-header {
      border-bottom: none;
      padding-bottom: 0;
    }
    
    .modal-footer {
      border-top: none;
    }
    
    .modal-content {
      border-radius: 12px;
      border: none;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    .modal-body {
      padding: 1.5rem;
    }
    
    .interview-details dt {
      font-weight: 500;
      color: var(--text-main);
    }
    
    .interview-details dd {
      margin-bottom: 1rem;
    }
    
    .feedback-rating {
      font-size: 1.5rem;
      color: #ffc107;
      cursor: pointer;
    }
    .p-3 {
        height: 47px;
    }
  </style>
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoCandidat.side-menu activePage=7 :candidat='$candidat' />
  </div>

  <!-- Barre de navigation supérieure enrichie -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoCandidat.navbar :candidat='$candidat' />
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- En-tête -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Mes entretiens</h2>
        </div>
        <div class="d-flex gap-2">
          <button class="btn btn-outline-primary"><i class="bi bi-filter me-2"></i>Filtrer</button>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addInterviewModal"><i class="bi bi-plus me-2"></i>Ajouter un entretien</button>
        </div>
      </div>

      <!-- Filtres -->
      <div class="filter-card mb-4">
        <div class="row g-3">
          <div class="col-md-3">
            <label class="form-label">Statut</label>
            <select class="form-select">
              <option selected>Tous les statuts</option>
              <option>Programmé</option>
              <option>Terminé</option>
              <option>Annulé</option>
              <option>En attente</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Type d'entretien</label>
            <select class="form-select">
              <option selected>Tous les types</option>
              <option>En personne</option>
              <option>À distance</option>
              <option>Téléphonique</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Date</label>
            <select class="form-select">
              <option selected>Toutes les dates</option>
              <option>Aujourd'hui</option>
              <option>Cette semaine</option>
              <option>Ce mois</option>
              <option>Passés</option>
              <option>Futurs</option>
            </select>
          </div>
          <div class="col-md-3 d-flex align-items-end">
            <button class="btn btn-outline-danger w-100">
              <i class="bi bi-trash me-2"></i>Supprimer la sélection
            </button>
          </div>
        </div>
      </div>

      <!-- Liste des entretiens -->
      <div class="row">
        <div class="col-12">
          <!-- Entretien 1 -->
          <div class="interview-card card mb-3">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-md-1 text-center">
                  <img src="https://via.placeholder.com/60" alt="Logo" class="company-logo">
                </div>
                <div class="col-md-7">
                  <h5 class="mb-1">Entretien technique - Développeur Full Stack</h5>
                  <p class="text-muted mb-2">TechSolutions Inc.</p>
                  <div class="d-flex flex-wrap gap-2 align-items-center">
                    <span class="status-badge scheduled">Programmé</span>
                    <span class="interview-type type-onsite">En personne</span>
                    <span class="text-muted"><i class="bi bi-calendar me-1"></i>15 Juin 2023 - 10:00</span>
                    <span class="text-muted"><i class="bi bi-clock me-1"></i>Durée: 1h</span>
                    <span class="text-muted"><i class="bi bi-geo-alt me-1"></i>Tour Casablanca, étage 12</span>
                  </div>
                </div>
                <div class="col-md-4 text-end">
                  <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#confirmInterviewModal"><i class="bi bi-calendar-check me-1"></i>Confirmer</button>
                  <button class="btn btn-outline-secondary me-2" data-bs-toggle="modal" data-bs-target="#editInterviewModal"><i class="bi bi-pencil me-1"></i>Modifier</button>
                  <button class="btn btn-outline-danger cancel-btn" title="Annuler" data-bs-toggle="modal" data-bs-target="#cancelInterviewModal">
                    <i class="bi bi-x-circle"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Entretien 2 -->
          <div class="interview-card card mb-3">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-md-1 text-center">
                  <img src="https://via.placeholder.com/60" alt="Logo" class="company-logo">
                </div>
                <div class="col-md-7">
                  <h5 class="mb-1">Entretien RH - Chef de Projet IT</h5>
                  <p class="text-muted mb-2">TechInnov</p>
                  <div class="d-flex flex-wrap gap-2 align-items-center">
                    <span class="status-badge completed">Terminé</span>
                    <span class="interview-type type-remote">À distance</span>
                    <span class="text-muted"><i class="bi bi-calendar me-1"></i>10 Juin 2023 - 14:30</span>
                    <span class="text-muted"><i class="bi bi-clock me-1"></i>Durée: 45min</span>
                    <span class="text-muted"><i class="bi bi-link-45deg me-1"></i>Lien Zoom envoyé</span>
                  </div>
                </div>
                <div class="col-md-4 text-end">
                  <button class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#interviewDetailsModal"><i class="bi bi-eye me-1"></i>Détails</button>
                  <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#feedbackModal"><i class="bi bi-check-circle me-1"></i>Feedback</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Entretien 3 -->
          <div class="interview-card card mb-3">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-md-1 text-center">
                  <img src="https://via.placeholder.com/60" alt="Logo" class="company-logo">
                </div>
                <div class="col-md-7">
                  <h5 class="mb-1">Entretien téléphonique préliminaire</h5>
                  <p class="text-muted mb-2">AI Solutions</p>
                  <div class="d-flex flex-wrap gap-2 align-items-center">
                    <span class="status-badge pending">En attente</span>
                    <span class="interview-type type-phone">Téléphonique</span>
                    <span class="text-muted"><i class="bi bi-calendar me-1"></i>20 Juin 2023 - 11:15</span>
                    <span class="text-muted"><i class="bi bi-clock me-1"></i>Durée: 30min</span>
                    <span class="text-muted"><i class="bi bi-telephone me-1"></i>+212 6 12 34 56 78</span>
                  </div>
                </div>
                <div class="col-md-4 text-end">
                  <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#confirmInterviewModal"><i class="bi bi-calendar-check me-1"></i>Confirmer</button>
                  <button class="btn btn-outline-secondary me-2" data-bs-toggle="modal" data-bs-target="#editInterviewModal"><i class="bi bi-pencil me-1"></i>Modifier</button>
                  <button class="btn btn-outline-danger cancel-btn" title="Annuler" data-bs-toggle="modal" data-bs-target="#cancelInterviewModal">
                    <i class="bi bi-x-circle"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Entretien 4 -->
          <div class="interview-card card mb-3">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-md-1 text-center">
                  <img src="https://via.placeholder.com/60" alt="Logo" class="company-logo">
                </div>
                <div class="col-md-7">
                  <h5 class="mb-1">Entretien final - Responsable Marketing Digital</h5>
                  <p class="text-muted mb-2">DigitalLab</p>
                  <div class="d-flex flex-wrap gap-2 align-items-center">
                    <span class="status-badge canceled">Annulé</span>
                    <span class="interview-type type-onsite">En personne</span>
                    <span class="text-muted"><i class="bi bi-calendar me-1"></i>5 Juin 2023 - 09:00</span>
                    <span class="text-muted"><i class="bi bi-clock me-1"></i>Durée: 1h30</span>
                    <span class="text-muted"><i class="bi bi-geo-alt me-1"></i>Siège social, Rabat</span>
                  </div>
                </div>
                <div class="col-md-4 text-end">
                  <button class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#interviewDetailsModal"><i class="bi bi-eye me-1"></i>Détails</button>
                  <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#rescheduleModal"><i class="bi bi-arrow-repeat me-1"></i>Reprogrammer</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Pagination -->
          <nav aria-label="Page navigation" class="mt-4">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Précédent</a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Suivant</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <!-- Bouton scroll to top -->
  <button id="scrollTop" class="btn btn-danger">
    <i class="bi bi-arrow-up"></i>
  </button>

  <!-- Modales/Popups -->

  <!-- Modal: Ajouter un entretien -->
  <div class="modal fade" id="addInterviewModal" tabindex="-1" aria-labelledby="addInterviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="addInterviewModalLabel">Ajouter un nouvel entretien</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row g-3">
              <div class="col-md-6">
                <label for="companyName" class="form-label">Entreprise</label>
                <input type="text" class="form-control" id="companyName" placeholder="Nom de l'entreprise">
              </div>
              <div class="col-md-6">
                <label for="jobTitle" class="form-label">Poste</label>
                <input type="text" class="form-control" id="jobTitle" placeholder="Intitulé du poste">
              </div>
              <div class="col-md-6">
                <label for="interviewDate" class="form-label">Date</label>
                <input type="datetime-local" class="form-control" id="interviewDate">
              </div>
              <div class="col-md-6">
                <label for="interviewDuration" class="form-label">Durée</label>
                <select id="interviewDuration" class="form-select">
                  <option selected>30 minutes</option>
                  <option>45 minutes</option>
                  <option>1 heure</option>
                  <option>1 heure 30</option>
                  <option>2 heures</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="interviewType" class="form-label">Type d'entretien</label>
                <select id="interviewType" class="form-select">
                  <option selected>En personne</option>
                  <option>À distance</option>
                  <option>Téléphonique</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="interviewStatus" class="form-label">Statut</label>
                <select id="interviewStatus" class="form-select">
                  <option selected>Programmé</option>
                  <option>En attente</option>
                </select>
              </div>
              <div class="col-12" id="locationField">
                <label for="interviewLocation" class="form-label">Lieu</label>
                <input type="text" class="form-control" id="interviewLocation" placeholder="Adresse complète">
              </div>
              <div class="col-12 d-none" id="remoteField">
                <label for="interviewLink" class="form-label">Lien ou informations de connexion</label>
                <input type="text" class="form-control" id="interviewLink" placeholder="Lien Zoom, Teams, etc.">
              </div>
              <div class="col-12 d-none" id="phoneField">
                <label for="interviewPhone" class="form-label">Numéro de téléphone</label>
                <input type="tel" class="form-control" id="interviewPhone" placeholder="+212 6 12 34 56 78">
              </div>
              <div class="col-12">
                <label for="interviewNotes" class="form-label">Notes</label>
                <textarea class="form-control" id="interviewNotes" rows="3" placeholder="Informations supplémentaires..."></textarea>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal: Détails de l'entretien -->
  <div class="modal fade" id="interviewDetailsModal" tabindex="-1" aria-labelledby="interviewDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="interviewDetailsModalLabel">Détails de l'entretien</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="text-center mb-4">
            <img src="https://via.placeholder.com/100" alt="Logo entreprise" class="company-logo mb-2">
            <h4>Entretien RH - Chef de Projet IT</h4>
            <p class="text-muted">TechInnov</p>
          </div>
          
          <dl class="interview-details">
            <dt>Date et heure</dt>
            <dd>10 Juin 2023 - 14:30 (45min)</dd>
            
            <dt>Type</dt>
            <dd><span class="interview-type type-remote">À distance</span></dd>
            
            <dt>Statut</dt>
            <dd><span class="status-badge completed">Terminé</span></dd>
            
            <dt>Méthode de connexion</dt>
            <dd>Lien Zoom envoyé par email</dd>
            
            <dt>Personne à contacter</dt>
            <dd>Meryem Tazi - RH</dd>
            
            <dt>Email</dt>
            <dd>m.tazi@techinnov.com</dd>
            
            <dt>Téléphone</dt>
            <dd>+212 6 12 34 56 78</dd>
            
            <dt>Notes</dt>
            <dd>Préparer les questions sur les projets en cours et l'équipe.</dd>
          </dl>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal: Confirmer un entretien -->
  <div class="modal fade" id="confirmInterviewModal" tabindex="-1" aria-labelledby="confirmInterviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="confirmInterviewModalLabel">Confirmer l'entretien</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Confirmez-vous votre participation à l'entretien suivant ?</p>
          <div class="card bg-light p-3 mb-3">
            <strong>Entretien technique - Développeur Full Stack</strong><br>
            <span class="text-muted">TechSolutions Inc.</span><br>
            <i class="bi bi-calendar"></i> 15 Juin 2023 - 10:00 (1h)<br>
            <i class="bi bi-geo-alt"></i> Tour Casablanca, étage 12
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="sendConfirmation">
            <label class="form-check-label" for="sendConfirmation">
              Envoyer une confirmation par email
            </label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary">Confirmer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal: Annuler un entretien -->
  <div class="modal fade" id="cancelInterviewModal" tabindex="-1" aria-labelledby="cancelInterviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="cancelInterviewModalLabel">Annuler l'entretien</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Êtes-vous sûr de vouloir annuler cet entretien ?</p>
          <div class="card bg-light p-3 mb-3">
            <strong>Entretien technique - Développeur Full Stack</strong><br>
            <span class="text-muted">TechSolutions Inc.</span><br>
            <i class="bi bi-calendar"></i> 15 Juin 2023 - 10:00 (1h)<br>
            <i class="bi bi-geo-alt"></i> Tour Casablanca, étage 12
          </div>
          <div class="mb-3">
            <label for="cancelReason" class="form-label">Raison de l'annulation (optionnel)</label>
            <select class="form-select" id="cancelReason">
              <option selected value="">Sélectionnez une raison...</option>
              <option>J'ai trouvé un autre emploi</option>
              <option>Le poste ne correspond pas à mes attentes</option>
              <option>Problème de disponibilité</option>
              <option>Autre raison</option>
            </select>
          </div>
          <div class="mb-3 d-none" id="otherReasonField">
            <label for="otherReason" class="form-label">Veuillez préciser</label>
            <textarea class="form-control" id="otherReason" rows="2"></textarea>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="notifyCompany">
            <label class="form-check-label" for="notifyCompany">
              Notifier l'entreprise par email
            </label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Retour</button>
          <button type="button" class="btn btn-danger">Confirmer l'annulation</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal: Modifier un entretien -->
  <div class="modal fade" id="editInterviewModal" tabindex="-1" aria-labelledby="editInterviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="editInterviewModalLabel">Modifier l'entretien</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row g-3">
              <div class="col-md-6">
                <label for="editCompanyName" class="form-label">Entreprise</label>
                <input type="text" class="form-control" id="editCompanyName" value="TechSolutions Inc.">
              </div>
              <div class="col-md-6">
                <label for="editJobTitle" class="form-label">Poste</label>
                <input type="text" class="form-control" id="editJobTitle" value="Développeur Full Stack">
              </div>
              <div class="col-md-6">
                <label for="editInterviewDate" class="form-label">Date</label>
                <input type="datetime-local" class="form-control" id="editInterviewDate" value="2023-06-15T10:00">
              </div>
              <div class="col-md-6">
                <label for="editInterviewDuration" class="form-label">Durée</label>
                <select id="editInterviewDuration" class="form-select">
                  <option>30 minutes</option>
                  <option>45 minutes</option>
                  <option selected>1 heure</option>
                  <option>1 heure 30</option>
                  <option>2 heures</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="editInterviewType" class="form-label">Type d'entretien</label>
                <select id="editInterviewType" class="form-select">
                  <option selected>En personne</option>
                  <option>À distance</option>
                  <option>Téléphonique</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="editInterviewStatus" class="form-label">Statut</label>
                <select id="editInterviewStatus" class="form-select">
                  <option selected>Programmé</option>
                  <option>En attente</option>
                  <option>Terminé</option>
                  <option>Annulé</option>
                </select>
              </div>
              <div class="col-12" id="editLocationField">
                <label for="editInterviewLocation" class="form-label">Lieu</label>
                <input type="text" class="form-control" id="editInterviewLocation" value="Tour Casablanca, étage 12">
              </div>
              <div class="col-12">
                <label for="editInterviewNotes" class="form-label">Notes</label>
                <textarea class="form-control" id="editInterviewNotes" rows="3">Préparer les démonstrations techniques et revoir les bases de données.</textarea>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary">Enregistrer les modifications</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal: Feedback sur l'entretien -->
  <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="feedbackModalLabel">Feedback sur l'entretien</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="text-center mb-4">
            <img src="https://via.placeholder.com/80" alt="Logo entreprise" class="company-logo mb-2">
            <h5>Entretien RH - Chef de Projet IT</h5>
            <p class="text-muted">TechInnov - 10 Juin 2023</p>
          </div>
          
          <form>
            <div class="mb-4 text-center">
              <label class="form-label d-block mb-3">Comment évaluez-vous cet entretien ?</label>
              <div class="feedback-rating">
                <i class="bi bi-star-fill me-1"></i>
                <i class="bi bi-star-fill me-1"></i>
                <i class="bi bi-star-fill me-1"></i>
                <i class="bi bi-star-fill me-1"></i>
                <i class="bi bi-star"></i>
              </div>
            </div>
            
            <div class="mb-3">
              <label for="feedbackNotes" class="form-label">Notes (optionnel)</label>
              <textarea class="form-control" id="feedbackNotes" rows="4" placeholder="Comment s'est passé l'entretien ? Quelles questions ont été posées ? etc."></textarea>
            </div>
            
            <div class="mb-3">
              <label class="form-label">Résultat attendu</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="expectedResult" id="expectPositive" checked>
                <label class="form-check-label" for="expectPositive">
                  Positif - Je pense que ça s'est bien passé
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="expectedResult" id="expectNeutral">
                <label class="form-check-label" for="expectNeutral">
                  Neutre - Pas sûr du résultat
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="expectedResult" id="expectNegative">
                <label class="form-check-label" for="expectNegative">
                  Négatif - Je ne pense pas être retenu
                </label>
              </div>
            </div>
            
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" id="rememberForNextTime">
              <label class="form-check-label" for="rememberForNextTime">
                Enregistrer ces notes pour me préparer au prochain entretien
              </label>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary">Enregistrer le feedback</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal: Reprogrammer un entretien -->
  <div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="rescheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="rescheduleModalLabel">Reprogrammer l'entretien</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card bg-light p-3 mb-4">
            <strong>Entretien final - Responsable Marketing Digital</strong><br>
            <span class="text-muted">DigitalLab</span><br>
            <span class="text-danger"><s>5 Juin 2023 - 09:00 (1h30)</s></span><br>
            <i class="bi bi-geo-alt"></i> Siège social, Rabat
          </div>
          
          <form>
            <div class="row g-3">
              <div class="col-md-6">
                <label for="newInterviewDate" class="form-label">Nouvelle date</label>
                <input type="datetime-local" class="form-control" id="newInterviewDate">
              </div>
              <div class="col-md-6">
                <label for="newInterviewDuration" class="form-label">Durée</label>
                <select id="newInterviewDuration" class="form-select">
                  <option>30 minutes</option>
                  <option>45 minutes</option>
                  <option selected>1 heure</option>
                  <option>1 heure 30</option>
                  <option>2 heures</option>
                </select>
              </div>
              <div class="col-12">
                <label for="rescheduleReason" class="form-label">Raison de la reprogrammation</label>
                <textarea class="form-control" id="rescheduleReason" rows="2" placeholder="Pourquoi souhaitez-vous reprogrammer cet entretien ?"></textarea>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="sendRescheduleRequest">
                  <label class="form-check-label" for="sendRescheduleRequest">
                    Envoyer une demande de reprogrammation à l'entreprise
                  </label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary">Reprogrammer</button>
        </div>
      </div>
    </div>
  </div>

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

    // Gestion des champs dynamiques dans le formulaire d'ajout
    document.getElementById('interviewType').addEventListener('change', function() {
      const type = this.value;
      document.getElementById('locationField').classList.add('d-none');
      document.getElementById('remoteField').classList.add('d-none');
      document.getElementById('phoneField').classList.add('d-none');
      
      if (type === 'En personne') {
        document.getElementById('locationField').classList.remove('d-none');
      } else if (type === 'À distance') {
        document.getElementById('remoteField').classList.remove('d-none');
      } else if (type === 'Téléphonique') {
        document.getElementById('phoneField').classList.remove('d-none');
      }
    });

    // Gestion des champs dynamiques dans le formulaire d'édition
    document.getElementById('editInterviewType').addEventListener('change', function() {
      const type = this.value;
      document.getElementById('editLocationField').classList.add('d-none');
      
      if (type === 'En personne') {
        document.getElementById('editLocationField').classList.remove('d-none');
      }
    });

    // Gestion du champ "Autre raison" dans l'annulation
    document.getElementById('cancelReason').addEventListener('change', function() {
      if (this.value === 'Autre raison') {
        document.getElementById('otherReasonField').classList.remove('d-none');
      } else {
        document.getElementById('otherReasonField').classList.add('d-none');
      }
    });

    // Système de notation par étoiles
    const stars = document.querySelectorAll('.feedback-rating i');
    stars.forEach((star, index) => {
      star.addEventListener('click', function() {
        stars.forEach((s, i) => {
          if (i <= index) {
            s.classList.add('bi-star-fill');
            s.classList.remove('bi-star');
          } else {
            s.classList.add('bi-star');
            s.classList.remove('bi-star-fill');
          }
        });
      });
    });

    // Gestion des boutons d'annulation
    document.querySelectorAll('.cancel-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        // Cette fonctionnalité est maintenant gérée par la modale Bootstrap
      });
    });

    // Sélection multiple pour suppression
    document.querySelector('.btn-outline-danger').addEventListener('click', function() {
      const selectedCards = document.querySelectorAll('.interview-card .form-check-input:checked');
      if (selectedCards.length === 0) {
        alert("Veuillez sélectionner au moins un entretien à supprimer");
        return;
      }
      
      if (confirm(`Voulez-vous vraiment supprimer ${selectedCards.length} entretien(s) ?`)) {
        selectedCards.forEach(card => {
          card.closest('.interview-card').remove();
        });
        // Afficher un message temporaire
        const toast = document.createElement('div');
        toast.className = 'position-fixed bottom-0 end-0 p-3';
        toast.innerHTML = `
          <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
              <strong class="me-auto">Succès</strong>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              ${selectedCards.length} entretien(s) supprimé(s)
            </div>
          </div>
        `;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
      }
    });
  </script>
</body>
</html>