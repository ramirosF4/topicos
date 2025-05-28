<?php
session_start();
require_once './app/config/conexion.php';

if (!isset($_SESSION['usuario_sesion']) || $_SESSION['usuario_sesion']['rol'] !== 'admin') {
    header("location: login.php");
    exit();
}

$consulta = $conexion->prepare("SELECT id_usuario, nombre, apellido, usuario, correo, rol, estado FROM t_usuario ORDER BY id_usuario ASC");
$consulta->execute();
$usuarios = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Usuarios Registrados</title>
  <link rel="stylesheet" href="./public/css/b5.css">
  <link rel="stylesheet" href="./public/css/main.css">
</head>
<body>
<?php require_once './components/navbar.php'; ?>
<main>
  <div class="container mt-4">
    <div class="bg-dark p-4 rounded text-white">
      <h2 class="text-center">Usuarios registrados</h2>
      <table class="table table-hover table-bordered text-white text-center mt-4">
        <thead class="table-primary text-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($usuarios as $user): ?>
            <tr>
                <td><?= $user['id_usuario'] ?></td>
                <td><?= $user['nombre'] ?></td>
                <td><?= $user['apellido'] ?></td>
                <td><?= $user['usuario'] ?></td>
                <td><?= $user['correo'] ?></td>
                <td><?= ucfirst($user['rol']) ?></td>
                <td><?= $user['estado'] === 'activo' ? '🟢 Activo' : '⚪ Inactivo' ?></td>
                <td>
                <a href="actualizarUsuario.php?id=<?= $user['id_usuario'] ?>" class="btn btn-success btn-sm">Editar</a>
                <?php if ($user['rol'] !== 'admin'): ?>
                    <a href="./app/controller/eliminarControllerUsuario.php?id=<?= $user['id_usuario'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">Eliminar</a>
                <?php else: ?>
                    <span class="text-muted">No editable</span>
                <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
      </table>
    </div>
  </div>
</main>
<?php require_once './components/footer.php'; ?>
</body>
</html>
