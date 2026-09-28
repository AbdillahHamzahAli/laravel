<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="dark light">
    <title>@yield('title', 'PBKK — Routing') · Linear Precision</title>
    <script>
        // Terapkan tema sebelum paint agar tidak ada flash (FOUC).
        try {
            const saved = localStorage.getItem('theme');
            const prefersLight = window.matchMedia('(prefers-color-scheme: light)').matches;
            if (saved === 'light' || (!saved && prefersLight)) {
                document.documentElement.classList.remove('dark');
            } else {
                document.documentElement.classList.add('dark');
            }
        } catch (e) {
            document.documentElement.classList.add('dark');
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14-32,300;14-32,400;14-32,500;14-32,600&family=JetBrains+Mono:wght@400&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav class="nav-bar">
    <div class="nav-inner">
        <a href="{{ route('home') }}" class="logo">Laravel</a>
        <div class="nav-links">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('mahasiswa.show', ['nrp' => '5025241023']) }}" class="nav-link {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}">Mahasiswa</a>
            <a href="{{ route('agent.show') }}" class="nav-link {{ request()->routeIs('agent.*') ? 'active' : '' }}">Agent</a>
            <a href="{{ route('ipk.hitung', ['ipk1' => '3.50', 'ipk2' => '3.75']) }}" class="nav-link {{ request()->routeIs('ipk.*') ? 'active' : '' }}">IPK</a>
            <button type="button" class="theme-toggle" data-theme-toggle aria-pressed="true" aria-label="Beralih ke mode terang" title="Beralih ke mode terang">
                <svg data-icon-sun xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>
                <svg data-icon-moon class="hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
            </button>
            <a href="{{ route('ipk.hitung', ['ipk1' => '3.50', 'ipk2' => '3.75']) }}" class="btn-pill">Coba IPK →</a>
        </div>
    </div>
</nav>

<main class="shell">
    @yield('content')
</main>

<footer class="site-footer">
    <div class="footer-inner">
        <span class="mono">Laravel {{ app()->version() }} · PHP {{ phpversion() }}</span>
        <span class="mono">void #08090a — acid-lime #e4f222</span>
    </div>
</footer>
</body>
</html>
