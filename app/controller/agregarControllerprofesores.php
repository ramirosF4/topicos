<?php
require_once '../config/conexion.php';
require_once '../../components/php/validarCampos.php';
session_start();

if (!isset($_SESSION['usuario_sesion'])) {
    header("location: ../../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $datos = [];
    $errores = validarCamposObligatorios([
        'nombre' => 'Nombre',
        'apellido' => 'Apellido',
        'rfc' => 'RFC',
        'materia' => 'Materia'
    ], $datos);

    if (empty($errores)) {
        $insercion = $conexion->prepare("INSERT INTO t_profesores (nombre, apellido, rfc, materia) VALUES (:nombre, :apellido, :rfc, :materia)");
        $insercion->bindParam(":nombre", $datos['nombre']);
        $insercion->bindParam(":apellido", $datos['apellido']);
        $insercion->bindParam(":rfc", $datos['rfc']);
        $insercion->bindParam(":materia", $datos['materia']);
        $insercion->execute();

        header("location: ../../profesores.php");
        exit();
    } else {
        $_SESSION['error'] = implode('<br>', $errores);
        header("location: ../../agregarProfesor.php");
        exit();
    }
}
?>
