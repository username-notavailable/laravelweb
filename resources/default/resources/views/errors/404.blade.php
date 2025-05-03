<x-main-layout :use-loading-wait-spinner=false :include-sizer=false :include-toast-container=false>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <h1 class="display-1 fw-bold">404</h1>
            <p class="fs-3"> <span class="text-danger">{{ __('Ops!') }}</span> {{ __('Pagina non trovata.') }}</p>
            <p class="lead">
                {{ __('La pagina che stai cercando non esiste.') }}
            </p>
            <a href="/" class="btn btn-primary">{{ __('Torna alla Home') }}</a>
        </div>
    </div>
</x-main-layout>