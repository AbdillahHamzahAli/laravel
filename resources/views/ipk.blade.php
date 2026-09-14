@extends('layouts.app')
@section('title', 'Hitung IPK')

@section('content')
<header class="hero-compact">
    <h1 class="page-title">{{ number_format($rata, 2) }}</h1>
    <p class="hero-sub">
        Rata-rata dari <code class="inline">{{ number_format($ipk1, 2) }}</code> +
        <code class="inline">{{ number_format($ipk2, 2) }}</code>
        · rute <code class="inline">ipk.hitung</code>
    </p>
</header>

<div class="grid gap-2 md:grid-cols-2 grid-cols-1">
    <section class="card" aria-label="Hasil perhitungan">
        <span class="mono text-fog">INPUT → OUTPUT</span>
        <div class="mt-2">
            <x-kv label="IPK Semester 1" mono>{{ number_format($ipk1, 2) }}</x-kv>
            <x-kv label="IPK Semester 2" mono>{{ number_format($ipk2, 2) }}</x-kv>
            <x-kv label="Rumus" mono>({{ number_format($ipk1, 2) }} + {{ number_format($ipk2, 2) }}) / 2</x-kv>
            <x-kv label="Hasil" mono><span class="text-acid-lime text-lg">{{ number_format($rata, 2) }}</span></x-kv>
        </div>

        <div class="mt-4">
            <x-badge tone="{{ $rata >= 3.5 ? 'green' : ($rata >= 3.0 ? 'violet' : 'red') }}">{{ $predikat }}</x-badge>
        </div>

        <div class="flex gap-2 mt-4 flex-wrap">
            <a class="btn-ghost mono" href="{{ route('ipk.hitung', ['ipk1' => '4.00', 'ipk2' => '4.00']) }}">/4.00/4.00</a>
            <a class="btn-ghost mono" href="{{ route('ipk.hitung', ['ipk1' => '3.20', 'ipk2' => '3.90']) }}">/3.20/3.90</a>
            <a class="btn-ghost mono" href="{{ route('ipk.hitung', ['ipk1' => '2.75', 'ipk2' => '3.00']) }}">/2.75/3.00</a>
        </div>
    </section>

    <aside class="card-subtle" aria-label="Skala predikat">
        <span class="mono text-fog">SKALA PREDIKAT</span>
        <div class="mt-2">
            @foreach ([['3.51 – 4.00', 'Dengan Pujian (Cumlaude)', $rata >= 3.51], ['3.01 – 3.50', 'Sangat Memuaskan', $rata >= 3.01 && $rata <= 3.50], ['2.76 – 3.00', 'Memuaskan', $rata >= 2.76 && $rata <= 3.00], ['2.00 – 2.75', 'Cukup', $rata < 2.76]] as $row)
                <div class="kv">
                    <span class="k mono">{{ $row[0] }}</span>
                    <span class="v {{ $row[2] ? 'text-acid-lime' : '' }}">{{ $row[1] }}{{ $row[2] ? ' ← kamu' : '' }}</span>
                </div>
            @endforeach
        </div>
        <a class="btn-lime mt-4" href="{{ route('home') }}">← Kembali ke home</a>
    </aside>
</div>
@endsection
