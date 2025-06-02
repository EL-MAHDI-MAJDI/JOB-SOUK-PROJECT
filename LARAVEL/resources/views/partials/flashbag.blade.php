@if (session()->has('success'))
            <x-alert type="success" >
                <h5>{{ session('success') }}</h5>
            </x-alert>
@elseif (session()->has('danger'))
        <x-alert type="danger" >
            <h5>{{ session('danger') }}</h5>
        </x-alert> 
@endif
