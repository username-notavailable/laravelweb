<x-main-layout :use-loading-wait-spinner=false :include-sizer=false :include-toast-container=false>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <h1 class="display-1 fw-bold">500</h1>
            <p class="fs-3"> <span class="text-danger">{{ __('Ops!') }}</span></p>
            <p class="lead">
                {{ __('Errore nell\'elaborazione della richiesta.') }}
            </p>
            @if (config('app.env') !== 'production')
                <pre>{{ $code['exception']->getCode() }} - {{ $code['exception']->getMessage() }}</pre>
            @endif
            <a href="/" class="btn btn-primary">{{ __('Torna alla Home') }}</a>
        </div>
    </div>
</x-main-layout>