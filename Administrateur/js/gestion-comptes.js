// Toggle sidebar on mobile
document.getElementById('menuToggle').addEventListener('click', function() {
  document.querySelector('.side-menu').classList.toggle('show');
});

// Basic table filtering functionality
document.getElementById('searchButton').addEventListener('click', function() {
  const searchTerm = document.getElementById('searchInput').value.toLowerCase();
  const rows = document.querySelectorAll('#usersTable tbody tr');
  
  rows.forEach(row => {
    const text = row.textContent.toLowerCase();
    row.style.display = text.includes(searchTerm) ? '' : 'none';
  });
});

// Filter by account type
document.getElementById('accountTypeFilter').addEventListener('change', function() {
  const filterValue = this.value;
  const rows = document.querySelectorAll('#usersTable tbody tr');
  
  rows.forEach(row => {
    if (filterValue === 'all') {
      row.style.display = '';
    } else {
      const badgeText = row.querySelector('td:nth-child(3) span').textContent.toLowerCase();
      row.style.display = badgeText.includes(filterValue) ? '' : 'none';
    }
  });
});

// Filter by status
document.getElementById('statusFilter').addEventListener('change', function() {
  const filterValue = this.value;
  const rows = document.querySelectorAll('#usersTable tbody tr');
  
  rows.forEach(row => {
    if (filterValue === 'all') {
      row.style.display = '';
    } else {
      const statusText = row.querySelector('td:nth-child(6) span').textContent.toLowerCase();
      row.style.display = statusText.includes(filterValue) ? '' : 'none';
    }
  });
});

// Export button functionality
document.getElementById('exportUsersBtn').addEventListener('click', function() {
  alert('Fonctionnalité d\'export à implémenter');
  // Ici vous pourriez ajouter la logique pour exporter les données
  // en CSV, Excel ou autre format
});