<?php
session_start();
if (!isset($_SESSION['usuario_sesion'])) {
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./public/css/b5.css">
  <link rel="stylesheet" href="./public/css/main.css">
  <script src="./public/js/b5.js"></script>
  <title>Inicio | TOPICOS</title>
</head>
<body>
  <?php require_once './components/navbar.php'; ?>

  <main class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center text-white">
        <div class="bg-card p-5">
          <h2 class="mb-4">Bienvenido, <?= htmlspecialchars($_SESSION['usuario_sesion']['usuario']) ?> 👋</h2>
          <p class="lead">Selecciona el módulo que deseas consultar:</p>
          <hr class="text-primary">

          <div class="d-grid gap-3 col-8 mx-auto mt-4">
            <a href="alumnos.php" class="btn btn-outline-primary btn-lg">
              Alumnos
            </a>
            <a href="profesores.php" class="btn btn-outline-success btn-lg">
              Profesores
            </a>
            <a href="materias.php" class="btn btn-outline-warning btn-lg">
              Materias
            </a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php require_once './components/footer.php'; ?>
</body>
</html>
