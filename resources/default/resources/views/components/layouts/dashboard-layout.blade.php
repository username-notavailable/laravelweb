<x-main-layout :$viewContext>
    <div hx-get="{{ htmx_link_url('NavBar', 'getNavBar') }}" hx-trigger="load" hx-swap="outerHTML">
        <x-commons.spinner class="d-flex justify-content-center htmx-indicator" />
    </div>

    <div class="container-md pt-4">
        <div class="row">
            <div class="col-12">
                <h1 class="display-6">{{ $dashboardTitle }}</h1>
                <p class="lead">{{ $dashboardSubTitle }}</p>

                <x-commons.breadcrumb :breadcrumb-links=$breadcrumbLinks/>
            </div>
            <div class="col-12">
                {{ $slot }}
            </div>
        </div>
    </div>

    <!-- <nav class="navbar fixed-bottom bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sticky bottom</a>
        </div>
    </nav> -->

    <x-slot:pageJs>
        @vite(['resources/js/dashboard.js'])
    </x-slot>
</x-main-layout>

