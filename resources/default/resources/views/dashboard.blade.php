@php
    $title = 'Dashboard';
@endphp

<x-dashboard-layout :title=$title>
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse1" aria-expanded="false" aria-controls="panelsStayOpen-collapse1">
                    {{ __('Dati in sessione') }}
                </button>
            </h2>
            <div id="panelsStayOpen-collapse1" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <pre>{{ var_dump($sessionData) }}</pre>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse2" aria-expanded="false" aria-controls="panelsStayOpen-collapse2">
                    {{ __('Token Utente') }}
                </button>
            </h2>
            <div id="panelsStayOpen-collapse2" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <pre>{{ var_dump($userToken) }}</pre>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse3" aria-expanded="false" aria-controls="panelsStayOpen-collapse3">
                    {{ __('Decodifica access_token utente') }}
                </button>
            </h2>
            <div id="panelsStayOpen-collapse3" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <pre>{{ var_dump($decodedUserAccessToken) }}</pre>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse6" aria-expanded="false" aria-controls="panelsStayOpen-collapse6">
                    {{ __('Profilo del token utente') }}
                </button>
            </h2>
            <div id="panelsStayOpen-collapse6" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <pre>{{ var_dump($userTokenProfile) }}</pre>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse7" aria-expanded="false" aria-controls="panelsStayOpen-collapse7">
                    {{ __('Id utente') }}
                </button>
            </h2>
            <div id="panelsStayOpen-collapse7" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <pre>{{ var_dump($userTokenProfileId) }}</pre>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse4" aria-expanded="false" aria-controls="panelsStayOpen-collapse4">
                    {{ __('Token client') }}
                </button>
            </h2>
            <div id="panelsStayOpen-collapse4" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <pre>{{ var_dump($clientToken) }}</pre>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse5" aria-expanded="false" aria-controls="panelsStayOpen-collapse5">
                    {{ __('Decodifica access_token client') }}
                </button>
            </h2>
            <div id="panelsStayOpen-collapse5" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <pre>{{ var_dump($decodedClientAccessToken) }}</pre>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>