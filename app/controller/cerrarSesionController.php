<?php
    session_start(); 
    require_once '../config/conexion.php';       
        $actualizar = $conexion->prepare("UPDATE t_usuario SET estado = 'inactivo' WHERE id_usuario = :id_usuario");
        $actualizar->bindParam(":id_usuario", $_SESSION['usuario_sesion']['id_usuario']);
        $actualizar->execute();
    session_unset(); 
    session_destroy();
    header("location:../../login.php"); 

?> 