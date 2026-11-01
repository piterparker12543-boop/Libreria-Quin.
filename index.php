<?php
require_once __DIR__ . '/config/env.php';
require_once __DIR__ . '/includes/nav.php';

$titulo_pagina = 'Inicio';
$bodyClass = 'index-page';
require_once __DIR__ . '/includes/header.php';
?>

<div class="contenedor">

    <?php render_page_banner(''); ?>

    <?php render_nav(null, 'nav-div'); ?>

    <section class="contenido">

        <div class="logo-izq">
            <img src="img/logo.PNG" alt="Logo izquierda">
        </div>

        <div class="texto">
            <h2>¿Que ofrecemos?</h2>

            <p>
                Nos dedicamos a la venta de artículos de librería,
                donde los usuarios pueden encontrar productos como
                cuadernos, lapiceras, hojas, carpetas y útiles
                escolares. En el sitio ofrece una navegación simple
                y organizada, permitiendo explorar distintas categorías
                y acceder fácilmente a todo lo necesario para el estudio,
                la oficina o el uso diario.
            </p>
        </div>

        <div class="logo-der">
            <img src="img/logo 2.PNG" alt="Logo derecha">
        </div>

    </section>

</div>

<?php ob_start(); ?>
<script>
    window.addEventListener('load', function () {
        alert('¡Hola! Bienvenido a Librería Quin.');
    });
</script>
<?php
$footerExtra = ob_get_clean();
require_once __DIR__ . '/includes/footer.php';
?>
