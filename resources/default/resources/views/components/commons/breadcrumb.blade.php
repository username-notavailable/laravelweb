@props([
    'breadcrumbLinks' => []
])

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach ($breadcrumbLinks as $breadcrumLink)
            @if ($loop->last)
                <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumLink['label'] }}</li>
            @else
                <li class="breadcrumb-item"><a href="{!! $breadcrumLink['url'] !!}">{{ $breadcrumLink['label'] }}</a></li>
            @endif
        @endforeach
    </ol>
</nav>