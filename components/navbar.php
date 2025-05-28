<nav class="navbar navbar-expand-lg navbar-light bg-black">
  <div class="container">
    <a class="btn btn-nav" href="index.php">TOPICOS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-nav" href="index.php">Inicio</a>
        </li>
        <?php if (!isset($_SESSION['usuario_sesion'])): ?>
        <li class="nav-item">
        <a class="btn btn-nav" href="login.php">Login</a>
        </li>
        <li class="nav-item">
        <a class="btn btn-nav" href="registro.php">Registro</a>
        </li>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['usuario_sesion']) && $_SESSION['usuario_sesion']['rol'] === 'admin'): ?>
        <li class="nav-item">
        <a class="btn btn-nav" href="historial.php">Historial</a>
        </li>
        <?php endif; ?>
        <?php if (isset($_SESSION['usuario_sesion']) && $_SESSION['usuario_sesion']['rol'] === 'admin'): ?>
        <li class="nav-item">
        <a class="btn btn-nav" href="usuarios.php">Usuarios</a>
        </li>
        <?php endif; ?>
       
        <?php 
        //validamos si existe una sesion, esto con el fin de mostrar un boton con el nombre del usuario
        //en caso de no existir simplemente no mostrara nada
        //se debe validar para evitar generar un error al intentar acceder aun dato que no esta definido
        //recuerda que este navbar esta presente todas las vistas
        //recuerda 2, que el nombre de la sesion es el mismo definido en el archivo loginController.php
        if(isset($_SESSION['usuario_sesion'])):
        //como este if mostrara un codigo HTML se debe dividir en dos partes
        //la primera es la condicion y al finalizar se usan ":" en lugar de llaves, tambien se cierra el bloque de codigo de PHP, para dar paso al codigo HTML del caso positivo
        ?>
        <!--
        si la validacion anterior es correcta... 
        se crea un boton que solo mostrara el nombre usuario accediendo a la varianle de sesion y especificando el dato que requerimos -->
        <li class="nav-item">
          <!-- cuando se usa: <?=$_SESSION['usuario_sesion']['usuario']?>
              estamos imprimiendo de manera directa el valor de la variable se sesion, especificamente el valor 'usuario'
              esto nos permite ahora el uso de un echo
          -->
          <a class="btn btn-nav" href="login.php"><?=$_SESSION['usuario_sesion']['usuario']?></a>

        </li>
        <?php 
        //como se aperturo en la linea 28 un if se debe cerrar 
        //como no lleva llaves se usa la palabra reservada endif 
        //esta indica que se finalizo la instruccion del if
        endif
        ?>
        <?php 
        if(isset($_SESSION['usuario_sesion'])):
        ?>
        <li class="nav-item">
          <a id="cerrar" class="btn btn-outline-danger" href="./app/controller/cerrarSesionController.php">Cerrar sesión</a>
        </li>
        <?php 
        endif;
        ?>
        </li>
      </ul>
    </div>
  </div>
</nav>
