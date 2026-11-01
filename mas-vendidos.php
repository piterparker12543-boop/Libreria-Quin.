<?php
require_once __DIR__ . '/includes/nav.php';

$titulo_pagina = 'Productos Más Vendidos';
$bodyClass = 'productos-mas-vendidos-page';
require_once __DIR__ . '/includes/header.php';
?>

<div class="contenedor">

<?php render_page_banner(); ?>

<?php render_nav(null, 'nav-ul'); ?>

<div class="producto">

<img src="img/publicación 3.PNG">

<div class="info">

<div class="top">N°1 En ventas</div>

<div class="reacciones">
👁 46.3 k &nbsp;&nbsp; 👍 12.6 k
</div>

<div class="descripcion">
Combo Estudiantil ideal para organizar tus apuntes con estilo. Incluye cuadernos con sistema de discos reutilizables, un anotador práctico tipo checklist y un set de resaltadores en colores pasteles. Perfecto para combinar funcionalidad y diseño, permitiendo ordenar materias, tomar notas y destacar lo importante de manera cómoda y prolija.
</div>

<div class="precio">
costo: $6.500
</div>

</div>

</div>

</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
