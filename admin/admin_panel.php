<?php
require_once '../config/conexion.php';
require_once 'auth_guard.php';

// Exigir rol de administrador
verificarAdmin();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración - Librería Quin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Panel de Control (Administrador)</h2>
        <div>
            <span class="me-3">Hola, <strong><?= htmlspecialchars($_SESSION['usuario_nombre']) ?></strong></span>
            <a href="logout.php" class="btn btn-outline-danger btn-sm">Cerrar Sesión</a>
        </div>
    </div>
    <hr>
    <div class="list-group">
        <a href="index.php" class="list-group-item list-group-item-action">Gestionar Productos (CRUD)</a>
    </div>
</body>
</html>