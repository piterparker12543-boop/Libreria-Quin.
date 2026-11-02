<button id="themeToggle" class="theme-toggle" type="button" aria-pressed="false">Modo oscuro</button>
<div id="fechaHora" class="fecha-hora" aria-live="polite"></div>
<script>
    function actualizarFechaHora() {
        const ahora = new Date();
        document.getElementById("fechaHora").textContent = `Fecha y hora: ${ahora.toLocaleString("es-AR")}`;
    }

    actualizarFechaHora();
    setInterval(actualizarFechaHora, 1000);
</script>
<footer class="site-footer">
    <p>&copy; <?= date('Y') ?> <?= htmlspecialchars(SITE_NAME, ENT_QUOTES, 'UTF-8') ?>. Todos los derechos reservados.</p>
    <p>Contacto de soporte:
        <a href="mailto:<?= htmlspecialchars(SITE_EMAIL, ENT_QUOTES, 'UTF-8') ?>">
            <?= htmlspecialchars(SITE_EMAIL, ENT_QUOTES, 'UTF-8') ?>
        </a>
    </p>
</footer>
<?= $footerExtra ?? '' ?>

</body>
</html>
