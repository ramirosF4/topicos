<?php
  session_start();
  if(!isset($_SESSION['usuario_sesion'])){
    
    header("location: login.php");
  }
  require_once './app/config/conexion.php'; 
  $consulta= $conexion ->prepare("SELECT * FROM t_alumnos WHERE id_alumnos = :id_alumnos "); 
  $consulta-> bindParam(":id_alumnos",$_GET['id'] ); 
  $consulta -> execute(); 
  $alumnos = $consulta->fetch(PDO::FETCH_ASSOC);
  if (!$alumnos) {
    echo "Error: Producto no encontrado.";
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
          <form action="./app/controller/actualizarControllerAlumnos.php" method="POST">

            <h1>Actualizar </h1>
            <hr class = "text-primary"> 
            <input type="text" name = "id_alumnos" value="<?= $alumnos['id_alumnos']?>" hidden>
            <label for="nombre">Nombre del alumno</label>
            <input name= "nombre" class= "form-control mb-3" type="text" placeholder="Nombre" value="<?=$alumnos['nombre']?>">
            <label for="apellido">Apellido del alumno</label>
            <input name= "apellido" class= "form-control mb-3" type="text" placeholder="Apellido " value="<?= $alumnos['apellido']?>">        
            <label for="matricula">Matricula</label>
            <input name= "matricula" class= "form-control mb-3" type="text" placeholder="Matricula" value=" <?= $alumnos['matricula']?>"> 
    
            <button type = "submit" class="btn btn-primary w-100" >Actualizar alumno</button>
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
</html>-