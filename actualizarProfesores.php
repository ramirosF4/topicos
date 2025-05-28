<?php
  session_start();
  if(!isset($_SESSION['usuario_sesion'])){
    
    header("location: login.php");
  }
  require_once './app/config/conexion.php'; 
  $consulta= $conexion ->prepare("SELECT * FROM t_profesores WHERE id_profesores = :id_profesores "); 
  $consulta-> bindParam(":id_profesores",$_GET['id'] ); 
  $consulta -> execute(); 
  $profesores = $consulta->fetch(PDO::FETCH_ASSOC);
  if (!$profesores) {
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
          <form action="./app/controller/actualizarControllerprofesores.php" method="POST">

            <h1>Actualizar </h1>
            <hr class = "text-primary"> 
            <input type="text" name = "id_profesores" value="<?= $profesores['id_profesores']?>" hidden>
            <label for="nombre">Nombre del profesor</label>
            <input name= "nombre" class= "form-control mb-3" type="text" placeholder="Nombre" value="<?=$profesores['nombre']?>">
            <label for="apellido">Apellido </label>
            <input name= "apellido" class= "form-control mb-3" type="text" placeholder="Apellido " value="<?= $profesores['apellido']?>">        
            <label for="rfc">RFC</label>
            <input name= "rfc" class= "form-control mb-3" type="text" placeholder="rfc" value=" <?= $profesores['rfc']?>"> 
            <label for="materia">Materia que imparte</label>
            <input name= "materia" class= "form-control mb-3" type="text" placeholder="Materia" value=" <?= $profesores['materia']?>"> 

            <button type = "submit" class="btn btn-primary w-100" >Actualizar profesor</button>
            <a href="./profesores.php" class = "btn btn-danger w-100 mb-3" >Cancelar</a>

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