<!-- Modal détails compte non validé -->
<div class="modal fade" id="pendingModal" tabindex="-1" aria-labelledby="pendingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="pendingModalLabel">
          <i class="bi bi-exclamation-triangle-fill"></i> Compte en attente de validation
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body text-center">
        <p>
          Votre compte entreprise est actuellement <strong>en attente de validation</strong> par l’administrateur.
        </p>
        <ul class="list-unstyled mb-3">
          <li>• Vous pouvez publier des offres, mais elles ne seront visibles qu’après la validation de votre compte.</li>
          <li>• Un email de confirmation vous sera envoyé dès que votre compte sera validé.</li>
        </ul>
        <div class="border-top pt-3">
          <div class="mb-2">
            <i class="bi bi-envelope-fill text-primary"></i>
            <span>admin@jobsouk.com</span>
          </div>
          <div>
            <i class="bi bi-telephone-fill text-primary"></i>
            <span>+212 6 12 34 56 78</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
<style>
    .card-disabled {
        max-width: 600px;
        margin: auto;
        margin-top: 10vh;
        border: none;
        border-radius: 1.5rem;
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        background: #fff;
    }
    .icon-lock {
        font-size: 4.5rem;
        color: #ffc107;
    }
    .title {
        color: #dc3545;
        font-weight: 700;
    }
    .subtitle {
        color: #6c757d;
    }
    .contact-info {
        margin-top: 2rem;
        font-size: 1.1rem;
    }
    .contact-info i {
        color: #0d6efd;
        margin-right: 8px;
    }
</style>