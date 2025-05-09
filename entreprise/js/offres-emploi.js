// Toggle sidebar on mobile
document.getElementById('menuToggle').addEventListener('click', function() {
  document.querySelector('.side-menu').classList.toggle('show');
});

// Gestion des couleurs dynamiques pour les cartes de stats
const statCards = document.querySelectorAll('.dashboard-card');
statCards.forEach((card, index) => {
  const icon = card.querySelector('.bi');
  const number = card.querySelector('.fw-bold');
  
  switch(index) {
    case 0:
      number.style.color = 'var(--primary)';
      break;
    case 1:
      number.style.color = 'var(--secondary)';
      break;
    case 2:
      number.style.color = 'var(--accent)';
      break;
    case 3:
      number.style.color = '#3498db';
      break;
  }
});

// Initialisation des tooltips
const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});