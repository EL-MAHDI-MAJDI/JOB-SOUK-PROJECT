<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Catégories - Admin JobSouk</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  @vite(['resources/css/StyleAdmin/categories.css'])
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
                <h3 class="mb-0">{{ $stats['categories_count'] }}</h3>
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
                <h3 class="mb-0">{{ $stats['subcategories_count'] }}</h3>
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
                <h3 class="mb-0">{{ $stats['total_offers'] }}</h3>
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
                <h3 class="mb-0">0</h3>
              </div>
              <div class="bg-info bg-opacity-10 p-3 rounded">
                <i class="bi bi-lightbulb text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Categories Grid View -->
      <div class="row g-4" style="overflow: visible;">
        @foreach($categories as $category)
        <div class="col-xl-3 col-lg-4 col-md-6" style="overflow: visible;">
          <div class="dashboard-card category-card p-4" style="overflow: visible !important;">
            <div class="d-flex align-items-center mb-3">
              <div class="category-icon bg-{{ $category->couleur }} me-3 p-2 rounded">
                <i class="bi bi-{{ $category->icone }}"></i>
              </div>
              <div>
                <h5 class="mb-0">{{ $category->nom }}</h5>
                <span class="text-muted small">{{ $category->enfants->count() }} sous-catégories</span>
              </div>
            </div>
            <p class="text-muted small mb-3">{{ $category->description }}</p>
            <div class="d-flex justify-content-between align-items-center mt-auto">
              <span class="badge bg-{{ $category->couleur }} rounded-pill">0 offres</span>
              <div class="dropdown">
                <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                  <li>
                    <a class="dropdown-item py-2 edit-category" href="#" 
                       data-bs-toggle="modal" 
                       data-bs-target="#editCategoryModal" 
                       data-category-id="{{ $category->id }}"
                       data-category-nom="{{ $category->nom }}"
                       data-category-description="{{ $category->description }}"
                       data-category-icone="{{ $category->icone }}"
                       data-category-couleur="{{ $category->couleur }}"
                       data-category-active="{{ $category->is_active ? 'true' : 'false' }}">
                      <i class="bi bi-pencil me-2 text-primary"></i>Modifier
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item py-2 manage-subcategories" href="#" data-bs-toggle="modal" data-bs-target="#manageSubcategoriesModal" data-category-id="{{ $category->id }}" data-category-name="{{ $category->nom }}">
                      <i class="bi bi-diagram-2 me-2 text-success"></i>Gérer sous-catégories
                    </a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <a class="dropdown-item py-2 text-danger delete-category" href="#" data-category-id="{{ $category->id }}">
                      <i class="bi bi-trash me-2"></i>Supprimer
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <!-- Pagination -->
      <nav class="mt-4">
        <ul class="pagination justify-content-center">
          @if($categories->currentPage() > 1)
            <li class="page-item">
              <a class="page-link" href="{{ $categories->previousPageUrl() }}">Précédent</a>
            </li>
          @else
            <li class="page-item disabled">
              <span class="page-link">Précédent</span>
            </li>
          @endif

          @for($i = 1; $i <= $categories->lastPage(); $i++)
            <li class="page-item {{ $i == $categories->currentPage() ? 'active' : '' }}">
              <a class="page-link" href="{{ $categories->url($i) }}">{{ $i }}</a>
            </li>
          @endfor

          @if($categories->currentPage() < $categories->lastPage())
            <li class="page-item">
              <a class="page-link" href="{{ $categories->nextPageUrl() }}">Suivant</a>
            </li>
          @else
            <li class="page-item disabled">
              <span class="page-link">Suivant</span>
            </li>
          @endif
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
          <form id="categoryForm" action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Nom de la catégorie <span class="text-danger">*</span></label>
              <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}" required>
              @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>
              @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Icône <span class="text-danger">*</span></label>
              <select name="icone" class="form-select @error('icone') is-invalid @enderror" required>
                <option value="">Sélectionnez une icône</option>
                <option value="code-slash" {{ old('icone') == 'code-slash' ? 'selected' : '' }}>Développement</option>
                <option value="megaphone" {{ old('icone') == 'megaphone' ? 'selected' : '' }}>Marketing</option>
                <option value="cash-coin" {{ old('icone') == 'cash-coin' ? 'selected' : '' }}>Finance</option>
                <option value="people" {{ old('icone') == 'people' ? 'selected' : '' }}>RH</option>
                <option value="palette" {{ old('icone') == 'palette' ? 'selected' : '' }}>Design</option>
              </select>
              @error('icone')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Couleur <span class="text-danger">*</span></label>
              <select name="couleur" class="form-select @error('couleur') is-invalid @enderror" required>
                <option value="">Sélectionnez une couleur</option>
                <option value="primary" {{ old('couleur') == 'primary' ? 'selected' : '' }}>Bleu</option>
                <option value="success" {{ old('couleur') == 'success' ? 'selected' : '' }}>Vert</option>
                <option value="warning" {{ old('couleur') == 'warning' ? 'selected' : '' }}>Jaune</option>
                <option value="danger" {{ old('couleur') == 'danger' ? 'selected' : '' }}>Rouge</option>
                <option value="info" {{ old('couleur') == 'info' ? 'selected' : '' }}>Cyan</option>
              </select>
              @error('couleur')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input type="checkbox" name="is_active" class="form-check-input @error('is_active') is-invalid @enderror" id="isActive" {{ old('is_active', true) ? 'checked' : '' }}>
                <label class="form-check-label" for="isActive">Catégorie active</label>
                @error('is_active')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="text-end">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
          </form>
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
          <form id="editCategoryForm" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label class="form-label">Nom de la catégorie</label>
              <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Icône</label>
              <select name="icone" class="form-select">
                <option value="code-slash">Développement</option>
                <option value="megaphone">Marketing</option>
                <option value="cash-coin">Finance</option>
                <option value="people">RH</option>
                <option value="palette">Design</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Couleur</label>
              <select name="couleur" class="form-select">
                <option value="primary">Bleu</option>
                <option value="success">Vert</option>
                <option value="warning">Jaune</option>
                <option value="danger">Rouge</option>
                <option value="info">Cyan</option>
              </select>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input type="checkbox" name="is_active" class="form-check-input" id="editIsActive">
                <label class="form-check-label" for="editIsActive">Catégorie active</label>
              </div>
            </div>
            <div class="text-end">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Manage Subcategories Modal -->
  <div class="modal fade" id="manageSubcategoriesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Gérer les sous-catégories</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="subcategoryForm" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Nom de la sous-catégorie</label>
              <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Icône</label>
              <select name="icone" class="form-select">
                <option value="code-slash">Développement</option>
                <option value="megaphone">Marketing</option>
                <option value="cash-coin">Finance</option>
                <option value="people">RH</option>
                <option value="palette">Design</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Couleur</label>
              <select name="couleur" class="form-select">
                <option value="primary">Bleu</option>
                <option value="success">Vert</option>
                <option value="warning">Jaune</option>
                <option value="danger">Rouge</option>
                <option value="info">Cyan</option>
              </select>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input type="checkbox" name="is_active" class="form-check-input" id="subcategoryIsActive" checked>
                <label class="form-check-label" for="subcategoryIsActive">Sous-catégorie active</label>
              </div>
            </div>
            <div class="text-end">
              <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
          </form>

          <hr>

          <h6 class="mb-3">Sous-catégories existantes</h6>
          <ul id="subcategoriesList" class="list-group">
            <!-- Les sous-catégories seront ajoutées ici dynamiquement -->
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Subcategory Modal -->
  <div class="modal fade" id="editSubcategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modifier la sous-catégorie</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editSubcategoryForm" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label class="form-label">Nom de la sous-catégorie</label>
              <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Icône</label>
              <select name="icone" class="form-select">
                <option value="code-slash">Développement</option>
                <option value="megaphone">Marketing</option>
                <option value="cash-coin">Finance</option>
                <option value="people">RH</option>
                <option value="palette">Design</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Couleur</label>
              <select name="couleur" class="form-select">
                <option value="primary">Bleu</option>
                <option value="success">Vert</option>
                <option value="warning">Jaune</option>
                <option value="danger">Rouge</option>
                <option value="info">Cyan</option>
              </select>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input type="checkbox" name="is_active" class="form-check-input" id="editSubcategoryIsActive">
                <label class="form-check-label" for="editSubcategoryIsActive">Sous-catégorie active</label>
              </div>
            </div>
            <div class="text-end">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap & Custom JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Gestion des catégories
    document.addEventListener('DOMContentLoaded', function() {
      // Gestion de l'ajout de catégorie
      const categoryForm = document.getElementById('categoryForm');
      if (categoryForm) {
        categoryForm.addEventListener('submit', async function(e) {
          e.preventDefault();
          
          try {
            const formData = new FormData(this);
            const data = {};
            formData.forEach((value, key) => {
              if (key === 'is_active') {
                data[key] = value === 'on';
              } else {
                data[key] = value;
              }
            });

            const response = await fetch(this.action, {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
              },
              body: JSON.stringify(data)
            });

            const result = await response.json();

            if (response.ok) {
              window.location.reload();
            } else {
              if (result.errors) {
                // Afficher les erreurs de validation
                const errorMessages = Object.values(result.errors).flat();
                alert(errorMessages.join('\n'));
              } else {
                throw new Error(result.message || 'Erreur lors de l\'ajout de la catégorie');
              }
            }
          } catch (error) {
            console.error('Error:', error);
            alert(error.message);
          }
        });
      }

      // Gestion de la modification de catégorie
      document.addEventListener('click', function(e) {
        if (e.target.closest('.edit-category')) {
          const link = e.target.closest('.edit-category');
          const categoryId = link.dataset.categoryId;
          const form = document.getElementById('editCategoryForm');
          
          // Remplir le formulaire avec les données
          form.action = `/admin/categories/update/${categoryId}`;
          form.querySelector('[name="nom"]').value = link.dataset.categoryNom;
          form.querySelector('[name="description"]').value = link.dataset.categoryDescription;
          form.querySelector('[name="icone"]').value = link.dataset.categoryIcone;
          form.querySelector('[name="couleur"]').value = link.dataset.categoryCouleur;
          form.querySelector('[name="is_active"]').checked = link.dataset.categoryActive === 'true';
        }
      });

      // Gestion de la soumission du formulaire de modification
      const editCategoryForm = document.getElementById('editCategoryForm');
      if (editCategoryForm) {
        editCategoryForm.addEventListener('submit', async function(e) {
          e.preventDefault();
          
          try {
            const formData = new FormData(this);
            const data = {};
            formData.forEach((value, key) => {
              if (key === 'is_active') {
                data[key] = value === 'on';
              } else {
                data[key] = value;
              }
            });

            const response = await fetch(this.action, {
              method: 'PUT',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
              },
              body: JSON.stringify(data)
            });

            const result = await response.json();

            if (response.ok) {
              window.location.reload();
            } else {
              throw new Error(result.message || 'Erreur lors de la mise à jour de la catégorie');
            }
          } catch (error) {
            console.error('Error:', error);
            alert(error.message);
          }
        });
      }

      // Gestion de la suppression de catégorie
      const deleteButtons = document.querySelectorAll('.delete-category');
      deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
          e.preventDefault();
          if (confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')) {
            const categoryId = this.dataset.categoryId;
            fetch(`/admin/categories/delete/${categoryId}`, {
              method: 'DELETE',
              headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
              }
            })
            .then(response => response.json())
            .then(data => {
              location.reload();
            })
            .catch(error => {
              console.error('Error:', error);
              alert('Erreur lors de la suppression de la catégorie');
            });
          }
        });
      });

      // Gestion de l'ajout de sous-catégorie
      const subcategoryForm = document.getElementById('subcategoryForm');
      if (subcategoryForm) {
        subcategoryForm.addEventListener('submit', async function(e) {
          e.preventDefault();
          
          try {
            const formData = new FormData(this);
            const data = {};
            formData.forEach((value, key) => {
              if (key === 'is_active') {
                data[key] = value === 'on';
              } else {
                data[key] = value;
              }
            });

            const response = await fetch(this.action, {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
              },
              body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.success) {
              // Ajouter la nouvelle sous-catégorie à la liste
              const subcategoriesList = document.getElementById('subcategoriesList');
              const li = document.createElement('li');
              li.className = 'list-group-item d-flex justify-content-between align-items-center';
              li.innerHTML = `
                <div>
                  <i class="bi bi-${result.data.icone} me-2"></i>
                  ${result.data.nom}
                  ${result.data.description ? `<br><small class="text-muted">${result.data.description}</small>` : ''}
                </div>
                <div>
                  <button class="btn btn-sm btn-outline-primary edit-subcategory" 
                          data-subcategory-id="${result.data.id}">
                    <i class="bi bi-pencil"></i>
                  </button>
                  <button class="btn btn-sm btn-outline-danger delete-subcategory" 
                          data-subcategory-id="${result.data.id}">
                    <i class="bi bi-trash"></i>
                  </button>
                </div>
              `;
              subcategoriesList.appendChild(li);

              // Réinitialiser le formulaire
              this.reset();
              
              // Afficher un message de succès
              alert('Sous-catégorie ajoutée avec succès');
            } else {
              throw new Error(result.message || 'Erreur lors de l\'ajout de la sous-catégorie');
            }
          } catch (error) {
            console.error('Error:', error);
            alert(error.message);
          }
        });
      }

      // Gestion de la suppression des sous-catégories
      document.addEventListener('click', async function(e) {
        if (e.target.closest('.delete-subcategory')) {
          const button = e.target.closest('.delete-subcategory');
          const subcategoryId = button.dataset.subcategoryId;
          
          if (confirm('Êtes-vous sûr de vouloir supprimer cette sous-catégorie ?')) {
            try {
              const response = await fetch(`/admin/categories/delete/${subcategoryId}`, {
                method: 'DELETE',
                headers: {
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                  'Accept': 'application/json'
                }
              });

              const result = await response.json();

              if (result.success) {
                // Supprimer l'élément de la liste
                button.closest('li').remove();
                alert('Sous-catégorie supprimée avec succès');
              } else {
                throw new Error(result.message || 'Erreur lors de la suppression de la sous-catégorie');
              }
            } catch (error) {
              console.error('Error:', error);
              alert(error.message);
            }
          }
        }
      });

      // Gestion des sous-catégories
      const manageSubcategoriesButtons = document.querySelectorAll('.manage-subcategories');
      manageSubcategoriesButtons.forEach(button => {
        button.addEventListener('click', async function() {
          const categoryId = this.dataset.categoryId;
          const categoryName = this.dataset.categoryName;
          
          // Mettre à jour le titre du modal
          document.querySelector('#manageSubcategoriesModal .modal-title').textContent = 
            `Gérer les sous-catégories de ${categoryName}`;
          
          // Mettre à jour l'action du formulaire
          const form = document.getElementById('subcategoryForm');
          form.action = `/admin/categories/subcategories/${categoryId}`;
          
          try {
            // Charger les sous-catégories
            const response = await fetch(`/admin/categories/subcategories/${categoryId}`, {
              headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
              }
            });

            const result = await response.json();

            if (response.ok) {
              const subcategoriesList = document.getElementById('subcategoriesList');
              subcategoriesList.innerHTML = '';
              
              if (result.data && result.data.length > 0) {
                result.data.forEach(subcategory => {
                  const li = document.createElement('li');
                  li.className = 'list-group-item d-flex justify-content-between align-items-center';
                  li.innerHTML = `
                    <div>
                      <i class="bi bi-${subcategory.icone} me-2"></i>
                      ${subcategory.nom}
                      ${subcategory.description ? `<br><small class="text-muted">${subcategory.description}</small>` : ''}
                    </div>
                    <div>
                      <button class="btn btn-sm btn-outline-primary edit-subcategory" 
                              data-subcategory-id="${subcategory.id}">
                        <i class="bi bi-pencil"></i>
                      </button>
                      <button class="btn btn-sm btn-outline-danger delete-subcategory" 
                              data-subcategory-id="${subcategory.id}">
                        <i class="bi bi-trash"></i>
                      </button>
                    </div>
                  `;
                  subcategoriesList.appendChild(li);
                });
              } else {
                subcategoriesList.innerHTML = `
                  <li class="list-group-item text-center">
                    <div class="text-muted mb-2">Aucune sous-catégorie n'existe pour cette catégorie</div>
                    <small class="text-muted">Utilisez le formulaire ci-dessus pour ajouter une sous-catégorie</small>
                  </li>
                `;
              }
            } else {
              throw new Error(result.message || 'Erreur lors du chargement des sous-catégories');
            }
          } catch (error) {
            console.error('Error:', error);
            const subcategoriesList = document.getElementById('subcategoriesList');
            subcategoriesList.innerHTML = `
              <li class="list-group-item text-center text-danger">
                <i class="bi bi-exclamation-triangle me-2"></i>
                ${error.message}
              </li>
            `;
          }
        });
      });

      // Gestion de la modification des sous-catégories
      document.addEventListener('click', async function(e) {
        if (e.target.closest('.edit-subcategory')) {
          const button = e.target.closest('.edit-subcategory');
          const subcategoryId = button.dataset.subcategoryId;
          const form = document.getElementById('editSubcategoryForm');
          
          try {
            // Récupérer les données de la sous-catégorie
            const response = await fetch(`/admin/categories/${subcategoryId}`, {
              method: 'GET',
              headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
              }
            });

            if (!response.ok) {
              throw new Error(`Erreur HTTP: ${response.status}`);
            }

            const result = await response.json();

            if (result.success) {
              // Remplir le formulaire avec les données
              form.querySelector('[name="nom"]').value = result.data.nom || '';
              form.querySelector('[name="description"]').value = result.data.description || '';
              form.querySelector('[name="icone"]').value = result.data.icone || 'code-slash';
              form.querySelector('[name="couleur"]').value = result.data.couleur || 'primary';
              form.querySelector('[name="is_active"]').checked = result.data.is_active === true;

              // Mettre à jour l'action du formulaire
              form.action = `/admin/categories/update/${subcategoryId}`;

              // Afficher le modal
              const modal = new bootstrap.Modal(document.getElementById('editSubcategoryModal'));
              modal.show();
            } else {
              throw new Error(result.message || 'Erreur lors du chargement des données de la sous-catégorie');
            }
          } catch (error) {
            console.error('Error:', error);
            alert(error.message);
          }
        }
      });

      // Gestion de la soumission du formulaire de modification de sous-catégorie
      const editSubcategoryForm = document.getElementById('editSubcategoryForm');
      if (editSubcategoryForm) {
        editSubcategoryForm.addEventListener('submit', async function(e) {
          e.preventDefault();
          
          try {
            const formData = new FormData(this);
            const data = {};
            formData.forEach((value, key) => {
              if (key === 'is_active') {
                data[key] = value === 'on';
              } else {
                data[key] = value;
              }
            });

            const response = await fetch(this.action, {
              method: 'PUT',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
              },
              body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.success) {
              // Fermer le modal
              const modal = bootstrap.Modal.getInstance(document.getElementById('editSubcategoryModal'));
              modal.hide();

              // Mettre à jour l'élément dans la liste
              const listItem = document.querySelector(`[data-subcategory-id="${result.data.id}"]`).closest('li');
              listItem.querySelector('i').className = `bi bi-${result.data.icone} me-2`;
              listItem.querySelector('div:first-child').innerHTML = `
                <i class="bi bi-${result.data.icone} me-2"></i>
                ${result.data.nom}
                ${result.data.description ? `<br><small class="text-muted">${result.data.description}</small>` : ''}
              `;

              alert('Sous-catégorie modifiée avec succès');
            } else {
              throw new Error(result.message || 'Erreur lors de la modification de la sous-catégorie');
            }
          } catch (error) {
            console.error('Error:', error);
            alert(error.message);
          }
        });
      }
    });
  </script>
</body>
</html>