// Toggle sidebar on mobile
document.getElementById('menuToggle').addEventListener('click', function() {
  document.querySelector('.side-menu').classList.toggle('show');
});

// Filter reports
document.querySelectorAll('[data-filter]').forEach(item => {
  item.addEventListener('click', function(e) {
    e.preventDefault();
    const filterValue = this.getAttribute('data-filter');
    const rows = document.querySelectorAll('#reportsTable tbody tr');
    
    rows.forEach(row => {
      if (filterValue === 'all') {
        row.style.display = '';
      } else {
        const statusText = row.querySelector('td:nth-child(6) span').textContent.toLowerCase();
        const statusClass = row.className.includes(filterValue);
        row.style.display = (statusText.includes(filterValue) || statusClass) ? '' : 'none';
      }
    });
  });
});

// Search functionality
document.getElementById('searchButton').addEventListener('click', function() {
  const searchTerm = document.getElementById('searchInput').value.toLowerCase();
  const rows = document.querySelectorAll('#reportsTable tbody tr');
  
  rows.forEach(row => {
    const text = row.textContent.toLowerCase();
    row.style.display = text.includes(searchTerm) ? '' : 'none';
  });
});

// Export button functionality
document.getElementById('exportReportsBtn').addEventListener('click', function() {
  alert('Fonctionnalité d\'export à implémenter');
  // Ici vous pourriez ajouter la logique pour exporter les données
  // en CSV, Excel ou autre format
});