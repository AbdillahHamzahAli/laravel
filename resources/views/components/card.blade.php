@props([
    // Varian visual: 'default' → .card, 'subtle' → .card-subtle
    'variant' => 'default',
    // Tag pembungkus: 'section' | 'aside' | 'div'
    'as' => 'section',
    // Eyebrow mono sederhana, cth. label="INPUT → OUTPUT".
    // Untuk header kompleks (label + badge), pakai <x-slot:header> sebagai gantinya.
    'label' => null,
    // Ring acid-lime untuk kartu yang sedang aktif/disorot
    'active' => false,
])

@php
    $tag = in_array($as, ['section', 'aside', 'div']) ? $as : 'section';
    $base = $variant === 'subtle' ? 'card-subtle' : 'card';
    if ($active) {
        $base .= ' card-active';
    }
@endphp

<{{ $tag }} {{ $attributes->merge(['class' => $base]) }}>
    @if (isset($header))
        {{ $header }}
    @elseif ($label !== null)
        <span class="mono text-fog">{{ $label }}</span>
    @endif

    {{ $slot }}

    @if (isset($footer))
        <div class="card-foot">{{ $footer }}</div>
    @endif
</{{ $tag }}>
