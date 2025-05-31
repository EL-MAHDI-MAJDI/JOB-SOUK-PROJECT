@props(['entreprise','offre'])
<div class="modal fade" id="editOfferModal" tabindex="-1" aria-labelledby="editOfferModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title fw-bold" id="editOfferModalLabel">Modifier offre d'emploi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('entreprise.offresEmploi.edit', ['entreprise' => $entreprise, 'offre' => $offre]) }}">
              @csrf
              @method('PUT')
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="jobTitle" class="form-label">Intitulé du poste*</label>
                  <input type="text" class="form-control @error('intitule_offre_emploi') is-invalid @enderror" id="jobTitle" name="intitule_offre_emploi" placeholder="Ex: Développeur Full Stack" required value="{{ old('intitule_offre_emploi', $offre->intitule_offre_emploi ?? '') }}">
                  @error('intitule_offre_emploi')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="jobType" class="form-label">Type de contrat*</label>
                  <select class="form-select @error('type_contrat') is-invalid @enderror" id="jobType" name="type_contrat" required>
                    <option value="" disabled {{ old('type_contrat', $offre->type_contrat ?? '') ? '' : 'selected' }}>Sélectionner</option>
                    <option value="CDI" {{ old('type_contrat', $offre->type_contrat ?? '') == 'CDI' ? 'selected' : '' }}>CDI</option>
                    <option value="CDD" {{ old('type_contrat', $offre->type_contrat ?? '') == 'CDD' ? 'selected' : '' }}>CDD</option>
                    <option value="Freelance" {{ old('type_contrat', $offre->type_contrat ?? '') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                    <option value="Stage" {{ old('type_contrat', $offre->type_contrat ?? '') == 'Stage' ? 'selected' : '' }}>Stage</option>
                    <option value="Alternance" {{ old('type_contrat', $offre->type_contrat ?? '') == 'Alternance' ? 'selected' : '' }}>Alternance</option>
                  </select>
                  @error('type_contrat')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="salaryRange" class="form-label">Salaire (optionnel)</label>
                  <input type="text" class="form-control @error('salaire_offre_emploi') is-invalid @enderror" id="salaryRange" name="salaire_offre_emploi" placeholder="Ex: 15 000 - 20 000 MAD" value="{{ old('salaire_offre_emploi', $offre->salaire_offre_emploi ?? '') }}">
                  @error('salaire_offre_emploi')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="experienceLevel" class="form-label">Niveau d'expérience*</label>
                  <select class="form-select @error('niveau_experience_demander') is-invalid @enderror" id="experienceLevel" name="niveau_experience_demander" required>
                    <option value="" disabled {{ old('niveau_experience_demander', $offre->niveau_experience_demander ?? '') ? '' : 'selected' }}>Sélectionner</option>
                    <option value="Débutant (0-2 ans)" {{ old('niveau_experience_demander', $offre->niveau_experience_demander ?? '') == 'Débutant (0-2 ans)' ? 'selected' : '' }}>Débutant (0-2 ans)</option>
                    <option value="Intermédiaire (2-5 ans)" {{ old('niveau_experience_demander', $offre->niveau_experience_demander ?? '') == 'Intermédiaire (2-5 ans)' ? 'selected' : '' }}>Intermédiaire (2-5 ans)</option>
                    <option value="Confirmé (5-10 ans)" {{ old('niveau_experience_demander', $offre->niveau_experience_demander ?? '') == 'Confirmé (5-10 ans)' ? 'selected' : '' }}>Confirmé (5-10 ans)</option>
                    <option value="Senior (+10 ans)" {{ old('niveau_experience_demander', $offre->niveau_experience_demander ?? '') == 'Senior (+10 ans)' ? 'selected' : '' }}>Senior (+10 ans)</option>
                  </select>
                  @error('niveau_experience_demander')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="mb-3">
                <label for="jobDescription" class="form-label">Description du poste*</label>
                <textarea class="form-control @error('description_offre_emploi') is-invalid @enderror" id="jobDescription" name="description_offre_emploi" rows="5" placeholder="Décrivez en détail les missions et responsabilités du poste..." required>{{ old('description_offre_emploi', $offre->description_offre_emploi ?? '') }}</textarea>
                @error('description_offre_emploi')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="jobRequirements" class="form-label">Compétences requises*</label>
                <textarea class="form-control @error('competences_requises') is-invalid @enderror" id="jobRequirements" name="competences_requises" rows="3" placeholder="Listez les compétences et qualifications nécessaires..." required>{{ old('competences_requises', $offre->competences_requises ?? '') }}</textarea>
                <div class="form-text">Séparez les compétences par des virgules</div>
                @error('competences_requises')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="jobBenefits" class="form-label">Avantages (optionnel)</label>
                <textarea class="form-control @error('avantage_offre_emploi') is-invalid @enderror" id="jobBenefits" name="avantage_offre_emploi" rows="2" placeholder="Listez les avantages proposés...">{{ old('avantage_offre_emploi', $offre->avantage_offre_emploi ?? '') }}</textarea>
                @error('avantage_offre_emploi')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="row mb-4">
                <div class="col-md-6">
                  <label for="applicationDeadline" class="form-label">Date limite de candidature*</label>
                  <input type="date" class="form-control @error('date_limite_candidature') is-invalid @enderror" id="applicationDeadline" name="date_limite_candidature" required value="{{ old('date_limite_candidature', $offre->date_limite_candidature ?? '') }}">
                  @error('date_limite_candidature')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="localisation" class="form-label">Localisation*</label>
                  <input type="text" class="form-control @error('localisation') is-invalid @enderror" id="localisation" name="localisation" placeholder="Ex: Casablanca, Remote" required value="{{ old('localisation', $offre->localisation ?? '') }}">
                  @error('localisation')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="border-top pt-3 mb-3">
                <h6 class="fw-bold">Informations supplémentaires</h6>
                <div class="row">
                  <div class="col-md-6">
                    <label for="contactEmail" class="form-label">Email de contact (optionnel)</label>
                    <input type="email" class="form-control @error('email_contact') is-invalid @enderror" id="contactEmail" name="email_contact" placeholder="contact@entreprise.com" value="{{ old('email_contact', $offre->email_contact ?? '') }}">
                    @error('email_contact')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label for="contactPhone" class="form-label">Téléphone (optionnel)</label>
                    <input type="tel" class="form-control @error('telephone_contact') is-invalid @enderror" id="contactPhone" name="telephone_contact" placeholder="06 12 34 56 78" value="{{ old('telephone_contact', $offre->telephone_contact ?? '') }}">
                    @error('telephone_contact')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Publier l'offre</button>
              </div>
            </form>
          </div>
        </div>
  </div>
</div>