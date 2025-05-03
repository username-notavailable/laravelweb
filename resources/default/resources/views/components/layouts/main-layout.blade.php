<!doctype html>
<html lang="{{ preg_replace('/_.*/', '', App::currentLocale()) }}" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        @if ($includeMetaEnv && config('app.env') !== 'production')
            <meta name="env" content="{{ config('app.env') }}" />
        @endif

        {{ $pageMetas }}
        
        <title>{{ config('app.name') }} {{ empty($title) ? '' : " | $title" }}</title>

        @if ($includeFavicon)
            <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        @endif

        @if ($includeAppCss)
            @vite(['resources/sass/app.scss'])
        @endif

        {{ $pageCss }}

        {{ $pageInlineCss }}
    </head>
    <body class="{{ $bodyClasses }}" style="{{ $bodyStyle }}">
        @if ($dumpSession && config('app.env') === 'production')
            <!-- {!! var_dump('SESSION', session()->all()) !!} -->
        @endif

        @if ($useLoadingWaitSpinner)
            <div id="main-load-spinner" class="d-flex align-items-center justify-content-center w-100 vh-100" style="display:none;">
                <div class="text-center">
                    <div class="spinner-border" style="width:6rem;height:6rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div id="main-slot" class="invisible" style="display:none;">
                {{ $slot }}
            </div>
        @else
            {{ $slot }}
        @endif

        @if ($includeToastContainer)
            <div id="toast-container" class="toast-container bottom-0 end-0 p-3"></div>
        @endif

        @if ($includeSizer)
            <div id="sizer">
                <div class="d-block d-sm-none d-md-none d-lg-none d-xl-none d-xxl-none" data-size="xs"></div>
                <div class="d-none d-sm-block d-md-none d-lg-none d-xl-none d-xxl-none" data-size="sm"></div>
                <div class="d-none d-sm-none d-md-block d-lg-none d-xl-none d-xxl-none" data-size="md"></div>
                <div class="d-none d-sm-none d-md-none d-lg-block d-xl-none d-xxl-none" data-size="lg"></div>
                <div class="d-none d-sm-none d-md-none d-lg-none d-xl-block d-xxl-none" data-size="xl"></div>
                <div class="d-none d-sm-none d-md-none d-lg-none d-xl-none d-xxl-block" data-size="xxl"></div>
            </div>
        @endif

        @if ($includeJsTranslations)
            <script src="{{ route('fz_locale_js_translations') }}"></script>
        @endif

        @if ($includeAppJs)
            @vite(['resources/js/app.js'])
        @endif

        {{ $pageJs }}

        {{ $pageInlineJs }}

        <script>
            if (document.getElementById('main-load-spinner') !== null) {
                document.addEventListener('show-main-slot', (event) => {
                    document.getElementById('main-load-spinner').classList.add('d-none');
                    document.getElementById('main-slot').classList.remove('invisible');
                });
            }

            document.addEventListener('DOMContentLoaded', (event) => {
                if (document.getElementById('main-load-spinner') !== null) {
                    document.getElementById('main-load-spinner').removeAttribute('style');
                    document.getElementById('main-slot').removeAttribute('style');
                }

                @if ($runInitJsPage)
                    if (typeof window.initJsPage === 'function') {
                        window.initJsPage(event);
                    }
                @endif
            });
        </script>
    </body>
</html>