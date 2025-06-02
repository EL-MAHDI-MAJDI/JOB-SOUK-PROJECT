@props(['type'])

<div class="alert alert-{{ $type }} position-relative" role="alert">
    <button type="button" class="btn-close position-absolute top-0 end-0 m-2" data-bs-dismiss="alert" aria-label="Fermer"></button>
    <div>
        {{ $slot }}
    </div>
</div>
