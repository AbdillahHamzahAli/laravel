@extends('layouts.app')
@section('title', 'Home')

@section('content')
<header class="hero">
    <h1 class="hero-title mt-4">Get more done without doing more.</h1>
    <div class="hero-actions">
        <a class="btn-lime" href="{{ route('mahasiswa.show', ['nrp' => '5025221001']) }}">Lihat profil NRP →</a>
        <a class="btn-ghost" href="{{ route('agent.show', ['tema' => 'linear']) }}">Agent: linear</a>
    </div>
</header>

<section class="card" aria-label="Daftar rute">
    <div class="flex items-center justify-between gap-3 mb-2">
        <span class="mono text-fog">ROUTE REGISTRY — 04 ENTRIES</span>
        <x-badge tone="green">named() ✓</x-badge>
    </div>

    <div class="route-row">
        <div>
            <div class="mono text-paper text-sm">GET /</div>
            <div class="text-[13px] text-fog">Home dashboard</div>
        </div>
        <div class="flex gap-2 items-center"><code class="inline">home</code><a class="btn-ghost" href="{{ route('home') }}">Open →</a></div>
    </div>
    <div class="route-row">
        <div>
            <div class="mono text-paper text-sm">GET /mahasiswa/{nrp}</div>
            <div class="text-[13px] text-fog">Regex 10 digit ITS · <code class="inline">where('[0-9]{10}')</code></div>
        </div>
        <div class="flex gap-2 items-center"><code class="inline">mahasiswa.show</code><a class="btn-ghost" href="{{ route('mahasiswa.show', ['nrp' => '5025221001']) }}">Open →</a></div>
    </div>
    <div class="route-row">
        <div>
            <div class="mono text-paper text-sm">GET /agent/{tema?}</div>
            <div class="text-[13px] text-fog">Parameter opsional tema AI</div>
        </div>
        <div class="flex gap-2 items-center"><code class="inline">agent.show</code><a class="btn-ghost" href="{{ route('agent.show') }}">Open →</a></div>
    </div>
    <div class="route-row">
        <div>
            <div class="mono text-paper text-sm">GET /hitung-ipk/{ipk1}/{ipk2}</div>
            <div class="text-[13px] text-fog">Kalkulator otomatis (rata-rata)</div>
        </div>
        <div class="flex gap-2 items-center"><code class="inline">ipk.hitung</code><a class="btn-ghost" href="{{ route('ipk.hitung', ['ipk1' => '3.50', 'ipk2' => '3.75']) }}">Open →</a></div>
    </div>
</section>

<div class="grid gap-2 mt-8 md:grid-cols-2 grid-cols-1">
    <div class="card-subtle">
        <x-badge tone="violet">TEST REGEX</x-badge>
        <p class="section-text">NRP valid 10 digit lolos, selain itu jatuh ke fallback.</p>
        <div class="flex gap-2 flex-wrap">
            <a class="btn-ghost mono" href="{{ route('mahasiswa.show', ['nrp' => '5025221001']) }}">/5025221001 ✓</a>
            <a class="btn-ghost mono" href="{{ url('/mahasiswa/123') }}">/123 → 404</a>
            <a class="btn-ghost mono" href="{{ url('/mahasiswa/abc') }}">/abc → 404</a>
        </div>
    </div>
    <div class="card-subtle">
        <x-badge tone="violet">TEST OPSIONAL & IPK</x-badge>
        <p class="section-text">Tema boleh kosong, IPK dihitung otomatis.</p>
        <div class="flex gap-2 flex-wrap">
            <a class="btn-ghost mono" href="{{ route('agent.show') }}">/agent</a>
            <a class="btn-ghost mono" href="{{ route('agent.show', ['tema' => 'vercel']) }}">/agent/vercel</a>
            <a class="btn-ghost mono" href="{{ route('ipk.hitung', ['ipk1' => '3.20', 'ipk2' => '3.90']) }}">/3.20/3.90</a>
        </div>
    </div>
</div>
@endsection
