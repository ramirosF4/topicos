<?php
session_start();
if (!isset($_SESSION['usuario_sesion'])) {
    header("location: login.php");
    exit();
}

require_once './app/config/conexion.php';
$consulta = $conexion->prepare("SELECT * FROM t_materia");
$consulta->execute();
$materias = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./public/css/b5.css">
  <link rel="stylesheet" href="./public/css/main.css">
  <script src="./public/js/b5.js"></script>
  <title>Materias | TOPICOS</title>
</head>
<body>
  <?php require_once './components/navbar.php'; ?>

  <main>
    <div class="container mt-4">
      <div class="row justify-content-center">
        <div class="col-md-10 bg-dark text-end">
          <h1 class="text-center text-white">Materias CRUD</h1>
          <hr class="text-primary">

          <?php if ($_SESSION['usuario_sesion']['rol'] === 'admin'): ?>
            <a href="./agregarMateria.php" class="btn btn-warning mb-3">Añadir materia</a>
          <?php endif; ?>

          <table class="table text-white text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($materias as $materia): ?>
              <tr>
                <td><?= $materia['id_materia'] ?></td>
                <td><?= $materia['nombre'] ?></td>
                <td><?= $materia['tipo'] ?></td>
                <td>
                  <?php if ($_SESSION['usuario_sesion']['rol'] === 'admin'): ?>
                    <a href="./actualizarMateria.php?id=<?= $materia['id_materia'] ?>" class="btn btn-success btn-sm">Editar</a>
                    <a href="./app/controller/eliminarControllerMateria.php?id=<?= $materia['id_materia'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
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
