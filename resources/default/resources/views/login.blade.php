<x-main-layout :viewContext=$viewContext>
    <x-slot:pageInlineCss>
        <style>
            /*html, body {
                background-color: transparent !important;
            }*/

            .form-signx {
                max-width: 500px;
                padding: 1rem;
            }

            .form-signx .form-floating:focus-within {
                z-index: 2;
            }
        </style>
    </x-slot>

    <x-slot:pageJs>
        @vite(['resources/js/login.js'])
    </x-slot>

    <nav class="navbar d-flex justify-content-start">
        <div id="select-language-dropdown" class="dropdown ms-3">
            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-translate me-2"></i>{{ __('Linguaggio') }}
            </button>
            <ul class="dropdown-menu" data-locale-cookie-name="{!! config('fz.default.localeCookieName') !!}">
                @foreach (config('fz.i18n.locales') as $localeCode => $localeData)
                    @if ($localeCode === App::currentLocale())
                        <li><a class="dropdown-item" href="#" data-locale-code="{{ $localeCode }}"><img src="{{ route('asset_public_image', ['e' => 'flag', 'f' => $localeData['flagIco'], 's' => 'xxl']) }}" class="img-thumbnail me-2" style="width:35px;height:auto;" alt="" />{{ $localeData['name'] }}<i class="ms-1 bi bi-check"></i></a></li>
                    @else
                        <li><a class="dropdown-item" href="#" data-locale-code="{{ $localeCode }}"><img src="{{ route('asset_public_image', ['e' => 'flag', 'f' => $localeData['flagIco'], 's' => 'xxl']) }}" class="img-thumbnail me-2" style="width:35px;height:auto;" alt="" />{{ $localeData['name'] }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </nav>

    <div class="d-flex align-items-center pb-4 bg-transparent">
        <main class="form-signx w-100 m-auto border border-success-subtle rounded-3">
            <form method="POST" action="{{ route('auth_try_login') }}" class="rounded bg-dark text-white p-3" novalidate>
                @csrf

                <div class="form-floating mb-2">
                    <input type="email" name="email" class="form-control @is_invalid($errors->get('email'))" value="{{ old('email') }}" id="floating-email" placeholder="name@example.com">
                    <label for="floating-email">{{ __('Email') }}</label>
                    <div id="errors-email" class="invalid-feedback">
                        @foreach ($errors->get('email') as $error)
                            <p class="mb-1"><small>{{ $error }}</small></p>
                        @endforeach
                    </div>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" name="password" class="form-control @is_invalid($errors->get('password'))" value="{{ old('password') }}" id="floating-password" placeholder="Password">
                    <label for="floating-password">{{ __('Password') }}</label>
                    <div id="errors-password" class="invalid-feedback">
                        @foreach ($errors->get('password') as $error)
                            <p class="mb-1"><small>{{ $error }}</small></p>
                        @endforeach
                    </div>
                </div>
                <button class="btn btn-outline-success w-100 py-2 text-uppercase" type="submit">{{ __('Accedi') }}</button>
            </form>
        </main>
    </div>
</x-main-layout>


