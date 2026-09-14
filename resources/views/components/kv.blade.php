@props(['label', 'mono' => false])

<div class="kv">
    <span class="k">{{ $label }}</span>
    <span class="v {{ $mono ? 'mono' : '' }}">{{ $slot }}</span>
</div>
