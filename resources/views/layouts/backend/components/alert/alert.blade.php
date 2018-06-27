@if(session()->has('success'))

    @component('layouts.backend.components.alert.alert-component', ['category' => 'text-success'])

        {{ session('success') }}
        
    @endcomponent

@endif

@if(session()->has('error'))

    @component('layouts.backend.components.alert.alert-component', ['category' => 'text-danger'])

        {{ session('error') }}

    @endcomponent

@endif