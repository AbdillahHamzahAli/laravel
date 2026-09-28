@extends('layouts.app')
@section('title', '404 — Not Found')

@section('content')
<header class="hero">
    <x-badge tone="red">404 — ROUTE::FALLBACK()</x-badge>
    <h1 class="hero-title mt-4">Halaman<br>tidak ditemukan.</h1>
    <p class="mono mt-3">PATH: {{ $path ?? request()->path() }}</p>
    <p class="hero-sub">Tidak ada rute yang cocok — termasuk NRP yang gagal validasi 10-digit.</p>
    <div class="hero-actions">
        <a class="btn-lime" href="{{ route('home') }}">← Kembali ke home</a>
        <a class="btn-ghost" href="{{ route('mahasiswa.show', ['nrp' => '5025221001']) }}">Contoh valid →</a>
    </div>
</header>

<x-card variant="subtle" label="MUNGKIN MAKSUD KAMU" aria-label="Saran rute">
    <div class="flex gap-2 mt-3 flex-wrap">
        <a class="btn-ghost mono" href="{{ route('home') }}">GET /</a>
        <a class="btn-ghost mono" href="{{ route('mahasiswa.show', ['nrp' => '5025221001']) }}">/mahasiswa/5025221001</a>
        <a class="btn-ghost mono" href="{{ route('agent.show') }}">/agent</a>
        <a class="btn-ghost mono" href="{{ route('ipk.hitung', ['ipk1' => '3.50', 'ipk2' => '3.75']) }}">/hitung-ipk/3.50/3.75</a>
    </div>
</x-card>
@endsection
