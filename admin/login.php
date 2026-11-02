<?php
require_once '../config/conexion.php';
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!empty($email) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch();

        // Verificar contraseña con password_verify
        if ($usuario && password_verify($password, $usuario['password'])) {
            // Mitigar Session Fixation
            session_regenerate_id(true);

            // Almacenar datos en la sesión
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            $_SESSION['rol'] = $usuario['rol'];

            // Redirigir según el rol
            if ($usuario['rol'] === 'admin') {
                header('Location: admin_panel.php');
            } else {
                header('Location: ../index.php');
            }
            exit;
        } else {
            $error = "Correo o contraseña incorrectos.";
        }
    } else {
        $error = "Completa todos los campos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Librería Quin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-5" style="max-width: 500px;">
    <h2 class="mb-4">Iniciar Sesión</h2>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form action="login.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Ingresar</button>
        <p class="mt-3 text-center"><a href="registro.php">¿No tienes cuenta? Regístrate</a></p>
    </form>
</body>
</html>