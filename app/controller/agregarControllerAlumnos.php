<?php
require_once  '../../components/php/validarCampos.php';
require_once '../config/conexion.php';
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
        'matricula' => 'Matrícula'
    ], $datos);

    if (empty($errores)) {
        $insercion = $conexion->prepare("INSERT INTO t_alumnos (nombre, apellido, matricula) VALUES (:nombre, :apellido, :matricula)");
        $insercion->bindParam(":nombre", $datos['nombre']);
        $insercion->bindParam(":apellido", $datos['apellido']);
        $insercion->bindParam(":matricula", $datos['matricula']);
        $insercion->execute();

        header("location: ../../alumnos.php");
        exit();
    } else {
        $_SESSION['error'] = implode('<br>', $errores);
        header("location: ../../agregarAlumnos.php");
        exit();
    }

} else {
    $_SESSION['error'] = "Acceso no permitido.";
    header("location: ../../alumnos.php");
    exit();
}