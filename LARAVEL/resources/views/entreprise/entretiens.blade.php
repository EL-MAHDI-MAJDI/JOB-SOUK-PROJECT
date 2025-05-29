<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Entretiens - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  @vite(['resources/css/StyleEntreprise/entretiens.css'])
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoEntreprise.side-menu activePage='6' :entreprise="$entreprise" />
  </div>

  <!-- Barre de navigation supérieure -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoEntreprise.navbar :entreprise="$entreprise"/>
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- En-tête -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Gestion des Entretiens</h2>
          <p class="text-muted mb-0">Planifiez et suivez vos entretiens avec les candidats</p>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newInterviewModal">
          <i class="bi bi-plus-lg"></i> Nouvel entretien
        </button>
      </div>
      
      <!-- Filtres et recherche -->
      <div class="dashboard-card p-4 mb-4">
        <div class="row g-3">
          <div class="col-md-3">
            <label class="form-label">Statut</label>
            <select class="form-select">
              <option selected>Tous les statuts</option>
              <option>Planifié</option>
              <option>Confirmé</option>
              <option>Terminé</option>
              <option>Annulé</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Date</label>
            <select class="form-select">
              <option selected>Toutes les dates</option>
              <option>Aujourd'hui</option>
              <option>Cette semaine</option>
              <option>Ce mois</option>
              <option>Personnalisé</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Type</label>
            <select class="form-select">
              <option selected>Tous les types</option>
              <option>En personne</option>
              <option>Visioconférence</option>
              <option>Téléphonique</option>
            </select>
          </div>
          <div class="col-md-3 d-flex align-items-end">
            <button class="btn btn-outline-secondary w-100">
              <i class="bi bi-funnel"></i> Filtrer
            </button>
          </div>
        </div>
      </div>
      
      <!-- Statistiques rapides -->
      <div class="row mb-4">
        <div class="col-md-3">
          <div class="dashboard-card p-3 text-center">
            <h5 class="fw-bold mb-1">24</h5>
            <p class="text-muted mb-0">Planifiés</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-card p-3 text-center">
            <h5 class="fw-bold mb-1">18</h5>
            <p class="text-muted mb-0">Confirmés</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-card p-3 text-center">
            <h5 class="fw-bold mb-1">12</h5>
            <p class="text-muted mb-0">Terminés</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-card p-3 text-center">
            <h5 class="fw-bold mb-1">3</h5>
            <p class="text-muted mb-0">Annulés</p>
          </div>
        </div>
      </div>
      
      <!-- Liste des entretiens -->
      <div class="dashboard-card p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="section-title fw-bold">Entretiens à venir</h4>
          <div class="btn-group">
            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-list-ul"></i></button>
            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-calendar"></i></button>
          </div>
        </div>
        
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead>
              <tr>
                <th>Candidat</th>
                <th>Poste</th>
                <th>Type</th>
                <th>Date & Heure</th>
                <th>Statut</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle me-2" width="40" height="40">
                    <div>
                      <h6 class="mb-0 fw-bold">Ahmed Benali</h6>
                      <small class="text-muted">ahmed.benali@email.com</small>
                    </div>
                  </div>
                </td>
                <td>Développeur Full Stack</td>
                <td><span class="badge bg-primary bg-opacity-10 text-primary"><i class="bi bi-camera-video"></i> Visio</span></td>
                <td>
                  <div>15 Juin 2023</div>
                  <small class="text-muted">14:00 - 14:45</small>
                </td>
                <td><span class="badge bg-success bg-opacity-10 text-success">Confirmé</span></td>
                <td>
                  <button class="btn btn-sm btn-outline-primary me-1" title="Détails">
                    <i class="bi bi-eye"></i>
                  </button>
                  <button class="btn btn-sm btn-outline-secondary me-1" title="Modifier">
                    <i class="bi bi-pencil"></i>
                  </button>
                  <button class="btn btn-sm btn-outline-danger" title="Annuler">
                    <i class="bi bi-x-circle"></i>
                  </button>
                </td>
              </tr>
              
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle me-2" width="40" height="40">
                    <div>
                      <h6 class="mb-0 fw-bold">Fatima Zahra</h6>
                      <small class="text-muted">fatima.zahra@email.com</small>
                    </div>
                  </div>
                </td>
                <td>Designer UI/UX</td>
                <td><span class="badge bg-secondary bg-opacity-10 text-secondary"><i class="bi bi-person"></i> En personne</span></td>
                <td>
                  <div>16 Juin 2023</div>
                  <small class="text-muted">10:30 - 11:15</small>
                </td>
                <td><span class="badge bg-warning bg-opacity-10 text-warning">En attente</span></td>
                <td>
                  <button class="btn btn-sm btn-outline-primary me-1" title="Détails">
                    <i class="bi bi-eye"></i>
                  </button>
                  <button class="btn btn-sm btn-outline-secondary me-1" title="Modifier">
                    <i class="bi bi-pencil"></i>
                  </button>
                  <button class="btn btn-sm btn-outline-danger" title="Annuler">
                    <i class="bi bi-x-circle"></i>
                  </button>
                </td>
              </tr>
              
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle me-2" width="40" height="40">
                    <div>
                      <h6 class="mb-0 fw-bold">Karim El Mansouri</h6>
                      <small class="text-muted">karim.el@email.com</small>
                    </div>
                  </div>
                </td>
                <td>Chef de Projet IT</td>
                <td><span class="badge bg-info bg-opacity-10 text-info"><i class="bi bi-telephone"></i> Téléphone</span></td>
                <td>
                  <div>17 Juin 2023</div>
                  <small class="text-muted">16:00 - 16:30</small>
                </td>
                <td><span class="badge bg-success bg-opacity-10 text-success">Confirmé</span></td>
                <td>
                  <button class="btn btn-sm btn-outline-primary me-1" title="Détails">
                    <i class="bi bi-eye"></i>
                  </button>
                  <button class="btn btn-sm btn-outline-secondary me-1" title="Modifier">
                    <i class="bi bi-pencil"></i>
                  </button>
                  <button class="btn btn-sm btn-outline-danger" title="Annuler">
                    <i class="bi bi-x-circle"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      
      <!-- Entretiens passés -->
      <div class="dashboard-card p-4 mt-4">
        <h4 class="section-title fw-bold mb-3">Entretiens passés</h4>
        
        <div class="accordion" id="pastInterviewsAccordion">
          <div class="accordion-item border-0 mb-2">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                <div class="d-flex align-items-center">
                  <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle me-2" width="40" height="40">
                  <div>
                    <h6 class="mb-0 fw-bold">Youssef Alaoui</h6>
                    <small class="text-muted">Développeur Backend • 10 Juin 2023</small>
                  </div>
                </div>
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#pastInterviewsAccordion">
              <div class="accordion-body pt-0">
                <div class="row">
                  <div class="col-md-6">
                    <h6 class="fw-bold">Détails de l'entretien</h6>
                    <ul class="list-unstyled">
                      <li class="mb-2"><i class="bi bi-calendar me-2"></i> 10 Juin 2023, 09:00 - 09:45</li>
                      <li class="mb-2"><i class="bi bi-person me-2"></i> Avec: Responsable RH & Tech Lead</li>
                      <li class="mb-2"><i class="bi bi-link me-2"></i> Lien Zoom: <a href="#">lien-zoom-exemple</a></li>
                    </ul>
                  </div>
                  <div class="col-md-6">
                    <h6 class="fw-bold">Notes et évaluation</h6>
                    <div class="mb-2">
                      <span class="fw-bold me-2">Note technique:</span>
                      <span class="badge bg-success">4.5/5</span>
                    </div>
                    <div class="mb-2">
                      <span class="fw-bold me-2">Note culturelle:</span>
                      <span class="badge bg-warning">3.8/5</span>
                    </div>
                    <div>
                      <span class="fw-bold me-2">Statut:</span>
                      <span class="badge bg-primary">En attente de décision</span>
                    </div>
                  </div>
                </div>
                <div class="mt-3">
                  <button class="btn btn-sm btn-outline-primary me-2">
                    <i class="bi bi-file-earmark-text"></i> Voir les notes complètes
                  </button>
                  <button class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-repeat"></i> Reprogrammer
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <button class="btn btn-outline-primary w-100 mt-3">
          <i class="bi bi-clock-history"></i> Voir tous les entretiens passés
        </button>
      </div>
    </div>
  </div>

  <!-- Modal Nouvel Entretien -->
  <div class="modal fade" id="newInterviewModal" tabindex="-1" aria-labelledby="newInterviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="newInterviewModalLabel">Planifier un nouvel entretien</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="candidateSelect" class="form-label">Candidat</label>
                <select class="form-select" id="candidateSelect" required>
                  <option value="" selected disabled>Sélectionner un candidat</option>
                  <option>Ahmed Benali - Développeur Full Stack</option>
                  <option>Fatima Zahra - Designer UI/UX</option>
                  <option>Karim El Mansouri - Chef de Projet IT</option>
                  <option>Youssef Alaoui - Développeur Backend</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="jobPosition" class="form-label">Poste concerné</label>
                <select class="form-select" id="jobPosition" required>
                  <option value="" selected disabled>Sélectionner un poste</option>
                  <option>Développeur Full Stack</option>
                  <option>Designer UI/UX</option>
                  <option>Chef de Projet IT</option>
                  <option>Développeur Backend</option>
                </select>
              </div>
            </div>
            
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="interviewDate" class="form-label">Date</label>
                <input type="date" class="form-control" id="interviewDate" required>
              </div>
              <div class="col-md-3">
                <label for="startTime" class="form-label">Heure de début</label>
                <input type="time" class="form-control" id="startTime" required>
              </div>
              <div class="col-md-3">
                <label for="endTime" class="form-label">Heure de fin</label>
                <input type="time" class="form-control" id="endTime" required>
              </div>
            </div>
            
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Type d'entretien</label>
                <div class="d-flex gap-3">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="interviewType" id="typeVideo" value="video" checked>
                    <label class="form-check-label" for="typeVideo">
                      <i class="bi bi-camera-video"></i> Visioconférence
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="interviewType" id="typeInPerson" value="inPerson">
                    <label class="form-check-label" for="typeInPerson">
                      <i class="bi bi-person"></i> En personne
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="interviewType" id="typePhone" value="phone">
                    <label class="form-check-label" for="typePhone">
                      <i class="bi bi-telephone"></i> Téléphonique
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label for="interviewers" class="form-label">Participants</label>
                <select class="form-select" id="interviewers" multiple>
                  <option selected>Responsable RH</option>
                  <option>Tech Lead</option>
                  <option>Manager</option>
                  <option>CEO</option>
                </select>
              </div>
            </div>
            
            <div class="mb-3" id="videoConferenceDetails">
              <label for="meetingLink" class="form-label">Lien de la réunion</label>
              <input type="url" class="form-control" id="meetingLink" placeholder="https://zoom.us/j/123456789">
            </div>
            
            <div class="mb-3 d-none" id="locationDetails">
              <label for="location" class="form-label">Lieu</label>
              <input type="text" class="form-control" id="location" placeholder="Adresse complète">
            </div>
            
            <div class="mb-3">
              <label for="notes" class="form-label">Notes supplémentaires</label>
              <textarea class="form-control" id="notes" rows="3" placeholder="Points à aborder, informations importantes..."></textarea>
            </div>
            
            <div class="form-check mb-4">
              <input class="form-check-input" type="checkbox" id="sendInvitation" checked>
              <label class="form-check-label" for="sendInvitation">
                Envoyer une invitation par email au candidat
              </label>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary">Planifier l'entretien</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/js/entrepriseJs/entretiens.js'])
</body>
</html>