<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Offres - Admin JobSouk</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  @vite(['resources/css/StyleAdmin/gestionOffres.css'])
</head>
<body>
  <!-- Sidebar Menu -->
  <div class="side-menu">
    <x-compoAdmin.side-menu activePage='3' />
  </div>

  <!-- Top Navigation -->
  <nav class="top-navbar navbar navbar-expand">
    <x-compoAdmin.navbar />
  </nav>

  <!-- Main Content -->
  <div class="main-content">
    <div class="container-fluid">
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="fw-bold mb-1">Gestion des Offres</h2>
          <p class="text-muted mb-0">Gérez toutes les offres d'emploi de la plateforme</p>
        </div>
      </div>

      <!-- Filters Card -->
      <div class="dashboard-card p-4 mb-4">
        <div class="row g-3">
          <div class="col-md-3">
            <label class="form-label">Statut</label>
            <select class="form-select" id="statusFilter">
              <option value="all">Tous les statuts</option>
              <option value="active">Actives</option>
              <option value="pending">En attente</option>
              <option value="expired">Expirées</option>
              <option value="draft">Brouillons</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Type</label>
            <select class="form-select" id="typeFilter">
              <option value="all">Tous les types</option>
              <option value="full-time">Temps plein</option>
              <option value="part-time">Temps partiel</option>
              <option value="remote">Télétravail</option>
              <option value="internship">Stage</option>
              <option value="freelance">Freelance</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Catégorie</label>
            <select class="form-select" id="categoryFilter">
              <option value="all">Toutes catégories</option>
              <option value="it">Informatique</option>
              <option value="marketing">Marketing</option>
              <option value="finance">Finance</option>
              <option value="hr">Ressources Humaines</option>
              <option value="design">Design</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Recherche</label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Titre, entreprise..." id="searchInput">
              <button class="btn btn-outline-secondary" type="button" id="searchButton">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Offers Table -->
      <div class="dashboard-card p-4">
        <div class="table-responsive">
          <table class="table table-hover align-middle" id="offersTable">
            <thead>
              <tr>
                <th width="50px"></th>
                <th>Offre</th>
                <th>Entreprise</th>
                <th>Type</th>
                <th>Postulations</th>
                <th>Date expiration</th>
                <th>Statut</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              @if($offres->isEmpty())
                <tr>
                  <td colspan="8" class="text-center py-4">
                    <div class="text-muted">
                      <i class="bi bi-box-seam me-2"></i>
                      Aucune offre d'emploi trouvée
                    </div>
                  </td>
                </tr>
              @else
                @foreach($offres as $offre)
                  <tr>
                    <td>
                      <img src="{{ asset('storage/' . $offre->entreprise->logo) }}" 
                           alt="{{ $offre->entreprise->nomEntreprise }}" 
                           class="rounded-circle" 
                           width="40" 
                           height="40" 
                           style="object-fit: cover;">
                    </td>
                    <td>
                      <div class="job-title">{{ $offre->intitule_offre_emploi }}</div>
                      <div class="job-type">
                        <i class="bi bi-geo-alt me-1"></i>
                        {{ $offre->localisation }}
                      </div>
                    </td>
                    <td>
                      <div class="company-name">{{ $offre->entreprise->nomEntreprise }}</div>
                      <small class="text-muted">{{ $offre->entreprise->secteur }}</small>
                    </td>
                    <td>
                      <span class="badge bg-primary rounded-pill">
                        {{ $offre->type_contrat }}
                      </span>
                    </td>
                    <td>
                      <span class="badge bg-success rounded-pill">
                        {{ $offre->candidats->count() }}
                      </span>
                    </td>
                    <td>
                      {{ $offre->date_limite_candidature }}
                    </td>
                    <td>
                      <span class="badge bg-{{ $offre->status === 'active' ? 'success' : ($offre->status === 'pending' ? 'warning' : 'danger') }}">
                        {{ ucfirst($offre->status) }}
                      </span>
                    </td>
                    <td class="text-end">
                      <div class="btn-group">
                        <a href="javascript:void(0);" 
                           class="btn btn-sm btn-outline-primary view-offer" 
                           data-offer-id="{{ $offre->id }}">
                          <i class="bi bi-eye"></i>
                        </a>
                        <form action="{{ route('admin.gestionOffres.destroy', $offre->id) }}" 
                              method="POST" 
                              class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" 
                                  class="btn btn-sm btn-outline-danger delete-offer" 
                                  data-offer-id="{{ $offre->id }}">
                            <i class="bi bi-trash"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>

      <!-- Pagination -->
      <div class="d-flex justify-content-center mt-3">
        {{ $offres->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>

  <!-- Modal Détail Offre -->
  <div class="modal fade" id="offreDetailModal" tabindex="-1" aria-labelledby="offreDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="offreDetailModalLabel">Détails de l'offre</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          <div id="offre-details-content">
            <!-- Les détails seront chargés ici par JS -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap & Custom JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @vite(['resources/js/adminJs/gestion-offres.js'])

  <script>
    document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.view-offer').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const offreId = this.getAttribute('data-offer-id');
      fetch(`/admin/gestionOffres/${offreId}`)
        .then(response => response.json())
        .then(offre => {
          let description = offre.description_offre_emploi && offre.description_offre_emploi.trim() !== ""
            ? offre.description_offre_emploi
            : '<span class="text-muted">Aucune description</span>';
          let avantages = offre.avantage_offre_emploi && offre.avantage_offre_emploi.trim() !== ""
            ? offre.avantage_offre_emploi
            : '<span class="text-muted">Aucun avantage précisé</span>';
          let salaire = offre.salaire_offre_emploi && offre.salaire_offre_emploi.trim() !== ""
            ? offre.salaire_offre_emploi
            : '<span class="text-muted">Non précisé</span>';
          let email = offre.email_contact && offre.email_contact.trim() !== ""
            ? offre.email_contact
            : '<span class="text-muted">Non précisé</span>';
          let tel = offre.telephone_contact && offre.telephone_contact.trim() !== ""
            ? offre.telephone_contact
            : '<span class="text-muted">Non précisé</span>';
          let competences = offre.competences_requises && offre.competences_requises.trim() !== ""
            ? offre.competences_requises
            : '<span class="text-muted">Non précisé</span>';

          let html = `
            <div class="row">
              <div class="col-md-3 text-center">
                <img src="/storage/${offre.entreprise.logo}" alt="${offre.entreprise.nomEntreprise}" class="rounded-circle mb-2" width="80" height="80" style="object-fit:cover;">
                <div class="fw-bold mt-2">${offre.entreprise.nomEntreprise}</div>
                <div class="text-muted small">${offre.entreprise.secteur || ''}</div>
              </div>
              <div class="col-md-9">
                <h4 class="fw-bold mb-2">${offre.intitule_offre_emploi}</h4>
                <div class="mb-2">
                  <span class="badge bg-primary me-2">${offre.type_contrat}</span>
                  <span class="badge bg-secondary">${offre.status.charAt(0).toUpperCase() + offre.status.slice(1)}</span>
                </div>
                <ul class="list-group list-group-flush mb-3">
                  <li class="list-group-item"><i class="bi bi-geo-alt me-2"></i><strong>Localisation :</strong> ${offre.localisation}</li>
                  <li class="list-group-item"><i class="bi bi-cash-coin me-2"></i><strong>Salaire :</strong> ${salaire}</li>
                  <li class="list-group-item"><i class="bi bi-briefcase me-2"></i><strong>Niveau d'expérience :</strong> ${offre.niveau_experience_demander}</li>
                  <li class="list-group-item"><i class="bi bi-calendar-event me-2"></i><strong>Date limite :</strong> ${offre.date_limite_candidature}</li>
                  <li class="list-group-item"><i class="bi bi-envelope me-2"></i><strong>Email contact :</strong> ${email}</li>
                  <li class="list-group-item"><i class="bi bi-telephone me-2"></i><strong>Téléphone contact :</strong> ${tel}</li>
                  <li class="list-group-item"><i class="bi bi-people me-2"></i><strong>Candidatures :</strong> ${offre.candidats.length}</li>
                </ul>
                <div class="mb-2">
                  <strong>Description :</strong>
                  <div class="border rounded p-2 bg-light mt-1" style="white-space: pre-line;">${description}</div>
                </div>
                <div class="mb-2">
                  <strong>Avantages :</strong>
                  <div class="border rounded p-2 bg-light mt-1" style="white-space: pre-line;">${avantages}</div>
                </div>
                <div class="mb-2">
                  <strong>Compétences requises :</strong>
                  <div class="border rounded p-2 bg-light mt-1" style="white-space: pre-line;">${competences}</div>
                </div>
              </div>
            </div>
          `;
          document.getElementById('offre-details-content').innerHTML = html;
          let modal = new bootstrap.Modal(document.getElementById('offreDetailModal'));
          modal.show();
        });
    });
  });
});
  </script>

  <style>
    #offre-details-content .list-group-item {
  background: transparent;
  border: none;
  padding-left: 0;
}
#offre-details-content .badge {
  font-size: 1em;
}
#offre-details-content .border.bg-light {
  font-size: 1em;
}
  </style>
</body>
</html>