document.addEventListener('DOMContentLoaded', function() {
  // Gestion du menu mobile
  const menuToggle = document.getElementById('menuToggle');
  const sideMenu = document.querySelector('.side-menu');
  const mobileOverlay = document.querySelector('.mobile-overlay');
  
  menuToggle.addEventListener('click', function() {
    sideMenu.classList.toggle('show');
    mobileOverlay.classList.toggle('show');
  });
  
  mobileOverlay.addEventListener('click', function() {
    sideMenu.classList.remove('show');
    mobileOverlay.classList.remove('show');
  });
  
  // Gestion de l'envoi de message
  const sendBtn = document.getElementById('sendBtn');
  const messageInput = document.getElementById('messageInput');
  
  sendBtn.addEventListener('click', function() {
    const messageText = messageInput.value.trim();
    if (messageText) {
      sendMessage(messageText);
      messageInput.value = '';
    }
  });
  
  messageInput.addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
      const messageText = messageInput.value.trim();
      if (messageText) {
        sendMessage(messageText);
        messageInput.value = '';
      }
    }
  });
  
  function sendMessage(text) {
    const messagesArea = document.querySelector('.messages-area');
    const now = new Date();
    const timeString = now.getHours() + ':' + (now.getMinutes() < 10 ? '0' : '') + now.getMinutes();
    
    const messageElement = document.createElement('div');
    messageElement.className = 'message sent mb-3';
    messageElement.innerHTML = `
      <div class="message-content">
        <p>${text}</p>
        <small class="text-muted">${timeString}</small>
      </div>
    `;
    
    messagesArea.appendChild(messageElement);
    messagesArea.scrollTop = messagesArea.scrollHeight;
  }
  
  // Gestion du clic sur un contact
  const contactItems = document.querySelectorAll('.contact-item');
  contactItems.forEach(item => {
    item.addEventListener('click', function() {
      contactItems.forEach(i => i.classList.remove('active'));
      this.classList.add('active');
      
      // Mettre à jour l'en-tête du chat avec les infos du contact
      const contactName = this.querySelector('h6').textContent;
      updateChatHeader(contactName);
    });
  });

  // Gestion des boutons d'appel et de CV
  document.getElementById('callBtn').addEventListener('click', function() {
    alert('Fonctionnalité d\'appel sera implémentée ici');
  });

  document.getElementById('viewCvBtn').addEventListener('click', function() {
    alert('Affichage du CV sera implémenté ici');
  });

  // Gestion du bouton Nouveau message
  const newMessageBtn = document.getElementById('newMessageBtn');
  const newMessageModal = document.getElementById('newMessageModal');
  const closeModal = document.getElementById('closeModal');
  const contactSearchInput = document.getElementById('contactSearchInput');
  const searchResults = document.getElementById('searchResults');

  newMessageBtn.addEventListener('click', function() {
    newMessageModal.style.display = 'flex';
    contactSearchInput.focus();
  });

  closeModal.addEventListener('click', function() {
    newMessageModal.style.display = 'none';
    contactSearchInput.value = '';
    searchResults.innerHTML = '';
  });

  // Fermer la modal en cliquant à l'extérieur
  newMessageModal.addEventListener('click', function(e) {
    if (e.target === newMessageModal) {
      newMessageModal.style.display = 'none';
      contactSearchInput.value = '';
      searchResults.innerHTML = '';
    }
  });

  // Recherche de contacts
  contactSearchInput.addEventListener('input', function() {
    const searchTerm = this.value.trim().toLowerCase();
    
    if (searchTerm.length < 2) {
      searchResults.innerHTML = '';
      return;
    }
    
    // Simuler une recherche avec des résultats fictifs
    simulateSearch(searchTerm);
  });

  // Fonction pour simuler une recherche de contacts
  function simulateSearch(searchTerm) {
    // En production, vous feriez une requête AJAX ici
    // Pour l'exemple, nous utilisons des données fictives
    const fakeContacts = [
      {
        id: 1,
        name: "Karim Benzema",
        title: "Développeur Full Stack",
        location: "Casablanca",
        experience: "5 ans",
        rating: "4.9/5",
        img: "https://via.placeholder.com/40"
      },
      {
        id: 2,
        name: "Zineb El Mansouri",
        title: "Designer UI/UX",
        location: "Rabat",
        experience: "3 ans",
        rating: "4.7/5",
        img: "https://via.placeholder.com/40"
      },
      {
        id: 3,
        name: "Mehdi Tazi",
        title: "Chef de projet",
        location: "Marrakech",
        experience: "7 ans",
        rating: "4.8/5",
        img: "https://via.placeholder.com/40"
      },
      {
        id: 4,
        name: "Amina Belhaj",
        title: "Marketing Digital",
        location: "Tanger",
        experience: "4 ans",
        rating: "4.5/5",
        img: "https://via.placeholder.com/40"
      },
      {
        id: 5,
        name: "Hassan Kadi",
        title: "Data Scientist",
        location: "Fès",
        experience: "6 ans",
        rating: "4.9/5",
        img: "https://via.placeholder.com/40"
      }
    ];

    // Filtrer les contacts selon le terme de recherche
    const filteredContacts = fakeContacts.filter(contact => 
      contact.name.toLowerCase().includes(searchTerm) || 
      contact.title.toLowerCase().includes(searchTerm)
    );

    // Afficher les résultats
    displaySearchResults(filteredContacts);
  }

  // Fonction pour afficher les résultats de recherche
  function displaySearchResults(contacts) {
    searchResults.innerHTML = '';
    
    if (contacts.length === 0) {
      searchResults.innerHTML = '<p class="text-muted text-center py-3">Aucun résultat trouvé</p>';
      return;
    }
    
    contacts.forEach(contact => {
      const contactElement = document.createElement('div');
      contactElement.className = 'search-result-item';
      contactElement.innerHTML = `
        <img src="${contact.img}" alt="${contact.name}">
        <div class="info">
          <div class="name">${contact.name}</div>
          <div class="title">${contact.title}</div>
          <small class="d-flex align-items-center mt-1">
            <i class="bi bi-geo-alt me-1"></i> ${contact.location} • 
            <i class="bi bi-briefcase ms-2 me-1"></i> ${contact.experience} • 
            <i class="bi bi-star-fill text-warning ms-2 me-1"></i> ${contact.rating}
          </small>
        </div>
        <button class="add-btn" data-id="${contact.id}">
          <i class="bi bi-plus"></i> Ajouter
        </button>
      `;
      
      searchResults.appendChild(contactElement);
    });
    
    // Gestion du clic sur le bouton Ajouter
    document.querySelectorAll('.add-btn').forEach(btn => {
      btn.addEventListener('click', function(e) {
        e.stopPropagation();
        const contactId = this.getAttribute('data-id');
        addNewContact(contactId);
      });
    });
  }

  // Fonction pour ajouter un nouveau contact
  function addNewContact(contactId) {
    // En production, vous feriez une requête AJAX ici
    // Pour l'exemple, nous utilisons des données fictives
    const fakeContacts = {
      1: {
        name: "Karim Benzema",
        lastMessage: "Disponible pour un entretien",
        time: "Maintenant",
        img: "https://via.placeholder.com/50"
      },
      2: {
        name: "Zineb El Mansouri",
        lastMessage: "A envoyé son portfolio",
        time: "11:45",
        img: "https://via.placeholder.com/50"
      },
      3: {
        name: "Mehdi Tazi",
        lastMessage: "Demande des détails sur le poste",
        time: "Hier",
        img: "https://via.placeholder.com/50"
      },
      4: {
        name: "Amina Belhaj",
        lastMessage: "Intéressée par la mission",
        time: "12/05",
        img: "https://via.placeholder.com/50"
      },
      5: {
        name: "Hassan Kadi",
        lastMessage: "A accepté votre invitation",
        time: "10/05",
        img: "https://via.placeholder.com/50"
      }
    };
    
    const contact = fakeContacts[contactId];
    if (!contact) return;
    
    // Créer un nouvel élément de contact
    const contactsList = document.querySelector('.contacts-list');
    const newContact = document.createElement('div');
    newContact.className = 'contact-item';
    newContact.innerHTML = `
      <div class="d-flex align-items-center p-3">
        <img src="${contact.img}" alt="Profil" class="rounded-circle me-3" width="50" height="50">
        <div class="flex-grow-1">
          <div class="d-flex justify-content-between">
            <h6 class="fw-bold mb-1">${contact.name}</h6>
            <small class="text-muted">${contact.time}</small>
          </div>
          <p class="mb-0 text-truncate">${contact.lastMessage}</p>
        </div>
      </div>
    `;
    
    // Ajouter le nouveau contact en haut de la liste
    contactsList.insertBefore(newContact, contactsList.firstChild);
    
    // Fermer la modal
    newMessageModal.style.display = 'none';
    contactSearchInput.value = '';
    searchResults.innerHTML = '';
    
    // Sélectionner le nouveau contact
    contactItems.forEach(item => item.classList.remove('active'));
    newContact.classList.add('active');
    updateChatHeader(contact.name);
    
    // Ajouter un message de bienvenue
    const messagesArea = document.querySelector('.messages-area');
    messagesArea.innerHTML = `
      <div class="text-center py-4 text-muted">
        Vous avez démarré une nouvelle conversation avec ${contact.name}
      </div>
    `;
  }

  // Fonction pour mettre à jour l'en-tête du chat
  function updateChatHeader(contactName) {
    const chatHeader = document.querySelector('.chat-header h4');
    if (chatHeader) {
      chatHeader.textContent = contactName;
    }
  }
});