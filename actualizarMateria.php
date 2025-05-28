<?php
  session_start();
  if(!isset($_SESSION['usuario_sesion'])){
    
    header("location: login.php");
  }
  require_once './app/config/conexion.php'; 
  $consulta= $conexion ->prepare("SELECT * FROM t_materia WHERE id_materia = :id_materia "); 
  $consulta-> bindParam(":id_materia",$_GET['id'] ); 
  $consulta -> execute(); 
  $materia = $consulta->fetch(PDO::FETCH_ASSOC);
  if (!$materia) {
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
          <form action="./app/controller/actualizarControllerMateria.php" method="POST">

            <h1>Actualizar </h1>
            <hr class = "text-primary"> 
            <input type="text" name = "id_materia" value="<?= $materia['id_materia']?>" hidden>
            <label for="nombre">Nombre de la Materia</label>
            <input name= "nombre" class= "form-control mb-3" type="text" placeholder="Nombre" value="<?=$materia['nombre']?>">
            <label for="tipo">tipo </label>
            <input name= "tipo" class= "form-control mb-3" type="text" placeholder="Tipo de materia " value="<?= $materia['tipo']?>">        
    
            <button type = "submit" class="btn btn-primary w-100" >Actualizar Materia</button>
            <a href="./materias.php" class = "btn btn-danger w-100 mb-3" >Cancelar</a>

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