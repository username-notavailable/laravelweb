@props([
    'class' => 'd-flex justify-content-center'
])

<div class="{{ $class }}">
    <div class="spinner-border mt-2" role="status">
        <span class="visually-hidden">{{ __('Loading...') }}</span>
    </div>
</div>