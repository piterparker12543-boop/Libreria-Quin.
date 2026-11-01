<?php
/**
 * Cabecera del documento compartida.
 * Variables esperadas (definirlas antes de incluir este archivo):
 *   $titulo_pagina -> texto del <title>
 *   $bodyClass  -> clase del <body> (index-page, productos-page, etc.)
 *   $headExtra  -> (opcional) estilos propios de la página
 */
require_once __DIR__ . '/../config/env.php';

$titulo_pagina = isset($titulo_pagina) && trim($titulo_pagina) !== ''
    ? trim($titulo_pagina) . ' - ' . SITE_NAME
    : SITE_NAME;
$bodyClass = $bodyClass ?? '';
$headExtra = $headExtra ?? '';

if (!function_exists('render_page_banner')) {
    function render_page_banner(?string $titulo = null): void
    {
        echo '<header>';
        if ($titulo !== null) {
            echo '<h1>' . htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8') . '</h1>';
        }
        echo '</header>';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<link rel="icon" href="img/logo.PNG" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($titulo_pagina, ENT_QUOTES, 'UTF-8') ?></title>
<link rel="stylesheet" href="styles.css">
<script src="theme.js" defer></script>
<?= $headExtra ?>
</head>

<body class="<?= htmlspecialchars($bodyClass, ENT_QUOTES, 'UTF-8') ?>">
