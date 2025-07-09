// Toggle sidebar on mobile
document.getElementById('menuToggle').addEventListener('click', function() {
  document.querySelector('.side-menu').classList.toggle('show');
});

// Filter by role
document.getElementById('roleFilter').addEventListener('change', function() {
  const filterValue = this.value;
  const rows = document.querySelectorAll('#adminsTable tbody tr');
  
  rows.forEach(row => {
    if (filterValue === 'all') {
      row.style.display = '';
    } else {
      const roleText = row.querySelector('td:nth-child(3) span').textContent.toLowerCase();
      row.style.display = roleText.includes(filterValue) ? '' : 'none';
    }
  });
});

// Filter by status
document.getElementById('statusFilter').addEventListener('change', function() {
  const filterValue = this.value;
  const rows = document.querySelectorAll('#adminsTable tbody tr');
  
  rows.forEach(row => {
    if (filterValue === 'all') {
      row.style.display = '';
    } else {
      const statusText = row.querySelector('td:nth-child(6) span').textContent.toLowerCase();
      row.style.display = statusText.includes(filterValue) ? '' : 'none';
    }
  });
});

// Search functionality
document.getElementById('searchButton').addEventListener('click', function() {
  const searchTerm = document.getElementById('searchInput').value.toLowerCase();
  const rows = document.querySelectorAll('#adminsTable tbody tr');
  
  rows.forEach(row => {
    const text = row.textContent.toLowerCase();
    row.style.display = text.includes(searchTerm) ? '' : 'none';
  });
});