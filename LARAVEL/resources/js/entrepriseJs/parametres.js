// Toggle sidebar on mobile
document.getElementById('menuToggle').addEventListener('click', function() {
  document.querySelector('.side-menu').classList.toggle('show');
});

// Activer les tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});

// Gestion des onglets
var triggerTabList = [].slice.call(document.querySelectorAll('a[data-bs-toggle="list"]'));
triggerTabList.forEach(function (triggerEl) {
  triggerEl.addEventListener('click', function (event) {
    event.preventDefault();
    var target = triggerEl.getAttribute('href');
    var tab = new bootstrap.Tab(triggerEl);
    tab.show();
    
    // Mettre à jour l'état actif dans la navigation
    var navItems = document.querySelectorAll('.list-group-item-action');
    navItems.forEach(function(item) {
      item.classList.remove('active');
    });
    triggerEl.classList.add('active');
  });
});

// Confirmation pour les actions sensibles
document.querySelectorAll('.btn-outline-danger').forEach(function(button) {
  button.addEventListener('click', function(e) {
    if(!confirm('Êtes-vous sûr de vouloir effectuer cette action ?')) {
      e.preventDefault();
    }
  });
});

// Gestion du formulaire de modification du mot de passe
document.getElementById('passwordForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Validation côté client
    const newPassword = document.getElementById('new_password').value;
    const confirmPassword = document.getElementById('new_password_confirmation').value;
    
    if (newPassword !== confirmPassword) {
        alert('Les mots de passe ne correspondent pas');
        return;
    }
    
    // Si tout est ok, soumettre le formulaire
    this.submit();
});