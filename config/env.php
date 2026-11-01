<?php
/**
 * Cargador de variables de entorno (.env)
 */

function cargarEnv(string $ruta): void
{
    if (!file_exists($ruta)) {
        return;
    }

    $lineas = file($ruta, FILE_IGNORE_NEW_LINES);
    if ($lineas === false) {
        throw new RuntimeException('No se pudo leer el archivo de configuración de entorno.');
    }

    foreach ($lineas as $numero => $linea) {
        $linea = trim($linea);
        if ($linea === '' || str_starts_with($linea, '#')) {
            continue;
        }

        $partes = explode('=', $linea, 2);
        if (count($partes) !== 2) {
            throw new RuntimeException(
                'Línea ' . ($numero + 1) . ' inválida en el archivo de configuración de entorno.'
            );
        }

        [$clave, $valor] = $partes;
        $clave = trim($clave);
        $valor = trim($valor, "\"' ");

        if (!preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $clave)) {
            throw new RuntimeException(
                'Nombre de variable inválido en la línea ' . ($numero + 1) . ' del archivo de entorno.'
            );
        }

        if (!array_key_exists($clave, $_ENV) && getenv($clave) === false) {
            $_ENV[$clave] = $valor;
            putenv("{$clave}={$valor}");
        }
    }
}

// Cargar el archivo .env desde la raíz del proyecto
cargarEnv(__DIR__ . '/../.env');

// Constantes globales del sitio
$appName = $_ENV['APP_NAME'] ?? getenv('APP_NAME');
$appEnv = $_ENV['APP_ENV'] ?? getenv('APP_ENV');
$supportEmail = $_ENV['SUPPORT_EMAIL'] ?? getenv('SUPPORT_EMAIL');

define('SITE_NAME', is_string($appName) && $appName !== '' ? $appName : 'Librería Quin');
define(
    'SITE_EMAIL',
    is_string($supportEmail) && $supportEmail !== '' ? $supportEmail : 'soporte@libreriaquin.com'
);
define('APP_NAME', SITE_NAME);
define('APP_ENV', is_string($appEnv) && $appEnv !== '' ? $appEnv : 'local');
define('SUPPORT_EMAIL', SITE_EMAIL);