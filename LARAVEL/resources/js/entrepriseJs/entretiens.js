// // Scripts pour la page Entretiens
// document.addEventListener('DOMContentLoaded', function() {
//   // Toggle sidebar on mobile
//   document.getElementById('menuToggle').addEventListener('click', function() {
//     document.querySelector('.side-menu').classList.toggle('show');
//   });

//   // Confirmation avant annulation d'entretien
//   const cancelButtons = document.querySelectorAll('.btn-outline-danger');
//   cancelButtons.forEach(button => {
//     button.addEventListener('click', function(e) {
//       if (!confirm("Êtes-vous sûr de vouloir annuler cet entretien ?")) {
//         e.preventDefault();
//       }
//     });
//   });
  
//   // Initialisation des tooltips
//   const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
//   tooltipTriggerList.map(function (tooltipTriggerEl) {
//     return new bootstrap.Tooltip(tooltipTriggerEl);
//   });
// });

// Script pour gérer l'affichage des champs selon le type d'entretien
document.addEventListener('DOMContentLoaded', function() {
  const videoDetails = document.getElementById('videoConferenceDetails');
  const locationDetails = document.getElementById('locationDetails');
  
  // Écouter les changements sur les radios de type d'entretien
  document.querySelectorAll('input[name="interviewType"]').forEach(radio => {
    radio.addEventListener('change', function() {
      if (this.value === 'video') {
        videoDetails.classList.remove('d-none');
        locationDetails.classList.add('d-none');
      } else if (this.value === 'inPerson') {
        videoDetails.classList.add('d-none');
        locationDetails.classList.remove('d-none');
      } else {
        videoDetails.classList.add('d-none');
        locationDetails.classList.add('d-none');
      }
    });
  });
  
  // Toggle sidebar on mobile
  document.getElementById('menuToggle').addEventListener('click', function() {
    document.querySelector('.side-menu').classList.toggle('show');
  });

  // Confirmation avant annulation d'entretien
  const cancelButtons = document.querySelectorAll('.btn-outline-danger');
  cancelButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      if (!confirm("Êtes-vous sûr de vouloir annuler cet entretien ?")) {
        e.preventDefault();
      }
    });
  });
  
  // Initialisation des tooltips
  const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
});