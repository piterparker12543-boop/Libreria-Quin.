<?php
require_once '../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre      = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $precio      = $_POST['precio'] ?? 0;
    $stock       = $_POST['stock'] ?? 0;
    $id_categoria= $_POST['id_categoria'] ?? 1;

    if (!empty($nombre)) {
        $sql = "INSERT INTO productos (nombre, descripcion, precio, stock, id_categoria) VALUES (:nombre, :descripcion, :precio, :stock, :id_categoria)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombre'       => $nombre,
            ':descripcion'  => $descripcion,
            ':precio'       => $precio,
            ':stock'        => $stock,
            ':id_categoria' => $id_categoria
        ]);
        
        header('Location: index.php?status=created');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto - Librería Quin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-4">
    <h2 class="mb-4">Nuevo Producto - Librería Quin</h2>
    <form action="crear.php" method="POST">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio ($)</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
        <div class="mb-3">
            <label for="id_categoria" class="form-label">ID de Categoría</label>
            <input type="number" class="form-control" id="id_categoria" name="id_categoria" value="1" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar Producto</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>