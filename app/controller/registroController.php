
<?php
    session_start();
    require_once '../config/conexion.php';
    require_once '../../components/php/validar.php';

    $errores = [];
    function validar_sesion() {
        if (isset($_SESSION['usuario_sesion'])) {
            header("location: ../../index.php");
            exit();
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        validar_sesion();

        $campos = [
            'nombre'   => 'Nombre',
            'apellido' => 'Apellido',
            'usuario'  => 'Nombre de usuario',
            'password' => 'Contraseña',
            'correo'   => 'Correo'   
        ];

        $errores = val($campos);
        
        if (empty($errores)) {

            $verificar = $conexion->prepare("SELECT COUNT(*) FROM t_usuario WHERE usuario = :usuario OR correo = :correo");
            $verificar->bindParam(":usuario", $_POST['usuario']);
            $verificar->bindParam(":correo", $_POST['correo']);
            $verificar->execute();
            $rol = 'usuario';       
            if ($verificar->fetchColumn() > 0) {
                $errores[] = "El nombre de usuario o correo ya está registrado.";
            } else {
                $rol = 'usuario';
                $insercion = $conexion->prepare("INSERT INTO t_usuario (usuario, password, nombre, apellido, correo, rol) VALUES (:usuario, :password, :nombre, :apellido, :correo, :rol )");

               
                $password_cifrado = password_hash($_POST['password'], PASSWORD_BCRYPT);

                $insercion->bindParam(":usuario", $_POST['usuario']);
                $insercion->bindParam(":password", $password_cifrado);
                $insercion->bindParam(":nombre", $_POST['nombre']);
                $insercion->bindParam(":apellido", $_POST['apellido']);
                $insercion->bindParam(":correo", $_POST['correo']);
                $insercion->bindParam(":rol",$rol);

                if ($insercion->execute()) {
                
                    header("location: ../../login.php");
                    exit();
                } else {
                    $errores[] = "¡Error al registrar el usuario!";
                }
            }
        }

    
        $_SESSION['errores_registro'] = $errores;
        $_SESSION['old_data'] = $_POST;
        header("location: ../../registro.php");
        exit();

    } else {
        
        $errores[] = "No tienes acceso a esta ruta.";
        $_SESSION['errores_registro'] = $errores;
        header("location: ../../registro.php");
        exit();
    }
?>


