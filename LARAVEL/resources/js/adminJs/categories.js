document.addEventListener('DOMContentLoaded', function() {
    // Toggle sidebar on mobile
    document.getElementById('menuToggle').addEventListener('click', function() {
      document.querySelector('.side-menu').classList.toggle('show');
    });
  
    // Toggle between grid and list view
    document.getElementById('gridView').addEventListener('change', function() {
      document.getElementById('categoriesGridView').classList.remove('d-none');
      document.getElementById('categoriesListView').classList.add('d-none');
    });
  
    document.getElementById('listView').addEventListener('change', function() {
      document.getElementById('categoriesGridView').classList.add('d-none');
      document.getElementById('categoriesListView').classList.remove('d-none');
    });
  
    // Search functionality
    document.getElementById('searchButton').addEventListener('click', function() {
      const searchTerm = document.getElementById('searchInput').value.toLowerCase();
      const cards = document.querySelectorAll('#categoriesGridView .category-card');
      
      cards.forEach(card => {
        const text = card.textContent.toLowerCase();
        card.style.display = text.includes(searchTerm) ? '' : 'none';
      });
    });
  
    // Gestionnaire pour l'ajout de catégorie
    const categoryForm = document.getElementById('categoryForm');
    categoryForm?.addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        
        try {
            const response = await fetch('/admin/categories', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });
            
            if (response.ok) {
                location.reload();
            }
        } catch (error) {
            console.error('Erreur:', error);
        }
    });
  
    // Gestionnaire pour la suppression
    document.querySelectorAll('.delete-category').forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();
            if (confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ? Cette action est irréversible.')) {
                const categoryId = this.dataset.categoryId;
                
                try {
                    const response = await fetch(`/admin/categories/${categoryId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        }
                    });
                    
                    if (response.ok) {
                        const result = await response.json();
                        if (result.success) {
                            location.reload();
                        } else {
                            alert('Erreur lors de la suppression : ' + result.message);
                        }
                    }
                } catch (error) {
                    console.error('Erreur:', error);
                    alert('Une erreur est survenue lors de la suppression');
                }
            }
        });
    });
  
    // Gestionnaire pour la gestion des sous-catégories
    document.querySelectorAll('.manage-subcategories').forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();
            const categoryId = this.dataset.categoryId;
            const categoryName = this.dataset.categoryName;
            
            // Mettre à jour le titre du modal
            document.getElementById('parentCategoryName').textContent = `Sous-catégories de : ${categoryName}`;
            document.getElementById('parentCategoryId').value = categoryId;
            
            try {
                const response = await fetch(`/admin/categories/${categoryId}/sous-categories`, {
                    headers: {
                        'Accept': 'application/json'
                    }
                });
                
                if (response.ok) {
                    const subcategories = await response.json();
                    const tbody = document.getElementById('subcategoriesList');
                    tbody.innerHTML = '';
                    
                    subcategories.forEach(sub => {
                        tbody.innerHTML += `
                            <tr>
                                <td>${sub.nom}</td>
                                <td>${sub.description || ''}</td>
                                <td>
                                    <span class="badge ${sub.is_active ? 'bg-success' : 'bg-danger'}">
                                        ${sub.is_active ? 'Active' : 'Inactive'}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary edit-subcategory" 
                                            data-subcategory-id="${sub.id}">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger delete-subcategory" 
                                            data-subcategory-id="${sub.id}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                }
            } catch (error) {
                console.error('Erreur:', error);
                alert('Une erreur est survenue lors du chargement des sous-catégories');
            }
        });
    });

    // Gestionnaire pour l'ajout de sous-catégorie
    const subcategoryForm = document.getElementById('subcategoryForm');
    subcategoryForm?.addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const parentId = formData.get('parent_id');
        
        try {
            const response = await fetch(`/admin/categories/${parentId}/sous-categories`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            });
            
            if (response.ok) {
                const result = await response.json();
                if (result.success) {
                    location.reload();
                } else {
                    alert('Erreur lors de l\'ajout : ' + result.message);
                }
            }
        } catch (error) {
            console.error('Erreur:', error);
            alert('Une erreur est survenue lors de l\'ajout de la sous-catégorie');
        }
    });

    // Gestionnaire pour la suppression de sous-catégorie
    document.addEventListener('click', async function(e) {
        if (e.target.closest('.delete-subcategory')) {
            e.preventDefault();
            const button = e.target.closest('.delete-subcategory');
            const subcategoryId = button.dataset.subcategoryId;
            
            if (confirm('Êtes-vous sûr de vouloir supprimer cette sous-catégorie ?')) {
                try {
                    const response = await fetch(`/admin/categories/sous-categories/${subcategoryId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        }
                    });
                    
                    if (response.ok) {
                        const result = await response.json();
                        if (result.success) {
                            location.reload();
                        } else {
                            alert('Erreur lors de la suppression : ' + result.message);
                        }
                    }
                } catch (error) {
                    console.error('Erreur:', error);
                    alert('Une erreur est survenue lors de la suppression');
                }
            }
        }
    });
});
// Gestion des catégories
document.addEventListener('DOMContentLoaded', function() {
    // Gestion du mode d'affichage
    const gridView = document.getElementById('gridView');
    const listView = document.getElementById('listView');
    const categoriesGridView = document.getElementById('categoriesGridView');
    const categoriesListView = document.getElementById('categoriesListView');

    gridView.addEventListener('change', function() {
        categoriesGridView.classList.remove('d-none');
        categoriesListView.classList.add('d-none');
    });

    listView.addEventListener('change', function() {
        categoriesGridView.classList.add('d-none');
        categoriesListView.classList.remove('d-none');
    });

    // Gestion de l'ajout de catégorie
    const categoryForm = document.getElementById('categoryForm');
    if (categoryForm) {
        categoryForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            fetch('/admin/categories', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(Object.fromEntries(formData))
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Erreur lors de l\'ajout de la catégorie');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Erreur lors de l\'ajout de la catégorie');
            });
        });
    }

    // Gestion de la modification de catégorie
    const editButtons = document.querySelectorAll('[data-bs-target="#editCategoryModal"]');
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const categoryId = this.dataset.categoryId;
            fetch(`/admin/categories/${categoryId}`)
                .then(response => response.json())
                .then(data => {
                    const form = document.getElementById('editCategoryForm');
                    form.querySelector('[name="nom"]').value = data.nom;
                    form.querySelector('[name="description"]').value = data.description;
                    form.querySelector('[name="icone"]').value = data.icone;
                    form.querySelector('[name="couleur"]').value = data.couleur;
                    form.querySelector('[name="is_active"]').checked = data.is_active;
                    form.dataset.categoryId = categoryId;
                });
        });
    });

    // Gestion de la suppression de catégorie
    const deleteButtons = document.querySelectorAll('.delete-category');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')) {
                const categoryId = this.dataset.categoryId;
                fetch(`/admin/categories/${categoryId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Erreur lors de la suppression de la catégorie');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Erreur lors de la suppression de la catégorie');
                });
            }
        });
    });

    // Gestion des sous-catégories
    const manageSubcategoriesButtons = document.querySelectorAll('.manage-subcategories');
    manageSubcategoriesButtons.forEach(button => {
        button.addEventListener('click', function() {
            const categoryId = this.dataset.categoryId;
            const categoryName = this.dataset.categoryName;
            
            // Mettre à jour le titre du modal
            document.querySelector('#manageSubcategoriesModal .modal-title').textContent = 
                `Gérer les sous-catégories de ${categoryName}`;
            
            // Charger les sous-catégories
            fetch(`/admin/categories/${categoryId}/sous-categories`)
                .then(response => response.json())
                .then(data => {
                    const subcategoriesList = document.getElementById('subcategoriesList');
                    subcategoriesList.innerHTML = '';
                    
                    data.forEach(subcategory => {
                        const li = document.createElement('li');
                        li.className = 'list-group-item d-flex justify-content-between align-items-center';
                        li.innerHTML = `
                            <div>
                                <i class="bi bi-${subcategory.icone} me-2"></i>
                                ${subcategory.nom}
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
                });
        });
    });
}); 