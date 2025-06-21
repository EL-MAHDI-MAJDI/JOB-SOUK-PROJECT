// Script pour gérer l'affichage des champs selon le type d'entretien
document.addEventListener('DOMContentLoaded', function() {
  const videoDetails = document.getElementById('videoConferenceDetails');
  const locationDetails = document.getElementById('locationDetails');
  const phoneDetails = document.getElementById('phoneDetails'); // Nouveau div pour téléphone
  
  // Fonction pour mettre à jour l'affichage des champs
  function updateFieldsDisplay(type) {
    // Masquer tous les champs spécifiques
    videoDetails.classList.add('d-none');
    locationDetails.classList.add('d-none');
    phoneDetails.classList.add('d-none');
    
    // Afficher uniquement le champ correspondant au type sélectionné
    if (type === 'Visioconference') {
      videoDetails.classList.remove('d-none');
    } else if (type === 'EnPersonne') {
      locationDetails.classList.remove('d-none');
    } else if (type === 'Telephonique') {
      phoneDetails.classList.remove('d-none');
    }
  }
  
  // Écouter les changements sur les radios de type d'entretien
  document.querySelectorAll('input[name="type"]').forEach(radio => {
    radio.addEventListener('change', function() {
      updateFieldsDisplay(this.value);
    });
  });
  
  // Initialiser l'affichage correct au chargement de la page
  const selectedType = document.querySelector('input[name="type"]:checked');
  if (selectedType) {
    updateFieldsDisplay(selectedType.value);
  }
  
  // Toggle sidebar on mobile
  const menuToggle = document.getElementById('menuToggle');
  if (menuToggle) {
    menuToggle.addEventListener('click', function() {
      document.querySelector('.side-menu').classList.toggle('show');
    });
  }
  
  // Initialisation des tooltips
  const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
});