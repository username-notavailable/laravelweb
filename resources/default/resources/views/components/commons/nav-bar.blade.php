<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#top-navbar" aria-controls="top-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="top-navbar" class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('Utenti') }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{ __('Elenco') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('Nuovo') }}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('Gruppi') }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{ __('Elenco') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('Nuovo') }}</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="{{ __('Cerca') }}" aria-label="Search">
                <button class="btn btn-outline-success" type="button">{{ __('Cerca') }}</button>
            </form>
            <a class="btn" href="{{ route('auth_logout') }}">{{ __('Logout') }}</a>
        </div>
    </div>
</nav>