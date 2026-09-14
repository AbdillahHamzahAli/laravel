@extends('layouts.app')

@section('title', 'Mahasiswa ' . $mahasiswa['nrp'])

@section('content')
<header class="hero-compact">
    <h1 class="page-title">Profil {{ $mahasiswa['nrp'] }}</h1>
    <p class="hero-sub">
        Rute <code class="inline">mahasiswa.show</code>
        · divalidasi di <code class="inline">MahasiswaController</code>
    </p>
</header>

<div class="profile-grid">
    <section class="card" aria-label="Profil mahasiswa">
        <div class="profile-header">
            <div class="avatar" aria-hidden="true">{{ $mahasiswa['inisial'] }}</div>
            <div>
                <div class="profile-name">{{ $mahasiswa['nama'] }}</div>
                <div class="mono profile-meta">NRP-{{ $mahasiswa['nrp'] }} · {{ $mahasiswa['departemen'] }}</div>
            </div>
            <x-badge tone="lime" class="ml-auto">{{ $mahasiswa['status'] }}</x-badge>
        </div>

        <dl class="profile-fields">
            <x-kv label="NRP" mono>{{ $mahasiswa['nrp'] }}</x-kv>
            <x-kv label="Nama">{{ $mahasiswa['nama'] }}</x-kv>
            <x-kv label="Departemen">{{ $mahasiswa['departemen'] }}</x-kv>
            <x-kv label="Fakultas">{{ $mahasiswa['fakultas'] }}</x-kv>
            <x-kv label="Angkatan" mono>{{ $mahasiswa['angkatan'] }}</x-kv>
            <x-kv label="IPK Terakhir" mono>{{ $mahasiswa['ipk_formatted'] }}</x-kv>
        </dl>

        <div class="profile-actions">
            <a class="btn-lime" href="{{ route('ipk.hitung', ['ipk1' => $mahasiswa['ipk_param'], 'ipk2' => '4.00']) }}">Hitung proyeksi IPK →</a>
            <a class="btn-ghost" href="{{ route('home') }}">← Kembali</a>
        </div>
    </section>

    <aside class="card-subtle" aria-label="Penjelasan validasi">
        <span class="mono section-label">CONTROLLER GUARD</span>
        <p class="section-text">Hanya kombinasi 10 digit yang sampai ke sini. Coba URL lain, kamu akan dilempar ke fallback:</p>
        <div class="stack-col">
            <a class="btn-ghost mono" href="{{ url('/mahasiswa/12345') }}">/mahasiswa/12345 → 404</a>
            <a class="btn-ghost mono" href="{{ url('/mahasiswa/50252210ab') }}">/mahasiswa/50252210ab → 404</a>
            <a class="btn-ghost mono" href="{{ route('mahasiswa.show', ['nrp' => $contohNrpValid]) }}">/mahasiswa/{{ $contohNrpValid }} ✓</a>
        </div>
    </aside>
</div>
@endsection
