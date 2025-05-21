// Toggle sidebar on mobile
document.getElementById('menuToggle').addEventListener('click', function() {
  document.querySelector('.side-menu').classList.toggle('show');
});

// Save settings button
document.getElementById('saveSettingsBtn').addEventListener('click', function() {
  alert('Les paramètres ont été enregistrés avec succès');
  // Ici vous pourriez ajouter la logique pour sauvegarder les paramètres
});

// Initialize tab functionality
const tabLinks = document.querySelectorAll('.settings-nav .nav-link');
tabLinks.forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    tabLinks.forEach(l => l.classList.remove('active'));
    this.classList.add('active');
    const tabPane = document.querySelector(this.getAttribute('href'));
    document.querySelectorAll('.tab-pane').forEach(pane => {
      pane.classList.remove('show', 'active');
    });
    tabPane.classList.add('show', 'active');
  });
});