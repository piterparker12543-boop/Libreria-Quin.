<?php
/**
 * Menú de navegación compartido por todas las páginas.
 *
 * @param string $actual   clave de la página actual (index, productos, comentarios, vendidos, blog, cuenta)
 * @param string $variante 'nav-ul'  -> <nav><ul><li>...   (productos, comentarios, más vendidos, cuenta)
 *                         'nav-div'  -> <nav><div class="menu">... (index)
 *                         'div'      -> <div class="menu">...      (blog)
 */
function render_nav(?string $actual = null, string $variante = 'nav-ul'): void
{
    $items = [
        'index'       => ['index.php',       'Inicio'],
        'productos'   => ['productos.php',   'Productos'],
        'comentarios' => ['comentarios.php', 'Comentarios y preguntas'],
        'vendidos'    => ['mas-vendidos.php','Prod. Más vendidos'],
        'blog'        => ['blog-curso.php',  'Curso y Blog'],
        'cuenta'      => ['cuenta.php',      'Cuenta'],
    ];

    if ($actual === null) {
        $paginaActual = basename($_SERVER['PHP_SELF'] ?? '');
        $actual = '';
        foreach ($items as $clave => [$url]) {
            if ($url === $paginaActual) {
                $actual = $clave;
                break;
            }
        }
    }

    // Clase CSS del botón activo (cada página la nombra distinto en styles.css)
    $claseActiva = [
        'index'       => 'inicio',
        'productos'   => 'productos',
        'comentarios' => 'activo',
        'vendidos'    => 'activo',
        'blog'        => 'active',
        'cuenta'      => 'cuenta',
    ];

    $boton = function (string $clave) use ($items, $actual, $claseActiva): string {
        [$url, $texto] = $items[$clave];
        $esActual = $clave === $actual;
        $clase = ($esActual && isset($claseActiva[$clave]))
            ? ' class="' . $claseActiva[$clave] . '"'
            : '';
        $atributosActivos = $esActual ? ' class="active" aria-current="page"' : '';

        return '<a href="' . $url . '"' . $atributosActivos . '><button type="button"' . $clase . '>'
             . htmlspecialchars($texto, ENT_QUOTES, 'UTF-8') . '</button></a>';
    };

    if ($variante === 'nav-ul') {
        echo "<nav>\n<ul>\n";
        foreach (array_keys($items) as $clave) {
            echo '<li>' . $boton($clave) . "</li>\n";
        }
        echo "</ul>\n</nav>\n";
    } elseif ($variante === 'nav-div') {
        echo "<nav>\n<div class=\"menu\">\n";
        foreach (array_keys($items) as $clave) {
            echo $boton($clave) . "\n";
        }
        echo "</div>\n</nav>\n";
    } else { // 'div'
        echo "<div class=\"menu\">\n";
        foreach (array_keys($items) as $clave) {
            echo $boton($clave) . "\n";
        }
        echo "</div>\n";
    }
}
