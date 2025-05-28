<?php
  session_start();
  if(!isset($_SESSION['usuario_sesion'])){
    
    header("location: index.php");
  }
  require_once './app/config/conexion.php'; 
  $consulta = $conexion ->prepare ("SELECT * FROM  t_alumnos"); 
  $consulta -> execute(); 
  $alumnos = $consulta ->fetchAll(PDO::FETCH_ASSOC); 

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
      <div class="col-md-10 bg-dark text-end">
        <h1>Alumnos CRUD</h1>
        <hr class = "text-primary"> 
        <?php if ($_SESSION['usuario_sesion']['rol'] === 'admin'): ?>
         <a href="./agregarAlumnos.php" class="btn btn-warning">Añadir alumno</a>
        <?php endif; ?>

        <table class ="table text-white text-center ">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre alumno</th>
              <th>Apellido</th>
              <th>Matricula</th>
              <th>Acciones</th>
              <th></th>
            </tr>
          </thead>
  <?php foreach($alumnos as $alumno): ?>
            <tr>
              <td><?= $alumno['id_alumnos'] ?></td>
              <td><?= $alumno['nombre'] ?></td>
              <td><?= $alumno['apellido'] ?></td>
              <td><?= $alumno['matricula'] ?></td>
              <td>
                <?php if ($_SESSION['usuario_sesion']['rol'] === 'admin'): ?>
                  <a href="./actualizarAlumnos.php?id=<?= $alumno['id_alumnos'] ?>" class="btn btn-success btn-sm">Editar</a>
                  <a href="./app/controller/eliminarControllerAlumnos.php?id=<?= $alumno['id_alumnos'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
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

  <?php 
    require_once './components/footer.php';
  ?>
</body>
</html>
