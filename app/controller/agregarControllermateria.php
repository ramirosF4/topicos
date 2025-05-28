<?php
require_once '../../components/php/validarCampos.php';
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
        'tipo'   => 'Tipo',
    ], $datos);

    if (empty($errores)) {
        $insercion = $conexion->prepare("INSERT INTO t_materia (nombre, tipo) VALUES (:nombre, :tipo)");
        $insercion->bindParam(":nombre", $datos['nombre']);
        $insercion->bindParam(":tipo", $datos['tipo']);
        $insercion->execute();

        header("location: ../../materias.php");
        exit();
    } else {
        $_SESSION['error'] = implode('<br>', $errores);
        header("location: ../../agregarMateria.php");
        exit();
    }

} else {
    $_SESSION['error'] = "Acceso no permitido.";
    header("location: ../../materias.php");
    exit();
}
