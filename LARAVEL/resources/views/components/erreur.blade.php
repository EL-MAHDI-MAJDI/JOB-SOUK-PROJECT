    @if ($errors->any())
        <x-alert type="danger">
            <h5 class="alert-heading">Erreur de validation</h5>
            <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </x-alert>
    @endif