<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PBKK — Routing') · Linear Precision</title>
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
