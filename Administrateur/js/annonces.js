// Toggle sidebar on mobile
document.getElementById('menuToggle').addEventListener('click', function() {
  document.querySelector('.side-menu').classList.toggle('show');
});

// Filter by status
document.getElementById('statusFilter').addEventListener('change', function() {
  const filterValue = this.value;
  const announcementCards = document.querySelectorAll('.announcement-card');
  
  announcementCards.forEach(card => {
    if (filterValue === 'all') {
      card.parentElement.style.display = '';
    } else {
      const statusBadge = card.querySelector('.badge:last-child').textContent.toLowerCase();
      card.parentElement.style.display = statusBadge.includes(filterValue) ? '' : 'none';
    }
  });
});

// Filter by type
document.getElementById('typeFilter').addEventListener('change', function() {
  const filterValue = this.value;
  const announcementCards = document.querySelectorAll('.announcement-card');
  
  announcementCards.forEach(card => {
    if (filterValue === 'all') {
      card.parentElement.style.display = '';
    } else {
      const typeBadge = card.querySelector('.badge:first-child').textContent.toLowerCase();
      card.parentElement.style.display = typeBadge.includes(filterValue) ? '' : 'none';
    }
  });
});

// Search functionality
document.getElementById('searchButton').addEventListener('click', function() {
  const searchTerm = document.getElementById('searchInput').value.toLowerCase();
  const announcementCards = document.querySelectorAll('.announcement-card');
  
  announcementCards.forEach(card => {
    const title = card.querySelector('h5').textContent.toLowerCase();
    const content = card.querySelector('p:nth-of-type(2)').textContent.toLowerCase();
    card.parentElement.style.display = (title.includes(searchTerm)) || (content.includes(searchTerm)) ? '' : 'none';
  });
});