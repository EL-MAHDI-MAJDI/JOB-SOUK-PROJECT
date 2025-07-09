// Toggle sidebar on mobile
document.getElementById('menuToggle').addEventListener('click', function() {
  document.querySelector('.side-menu').classList.toggle('show');
});

// Notification interactions
document.querySelectorAll('.notification-item').forEach(item => {
  item.addEventListener('click', function(e) {
    // Ignore if clicking on action buttons
    if (!e.target.closest('.notification-actions')) {
      this.classList.remove('unread');
      this.querySelector('.notification-badge')?.remove();
    }
  });
});

// Mark all as read
document.querySelector('.btn-outline-secondary').addEventListener('click', function() {
  document.querySelectorAll('.notification-item.unread').forEach(item => {
    item.classList.remove('unread');
    item.querySelector('.notification-badge')?.remove();
  });
});

// Delete all notifications
document.querySelector('.btn-outline-danger').addEventListener('click', function() {
  if (confirm('Êtes-vous sûr de vouloir supprimer toutes les notifications ?')) {
    document.querySelectorAll('.notification-item').forEach(item => {
      item.remove();
    });
  }
});