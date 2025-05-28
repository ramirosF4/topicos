<?php
    //funcion que permite utilizar las variables de sesion 
    //si no esta invocada generara un error al intentar usar una variable de sesion
    session_start();
    //validacion para determinar y ya existe una sesion creada
    //se valida con isset para saber si esta definida y no generar un error
    if(isset($_SESSION['usuario_sesion'])){
        //si la sesion existe entonces debe redirigir al usuario al archivo index.php
        //este archivo contiene la pagina principal y solo es visible cuando inicias sesion
        //la funcion header permite redirigir de manera automatica a un archivo interno siempre y cuando se indique adecuadamente la ruta
        //ejemplo heade("location: ruta.php");
        header("location: index.php");
        exit();
    }

    //guardar errores y datos antiguos (en caso de error en el registro)
    $errores = $_SESSION['errores_registro'] ?? []; 
    $old = $_SESSION['old_data'] ?? []; 
    unset($_SESSION['errores_registro'], $_SESSION['old_data']); 
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- importacion de archivos de css -->
    <link rel="stylesheet" href="./public/css/b5.css">
    <link rel="stylesheet" href="./public/css/main.css">
    <!-- invocacion de archivos de js -->
    <script src="./public/js/b5.js"></script>
    <title>TOPICOS | Registro</title>
</head>

<body>

    <?php 
        //importamos el archivo navbar con PHP para poder visualizarlo en el navegador
        //se hace para evitar tener demasidas lineas de codigo y si se efectua un cambio en el archivo
        //en todoos los lugares donde sea importado se reflejara el cambio
        require_once './components/navbar.php';
        require_once './components/php/validar.php'; 
    ?>

    <!-- validacion de errores -->
    <?php if (!empty($errores)) echo mostrarErrores($errores); ?>

    <!-- como se trabaja con un formulario se debe guardar todoos los input en una etiqueta form
        esta etiqueta debe tener las propiedades: 
        action: permite definir a donde se enviara la informacion contenida en el formulario
        method: permite definir el metodo por el cual se envian los datos 
    -->
    <form class="container mt-3" action="./app/controller/registroController.php" method="POST">
        <div class="row justify-content-center">
            <div class="col-4 fondo">
                <div class="py-4">
                    <h3 class="text-center">Registro</h3>
                    <div class="col-12 text-center">
                        <p class="text-danger"></p>
                    </div>
                    <img src="./public/img/heisemberg.jpeg" class="mx-auto d-block rounded-circle" width="40%" alt="Login">

                    <div class="form-floating mb-3">
                        <input class="form-control mb-3" name="nombre" value="<?= htmlspecialchars($old['nombre'] ?? '') ?>" id="nombre" type="text"
                            placeholder="<i class='fa-solid fa-user me-2'></i>Nombre">
                        <label class="text-primary" for="nombre"><i class="fa-solid fa-user me-2"></i>Nombre</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="apellido" id="apellido" value="<?= htmlspecialchars($old['apellido'] ?? '') ?>" type="text" class="form-control"
                            placeholder="<i class='fa-regular fa-address-book me-2'></i>Apellido">
                        <label class="text-primary" for="apellido"><i class="fa-regular fa-address-book me-2"></i>Apellido</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" name="usuario" value="<?= htmlspecialchars($old['usuario'] ?? '') ?>" id="usuario" type="text"
                            placeholder="<i class='fa-solid fa-envelope me-2'></i>e-mail">
                        <label class="text-primary" for="usuario"><i class="fa-solid fa-envelope me-2"></i>Usuario</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" name="correo" value="<?= htmlspecialchars($old['correo'] ?? '') ?>" id="correo" type="email"
                            placeholder="<i class='fa-solid fa-envelope me-2'></i>Correo">
                        <label class="text-primary" for="correo"><i class="fa-solid fa-envelope me-2"></i>Correo</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="password" id="password" value="" type="password" class="form-control"
                            placeholder="<i class='fa-solid fa-lock me-2'></i>Password">
                        <label class="text-primary" for="password"><i class="fa-solid fa-lock me-2"></i>Password</label>
                    </div>

                    <!-- para accionar el envio de datos se debe utilizar un boton de tipo submit. 
                        submit permite enviar los datos a la ruta especificada en el action de manera automatica al hacer click 
                    -->
                    <button type="submit" class="btn btn-secondary w-100 mb-3" id="btn_registro"><i class="fa-solid fa-chalkboard-user me-2"></i>Registrar</button>
                    <a href="login.php" class="btn btn-success w-100"><i class="fa-solid fa-door-open me-2"></i>Inicio de sesion</a>
                </div>
            </div>
        </div>
    </form>

    <?php 
        //importacion del archivo footer (pie de pagina)
        require_once './components/footer.php';
    ?>
</body>
</html>
