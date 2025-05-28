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
        'id_profesores' => 'Id_profesor',
        'nombre'        => 'Nombre',
        'apellido'      => 'Apellido',
        'rfc'           => 'RFC',
        'materia'       => 'Materia'
    ], $datos);

    if (empty($errores)) {
        $agregar = $conexion->prepare(" UPDATE t_profesores SET nombre = :nombre, apellido = :apellido, rfc = :rfc, materia = :materia WHERE id_profesores = :id_profesores");

        $agregar->bindParam(':nombre', $datos['nombre']);
        $agregar->bindParam(':apellido', $datos['apellido']);
        $agregar->bindParam(':rfc', $datos['rfc']);
        $agregar->bindParam(':materia', $datos['materia']);
        $agregar->bindParam(':id_profesores', $datos['id_profesores'], PDO::PARAM_INT); 

        if ($agregar->execute()) {
            header("location: ../../profesores.php");
            exit();
        } else {
            $_SESSION['error'] = "Error al actualizar el profesor.";
            header("location: ../../actualizarProfesores.php?id=" . $datos['id_profesores']);
            exit();
        }

    } else {
        $_SESSION['error'] = implode('<br>', $errores);
        header("location: ../../actualizarProfesores.php?id=" . $_POST['id_profesores']);
        exit();
    }

} else {
    $_SESSION['error'] = "Método no permitido.";
    header("location: ../../profesores.php");
    exit();
}
