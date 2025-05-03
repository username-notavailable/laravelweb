@props([
    'lead' => __('Si è verificato un problema')
])

<x-main-layout :use-loading-wait-spinner=false :include-sizer=false :include-toast-container=false>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <h1 class="display-1 fw-bold"><span class="text-danger">{{ __('Ops!') }}</span></h1>
            <p class="lead">
                {{ $lead }}
            </p>
            <a href="/" class="btn btn-primary">{{ __('Torna alla Home') }}</a>
        </div>
    </div>
</x-main-layout>