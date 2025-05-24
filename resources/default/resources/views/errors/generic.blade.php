@php
    $viewContext = [
        'MAIN-LAYOUT' => [
            'title' => __('Errore :code', ['code' => 500]),
            'useLoadingWaitSpinner' => false
        ]
    ];
@endphp

<x-main-layout :$viewContext>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <h1 class="display-1 fw-bold"><span class="text-danger">{{ __('Ops!') }}</span></h1>
            <p class="lead">
                {{ $lead }}
            </p>
            @if (config('app.debug'))
                <pre>{{ get_class($exception) }} - {{ $exception->getMessage() }}</pre>
            @endif
            <a href="/" class="btn btn-primary">{{ __('Torna alla Home') }}</a>
        </div>
    </div>
</x-main-layout>