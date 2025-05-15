<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catégories - Admin JobSouk</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('storage/StyleAdmin/categories.css') }}">
</head>
<body>
  <!-- Sidebar Menu -->
  <div class="side-menu">
    <x-compoAdmin.side-menu activePage='5' />
  </div>

  <!-- Top Navigation -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoAdmin.navbar />
  </nav>

  <!-- Main Content -->
  <div class="main-content">
    <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Gestion des Catégories</h2>
          <p class="text-muted mb-0">Organisez les catégories d'emplois et de compétences</p>
        </div>
        <div>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            <i class="bi bi-plus me-1"></i> Ajouter une catégorie
          </button>
        </div>
      </div>

      <!-- Categories Stats -->
      <div class="row mb-4">
        <div class="col-md-3">
          <div class="dashboard-card p-3">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h6 class="mb-1">Catégories actives</h6>
                <h3 class="mb-0">24</h3>
              </div>
              <div class="bg-primary bg-opacity-10 p-3 rounded">
                <i class="bi bi-tags text-primary"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-card p-3">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h6 class="mb-1">Sous-catégories</h6>
                <h3 class="mb-0">78</h3>
              </div>
              <div class="bg-success bg-opacity-10 p-3 rounded">
                <i class="bi bi-diagram-2 text-success"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-card p-3">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h6 class="mb-1">Offres associées</h6>
                <h3 class="mb-0">1,245</h3>
              </div>
              <div class="bg-warning bg-opacity-10 p-3 rounded">
                <i class="bi bi-briefcase text-warning"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="dashboard-card p-3">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h6 class="mb-1">Compétences</h6>
                <h3 class="mb-0">156</h3>
              </div>
              <div class="bg-info bg-opacity-10 p-3 rounded">
                <i class="bi bi-lightbulb text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Categories View Toggle -->
      <div class="dashboard-card p-3 mb-4">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h6 class="mb-0">Mode d'affichage</h6>
          </div>
          <div class="btn-group" role="group">
            <input type="radio" class="btn-check" name="viewMode" id="gridView" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="gridView">
              <i class="bi bi-grid"></i> Grille
            </label>
            <input type="radio" class="btn-check" name="viewMode" id="listView" autocomplete="off">
            <label class="btn btn-outline-primary" for="listView">
              <i class="bi bi-list-ul"></i> Liste
            </label>
          </div>
        </div>
      </div>

      <!-- Categories Grid View -->
      <div id="categoriesGridView">
        <div class="row g-4">
          <!-- Category 1 -->
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="dashboard-card category-card p-4 h-100">
              <div class="d-flex align-items-center mb-3">
                <div class="category-icon bg-it me-3">
                  <i class="bi bi-code-slash"></i>
                </div>
                <div>
                  <h5 class="mb-0">Informatique</h5>
                  <span class="text-muted small">12 sous-catégories</span>
                </div>
              </div>
              <p class="text-muted small">Développement, réseaux, cybersécurité, data science...</p>
              <div class="d-flex justify-content-between align-items-center mt-3">
                <span class="badge bg-primary rounded-pill">245 offres</span>
                <div class="dropdown">
                  <button class="btn btn-sm" data-bs-toggle="dropdown">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editCategoryModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-diagram-2 me-2"></i>Gérer sous-catégories</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Category 2 -->
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="dashboard-card category-card p-4 h-100">
              <div class="d-flex align-items-center mb-3">
                <div class="category-icon bg-marketing me-3">
                  <i class="bi bi-megaphone"></i>
                </div>
                <div>
                  <h5 class="mb-0">Marketing</h5>
                  <span class="text-muted small">8 sous-catégories</span>
                </div>
              </div>
              <p class="text-muted small">Digital, communication, branding, études marché...</p>
              <div class="d-flex justify-content-between align-items-center mt-3">
                <span class="badge bg-primary rounded-pill">180 offres</span>
                <div class="dropdown">
                  <button class="btn btn-sm" data-bs-toggle="dropdown">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editCategoryModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-diagram-2 me-2"></i>Gérer sous-catégories</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Category 3 -->
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="dashboard-card category-card p-4 h-100">
              <div class="d-flex align-items-center mb-3">
                <div class="category-icon bg-finance me-3">
                  <i class="bi bi-cash-coin"></i>
                </div>
                <div>
                  <h5 class="mb-0">Finance</h5>
                  <span class="text-muted small">6 sous-catégories</span>
                </div>
              </div>
              <p class="text-muted small">Comptabilité, audit, banque, gestion financière...</p>
              <div class="d-flex justify-content-between align-items-center mt-3">
                <span class="badge bg-primary rounded-pill">120 offres</span>
                <div class="dropdown">
                  <button class="btn btn-sm" data-bs-toggle="dropdown">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editCategoryModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-diagram-2 me-2"></i>Gérer sous-catégories</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Category 4 -->
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="dashboard-card category-card p-4 h-100">
              <div class="d-flex align-items-center mb-3">
                <div class="category-icon bg-hr me-3">
                  <i class="bi bi-people"></i>
                </div>
                <div>
                  <h5 class="mb-0">RH</h5>
                  <span class="text-muted small">5 sous-catégories</span>
                </div>
              </div>
              <p class="text-muted small">Recrutement, formation, paie, développement personnel...</p>
              <div class="d-flex justify-content-between align-items-center mt-3">
                <span class="badge bg-primary rounded-pill">95 offres</span>
                <div class="dropdown">
                  <button class="btn btn-sm" data-bs-toggle="dropdown">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editCategoryModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-diagram-2 me-2"></i>Gérer sous-catégories</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Category 5 -->
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="dashboard-card category-card p-4 h-100">
              <div class="d-flex align-items-center mb-3">
                <div class="category-icon bg-design me-3">
                  <i class="bi bi-palette"></i>
                </div>
                <div>
                  <h5 class="mb-0">Design</h5>
                  <span class="text-muted small">7 sous-catégories</span>
                </div>
              </div>
              <p class="text-muted small">UI/UX, graphisme, illustration, motion design...</p>
              <div class="d-flex justify-content-between align-items-center mt-3">
                <span class="badge bg-primary rounded-pill">110 offres</span>
                <div class="dropdown">
                  <button class="btn btn-sm" data-bs-toggle="dropdown">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editCategoryModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-diagram-2 me-2"></i>Gérer sous-catégories</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Category 6 -->
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="dashboard-card category-card p-4 h-100">
              <div class="d-flex align-items-center mb-3">
                <div class="category-icon bg-education me-3">
                  <i class="bi bi-book"></i>
                </div>
                <div>
                  <h5 class="mb-0">Éducation</h5>
                  <span class="text-muted small">4 sous-catégories</span>
                </div>
              </div>
              <p class="text-muted small">Enseignement, formation, e-learning, recherche...</p>
              <div class="d-flex justify-content-between align-items-center mt-3">
                <span class="badge bg-primary rounded-pill">75 offres</span>
                <div class="dropdown">
                  <button class="btn btn-sm" data-bs-toggle="dropdown">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editCategoryModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-diagram-2 me-2"></i>Gérer sous-catégories</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Category 7 -->
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="dashboard-card category-card p-4 h-100">
              <div class="d-flex align-items-center mb-3">
                <div class="category-icon bg-engineering me-3">
                  <i class="bi bi-gear"></i>
                </div>
                <div>
                  <h5 class="mb-0">Ingénierie</h5>
                  <span class="text-muted small">9 sous-catégories</span>
                </div>
              </div>
              <p class="text-muted small">Industrie, construction, mécanique, électrique...</p>
              <div class="d-flex justify-content-between align-items-center mt-3">
                <span class="badge bg-primary rounded-pill">150 offres</span>
                <div class="dropdown">
                  <button class="btn btn-sm" data-bs-toggle="dropdown">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editCategoryModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-diagram-2 me-2"></i>Gérer sous-catégories</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Category 8 -->
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="dashboard-card category-card p-4 h-100">
              <div class="d-flex align-items-center mb-3">
                <div class="category-icon bg-secondary me-3">
                  <i class="bi bi-heart-pulse"></i>
                </div>
                <div>
                  <h5 class="mb-0">Santé</h5>
                  <span class="text-muted small">6 sous-catégories</span>
                </div>
              </div>
              <p class="text-muted small">Médecine, paramédical, pharmacie, recherche médicale...</p>
              <div class="d-flex justify-content-between align-items-center mt-3">
                <span class="badge bg-primary rounded-pill">90 offres</span>
                <div class="dropdown">
                  <button class="btn btn-sm" data-bs-toggle="dropdown">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editCategoryModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-diagram-2 me-2"></i>Gérer sous-catégories</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Categories List View (Hidden by default) -->
      <div id="categoriesListView" class="d-none">
        <div class="dashboard-card p-4">
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead>
                <tr>
                  <th width="50px"></th>
                  <th>Catégorie</th>
                  <th>Sous-catégories</th>
                  <th>Offres</th>
                  <th>Compétences</th>
                  <th class="text-end">Actions</th>
                </tr>
              </thead>
              <tbody>
                <!-- Category 1 -->
                <tr>
                  <td>
                    <div class="category-icon bg-it p-2 rounded">
                      <i class="bi bi-code-slash"></i>
                    </div>
                  </td>
                  <td>
                    <h6 class="mb-0">Informatique</h6>
                    <p class="small text-muted mb-0">Développement, réseaux, cybersécurité...</p>
                  </td>
                  <td>12</td>
                  <td>245</td>
                  <td>32</td>
                  <td class="text-end">
                    <div class="dropdown">
                      <button class="btn btn-sm" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editCategoryModal"><i class="bi bi-pencil me-2"></i>Modifier</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-diagram-2 me-2"></i>Gérer sous-catégories</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Supprimer</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
                <!-- Other categories in list view would go here -->
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Pagination -->
      <nav class="mt-4">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Précédent</a>
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

  <!-- Add Category Modal -->
  <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ajouter une catégorie</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="categoryForm">
            <div class="mb-3">
              <label class="form-label">Nom de la catégorie</label>
              <input type="text" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <textarea class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Icône</label>
              <select class="form-select">
                <option value="code-slash"><i class="bi bi-code-slash"></i> Développement</option>
                <option value="megaphone"><i class="bi bi-megaphone"></i> Marketing</option>
                <option value="cash-coin"><i class="bi bi-cash-coin"></i> Finance</option>
                <option value="people"><i class="bi bi-people"></i> RH</option>
                <option value="palette"><i class="bi bi-palette"></i> Design</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Couleur</label>
              <div class="d-flex flex-wrap gap-2">
                <input type="radio" class="btn-check" name="color" id="colorIt" value="it" checked>
                <label class="btn btn-sm" for="colorIt" style="background-color: #3498db; color: white;">Informatique</label>
                
                <input type="radio" class="btn-check" name="color" id="colorMarketing" value="marketing">
                <label class="btn btn-sm" for="colorMarketing" style="background-color: #2ECC71; color: white;">Marketing</label>
                
                <input type="radio" class="btn-check" name="color" id="colorFinance" value="finance">
                <label class="btn btn-sm" for="colorFinance" style="background-color: #9B59B6; color: white;">Finance</label>
                
                <input type="radio" class="btn-check" name="color" id="colorHr" value="hr">
                <label class="btn btn-sm" for="colorHr" style="background-color: #E74C3C; color: white;">RH</label>
              </div>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="isActive">
              <label class="form-check-label" for="isActive">Catégorie active</label>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary" form="categoryForm">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Category Modal -->
  <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modifier la catégorie</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editCategoryForm">
            <div class="mb-3">
              <label class="form-label">Nom de la catégorie</label>
              <input type="text" class="form-control" value="Informatique" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <textarea class="form-control" rows="3">Développement, réseaux, cybersécurité, data science...</textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Icône</label>
              <select class="form-select">
                <option value="code-slash" selected><i class="bi bi-code-slash"></i> Développement</option>
                <option value="megaphone"><i class="bi bi-megaphone"></i> Marketing</option>
                <option value="cash-coin"><i class="bi bi-cash-coin"></i> Finance</option>
                <option value="people"><i class="bi bi-people"></i> RH</option>
                <option value="palette"><i class="bi bi-palette"></i> Design</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Couleur</label>
              <div class="d-flex flex-wrap gap-2">
                <input type="radio" class="btn-check" name="editColor" id="editColorIt" value="it" checked>
                <label class="btn btn-sm" for="editColorIt" style="background-color: #3498db; color: white;">Informatique</label>
                
                <input type="radio" class="btn-check" name="editColor" id="editColorMarketing" value="marketing">
                <label class="btn btn-sm" for="editColorMarketing" style="background-color: #2ECC71; color: white;">Marketing</label>
                
                <input type="radio" class="btn-check" name="editColor" id="editColorFinance" value="finance">
                <label class="btn btn-sm" for="editColorFinance" style="background-color: #9B59B6; color: white;">Finance</label>
                
                <input type="radio" class="btn-check" name="editColor" id="editColorHr" value="hr">
                <label class="btn btn-sm" for="editColorHr" style="background-color: #E74C3C; color: white;">RH</label>
              </div>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="editIsActive" checked>
              <label class="form-check-label" for="editIsActive">Catégorie active</label>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary" form="editCategoryForm">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap & Custom JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('storage/adminJs/categories.js') }}"></script>
</body>
</html>