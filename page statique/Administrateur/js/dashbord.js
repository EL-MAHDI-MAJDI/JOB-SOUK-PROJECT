// Toggle sidebar on mobile
document.getElementById('menuToggle').addEventListener('click', function() {
  document.querySelector('.side-menu').classList.toggle('show');
});

// Graphique des inscriptions
const inscriptionsCtx = document.getElementById('inscriptionsChart').getContext('2d');
const inscriptionsChart = new Chart(inscriptionsCtx, {
  type: 'line',
  data: {
    labels: ['1 Jan', '2 Jan', '3 Jan', '4 Jan', '5 Jan', '6 Jan', '7 Jan'],
    datasets: [
      {
        label: 'Candidats',
        data: [12, 19, 15, 22, 18, 25, 30],
        borderColor: '#2ECC71',
        backgroundColor: 'rgba(46, 204, 113, 0.1)',
        tension: 0.3,
        fill: true
      },
      {
        label: 'Entreprises',
        data: [5, 8, 6, 10, 7, 12, 15],
        borderColor: '#3498db',
        backgroundColor: 'rgba(52, 152, 219, 0.1)',
        tension: 0.3,
        fill: true
      }
    ]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        position: 'top',
      }
    }
  }
});

// Graphique des offres
const offresCtx = document.getElementById('offresChart').getContext('2d');
const offresChart = new Chart(offresCtx, {
  type: 'bar',
  data: {
    labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4'],
    datasets: [
      {
        label: 'Offres publiées',
        data: [120, 150, 180, 210],
        backgroundColor: 'rgba(155, 89, 182, 0.7)',
      },
      {
        label: 'Offres expirées',
        data: [30, 40, 35, 45],
        backgroundColor: 'rgba(231, 76, 60, 0.7)',
      }
    ]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        position: 'top',
      }
    }
  }
});