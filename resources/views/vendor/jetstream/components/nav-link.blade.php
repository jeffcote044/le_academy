@props(['active'])

@php
$classes = ($active ?? false)
            ? 'font-bold inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-primary-100 focus:outline-none transition duration-150 ease-in-out'
            : 'font-bold inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-900 hover:text-primary-100 focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
