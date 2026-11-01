const themeToggle = document.getElementById('themeToggle');
const darkThemeEnabled = localStorage.getItem('modo-oscuro') === 'true';

document.body.classList.toggle('modo-oscuro', darkThemeEnabled);

if (themeToggle) {
    themeToggle.textContent = darkThemeEnabled ? 'Modo claro' : 'Modo oscuro';
    themeToggle.setAttribute('aria-pressed', darkThemeEnabled);

    themeToggle.addEventListener('click', () => {
        const isDark = document.body.classList.toggle('modo-oscuro');
        localStorage.setItem('modo-oscuro', isDark);
        themeToggle.textContent = isDark ? 'Modo claro' : 'Modo oscuro';
        themeToggle.setAttribute('aria-pressed', isDark);
    });
}
