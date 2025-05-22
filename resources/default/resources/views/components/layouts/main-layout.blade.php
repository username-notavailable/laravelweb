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
    <body class="{{ $bodyClasses }}" {{ ($bodyStyle !== '' ? 'style="' . $bodyStyle . '"' : '') }}>
        @if ($dumpSession && config('app.env') !== 'production')
            <!-- {!! var_dump('SESSION', session()->all()) !!} -->
        @endif

        @if ($useLoadingWaitSpinner)
            <div id="main-load-spinner" style="display: none;">
                @if (\Illuminate\Support\Facades\View::exists('components.commons.main-load-spinner'))
                    @include('components.commons.main-load-spinner')
                @else
                    <div style="text-align: center; margin-top: 3rem;" role="status">
                        <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                        </svg>
                    </div>
                @endif
            </div>
            <div id="main-slot" class="fz-invisible" style="display: none;">
                {{ $slot }}
            </div>
        @else
            {{ $slot }}
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
                    document.getElementById('main-load-spinner').classList.add('fz-hidden');
                    document.getElementById('main-slot').classList.remove('fz-invisible');
                });
            }

            document.addEventListener('DOMContentLoaded', (event) => {
                if (document.getElementById('main-load-spinner') !== null) {
                    document.getElementById('main-load-spinner').removeAttribute('style');
                    document.getElementById('main-slot').removeAttribute('style');
                }

                @if ($runInitJsApp)
                    if (typeof window.initJsApp === 'function') {
                        window.initJsApp(event);
                    }
                @endif
            });
        </script>
    </body>
</html>