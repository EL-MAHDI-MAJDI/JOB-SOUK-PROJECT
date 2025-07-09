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