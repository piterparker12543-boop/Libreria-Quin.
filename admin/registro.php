<?php
require_once '../config/conexion.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre   = trim($_POST['nombre'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $rol      = $_POST['rol'] ?? 'usuario';

    if (!empty($nombre) && !empty($email) && !empty($password)) {
        // Verificar si el correo ya existe
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $stmt->execute([':email' => $email]);
        
        if ($stmt->rowCount() > 0) {
            $mensaje = "El correo electrónico ya está registrado.";
        } else {
            // Hashing seguro de contraseña con BCRYPT
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);

            // Inserción adaptada a tus columnas actuales de phpMyAdmin
            $sql = "INSERT INTO usuarios (nombre, email, password, id_rol) VALUES (:nombre, :email, :password, :id_rol)";
            $stmtInsert = $pdo->prepare($sql);
            $stmtInsert->execute([
                ':nombre'   => htmlspecialchars($nombre),
                ':email'    => $email,
                ':password' => $passwordHash,
                ':id_rol'   => 2 // Por ejemplo: 2 para usuario normal (o 1 si prefieres admin)
            ]);

            header('Location: login.php?status=registrado');
            exit;
        }
    } else {
        $mensaje = "Por favor, completa todos los campos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Librería Quin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-5" style="max-width: 500px;">
    <h2 class="mb-4">Registro de Usuario</h2>
    <?php if (!empty($mensaje)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($mensaje) ?></div>
    <?php endif; ?>
    <form action="registro.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
        <p class="mt-3 text-center"><a href="login.php">¿Ya tienes cuenta? Inicia sesión</a></p>
    </form>
</body>
</html>