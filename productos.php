<?php
require_once __DIR__ . '/includes/nav.php';

$titulo_pagina = 'Productos';
$bodyClass = 'productos-page';
$headExtra = '';
require_once __DIR__ . '/includes/header.php';
?>

<div class="contenedor">

<?php render_page_banner(); ?>

<?php render_nav(null, 'nav-ul'); ?>

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
