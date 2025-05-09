// Toggle sidebar on mobile
document.getElementById('menuToggle').addEventListener('click', function() {
  document.querySelector('.side-menu').classList.toggle('show');
});

// Gestion des tags de compétences
document.querySelectorAll('.skill-tag').forEach(tag => {
  tag.addEventListener('click', function() {
    this.classList.toggle('selected');
  });
});

// Animation des cartes de candidats
const candidateCards = document.querySelectorAll('.list-group-item');
candidateCards.forEach(card => {
  card.addEventListener('mouseenter', function() {
    this.style.transform = 'translateX(5px)';
  });
  
  card.addEventListener('mouseleave', function() {
    this.style.transform = 'translateX(0)';
  });
});