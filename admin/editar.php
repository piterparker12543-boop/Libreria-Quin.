<?php
require_once '../config/conexion.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM productos WHERE id_producto = :id");
$stmt->execute([':id' => $id]);
$producto = $stmt->fetch();

if (!$producto) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre      = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $precio      = $_POST['precio'] ?? 0;
    $stock       = $_POST['stock'] ?? 0;
    $id_categoria= $_POST['id_categoria'] ?? 1;

    if (!empty($nombre)) {
        $sql = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, stock = :stock, id_categoria = :id_categoria WHERE id_producto = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombre'       => $nombre,
            ':descripcion'  => $descripcion,
            ':precio'       => $precio,
            ':stock'        => $stock,
            ':id_categoria' => $id_categoria,
            ':id'           => $id
        ]);
        header('Location: index.php?status=updated');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto - Librería Quin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-4">
    <h2 class="mb-4">Editar Producto - Librería Quin</h2>
    <form action="editar.php?id=<?= $id ?>" method="POST">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?= htmlspecialchars($producto['descripcion']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio ($)</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?= htmlspecialchars($producto['precio']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="<?= htmlspecialchars($producto['stock']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="id_categoria" class="form-label">ID de Categoría</label>
            <input type="number" class="form-control" id="id_categoria" name="id_categoria" value="<?= htmlspecialchars($producto['id_categoria']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>