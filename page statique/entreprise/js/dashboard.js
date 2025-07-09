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

// Gestion du type d'entretien (afficher/masquer les champs appropriés)
document.getElementById('interviewType').addEventListener('change', function() {
  const locField = document.getElementById('locationField');
  const linkField = document.getElementById('linkField');
  
  if (this.value === 'inperson') {
    locField.style.display = 'block';
    linkField.style.display = 'none';
  } else if (this.value === 'online') {
    locField.style.display = 'none';
    linkField.style.display = 'block';
  } else { // téléphonique
    locField.style.display = 'none';
    linkField.style.display = 'none';
  }
});

// Initialiser l'affichage des champs d'entretien
document.addEventListener('DOMContentLoaded', function() {
  const interviewType = document.getElementById('interviewType');
  if (interviewType) {
    // Au chargement initial, masquer le champ de location pour l'option "en ligne"
    document.getElementById('locationField').style.display = 'none';
  }
  
  // Gestion des tags de compétences
  const addSkillBtn = document.getElementById('addSkillBtn');
  if (addSkillBtn) {
    addSkillBtn.addEventListener('click', function() {
      const skillInput = document.getElementById('skillInput');
      const skillsList = document.getElementById('skillsList');
      
      if (skillInput.value.trim() !== '') {
        const newTag = document.createElement('span');
        newTag.className = 'tag';
        newTag.innerHTML = `${skillInput.value} <i class="bi bi-x"></i>`;
        
        // Ajouter un écouteur d'événement pour supprimer le tag
        newTag.querySelector('.bi-x').addEventListener('click', function() {
          newTag.remove();
        });
        
        skillsList.appendChild(newTag);
        skillInput.value = '';
      }
    });
  }
  
  // Ajout des écouteurs pour supprimer les tags existants
  document.querySelectorAll('.tag .bi-x').forEach(tag => {
    tag.addEventListener('click', function() {
      this.parentElement.remove();
    });
  });
});