// Toggle sidebar on mobile
document.getElementById('menuToggle').addEventListener('click', function() {
  document.querySelector('.side-menu').classList.toggle('show');
});

// Basic table filtering functionality
document.getElementById('searchButton').addEventListener('click', function() {
  const searchTerm = document.getElementById('searchInput').value.toLowerCase();
  const rows = document.querySelectorAll('#offersTable tbody tr');
  
  rows.forEach(row => {
    const text = row.textContent.toLowerCase();
    row.style.display = text.includes(searchTerm) ? '' : 'none';
  });
});

// Filter by status
document.getElementById('statusFilter').addEventListener('change', function() {
  const filterValue = this.value;
  const rows = document.querySelectorAll('#offersTable tbody tr');
  
  rows.forEach(row => {
    if (filterValue === 'all') {
      row.style.display = '';
    } else {
      const statusText = row.querySelector('td:nth-child(7) span').textContent.toLowerCase();
      row.style.display = statusText.includes(filterValue) ? '' : 'none';
    }
  });
});

// Filter by type
document.getElementById('typeFilter').addEventListener('change', function() {
  const filterValue = this.value;
  const rows = document.querySelectorAll('#offersTable tbody tr');
  
  rows.forEach(row => {
    if (filterValue === 'all') {
      row.style.display = '';
    } else {
      const typeText = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
      row.style.display = typeText.includes(filterValue) ? '' : 'none';
    }
  });
});

// Filter by category
document.getElementById('categoryFilter').addEventListener('change', function() {
  const filterValue = this.value;
  const rows = document.querySelectorAll('#offersTable tbody tr');
  
  // This would need to be implemented based on your actual data structure
  // For demo purposes, we'll just show all rows
  rows.forEach(row => {
    row.style.display = filterValue === 'all' ? '' : 'none';
  });
});

// Export button functionality
document.getElementById('exportOffersBtn').addEventListener('click', function() {
  alert('Fonctionnalité d\'export à implémenter');
  // Ici vous pourriez ajouter la logique pour exporter les données
  // en CSV, Excel ou autre format
});