<?php
session_start();
require_once './app/config/conexion.php';

if (!isset($_SESSION['usuario_sesion']) || $_SESSION['usuario_sesion']['rol'] !== 'admin') {
    header("location: login.php");
    exit();
}

$consulta = $conexion->prepare("SELECT * FROM historial_acciones ORDER BY fecha DESC");
$consulta->execute();
$acciones = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Historial de acciones</title>
  <link rel="stylesheet" href="./public/css/b5.css">
  <link rel="stylesheet" href="./public/css/main.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<?php require_once './components/navbar.php'; ?>
<main>
<div class="container mt-4">
  <div class="bg-dark p-4 rounded text-white">
    <h2 class="text-center">📋 Historial de acciones</h2>
    <table class="table table-bordered table-hover mt-4 text-center table-dark">
      <thead class="table-primary text-dark">
        <tr>
          <th>ID</th>
          <th>Tabla</th>
          <th>Acción</th>
          <th>ID afectado</th>
          <th>Usuario</th>
          <th>Fecha</th>
          <th>Descripción</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($acciones as $accion): ?>
          <?php
            $clase = '';
            $icono = '';

            switch (strtoupper($accion['accion'])) {
              case 'INSERT':
                $clase = 'text-success';
                $icono = '<i class="fas fa-plus-circle"></i>';
                break;
              case 'UPDATE':
                $clase = 'text-warning';
                $icono = '<i class="fas fa-edit"></i>';
                break;
              case 'DELETE':
                $clase = 'text-danger';
                $icono = '<i class="fas fa-trash-alt"></i>';
                break;
              default:
                $clase = 'text-secondary';
                $icono = '<i class="fas fa-info-circle"></i>';
                break;
            }
          ?>
          <tr>
            <td><?= $accion['id'] ?></td>
            <td><?= ucfirst($accion['tabla']) ?></td>
            <td class="<?= $clase ?>"><?= $icono ?> <?= strtoupper($accion['accion']) ?></td>
            <td><?= $accion['id_afectado'] ?></td>
            <td><?= $accion['usuario'] ?></td>
            <td><?= $accion['fecha'] ?></td>
            <td><?= $accion['descripcion'] ?></td>
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
