const STORAGE_KEY = 'theme';

function currentTheme() {
    return document.documentElement.classList.contains('dark') ? 'dark' : 'light';
}

function applyTheme(theme) {
    document.documentElement.classList.toggle('dark', theme === 'dark');
    document.documentElement.style.colorScheme = theme;
    try {
        localStorage.setItem(STORAGE_KEY, theme);
    } catch {
        // abaikan: storage tidak tersedia (mode privat, dsb.)
    }
    syncToggles(theme);
}

function syncToggles(theme) {
    const isDark = theme === 'dark';
    document.querySelectorAll('[data-theme-toggle]').forEach((btn) => {
        btn.setAttribute('aria-pressed', String(isDark));
        btn.setAttribute('aria-label', isDark ? 'Beralih ke mode terang' : 'Beralih ke mode gelap');
        btn.setAttribute('title', isDark ? 'Beralih ke mode terang' : 'Beralih ke mode gelap');
        btn.querySelectorAll('[data-icon-sun]').forEach((el) => el.classList.toggle('hidden', !isDark));
        btn.querySelectorAll('[data-icon-moon]').forEach((el) => el.classList.toggle('hidden', isDark));
    });
}

function initTheme() {
    let theme = null;
    try {
        theme = localStorage.getItem(STORAGE_KEY);
    } catch {
        theme = null;
    }
    if (theme !== 'dark' && theme !== 'light') {
        theme = currentTheme();
    }
    applyTheme(theme);

    document.querySelectorAll('[data-theme-toggle]').forEach((btn) => {
        btn.addEventListener('click', () => {
            applyTheme(currentTheme() === 'dark' ? 'light' : 'dark');
        });
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initTheme, { once: true });
} else {
    initTheme();
}
