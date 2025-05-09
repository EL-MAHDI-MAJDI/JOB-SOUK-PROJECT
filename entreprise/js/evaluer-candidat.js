// Toggle sidebar on mobile
document.getElementById('menuToggle').addEventListener('click', function() {
  document.querySelector('.side-menu').classList.toggle('show');
});

// Mise à jour de la valeur de l'expérience dans le filtre
const experienceFilter = document.getElementById('experienceFilter');
const experienceValue = document.getElementById('experienceValue');
if (experienceFilter && experienceValue) {
  experienceFilter.addEventListener('input', () => {
    experienceValue.textContent = `${experienceFilter.value}+ années`;
  });
}

// Gestion du collapse des offres
document.querySelectorAll('.offer-header').forEach(header => {
  header.addEventListener('click', function() {
    const icon = this.querySelector('.bi');
    if (icon) {
      icon.classList.toggle('bi-chevron-down');
      icon.classList.toggle('bi-chevron-up');
    }
  });
});