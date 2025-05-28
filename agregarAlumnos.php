<?php
  session_start();
  if(!isset($_SESSION['usuario_sesion'])){
    
    header("location: index.php");
  }
?>
<?php if (isset($_SESSION['error'])): ?>
  <div class="alert alert-danger text-center">
    <?= $_SESSION['error'] ?>
    <?php unset($_SESSION['error']); ?>
  </div>
<?php endif; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./public/css/b5.css">
  <link rel="stylesheet" href="./public/css/main.css">
  <script src="./public/js/b5.js"></script>
  <title>TOPICOS</title>
</head>
<body>
  <?php 
    require_once './components/navbar.php';
  ?>
<main>
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-4 bg-dark">
          <form action="./app/controller/agregarControllerAlumnos.php" method="POST">

            <h1>Añadir alumno </h1>
            <hr class = "text-primary"> 
            <label for="nombre">Nombre del alumno</label>
            <input name= "nombre" class= "form-control mb-3" type="text" placeholder="Nombre">
            <label for="apellido">Apellido</label>
            <input name= "apellido" class= "form-control mb-3" type="text" placeholder="Apellido ">        
            <label for="matricula">Matricula</label>
            <input name= "matricula" class= "form-control mb-3" type="number" placeholder="Matricula">
    
            <button type = "submit" class="btn btn-primary w-100" >Añadir alumno</button>
            <a href="./alumnos.php" class = "btn btn-danger w-100 mb-3" >Cancelar</a>

        </form>

      </div>
    </div>
  </div>
</main>
  <?php 
    require_once './components/footer.php';
  ?>
</body>
</html>