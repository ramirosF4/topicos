<?php
session_start();
if (!isset($_SESSION['usuario_sesion'])) {
    header("location: index.php");
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
  <title>TOPICOS | Añadir profesor</title>
</head>
<body>

  <?php require_once './components/navbar.php'; ?>

  <main>
    <div class="container mt-4">
      <div class="row justify-content-center">
        <div class="col-md-4 bg-dark text-white p-4 rounded">
          
          <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger text-center">
              <?= $_SESSION['error'] ?>
              <?php unset($_SESSION['error']); ?>
            </div>
          <?php endif; ?>

          <form action="./app/controller/agregarControllerprofesores.php" method="POST">
            <h2 class="text-center">Añadir Profesor</h2>
            <hr class="text-primary">

            <label for="nombre">Nombre del profesor</label>
            <input name="nombre" class="form-control mb-3" type="text" placeholder="Nombre">

            <label for="apellido">Apellido</label>
            <input name="apellido" class="form-control mb-3" type="text" placeholder="Apellido">

            <label for="rfc">RFC</label>
            <input name="rfc" class="form-control mb-3" type="text" placeholder="RFC">

            <label for="materia">Materia que imparte</label>
            <input name="materia" class="form-control mb-3" type="text" placeholder="Materia">

            <button type="submit" class="btn btn-primary w-100">Añadir profesor</button>
            <a href="./profesores.php" class="btn btn-danger w-100 mt-2">Cancelar</a>
          </form>

        </div>
      </div>
    </div>
  </main>

  <?php require_once './components/footer.php'; ?>
</body>
</html>
