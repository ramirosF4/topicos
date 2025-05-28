<?php
session_start();
require_once '../config/conexion.php';
require_once '../../components/php/validarCampos.php';

if (!isset($_SESSION['usuario_sesion']) || $_SESSION['usuario_sesion']['rol'] !== 'admin') {
    header("location: ../../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [];

    $errores = validarCamposObligatorios([
        'id_usuario' => 'ID',
        'nombre'     => 'Nombre',
        'apellido'   => 'Apellido',
        'usuario'    => 'Usuario',
        'correo'     => 'Correo',
        'rol'        => 'Rol'
    ], $datos);

    if (!filter_var($datos['correo'], FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo no es válido.";
    }

    if (empty($errores)) {
        $verificar = $conexion->prepare("SELECT rol FROM t_usuario WHERE id_usuario = :id");
        $verificar->bindParam(":id", $datos['id_usuario']);
        $verificar->execute();
        $usuario = $verificar->fetch(PDO::FETCH_ASSOC);

        if ($usuario && $usuario['rol'] === 'admin') {
            $datos['rol'] = 'admin'; 
        }
        $update = $conexion->prepare("UPDATE t_usuario SET nombre = :nombre, apellido = :apellido, usuario = :usuario, correo = :correo, rol = :rol WHERE id_usuario = :id");
        $update->bindParam(':nombre', $datos['nombre']);
        $update->bindParam(':apellido', $datos['apellido']);
        $update->bindParam(':usuario', $datos['usuario']);
        $update->bindParam(':correo', $datos['correo']);
        $update->bindParam(':rol', $datos['rol']);
        $update->bindParam(':id', $datos['id_usuario']);
        $update->execute();
        header("location: ../../usuarios.php");
        exit();
    } else {
        $_SESSION['error'] = implode('<br>', $errores);
        header("location: ../../actualizarUsuario.php?id=" . $_POST['id_usuario']);
        exit();
    }

} else {
    header("location: ../../usuarios.php");
    exit();
}
