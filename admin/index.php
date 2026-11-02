<?php
require_once '../config/conexion.php';
require_once 'auth_guard.php'; // <-- 1. Incluir el guardián de seguridad

verificarAdmin(); // <-- 2. Exigir que solo entre el administrador

$stmt = $pdo->query("SELECT * FROM productos ORDER BY id_producto DESC");
$registros = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administración - Librería Quin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-4">
    <!-- Botón para cerrar sesión o volver al panel -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Panel de Productos - Librería Quin</h2>
        <div>
            <a href="admin_panel.php" class="btn btn-secondary btn-sm">Volver al Panel</a>
            <a href="logout.php" class="btn btn-outline-danger btn-sm">Cerrar Sesión</a>
        </div>
    </div>

    <a href="crear.php" class="btn btn-primary mb-3">Agregar Nuevo Producto</a>
    
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registros as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['id_producto']) ?></td>
                <td><?= htmlspecialchars($item['nombre']) ?></td>
                <td><?= htmlspecialchars($item['descripcion']) ?></td>
                <td>$<?= htmlspecialchars($item['precio']) ?></td>
                <td><?= htmlspecialchars($item['stock']) ?></td>
                <td>
                    <a href="editar.php?id=<?= $item['id_producto'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="eliminar.php?id=<?= $item['id_producto'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Confirma eliminar este producto?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>