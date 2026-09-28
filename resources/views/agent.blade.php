@extends('layouts.app')
@section('title', $tema ? 'Agent ' . $tema : 'Agent')

@section('content')
<header class="hero-compact">
    <h1 class="page-title">Recruiting & Hiring Agents</h1>
    <p class="hero-sub">AI agent untuk sourcing, screening, dan percepatan hiring. Rute <code class="inline">agent.show</code> · <code class="inline">/agent/{tema?}</code> — tanpa tema tetap valid.</p>
    <div class="hero-actions">
        @foreach (['sourcing', 'screening', 'compliance'] as $t)
            <a class="btn-ghost mono" href="{{ route('agent.show', ['tema' => $t]) }}">/{{ $t }}</a>
        @endforeach
        <a class="btn-lime" href="{{ route('agent.show') }}">Reset → /agent</a>
    </div>
</header>

<x-card aria-label="Tentang agent">
    <x-slot:header>
        <div class="flex items-center justify-between mb-4">
            <span class="mono text-fog">TENTANG AGENT</span>
            <x-badge tone="{{ $tema ? 'lime' : 'green' }}">{{ $tema ? strtoupper($tema) : 'OVERVIEW' }}</x-badge>
        </div>
    </x-slot:header>

    <p class="section-text">
        Recruiting agents source candidates, screen applications, and accelerate hiring workflows by translating hiring requirements into algorithmic search queries. They rank candidates and generate personalized outreach at scale.
    </p>
    <p class="section-text mt-3">
        These agents integrate with ATS, HCM systems, job boards, assessment tools, and background check providers while using bias-detection algorithms to ensure EEOC compliance.
    </p>
</x-card>

<!--<section class="grid gap-2 mt-2 sm:grid-cols-3 lg:grid-cols-3 grid-cols-1" aria-label="Kemampuan">
    @foreach ($capabilities as $cap)
        <x-card variant="subtle" as="div">
            <div class="w-8 h-8 rounded-md mb-3" style="background: {{ $cap['color'] }}"></div>
            <div class="text-paper text-sm font-medium">{{ $cap['title'] }}</div>
            <div class="text-[13px] text-fog">{{ $cap['desc'] }}</div>
        </x-card>
    @endforeach
</section>-->

<x-card label="INTEGRASI SISTEM" aria-label="Integrasi sistem" class="mt-2">
    <div class="flex flex-wrap gap-2 mt-4">
        @foreach ($integrations as $sys)
            <span class="badge">{{ $sys }}</span>
        @endforeach
    </div>
    <div class="mt-4">
        <x-kv label="Compliance"><span class="badge badge-violet">bias-detection → EEOC compliance</span></x-kv>
    </div>
</x-card>

<x-card label="TANTANGAN — REKONSILIASI DATA KANDIDAT" aria-label="Tantangan rekonsiliasi data" class="mt-2">
    <p class="section-text mt-4">
        Creating complete candidate profiles requires reconciling data from LinkedIn profiles, ATS records, assessment platforms, and email threads that each store different fragments of candidate history. The agent must match individuals across systems using variations of names and emails, deduplicate repeated applications, and normalize terminology from job descriptions, interview scorecards, and hiring manager feedback so candidates are evaluated on consistent criteria.
    </p>

    <span class="mono text-sm text-fog mt-4 block">Sumber data</span>
    <div class="flex flex-wrap gap-2 mt-3">
        @foreach ($sources as $src)
            <x-badge tone="green">{{ $src }}</x-badge>
        @endforeach
    </div>

    <span class="mono text-sm text-fog mt-4 block">Yang harus dilakukan agent</span>
    <ul class="stack-col mt-2 list-none">
        @foreach ($challenges as $c)
            <li class="section-text">→ {{ $c }}</li>
        @endforeach
    </ul>

    <div class="mt-4 pt-4 border-t border-smoke">
        <x-kv label="URL saat ini" mono>{{ url()->current() }}</x-kv>
        <x-kv label="Route name" mono>{{ Route::currentRouteName() }}</x-kv>
    </div>
</x-card>
@endsection
