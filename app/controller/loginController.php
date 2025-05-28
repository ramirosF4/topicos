<?php
    
    session_start();
    require_once '../config/conexion.php'; 
    function validar_sesion(){
        if(isset($_SESSION['usuario_sesion'])){            
            header("location: ../../index.php");
        }
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        validar_sesion();
        if($_POST['usuario'] != "" && $_POST['password'] != ""){
            $consulta = $conexion -> prepare("SELECT * FROM t_usuario WHERE usuario =:usuario "); 
            $consulta ->bindParam(":usuario", $_POST['usuario']); 
            $consulta-> execute(); 
            $usuario = $consulta ->fetch(PDO::FETCH_ASSOC); 
            if($usuario){
                if(password_verify($_POST['password'], $usuario['password']) ){
                    $actualizar = $conexion->prepare("UPDATE t_usuario SET  estado = 'activo' WHERE id_usuario = :id_usuario");
                    $actualizar -> bindParam (":id_usuario" , $usuario ['id_usuario']); 
                    $actualizar->execute(); 
                    if (isset($_SESSION['usuario_sesion'])) {
                        $id_usuario = $_SESSION['usuario_sesion']['id_usuario']; 
                        $actualizar = $conexion->prepare("UPDATE t_usuario SET estado = 'inactivo' WHERE id_usuario = :id_usuario");
                        $actualizar->bindParam(":id_usuario", $id_usuario);
                        $actualizar->execute();
                    }
                    $_SESSION['usuario_sesion'] = [ // obtenemos los datos del usuario sesion 
                    'id_usuario' => $usuario['id_usuario'],//asignamos el valor a una variable
                    'usuario' => $usuario['usuario'],
                    'rol' => $usuario['rol']];
                    
                    $_SESSION['usuario_sesion'] = $usuario; 
                    
                    header("location: ../../index.php");
                }else{
                    echo "Credenciales de acceso erroneas!";
                }
            }else{
                echo "Credenciales erroneas!"; 
            }
        
        }else{
            echo "Debes llenar todos los campos!";
        }
    }else{
        echo "No tienes acceso a esta ruta";
    }
?>