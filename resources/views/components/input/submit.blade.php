@props([
    'icon' => false,
    'color' => 'gray'
])

@php

$classes = 'px-4 py-2 leading-5 text-white transition-colors duration-200 transform bg-'.$color.'-600
            rounded-md hover:bg-'.$color.'-500 focus:outline-none focus:bg-'.$color.'-400'

@endphp

<div class="flex col-span-full justify-end mt-6">

    <button {{ $attributes->merge(['class' => $classes]) }}>

        @if($icon)

            {{ $icon }}

        @endif

        {{ $slot }}

    </button>
</div>
