<?php
require_once __DIR__ . '/includes/nav.php';

$titulo_pagina = 'Productos';
$bodyClass = 'productos-page';
$headExtra = '';
$busqueda = isset($_GET['q']) && is_string($_GET['q']) ? trim($_GET['q']) : '';
$busquedaSanitizada = htmlspecialchars($busqueda, ENT_QUOTES, 'UTF-8');
require_once __DIR__ . '/includes/header.php';
?>

<div class="contenedor">

<?php render_page_banner(); ?>

<?php render_nav(null, 'nav-ul'); ?>

<!-- Formulario GET: Búsqueda y Filtro de Productos -->
<section style="max-width: 800px; margin: 20px auto; text-align: center; padding: 10px;">
    <form method="GET" action="productos.php" style="display: inline-flex; gap: 10px; align-items: center; justify-content: center; flex-wrap: wrap;">
        <input
            type="text"
            name="q"
            placeholder="Buscar productos..."
            aria-label="Buscar productos"
            value="<?= $busquedaSanitizada ?>"
            style="padding: 10px 14px; border: 1px solid #ccc; border-radius: 8px; font-size: 16px; width: 280px;"
        >
        <button type="submit" style="padding: 10px 20px; background: #ff4d00; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer;">
            Buscar
        </button>
        <?php if ($busquedaSanitizada !== ''): ?>
            <a href="productos.php" style="color: #c62828; font-weight: bold; text-decoration: none; padding: 8px 12px; border: 1px solid #c62828; border-radius: 8px;">
                Limpiar filtro
            </a>
        <?php endif; ?>
    </form>

    <?php if ($busquedaSanitizada !== ''): ?>
        <p style="margin-top: 15px; font-size: 16px;">
            Resultados de búsqueda para: <strong><?= $busquedaSanitizada ?></strong>
        </p>
    <?php endif; ?>
</section>

<div class="producto">

<img class="perfil" src="https://i.pravatar.cc/100?img=12">

<img class="img-producto" src="img/publicación.PNG">

<div class="texto">
colección de cuadernos tapa blanda de distintos diseño acompañados de útiles esenciales como resaltadores, lápices y marcadores, los cuadernos son de 80 hojas cada uno pero uno es cuadriculado, otro rayado y otro liso.
</div>

<div class="reacciones">
    <div class="reacciones-row">
        <div class="like-button" onclick="toggleLike(this)" data-likes="2700">👍 <span class="like-count">2700</span></div>
        <div class="eye-count">👁 <span>5.6k</span></div>
    </div>
</div>

</div>

<div class="producto">

<img class="perfil" src="https://i.pravatar.cc/100?img=32">

<img class="img-producto" src="img/publicación 2.PNG">

<div class="texto">
Este kit escolar incluye todo lo esencial: marcadores, resaltador, corrector, lápiz, regla y un práctico bloc A4 de 80 hojas rayadas. Ideal para organizar tus apuntes con estilo y color, combinando funcionalidad y diseño en un solo producto.
</div>

<div class="reacciones">
    <div class="reacciones-row">
        <div class="like-button" onclick="toggleLike(this)" data-likes="1800">👍 <span class="like-count">1800</span></div>
        <div class="eye-count">👁 <span>3.9k</span></div>
    </div>
</div>

</div>

</div>

<?php ob_start(); ?>
<script>
function toggleLike(element) {
    const count = element.querySelector('.like-count');
    const current = parseInt(count.textContent.replace(/\D/g, ''), 10);

    if (element.classList.contains('activo')) {
        count.textContent = current - 1;
        element.classList.remove('activo');
    } else {
        count.textContent = current + 1;
        element.classList.add('activo');
    }
}
</script>
<?php
$footerExtra = ob_get_clean();
require_once __DIR__ . '/includes/footer.php';
?>
