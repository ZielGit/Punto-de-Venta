@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-item active'
            : 'nav-item';
@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    {{-- <a class="nav-link"> --}}
        {{ $slot }}
    {{-- </a> --}}
</li>
