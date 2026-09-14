@props(['tone' => 'default'])

@php
    $tones = [
        'default' => 'badge',
        'green' => 'badge badge-green',
        'red' => 'badge badge-red',
        'violet' => 'badge badge-violet',
        'lime' => 'badge badge-lime',
    ];
@endphp

<span {{ $attributes->merge(['class' => $tones[$tone] ?? $tones['default']]) }}>{{ $slot }}</span>