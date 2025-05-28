<?php
session_start();
require_once './app/config/conexion.php';

if (!isset($_SESSION['usuario_sesion']) || $_SESSION['usuario_sesion']['rol'] !== 'admin') {
    header("location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("location: usuarios.php");
    exit();
}
$id = $_GET['id'];
$consulta = $conexion->prepare("SELECT * FROM t_usuario WHERE id_usuario = :id");
$consulta->bindParam(':id', $id);
$consulta->execute();
$usuario = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo "Usuario no encontrado.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Actualizar Usuario</title>
  <link rel="stylesheet" href="./public/css/b5.css">
  <link rel="stylesheet" href="./public/css/main.css">
</head>
<body>
<?php require_once './components/navbar.php'; ?>
<main>
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-6 bg-dark p-4 text-white rounded">
      <h2 class="text-center">Editar Usuario</h2>
        <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
      <form action="./app/controller/actualizarControllerUsuario.php" method="POST">
        <input type="hidden" name="id_usuario" value="<?= $usuario['id_usuario'] ?>">

        <label>Nombre</label>
        <input type="text" class="form-control mb-3" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" >

        <label>Apellido</label>
        <input type="text" class="form-control mb-3" name="apellido" value="<?= htmlspecialchars($usuario['apellido']) ?>" >

        <label>Usuario</label>
        <input type="text" class="form-control mb-3" name="usuario" value="<?= htmlspecialchars($usuario['usuario']) ?>" >

        <label>Correo</label>
        <input type="email" class="form-control mb-3" name="correo" value="<?= htmlspecialchars($usuario['correo']) ?>" >

        <label>Rol</label>
        <select name="rol" class="form-control mb-3" <?= $usuario['rol'] === 'admin' ? 'disabled' : '' ?>>
          <option value="admin" <?= $usuario['rol'] === 'admin' ? 'selected' : '' ?>>Admin</option>
          <option value="usuario" <?= $usuario['rol'] === 'usuario' ? 'selected' : '' ?>>Usuario</option>
        </select>

        <button type="submit" class="btn btn-primary w-100">Actualizar</button>
        <a href="usuarios.php" class="btn btn-danger w-100 mt-2">Cancelar</a>
      </form>
    </div>
  </div>
</div>
</main>
<?php require_once './components/footer.php'; ?>
</body>
</html>
