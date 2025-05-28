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
        'id_materia' => 'Id_materia',
        'nombre'      => 'Nombre',
        'tipo'    => 'Tipo',
    ], $datos);

    if (empty($errores)) {
        $agregar = $conexion->prepare("UPDATE t_materia SET nombre = :nombre, tipo = :tipo WHERE id_materia = :id_materia");

        $agregar->bindParam(':nombre', $datos['nombre']);
        $agregar->bindParam(':tipo', $datos['tipo']);
        $agregar->bindParam(':id_materia', $datos['id_materia'], PDO::PARAM_INT);

        if ($agregar->execute()) {
            header("location: ../../materias.php");
            exit();
        } else {
            $_SESSION['error'] = "Error al actualizar la materia.";
            header("location: ../../actualizarMateria.php?id=" . $datos['id_materia']);
            exit();
        }

    } else {
        $_SESSION['error'] = implode('<br>', $errores);
        header("location: ../../actualizarMateria.php?id=" . $_POST['id_materia']);
        exit();
    }

} else {
    $_SESSION['error'] = "Método no permitido.";
    header("location: ../../materias.php");
    exit();
}
