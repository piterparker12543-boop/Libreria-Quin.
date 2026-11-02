<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Función para verificar si el usuario ha iniciado sesión
function verificarSesion() {
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: login.php?error=acceso_denegado');
        exit;
    }
}

// Función para verificar si el usuario es administrador
function verificarAdmin() {
    verificarSesion();
    if ($_SESSION['rol'] !== 'admin') {
        echo "<script>alert('Acceso no autorizado. Se requieren permisos de administrador.'); window.location.href='../index.php';</script>";
        exit;
    }
}
?>