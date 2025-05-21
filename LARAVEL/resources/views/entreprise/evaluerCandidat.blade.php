<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Évaluer Candidats - Job Souk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" as="style">
  @vite(['resources/css/StyleEntreprise/evaluercandidat.css'])
</head>
<body>
  <!-- Menu latéral fixe -->
  <div class="side-menu">
    <x-compoEntreprise.side-menu activePage='4' />
  </div>

  <!-- Barre de navigation supérieure enrichie -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoEntreprise.navbar />
  </nav>

  <!-- Contenu principal -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- En-tête -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Évaluer Candidats</h2>
          <p class="text-muted mb-0">Examinez et évaluez les candidatures pour vos offres d'emploi</p>
        </div>
        <div class="d-flex gap-2">
          <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
            <i class="bi bi-funnel me-1"></i> Filtrer
          </button>
        </div>
      </div>

      <!-- Modal pour les filtres -->
      <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="filterModalLabel">Filtrer les candidatures</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="posteFilter" class="form-label">Poste</label>
                <select class="form-select" id="posteFilter">
                  <option value="">Tous les postes</option>
                  <option value="frontend">Développeur Front-end</option>
                  <option value="backend">Développeur Back-end</option>
                  <option value="designer">Designer UI/UX</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="statusFilter" class="form-label">Statut</label>
                <select class="form-select" id="statusFilter">
                  <option value="">Tous les statuts</option>
                  <option value="new">Nouveau</option>
                  <option value="review">En revue</option>
                  <option value="interview">Entretien planifié</option>
                  <option value="hired">Embauché</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="experienceFilter" class="form-label">Années d'expérience</label>
                <input type="range" class="form-range" id="experienceFilter" min="0" max="10" value="0">
                <span id="experienceValue">0+ années</span>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="button" class="btn btn-primary">Appliquer</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Liste des offres avec candidats -->
      <div class="dashboard-card p-4">
        <!-- Offre 1 -->
        <div class="offer-card mb-4">
          <div class="offer-header" data-bs-toggle="collapse" href="#offer1" aria-expanded="true">
            <h5>Développeur Front-end</h5>
            <span class="badge badge-candidate-count rounded-pill">3 candidats</span>
          </div>
          <div class="collapse show" id="offer1">
            <div class="table-responsive">
              <table class="table candidate-table">
                <thead>
                  <tr>
                    <th>Candidat</th>
                    <th>Expérience</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="candidate-row">
                    <td>
                      <div class="candidate-info">
                        <img src="https://via.placeholder.com/40" alt="Profile" class="candidate-img">
                        <div>
                          <div class="fw-bold">Youssef Benali</div>
                          <small class="text-muted">youssef.benali@email.com</small>
                        </div>
                      </div>
                    </td>
                    <td>3 ans</td>
                    <td><span class="status-badge status-new">Nouveau</span></td>
                    <td>2025-04-22</td>
                    <td>
                      <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm btn-outline-primary">Voir CV</a>
                        <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#evaluateModal">Évaluer</button>
                      </div>
                    </td>
                  </tr>
                  <tr class="candidate-row">
                    <td>
                      <div class="candidate-info">
                        <img src="https://via.placeholder.com/40" alt="Profile" class="candidate-img">
                        <div>
                          <div class="fw-bold">Mehdi El Fassi</div>
                          <small class="text-muted">mehdi.elfassi@email.com</small>
                        </div>
                      </div>
                    </td>
                    <td>2 ans</td>
                    <td><span class="status-badge status-review">En revue</span></td>
                    <td>2025-04-20</td>
                    <td>
                      <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm btn-outline-primary">Voir CV</a>
                        <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#evaluateModal">Évaluer</button>
                      </div>
                    </td>
                  </tr>
                  <tr class="candidate-row">
                    <td>
                      <div class="candidate-info">
                        <img src="https://via.placeholder.com/40" alt="Profile" class="candidate-img">
                        <div>
                          <div class="fw-bold">Fatima Zahra</div>
                          <small class="text-muted">fatima.zahra@email.com</small>
                        </div>
                      </div>
                    </td>
                    <td>4 ans</td>
                    <td><span class="status-badge status-interview">Entretien</span></td>
                    <td>2025-04-18</td>
                    <td>
                      <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm btn-outline-primary">Voir CV</a>
                        <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#evaluateModal">Évaluer</button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Offre 2 -->
        <div class="offer-card mb-4">
          <div class="offer-header" data-bs-toggle="collapse" href="#offer2" aria-expanded="true">
            <h5>Chef de projet</h5>
            <span class="badge badge-candidate-count rounded-pill">2 candidats</span>
          </div>
          <div class="collapse show" id="offer2">
            <div class="table-responsive">
              <table class="table candidate-table">
                <thead>
                  <tr>
                    <th>Candidat</th>
                    <th>Expérience</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="candidate-row">
                    <td>
                      <div class="candidate-info">
                        <img src="https://via.placeholder.com/40" alt="Profile" class="candidate-img">
                        <div>
                          <div class="fw-bold">Leila Nassiri</div>
                          <small class="text-muted">leila.nassiri@email.com</small>
                        </div>
                      </div>
                    </td>
                    <td>5 ans</td>
                    <td><span class="status-badge status-review">À relancer</span></td>
                    <td>2025-04-21</td>
                    <td>
                      <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm btn-outline-primary">Voir CV</a>
                        <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#evaluateModal">Évaluer</button>
                      </div>
                    </td>
                  </tr>
                  <tr class="candidate-row">
                    <td>
                      <div class="candidate-info">
                        <img src="https://via.placeholder.com/40" alt="Profile" class="candidate-img">
                        <div>
                          <div class="fw-bold">Karim Belhaj</div>
                          <small class="text-muted">karim.belhaj@email.com</small>
                        </div>
                      </div>
                    </td>
                    <td>6 ans</td>
                    <td><span class="status-badge status-hired">Embauché</span></td>
                    <td>2025-04-15</td>
                    <td>
                      <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm btn-outline-primary">Voir CV</a>
                        <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#evaluateModal">Évaluer</button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Offre 3 -->
        <div class="offer-card mb-4">
          <div class="offer-header" data-bs-toggle="collapse" href="#offer3" aria-expanded="true">
            <h5>Designer UI/UX</h5>
            <span class="badge badge-candidate-count rounded-pill">1 candidat</span>
          </div>
          <div class="collapse show" id="offer3">
            <div class="table-responsive">
              <table class="table candidate-table">
                <thead>
                  <tr>
                    <th>Candidat</th>
                    <th>Expérience</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="candidate-row">
                    <td>
                      <div class="candidate-info">
                        <img src="https://via.placeholder.com/40" alt="Profile" class="candidate-img">
                        <div>
                          <div class="fw-bold">Amina Toumi</div>
                          <small class="text-muted">amina.toumi@email.com</small>
                        </div>
                      </div>
                    </td>
                    <td>2 ans</td>
                    <td><span class="status-badge status-rejected">Rejeté</span></td>
                    <td>2025-04-10</td>
                    <td>
                      <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm btn-outline-primary">Voir CV</a>
                        <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#evaluateModal">Évaluer</button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal pour l'évaluation -->
      <div class="modal fade" id="evaluateModal" tabindex="-1" aria-labelledby="evaluateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="evaluateModalLabel">Évaluer Candidat</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="candidateName" class="form-label">Candidat</label>
                <input type="text" class="form-control" id="candidateName" readonly value="Youssef Benali">
              </div>
              <div class="mb-3">
                <label for="poste" class="form-label">Poste</label>
                <input type="text" class="form-control" id="poste" readonly value="Développeur Front-end">
              </div>
              <div class="mb-3">
                <label for="score" class="form-label">Score (1-5)</label>
                <input type="number" class="form-control" id="score" min="1" max="5" placeholder="Entrez un score">
              </div>
              <div class="mb-3">
                <label for="comments" class="form-label">Commentaires</label>
                <textarea class="form-control" id="comments" rows="4" placeholder="Ajoutez vos commentaires sur la candidature"></textarea>
              </div>
              <div class="mb-3">
                <label for="status" class="form-label">Statut</label>
                <select class="form-select" id="status">
                  <option value="new">Nouveau</option>
                  <option value="review">En revue</option>
                  <option value="interview">Entretien planifié</option>
                  <option value="hired">Embauché</option>
                  <option value="rejected">Rejeté</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="button" class="btn btn-primary">Enregistrer</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/js/entrepriseJs/evaluerCandidat.js'])
</body>
</html>