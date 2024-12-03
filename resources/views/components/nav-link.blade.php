@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center p-4 border-b-2 border-nice-blue text-gray-900 font-bold focus:outline-none focus:border-dark-blue transition duration-150 ease-in-out'
            : 'inline-flex items-center p-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
