<?php
session_start();
if (!isset($_SESSION['usuario_sesion'])) {
    header("location: login.php");
    exit();
}

require_once './app/config/conexion.php';
$consulta = $conexion->prepare("SELECT * FROM t_profesores");
$consulta->execute();
$profesores = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./public/css/b5.css">
  <link rel="stylesheet" href="./public/css/main.css">
  <script src="./public/js/b5.js"></script>
  <title>Profesores | TOPICOS</title>
</head>
<body>
  <?php require_once './components/navbar.php'; ?>

  <main>
    <div class="container mt-4">
      <div class="row justify-content-center">
        <div class="col-md-10 bg-dark text-end">
          <h1 class="text-center text-white">Profesores CRUD</h1>
          <hr class="text-primary">

          <?php if ($_SESSION['usuario_sesion']['rol'] === 'admin'): ?>
            <a href="./agregarProfesores.php" class="btn btn-warning mb-3">Añadir profesor</a>
          <?php endif; ?>

          <table class="table text-white text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>RFC</th>
                <th>Materia</th>
                <th>Acciones</th>
              </tr>
                <tbody>
                <?php foreach ($profesores as $profesor): ?>
                <tr>
                    <td><?= $profesor['id_profesores'] ?></td>
                    <td><?= $profesor['nombre'] ?></td>
                    <td><?= $profesor['apellido'] ?></td>
                    <td><?= $profesor['rfc'] ?></td>
                    <td><?= $profesor['materia'] ?></td>
                    <td>
                    <?php if ($_SESSION['usuario_sesion']['rol'] === 'admin'): ?>
                        <a href="./actualizarProfesores.php?id=<?= $profesor['id_profesores'] ?>" class="btn btn-success btn-sm">Editar</a>
                        <a href="./app/controller/eliminarControllerProfesor.php?id=<?= $profesor['id_profesores'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    <?php else: ?>
                        <span class="text-muted">Sin permisos</span>
                    <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>

          </table>

        </div>
      </div>
    </div>
  </main>

  <?php require_once './components/footer.php'; ?>
</body>
</html>
